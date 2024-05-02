<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Inputbarangsatuan_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
	} 

	public function getAllById($where = array())
	{
		$this->db->select("satuan_barang.*")->from("satuan_barang"); 
		$this->db->where("satuan_barang.is_deleted",0); 
		$this->db->where($where); 

		$query = $this->db->get();
		if ($query->num_rows() >0){  
    		return $query->result(); 
    	} 
    	return FALSE;
	}

	public function getAllIdSuperadmin($where = array())
	{
		$this->db->select("satuan_barang.*")->from("satuan_barang");  
		$this->db->where("satuan_barang.is_deleted",0); 
		$this->db->where($where); 

		$query = $this->db->get();
		if ($query->num_rows() >0){  
    		return $query->result(); 
    	} 
    	return FALSE;
	}
	
	public function insert($data)
	{
		$this->db->insert('satuan_barang', $data);
		return $this->db->insert_id();
	}

	public function update($data,$where)
	{
		$this->db->update('satuan_barang', $data, $where);
		return $this->db->affected_rows();
	}
	
	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('satuan_barang'); 
		if($this->db->affected_rows()){
			return TRUE;
		}
		return FALSE;
	} 

    function getAllBy($limit, $start, $search, $col, $dir)
    {
        $this->db->select("satuan_barang.*")->from("satuan_barang");

        $this->db->limit($limit, $start)->order_by($col, $dir);
        if (!empty($search)) {
            foreach ($search as $key => $value) {
                $this->db->or_like($key, $value);
            }
        }
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return null;
        }
    }

    function getCountAllBy($limit, $start, $search, $order, $dir)
    {
        $this->db->select("satuan_barang.*")->from("satuan_barang");
        if (!empty($search)) {
            foreach ($search as $key => $value) {
                $this->db->or_like($key, $value);
            }
        }
        $result = $this->db->get();
        return $result->num_rows();
    }
}
