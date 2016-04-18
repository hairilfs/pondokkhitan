<?php 
class Mod_dashboard extends MY_Model
{
	
	public function __construct(){
        parent::__construct();        

        $this->table = 'daftar_khitan';
        $this->key = 'id_daftar_khitan';
    }

    public function get_detail_pendaftar($id)
    {
    	$this->db->where('id_daftar_khitan', $id);
    	$res = $this->db->get($this->table);
    	return $res->row();
    }

}