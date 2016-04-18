<?php 
class Mod_report extends MY_Model
{
	
	public function __construct(){
        parent::__construct();        

        $this->table = 'daftar_khitan';
        $this->key = 'id_daftar_khitan';
    }

    public function getDetailPasien($from, $to)
    {
    	$sql = "SELECT * FROM daftar_khitan WHERE tgl_khitan BETWEEN $from AND $to ORDER BY tgl_khitan ASC";
        $query = $this->db->query($sql);
        $data = $query->result_array();

        return $data;
    }

}