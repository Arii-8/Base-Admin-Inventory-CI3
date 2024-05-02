<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Inputbarang_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
	} 

	public function getAllById($where = array())
	{
		$this->db->select("input_barang.*, satuan_barang.id as id_satuan_barang, satuan_barang.nama_satuan_barang as nama_satuan, tabelkurir.id as data_kurir, tabelkurir.nama_kurir as tabelkurir_name")->from("input_barang");
		$this->db->join("satuan_barang", "input_barang.id_satuan_barang = satuan_barang.id");
		$this->db->join("tabelkurir", "input_barang.data_kurir = tabelkurir.id");

		$this->db->where("input_barang.is_deleted",0); 
		$this->db->where($where); 

		$query = $this->db->get();
		if ($query->num_rows() >0){  
    		return $query->result(); 
    	} 
    	return FALSE;
	}

	public function getAllIdSuperadmin($where = array())
	{
		$this->db->select("input_barang.*, satuan_barang.id as id_satuan_barang, satuan_barang.nama_satuan_barang as nama_satuan, tabelkurir.id as data_kurir, tabelkurir.nama_kurir as tabelkurir_name")->from("input_barang");
		$this->db->join("satuan_barang", "input_barang.id_satuan_barang = satuan_barang.id");
		$this->db->join("tabelkurir", "input_barang.data_kurir = tabelkurir.id");

		$this->db->where("input_barang.is_deleted",0); 
		$this->db->where($where); 

		$query = $this->db->get();
		if ($query->num_rows() >0){  
    		return $query->result(); 
    	} 
    	return FALSE;
	}
	
	public function insert($data)
	{
		$this->db->insert('input_barang', $data);
		return $this->db->insert_id();
	}

	public function update($data,$where)
	{
		$this->db->update('input_barang', $data, $where);
		return $this->db->affected_rows();
	}
	
	public function delete($where)
	{
		$this->db->where($where);
		$this->db->delete('input_barang'); 
		if($this->db->affected_rows()){
			return TRUE;
		}
		return FALSE;
	} 

    function getAllBy($limit, $start, $search, $col, $dir)
    {
		$this->db->select("input_barang.*, satuan_barang.id as id_satuan_barang, satuan_barang.nama_satuan_barang as nama_satuan, tabelkurir.id as data_kurir, tabelkurir.nama_kurir as tabelkurir_name")->from("input_barang");
		$this->db->join("satuan_barang", "input_barang.id_satuan_barang = satuan_barang.id");
		$this->db->join("tabelkurir", "input_barang.data_kurir = tabelkurir.id");

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
        $this->db->select("input_barang.*, satuan_barang.id as id_satuan_barang, satuan_barang.nama_satuan_barang as nama_satuan, tabelkurir.id as data_kurir, tabelkurir.nama_kurir as tabelkurir_name")->from("input_barang");
		$this->db->join("satuan_barang", "input_barang.id_satuan_barang = satuan_barang.id");
		$this->db->join("tabelkurir", "input_barang.data_kurir = tabelkurir.id");
		
        if (!empty($search)) {
            foreach ($search as $key => $value) {
                $this->db->or_like($key, $value);
            }
        }
        $result = $this->db->get();
        return $result->num_rows();
    }
}
