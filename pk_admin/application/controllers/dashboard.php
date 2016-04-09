<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$th = array('nama_lengkap', 'ortu_wali', 'no_hp', 'lokasi_klinik', 'tgl_khitan', 'status');
		$data['data'] = $this->mod_dashboard->get_datatable_data($th);
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
			$res = $this->mod_dashboard->modify_pasien($data);
			$notif = "<div class='alert alert-success alert-dismissible pull-right' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			  Data berhasil disimpan.</div>";
		} else {
			$res = $this->mod_dashboard->add_pasien($data);
			$notif = "<div class='alert alert-success alert-dismissible pull-right' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			  Data berhasil diubah.</div>";
		}

		if ($res==true) {
			$this->session->set_flashdata('notif', $notif);
			redirect('dashboard');
		} else {
			echo "<script>alert('salah');</script>";
		}

	}

	public function delete_pasien($id)
	{
		$res = $this->mod_dashboard->del_pas($id);
		if ($res==true) {
			$notif = "<div class='alert alert-success alert-dismissible pull-right' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			  Data berhasil dihapus.</div>";
			$this->session->set_flashdata('notif', $notif);
			redirect('dashboard');
		}

	}
}
