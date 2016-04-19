<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			$password = hash_adm_password($password);

			$this->load->model('mod_auth');
			$admin = $this->mod_auth->login($email,$password);

			if(!empty($admin))
			{
				$data['last_login'] = time();
				$this->mod_auth->update($admin->id,$data);

				$log_data = array(
					'id_adm' => $admin->id,				                  
					'username' => $admin->username,
					'email' => $admin->email,
					'is_login' => TRUE		
				);

				$this->session->set_userdata($log_data);			
				$this->session->set_flashdata('msg','success');
				redirect('dashboard');
			}
			else
			{
				$this->session->set_flashdata('err','<p class="login-box-msg text-danger">Oops! Invalid email or password.</p>');					
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}