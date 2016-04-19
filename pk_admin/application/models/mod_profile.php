<?php 
class Mod_profile extends MY_Model
{
	
	public function __construct(){
        parent::__construct();        

        $this->table = 'administrator';
        $this->key = 'id';
    }

}