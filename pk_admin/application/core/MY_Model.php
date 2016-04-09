<?php 
/**
* 
*/
class MY_Model extends CI_Model
{	
	public function __construct(){
        parent::__construct();

        $this->table = '';
        $this->key = '';
    }

    public function get_all_data()
    {
        $data = $this->db->get($this->table);
        return $data->result_array();
    }

    public function get_datatable_data($column)
    {   
        $th = implode(", ", $column);
        $this->db->select($th);
    	$data = $this->db->get($this->table);
    	return $data->result_array();
    }
}