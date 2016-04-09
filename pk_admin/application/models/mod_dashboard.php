<?php 
/**
* 
*/
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

    public function add_pasien($data)
    {    
        $res = $this->db->insert($this->table, $data); 
        
        return $res;
    }

    public function modify_pasien($data)
    {    
        $this->db->where('id_daftar_khitan', $data['id_daftar_khitan']);
        $res = $this->db->update($this->table, $data);
        return $res;
    }

    public function del_pas($id)
    {
        $res = $this->db->delete($this->table, array('id_daftar_khitan' => $id));
        return $res;
    }
}