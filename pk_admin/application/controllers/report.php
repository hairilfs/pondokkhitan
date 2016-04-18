<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_CMS_Controller {

	public function __construct(){
        parent::__construct();        

        $this->load->model('mod_report');
    }

	public function index()
	{					
		$data['page_title'] = "Report";
		$this->load->view('report', $data);
	}

	public function printReport()
	{
		//load librarynya terlebih dahulu
        //jika digunakan terus menerus lebih baik load ini ditaruh di auto load
        $this->load->library("PHPExcel");

        //membuat objek PHPExcel
        $objPHPExcel = new PHPExcel();        

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

        $daterange = $this->input->post('daterange');
        $fetch_date = explode(" - ", $daterange);

        $data = $this->mod_report->getDetailPasien(strtotime($fetch_date[0]), strtotime($fetch_date[1])); 

        $cnt = 2; // baris data pertama
       
        foreach($data as $row)
        {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$cnt, $cnt-1);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$cnt, $row['nama_lengkap']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$cnt, $row['ortu_wali']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$cnt, $row['no_ktp']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$cnt, $row['no_hp']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$cnt, date('d F Y',$row['tgl_lahir']));
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$cnt, $row['tempat_lahir']);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$cnt, $row['agama']);
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$cnt, $row['berat_badan']);
            $objPHPExcel->getActiveSheet()->setCellValue('J'.$cnt, $row['alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('K'.$cnt, $row['jns_khitan']);
            $objPHPExcel->getActiveSheet()->setCellValue('L'.$cnt, $row['lokasi_klinik']);
            $objPHPExcel->getActiveSheet()->setCellValue('M'.$cnt, date('d F Y', $row['tgl_khitan']));
            $objPHPExcel->getActiveSheet()->setCellValue('N'.$cnt, $row['status']);
            $cnt++;
        }
        //set title pada sheet (me rename nama sheet)
        $objPHPExcel->getActiveSheet()->setTitle(date('d F Y h.i.s', time()));

        //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        //sesuaikan headernya 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //ubah nama file saat diunduh
        $file_name = "Report pasien ($daterange).xlsx";
        header("Content-Disposition: attachment;filename=$file_name");
        //unduh file
        $objWriter->save("php://output");

        // Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
        // Folder Documentation dan Example
        // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu
	}
}
