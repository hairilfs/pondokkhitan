<?php 
/*
* Mother of any model
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

    public function getBy($by,$value,$class = null)
    {
        $this->db->where($by,$value);
        $query = $this->db->get($this->table);

        if(!empty($class))
        {
            return $query->row(0,$class);
        }
        else
        {
            return $query->row();
        }
      
    }

    public function insert($data)
    {
      $this->db->insert($this->table, $data);

      return $this->db->insert_id();
    }

    public function update($id,$data,$administrator = null)
    {
      $this->db->where($this->key, $id);
      $res = $this->db->update($this->table, $data);
      return $res;
    }

    public function delete($id)
    {
      $this->db->where($this->key, $id);
      $res = $this->db->delete($this->table); 
      return $res;
    }
}