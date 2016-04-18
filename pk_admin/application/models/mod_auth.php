<?php
class Mod_auth extends MY_Model {
    
  public function __construct(){
      parent::__construct();

      $this->table  = 'administrator';
      $this->key    = 'id';

  }

  public function login($email,$password)
  {
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    // $this->db->where('is_active',1);
    // $this->db->where('role !=',0);
    $query = $this->db->get($this->table);

    return $query->row();
  }
    
}