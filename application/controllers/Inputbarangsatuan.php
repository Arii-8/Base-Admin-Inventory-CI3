<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'core/Admin_Controller.php';

class Inputbarangsatuan extends Admin_Controller {
 	public function __construct()
	{
		parent::__construct(); 
	 	$this->load->model('inputbarangsatuan_model');
	}

	public function index()
	{
		$this->load->helper('url');

		if($this->data['is_can_read'])
		{
			$this->data['content'] = 'admin/inputbarangsatuan/list_v'; 	
		}
		else {
			$this->data['content'] = 'errors/html/restrict'; 
		}
		
		$this->load->view('admin/layouts/page',$this->data);  
	}

	public function create()
	{  
		$this->form_validation->set_rules('nama_satuan_barang',"Nama satuan barang Harus Diisi", 'trim|required');
		// $this->form_validation->set_rules('kode_satuan_barang',"Kode satuan barang Harus Diisi", 'trim|required');
		 
		// var_dump($this->form_validation->run() === TRUE); die;
		if ($this->form_validation->run() === TRUE)
		{ 
			$data = array(
				'nama_satuan_barang' => $this->input->post('nama_satuan_barang'), 
				'kode_satuan_barang' => $this->input->post('kode_satuan_barang'),
			); 

			if ($this->inputbarangsatuan_model->insert($data))
			{ 
				$this->session->set_flashdata('message', "inputbarangsatuan Baru Berhasil Disimpan");
				redirect("inputbarangsatuan");
			}
			else
			{
				$this->session->set_flashdata('message_error',"inputbarangsatuan Baru Gagal Disimpan");
				redirect("inputbarangsatuan");
			}
		}else{    
			$this->data['content'] = 'admin/inputbarangsatuan/create_v'; 
			$this->load->view('admin/layouts/page',$this->data); 
		}
	} 

	public function edit($id)
	{  
		$this->form_validation->set_rules('nama_satuan_barang', "Nama satuan barang Harus Diisi", 'trim|required');
		// $this->form_validation->set_rules('kode_satuan_barang', "Kode satuan barang Harus Diisi", 'trim|required');

		if ($this->form_validation->run() === TRUE)
		{
			$data = array(
				'nama_satuan_barang' => $this->input->post('nama_satuan_barang'), 
				'kode_satuan_barang' => $this->input->post('kode_satuan_barang'),
			);
			$update = $this->inputbarangsatuan_model->update($data,array("satuan_barang.id"=>$id));
			if ($update)
			{ 
				$this->session->set_flashdata('message', "inputbarangsatuan Berhasil Diubah");
				redirect("inputbarangsatuan","refresh");
			}else{
				$this->session->set_flashdata('message_error', "inputbarangsatuan Gagal Diubah");
				redirect("inputbarangsatuan","refresh");
			}
		} 
		else
		{
			if(!empty($_POST))
			{ 
				$id = $this->input->post('id'); 
				$this->session->set_flashdata('message_error',validation_errors());
				return redirect("inputbarangsatuan/edit/".$id);	
			}else{
				$this->data['id']= $this->uri->segment(3);
				$inputbarangsatuan = $this->inputbarangsatuan_model->getAllById(array("satuan_barang.id"=>$this->data['id']));  
				$this->data['nama_satuan_barang'] =   (!empty($inputbarangsatuan))?$inputbarangsatuan[0]->nama_satuan_barang:"";
				$this->data['kode_satuan_barang'] =   (!empty($inputbarangsatuan))?$inputbarangsatuan[0]->kode_satuan_barang:""; 
				
				$this->data['content'] = 'admin/inputbarangsatuan/edit_v'; 
				$this->load->view('admin/layouts/page',$this->data); 
			}  
		}    
	} 

	public function dataList()
	{
		 $columns = array( 
            0 => 'id',  
            1 => 'nama_satuan_barang', 
            2 => 'kode_satuan_barang',
			3 => '',
        );
		
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  		$search = array();
  		$limit = 0;
  		$start = 0;
        $totalData = $this->inputbarangsatuan_model->getCountAllBy($limit,$start,$search,$order,$dir); 
        
        if(!empty($this->input->post('search')['value']))
		{
        	$search_value = $this->input->post('search')['value'];
           	$search = array(
           		"inputbarangsatuan.nama_satuan_barang"=>$search_value,
           		"inputbarangsatuan.kode_satuan_barang"=>$search_value,
           	); 
           	$totalFiltered = $this->inputbarangsatuan_model->getCountAllBy($limit,$start,$search,$order,$dir); 
        }else{
        	$totalFiltered = $totalData;
        } 
       
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
     	$datas = $this->inputbarangsatuan_model->getAllBy($limit,$start,$search,$order,$dir);
     	
        $new_data = array();

        if(!empty($datas))
        {
            foreach ($datas as $key=>$data)
            {  
            	$edit_url = "";
     			$delete_url = "";
     			$delete_url_hard = "";
     		
            	if($this->data['is_can_edit'] && $data->is_deleted == 0){
            		$edit_url = "<a href='".base_url()."inputbarangsatuan/edit/".$data->id."' class='btn btn-sm btn-info white'><i class='fa fa-pencil'></i> Ubah</a>";
            	}  
            	if($this->data['is_can_delete']){
	            	if($data->is_deleted == 0){
	        			// $delete_url = "<a href='#' 
	        			// 	url='".base_url()."inputbarangsatuan/destroy/".$data->id."/".$data->is_deleted."'
	        			// 	class='btn btn-sm btn-danger white delete' >Non Aktifkan
	        			// 	</a>";
						$delete_url_hard = "<a href='#' 
	        				url='".base_url()."inputbarangsatuan/destroy_hard/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-danger white delete' 
	        				 >Delete
	        				</a>";
	        		}else{
	        			$delete_url = "<a href='#' 
	        				url='".base_url()."inputbarangsatuan/destroy/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-primary white delete' 
	        				 >Aktifkan
	        				</a>";
	        			$delete_url_hard = "<a href='#' 
	        				url='".base_url()."inputbarangsatuan/destroy_hard/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-danger white delete' 
	        				 >Delete
	        				</a>";
	        		} 
        		}
            	
                $nestedData['id'] = $start+$key+1; 
                $nestedData['nama_satuan_barang'] = $data->nama_satuan_barang; 
                $nestedData['kode_satuan_barang'] = substr(strip_tags($data->kode_satuan_barang),0,50); 
           		$nestedData['action'] = $edit_url." ".$delete_url." ".$delete_url_hard;   
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
 

	public function destroy()
	{
		$response_data = array();
        $response_data['status'] = false;
        $response_data['msg'] = "";
        $response_data['data'] = array();   

		$id =$this->uri->segment(3);
		$is_deleted = $this->uri->segment(4);
 		if(!empty($id)){
 			$this->load->model("inputbarangsatuan_model");
			$data = array(
				'is_deleted' => ($is_deleted == 1)?0:1
			); 
			$update = $this->inputbarangsatuan_model->update($data,array("id"=>$id));

        	$response_data['data'] = $data; 
         	$response_data['status'] = true;
 		}else{
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
 		if(!empty($id)){
 			$this->load->model("inputbarangsatuan_model");
			$data = array(
				'is_deleted' => ($is_deleted == 1)?0:1
			); 
			$update = $this->inputbarangsatuan_model->delete(array("id"=>$id));

        	$response_data['data'] = $data; 
         	$response_data['status'] = true;
 		}else{
 		 	$response_data['msg'] = "ID Harus Diisi";
 		}
		
        echo json_encode($response_data); 
	}
}
