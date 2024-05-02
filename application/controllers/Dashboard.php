<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'core/Admin_Controller.php';

class Dashboard extends Admin_Controller {
 	public function __construct()
	{
		parent::__construct();

		// load model
		$this->load->model('inputbarang_model'); 
		$this->load->model('keluarbarang_model');
		$this->load->model('inputbarangsatuan_model');
		$this->load->model('tabelkurir_model');	 
	}

	public function index()
	{
		$this->load->helper('url');

		if($this->data['is_can_read']){

			$this->data['content'] = 'admin/dashboard';  
			
			$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
			$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();
		}
		else {
			$this->data['content'] = 'errors/html/restrict'; 
		}

		$this->load->view('admin/layouts/page',$this->data); 
	} 

	public function dataList()
	{
		 $columns = array( 
            0 =>'id',  
            1 => 'id_transaksi', 
            2 => 'tanggal_keluar',
			3 => 'lokasi',
			4 => 'kode_barang',
            5 => 'nama_barang',
			6 => 'satuan_barang.nama_satuan_barang',
			7 => 'jumlah_barang',
			8 => 'tabelkurir.nama_kurir',
			9 => ''
        );
		
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  		$search = array();
  		$limit = 0;
  		$start = 0;
        $totalData = $this->keluarbarang_model->getCountAllBy($limit,$start,$search,$order,$dir); 
        
        if(!empty($this->input->post('search')['value']))
		{
        	$search_value = $this->input->post('search')['value'];
           	$search = array(
           		"tabelbarangkeluar.id_transaksi"=>$search_value,
           		"tabelbarangkeluar.tanggal_keluar"=>$search_value,
				"tabelbarangkeluar.lokasi"=>$search_value,
				"tabelbarangkeluar.kode_barang"=>$search_value,
				"tabelbarangkeluar.nama_barang"=>$search_value,
				"tabelbarangkeluar.nama_satuan"=>$search_value,
				"tabelbarangkeluar.jumlah_barang"=>$search_value,
				"tabelbarangkeluar.data_kurir"=>$search_value,
           	); 
           	$totalFiltered = $this->keluarbarang_model->getCountAllBy($limit,$start,$search,$order,$dir); 
        }
		else {
        	$totalFiltered = $totalData;
        } 
       
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
     	$datas = $this->keluarbarang_model->getAllBy($limit,$start,$search,$order,$dir);
     	
        $new_data = array();

        if(!empty($datas))
        {
            foreach ($datas as $key=>$data)
            {  
            	$edit_url = "";
     			$delete_url = "";
     			$delete_url_hard = "";
				$report_url = "";
            	
                $nestedData['id'] = $start+$key+1; 
                $nestedData['id_transaksi'] = substr(strip_tags($data->id_transaksi),0,50);
				$nestedData['tanggal_keluar'] = $data->tanggal_keluar; 
				$nestedData['lokasi'] = $data->lokasi; 
                $nestedData['kode_barang'] = substr(strip_tags($data->kode_barang),0,50); 
				$nestedData['nama_barang'] = $data->nama_barang; 
				$nestedData['nama_satuan'] = $data->nama_satuan; 
				$nestedData['jumlah_barang'] = $data->jumlah_barang; 
				$nestedData['tabelkurir_name'] = $data->tabelkurir_name; 
           		$nestedData['action'] = $edit_url." ".$report_url." ".$delete_url." ".$delete_url_hard;   
                $new_data[] = $nestedData; 
            }
        }
          
        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $new_data   
                    );
            
        echo json_encode($json_data); 
	}
}
