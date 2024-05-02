<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'core/Admin_Controller.php';

class Tabelbarangmasuk extends Admin_Controller {
 	public function __construct()
	{
		parent::__construct(); 
	 	$this->load->model('inputbarang_model');
		$this->load->model('inputbarangsatuan_model');
		$this->load->model('tabelkurir_model');
	}

	public function index()
	{
		$this->load->helper('url');

		if($this->data['is_can_read'])
		{
			$this->data['content'] = 'admin/tabelbarangmasuk/list_v';

			$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
			$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();
		}
		else {
			$this->data['content'] = 'errors/html/restrict'; 
		}
		
		$this->load->view('admin/layouts/page',$this->data);  
	}

	public function edit($id)
	{  
		$this->form_validation->set_rules('id_transaksi',"ID Transaksi Harus Diisi", 'trim|required');

		if ($this->form_validation->run() === TRUE)
		{
			$data = array(
				'id_transaksi' => $this->input->post('id_transaksi'), 
				'tanggal_input' => $this->input->post('tanggal_input'),
				'lokasi' => $this->input->post('lokasi'),
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_satuan_barang' => $this->input->post('id_satuan_barang'),
				'jumlah_barang' => $this->input->post('jumlah_barang'),
				'data_kurir' => $this->input->post('data_kurir'),
			);

			$update = $this->inputbarang_model->update($data,array("input_barang.id"=>$id));

			if ($update)
			{ 
				$this->session->set_flashdata('message', "Data Barang Berhasil Diubah");
				redirect("tabelbarangmasuk","refresh");
			} 
			else {
				$this->session->set_flashdata('message_error', "Data Barang Gagal Diubah");
				redirect("tabelbarangmasuk","refresh");
			}
		} 
		else
		{
			if(!empty($_POST))
			{ 
				$id = $this->input->post('id'); 
				$this->session->set_flashdata('message_error',validation_errors());
				return redirect("tabelbarangmasuk/edit/".$id);	
			} 
			else {
				$this->data['id']= $this->uri->segment(3);
				$inputbarang = $this->inputbarang_model->getAllById(array("input_barang.id"=>$this->data['id']));  
				$this->data['id_transaksi'] =   (!empty($inputbarang))?$inputbarang[0]->id_transaksi:"";
				$this->data['tanggal_input'] =   (!empty($inputbarang))?$inputbarang[0]->tanggal_input:""; 
				$this->data['lokasi'] =   (!empty($inputbarang))?$inputbarang[0]->lokasi:""; 
				$this->data['kode_barang'] =   (!empty($inputbarang))?$inputbarang[0]->kode_barang:""; 
				$this->data['nama_barang'] =   (!empty($inputbarang))?$inputbarang[0]->nama_barang:""; 
				$this->data['id_satuan_barang'] =   (!empty($inputbarang))?$inputbarang[0]->id_satuan_barang:""; 
				$this->data['jumlah_barang'] =   (!empty($inputbarang))?$inputbarang[0]->jumlah_barang:""; 
				$this->data['data_kurir'] =   (!empty($inputbarang))?$inputbarang[0]->data_kurir:""; 
				
				$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
				$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();

				$this->data['content'] = 'admin/tabelbarangmasuk/edit_v'; 
				$this->load->view('admin/layouts/page',$this->data); 
			}  
		}    
	} 

