<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'core/Admin_Controller.php';

class Tabelbarangkeluar extends Admin_Controller {
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

		if($this->data['is_can_read'])
		{
			$this->data['content'] = 'admin/tabelbarangkeluar/list_v';

			$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
			$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();
		}
		else {
			$this->data['content'] = 'errors/html/restrict'; 
		}
		
		$this->load->view('admin/layouts/page',$this->data);  
	}

	public function loadout()
	{  
		$this->form_validation->set_rules('id_transaksi',"ID Transaksi Harus Diisi", 'trim|required');
		 
		if ($this->form_validation->run() === TRUE)
		{ 
			$data = array(
				'id_transaksi' => $this->input->post('id_transaksi'), 
				'tanggal_keluar' => $this->input->post('tanggal_keluar'),
				'lokasi' => $this->input->post('lokasi'),
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_satuan_barang' => $this->input->post('id_satuan_barang'),
				'jumlah_barang' => $this->input->post('jumlah_barang'),
				'data_kurir' => $this->input->post('data_kurir'),
				'created_by' => $this->data['users']->id,
				'updated_by' => $this->data['users']->id
			); 

			if ($this->keluarbarang_model->insert($data))
			{ 
				$this->session->set_flashdata('message', "Input Barang Berhasil Disimpan");

				// Hapus data dari input_barang berdasarkan ID yang diterima
				$id = $this->input->post('id');
				if(!empty($id))
				{
					$this->load->model("inputbarang_model");
					$this->inputbarang_model->delete(array("id"=>$id));
				}
				else {
					$response_data['msg'] = "ID Harus Diisi";
				}
				
				echo json_encode($response_data);
				redirect("tabelbarangkeluar");
			}
			else {
				$this->session->set_flashdata('message_error',"Input Barang Gagal Disimpan");
				redirect("tabelbarangkeluar");
			}
		} 
		else {
			// join table
			$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
			$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();
			
			$this->data['content'] = 'admin/tabelbarangkeluar/list_v'; 
			$this->load->view('admin/layouts/page',$this->data); 
		}
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
     		
            	if($this->data['is_can_edit'] && $data->is_deleted == 0)
				{
            		// $edit_url = "<a href='".base_url()."tabelbarangmasuk/edit/".$data->id."' class='btn btn-sm btn-info white'><i class='fa fa-pencil'></i> Ubah</a>";
					$report_url = "<a href='".base_url()."tabelbarangkeluar/report/".$data->id."'  class='btn btn-sm btn-secondary white'><i class='fa fa-pencil'></i> Laporan</a>";
            	}  
            	if($this->data['is_can_delete'])
				{
	            	if($data->is_deleted == 0){
	        			$delete_url = "<a href='#' 
	        				url='".base_url()."tabelbarangkeluar/destroy/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-danger white delete' >Tahan
	        				</a>";
	        		}
					else {
	        			$delete_url = "<a href='#' 
	        				url='".base_url()."tabelbarangkeluar/destroy/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-primary white delete' 
	        				 >Listkan
	        				</a>";
	        			$delete_url_hard = "<a href='#' 
	        				url='".base_url()."tabelbarangkeluar/destroy_hard/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-danger white delete' 
	        				 >Hapus
	        				</a>";
	        		} 
        		}
            	
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

	public function report()
	{
		// load data berdasarkn id
		$this->data['id']= $this->uri->segment(3);
		$this->data['report_data'] = $this->keluarbarang_model->getAllById(array("keluar_barang.id"=>$this->data['id']));

		// load data
		$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
		$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();

		// Load the view for printing (adjust the view name as needed)
		$this->load->view('admin/report/print_report', $this->data);
	}

	public function destroy()
	{
		$response_data = array();
        $response_data['status'] = false;
        $response_data['msg'] = "";
        $response_data['data'] = array();   

		$id = $this->uri->segment(3);
		$is_deleted = $this->uri->segment(4);

 		if(!empty($id))
		{
 			$this->load->model("keluarbarang_model");
			$data = array(
				'is_deleted' => ($is_deleted == 1)?0:1
			); 
			$update = $this->keluarbarang_model->update($data,array("id"=>$id));

        	$response_data['data'] = $data; 
         	$response_data['status'] = true;
 		} 
		else {
 		 	$response_data['msg'] = "ID Harus Diisi";
 		}
		
        echo json_encode($response_data); 
	}

	public function destroy_hard()
	{
		$response_data = array();
        $response_data['status'] = false;
        $response_data['msg'] = "";
        $response_data['data'] = array();   

		$id =$this->uri->segment(3);
		$is_deleted = $this->uri->segment(4);

 		if(!empty($id))
		{
 			$this->load->model("keluarbarang_model");
			$data = array(
				'is_deleted' => ($is_deleted == 1)?0:1
			); 
			$update = $this->keluarbarang_model->delete(array("id"=>$id));

        	$response_data['data'] = $data; 
         	$response_data['status'] = true;
 		}
		else {
 		 	$response_data['msg'] = "ID Harus Diisi";
 		}
		
        echo json_encode($response_data); 
	}
}
