<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
        parent::__construct();

        $this->load->library('session');
        $this->data = array();
        $this->data['page_title'] = "Page Title";

    }

}

class MY_CMS_Controller extends MY_Controller {

	public function __construct(){
        parent::__construct();        

        if(!$this->session->username)
        {
        	redirect('login');
        }
    }

}