	public function dataList()
	{
		 $columns = array( 
            0 =>'id',  
            1 => 'id_transaksi', 
            2 => 'tanggal_input',
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
        $totalData = $this->inputbarang_model->getCountAllBy($limit,$start,$search,$order,$dir); 
        
        if(!empty($this->input->post('search')['value']))
		{
        	$search_value = $this->input->post('search')['value'];
           	$search = array(
           		"tabelbarangmasuk.id_transaksi"=>$search_value,
           		"tabelbarangmasuk.tanggal_input"=>$search_value,
				"tabelbarangmasuk.lokasi"=>$search_value,
				"tabelbarangmasuk.kode_barang"=>$search_value,
				"tabelbarangmasuk.nama_barang"=>$search_value,
				"tabelbarangmasuk.nama_satuan"=>$search_value,
				"tabelbarangmasuk.jumlah_barang"=>$search_value,
				"tabelbarangmasuk.data_kurir"=>$search_value,
           	); 
           	$totalFiltered = $this->inputbarang_model->getCountAllBy($limit,$start,$search,$order,$dir); 
        }
		else {
        	$totalFiltered = $totalData;
        } 
       
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
     	$datas = $this->inputbarang_model->getAllBy($limit,$start,$search,$order,$dir);
     	
        $new_data = array();

        if(!empty($datas))
        {
            foreach ($datas as $key=>$data)
            {  
            	$edit_url = "";
     			$delete_url = "";
     			$delete_url_hard = "";
				$stuffout_url = "";
     		
            	if($this->data['is_can_edit'] && $data->is_deleted == 0)
				{
            		$edit_url = "<a href='".base_url()."tabelbarangmasuk/edit/".$data->id."' class='btn btn-sm btn-info white'><i class='fa fa-pencil'></i> Ubah</a>";
            	}  
            	if($this->data['is_can_delete'])
				{
	            	if($data->is_deleted == 0){
	        			$delete_url = "<a href='#' 
	        				url='".base_url()."tabelbarangmasuk/destroy/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-danger white delete' >Tahan
	        				</a>";
							$stuffout_url = "<a href='".base_url()."tabelbarangmasuk/stuffout/".$data->id."'  class='btn btn-sm btn-secondary white'><i class='fa fa-pencil'></i> Keluarkan</a>";
	        		}
					else {
	        			$delete_url = "<a href='#' 
	        				url='".base_url()."tabelbarangmasuk/destroy/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-primary white delete' 
	        				 >Listkan
	        				</a>";
	        			$delete_url_hard = "<a href='#' 
	        				url='".base_url()."tabelbarangmasuk/destroy_hard/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-danger white delete' 
	        				 >Hapus
	        				</a>";
	        		} 
        		}
            	
                $nestedData['id'] = $start+$key+1; 
                $nestedData['id_transaksi'] = substr(strip_tags($data->id_transaksi),0,50);
				$nestedData['tanggal_input'] = $data->tanggal_input; 
				$nestedData['lokasi'] = $data->lokasi; 
                $nestedData['kode_barang'] = substr(strip_tags($data->kode_barang),0,50); 
				$nestedData['nama_barang'] = $data->nama_barang; 
				$nestedData['nama_satuan'] = $data->nama_satuan; 
				$nestedData['jumlah_barang'] = $data->jumlah_barang; 
				$nestedData['tabelkurir_name'] = $data->tabelkurir_name; 
           		$nestedData['action'] = $edit_url." ".$stuffout_url." ".$delete_url." ".$delete_url_hard;   
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
 
	public function stuffout($id)
	{  
		$this->form_validation->set_rules('id_transaksi',"ID Transaksi Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('tanggal_input',"Tanggal Input Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('lokasi',"Lokasi Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('kode_barang',"Kode Barang Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('nama_barang',"Nama Barang Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('id_satuan_barang',"Satuan Barang Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('jumlah_barang',"Jumlah Barang Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('data_kurir',"Nama Kurir Harus Diisi", 'trim|required');

		if ($this->form_validation->run() === TRUE)
		{
			$data = array(
				'id_transaksi' => $this->input->post('id_transaksi'), 
				'tanggal_input' => $this->input->post('tanggal_input'),
				'lokasi' => $this->input->post('lokasi'),
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_satuan_barang' => $this->input->post('id_satuan_barang'),
				'jumlah_barang' => $this->input->post('jumlah_barang'),
				'data_kurir' => $this->input->post('data_kurir'),
			);
			
			$update = $this->inputbarang_model->update($data,array("input_barang.id"=>$id));

			if ($update)
			{ 
				$this->session->set_flashdata('message', "Data Barang Berhasil Diubah");
				redirect("tabelbarangkeluar","refresh");
			} 
			else {
				$this->session->set_flashdata('message_error', "Data Barang Gagal Diubah");
				redirect("tabelbarangkeluar","refresh");
			}
		} 
		else
		{
			if(!empty($_POST))
			{ 
				$id = $this->input->post('id'); 
				$this->session->set_flashdata('message_error',validation_errors());
				return redirect("tabelbarangkeluar/stuffout/".$id);	
			} 
			else {
				$this->data['id']= $this->uri->segment(3);
				$inputbarang = $this->inputbarang_model->getAllById(array("input_barang.id"=>$this->data['id']));
				
				$this->data['id_transaksi'] =   (!empty($inputbarang))?$inputbarang[0]->id_transaksi:"";
				$this->data['tanggal_input'] =   (!empty($inputbarang))?$inputbarang[0]->tanggal_input:""; 
				$this->data['lokasi'] =   (!empty($inputbarang))?$inputbarang[0]->lokasi:""; 
				$this->data['kode_barang'] =   (!empty($inputbarang))?$inputbarang[0]->kode_barang:""; 
				$this->data['nama_barang'] =   (!empty($inputbarang))?$inputbarang[0]->nama_barang:""; 
				$this->data['id_satuan_barang'] =   (!empty($inputbarang))?$inputbarang[0]->id_satuan_barang:""; 
				$this->data['jumlah_barang'] =   (!empty($inputbarang))?$inputbarang[0]->jumlah_barang:""; 
				$this->data['data_kurir'] =   (!empty($inputbarang))?$inputbarang[0]->data_kurir:""; 
				
				$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
				$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();

				$this->data['content'] = 'admin/tabelbarangkeluar/stuffout'; 
				$this->load->view('admin/layouts/page',$this->data); 
			}  
		}    
	}

	public function destroy()
	{
		$response_data = array();
        $response_data['status'] = false;
        $response_data['msg'] = "";
        $response_data['data'] = array();   

		$id =$this->uri->segment(3);
		$is_deleted = $this->uri->segment(4);

 		if(!empty($id))
		{
 			$this->load->model("inputbarang_model");
			$data = array(
				'is_deleted' => ($is_deleted == 1)?0:1
			); 
			$update = $this->inputbarang_model->update($data,array("id"=>$id));

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
 			$this->load->model("inputbarang_model");
			$data = array(
				'is_deleted' => ($is_deleted == 1)?0:1
			); 
			$update = $this->inputbarang_model->delete(array("id"=>$id));

        	$response_data['data'] = $data; 
         	$response_data['status'] = true;
 		}
		else {
 		 	$response_data['msg'] = "ID Harus Diisi";
 		}
		
        echo json_encode($response_data); 
	}
}
