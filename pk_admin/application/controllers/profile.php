<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct(){
		parent::__construct();      
        $this->load->model('mod_profile');
    }

	public function view($id=null)
	{	
		$data = $this->mod_profile->getBy('id', $id);
		$page_title = "Profile";

		$this->load->view('profile', array('data' => $data, 'page_title' => $page_title));
	}

	public function update($type, $id=null)
	{	
		if ($type=="data")
		{
			$content['username'] = $this->input->post('username');
			$content['email'] = $this->input->post('email');
			$content['mdate'] = time();
		} 
		elseif ($type=="pass") 
		{	
			// belum bisa
			$content = $this->input->post('pass1');
			$content = $this->input->post('pass2');
		}
		
		$res = $this->mod_profile->update($id, $content);
		if ($res) {
			redirect('profile/view/'.$id);
		} else {
			redirect('profile/view/'.$id);
		}
		
	}

}