<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_CMS_Controller {

	public function __construct(){
        parent::__construct();        

        $this->load->model('mod_dashboard');
        $this->load->library('session');
    }

	public function index()
	{			
		$data['pendaftar'] = $this->mod_dashboard->get_all_data();
		$data['page_title'] = "Dashboard";
		$this->load->view('dashboard', $data);
	}

	public function json_data()
	{
		$th = array('id_daftar_khitan','nama_lengkap', 'ortu_wali', 'no_hp', 'lokasi_klinik', 'tgl_khitan', 'status', 'rdate');
		$data['pendaftar'] = $this->mod_dashboard->get_datatable_data($th);
		echo json_encode($data);
	}

	public function detail_pendaftar($id)
	{
		$res = $this->mod_dashboard->get_detail_pendaftar($id);
		echo json_encode($res);
	}

	public function edit_pasien($id=null)
	{			
		$data = array(
			'nama_lengkap' => $this->input->post('nama'),	
			'ortu_wali' => $this->input->post('ortuwali'),	
			'no_hp' => $this->input->post('nohp'),	
			'tgl_lahir' => strtotime($this->input->post('tgllhr')),	
			'tempat_lahir' => $this->input->post('tptlhr'),	
			'agama' => $this->input->post('agama'),	
			'berat_badan' => $this->input->post('bdn'),	
			'jns_khitan' => $this->input->post('jnskhit'),	
			'alamat' => $this->input->post('alamat'),	
			'no_ktp' => $this->input->post('noktp'),	
			'lokasi_klinik' => $this->input->post('loklik'),	
			'tgl_khitan' => strtotime($this->input->post('tglkhit')),	
			'status' => $this->input->post('status')	
		);

		// var_dump($data['tgl_lahir']); exit();

		if ($id!=null) {
			$data['id_daftar_khitan'] = $id;
			date_default_timezone_set('Asia/Jakarta');
			$data['mdate'] = time();
			$res = $this->mod_dashboard->update($id, $data);
			$notif = "<div class='alert alert-success alert-dismissible pull-right' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			  Data berhasil disimpan.</div>";
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$data['rdate'] = time();
			$res = $this->mod_dashboard->insert($data);
			$notif = "<div class='alert alert-success alert-dismissible pull-right' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			  Data berhasil diubah.</div>";
		}

		if ($res) {
			$this->session->set_flashdata('notif', $notif);
			redirect('dashboard');
		} else {
			echo "<script>alert('Oops! Something wrong.');</script>";
		}

	}

	public function delete_pasien($id)
	{
		$res = $this->mod_dashboard->delete($id);
		if ($res==true) {
			$notif = "<div class='alert alert-success alert-dismissible pull-right' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			  Data berhasil dihapus.</div>";
			$this->session->set_flashdata('notif', $notif);
			redirect('dashboard');
		}

	}

	public function exel()
	{
		//load librarynya terlebih dahulu
            //jika digunakan terus menerus lebih baik load ini ditaruh di auto load
            $this->load->library("PHPExcel");
 
            //membuat objek PHPExcel
            $objPHPExcel = new PHPExcel();

            $sql = "SELECT * FROM daftar_khitan";

            $query = $this->db->query($sql);
	        $data = $query->result_array(); 

		    $objPHPExcel->setActiveSheetIndex(0);

	        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'No.');
	        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama Lengkap');
	        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Orang Tua / Wali');
	        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'No KTP');
	        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'No HP');
	        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Tgl Lahir');
	        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Tempat Lahir');
	        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Agama');
	        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Berat Badan');
	        $objPHPExcel->getActiveSheet()->setCellValue('J1', 'Alamat');
	        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Jenis Khitan');
	        $objPHPExcel->getActiveSheet()->setCellValue('L1', 'Lokasi Klinik');
	        $objPHPExcel->getActiveSheet()->setCellValue('M1', 'Tgl. Khitan');
	        $objPHPExcel->getActiveSheet()->setCellValue('N1', 'Status');

	        $cnt = 2; // baris data pertama
	       
	        foreach($data as $row)
	        {
	            $objPHPExcel->getActiveSheet()->setCellValue('A'.$cnt, $cnt-1);
	            $objPHPExcel->getActiveSheet()->setCellValue('B'.$cnt, $row['nama_lengkap']);
	            $objPHPExcel->getActiveSheet()->setCellValue('C'.$cnt, $row['ortu_wali']);
	            $objPHPExcel->getActiveSheet()->setCellValue('D'.$cnt, $row['no_ktp']);
	            $objPHPExcel->getActiveSheet()->setCellValue('E'.$cnt, $row['no_hp']);
	            $objPHPExcel->getActiveSheet()->setCellValue('F'.$cnt, $row['tgl_lahir']);
	            $objPHPExcel->getActiveSheet()->setCellValue('G'.$cnt, $row['tempat_lahir']);
	            $objPHPExcel->getActiveSheet()->setCellValue('H'.$cnt, $row['agama']);
	            $objPHPExcel->getActiveSheet()->setCellValue('I'.$cnt, $row['berat_badan']);
	            $objPHPExcel->getActiveSheet()->setCellValue('J'.$cnt, $row['alamat']);
	            $objPHPExcel->getActiveSheet()->setCellValue('K'.$cnt, $row['jns_khitan']);
	            $objPHPExcel->getActiveSheet()->setCellValue('L'.$cnt, $row['lokasi_klinik']);
	            $objPHPExcel->getActiveSheet()->setCellValue('M'.$cnt, $row['tgl_khitan']);
	            $objPHPExcel->getActiveSheet()->setCellValue('N'.$cnt, $row['status']);
	            $cnt++;
	        }
            //set title pada sheet (me rename nama sheet)
            $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
 
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="hasilExcel.xlsx"');
            //unduh file
            $objWriter->save("php://output");
 
            //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
            // Folder Documentation dan Example
            // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu
	}
}
