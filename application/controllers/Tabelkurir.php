<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'core/Admin_Controller.php';

class Tabelkurir extends Admin_Controller {
 	public function __construct()
	{
		parent::__construct(); 
	 	$this->load->model('tabelkurir_model');
	}

	public function index()
	{
		$this->load->helper('url');

		if($this->data['is_can_read']){
			$this->data['content'] = 'admin/tabelkurir/list_v'; 	
		}
		else {
			$this->data['content'] = 'errors/html/restrict'; 
		}
		
		$this->load->view('admin/layouts/page',$this->data);  
	}

	public function create()
	{  
		$this->form_validation->set_rules('nama_kurir',"Nama Kurir Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('alamat_kurir',"Alamat Kurir Harus Diisi", 'trim|required'); 
		$this->form_validation->set_rules('jekel_kurir',"Jenis Kelamin Kurir Harus Diisi", 'trim|required'); 
		$this->form_validation->set_rules('usia_kurir',"Usia Kurir Harus Diisi", 'trim|required'); 
		$this->form_validation->set_rules('jeken_kurir',"Jenis Kendaraan Kurir Harus Diisi", 'trim|required'); 
		$this->form_validation->set_rules('hobi_kurir',"Hobi Kurir Harus Diisi", 'trim|required'); 
		 
		if ($this->form_validation->run() === TRUE)
		{ 
			$data = array(
				'nama_kurir' => $this->input->post('nama_kurir'), 
				'alamat_kurir' => $this->input->post('alamat_kurir'),
				'jekel_kurir' => $this->input->post('jekel_kurir'),
				'usia_kurir' => $this->input->post('usia_kurir'),
				'jeken_kurir' => $this->input->post('jeken_kurir'),
				'hobi_kurir' => $this->input->post('hobi_kurir'),
				// 'barang' => $this->input->post('barang')
			); 
			if ($this->tabelkurir_model->insert($data))
			{ 
				$this->session->set_flashdata('message', "Data Kurir Berhasil Disimpan");
				redirect("tabelkurir");
			}
			else {
				$this->session->set_flashdata('message_error',"Data Kurir Gagal Disimpan");
				redirect("tabelkurir");
			}
		}
		else {    
			$this->data['content'] = 'admin/tabelkurir/create_v'; 
			$this->load->view('admin/layouts/page',$this->data); 
		}
	} 

	public function edit($id)
	{  
		$this->form_validation->set_rules('nama_kurir',"Nama Kurir Harus Diisi", 'trim|required');
		$this->form_validation->set_rules('alamat_kurir',"Alamat Kurir Harus Diisi", 'trim|required'); 
		$this->form_validation->set_rules('jekel_kurir',"Jenis Kelamin Kurir Harus Diisi", 'trim|required'); 
		$this->form_validation->set_rules('usia_kurir',"Usia Kurir Harus Diisi", 'trim|required'); 
		$this->form_validation->set_rules('jeken_kurir',"Jenis Kendaraan Kurir Harus Diisi", 'trim|required'); 
		$this->form_validation->set_rules('hobi_kurir',"Hobi Kurir Harus Diisi", 'trim|required');

		if ($this->form_validation->run() === TRUE)
		{
			$data = array(
				'nama_kurir' => $this->input->post('nama_kurir'), 
				'alamat_kurir' => $this->input->post('alamat_kurir'),
				'jekel_kurir' => $this->input->post('jekel_kurir'),
				'usia_kurir' => $this->input->post('usia_kurir'),
				'jeken_kurir' => $this->input->post('jeken_kurir'),
				'hobi_kurir' => $this->input->post('hobi_kurir'),
				// 'barang' => $this->input->post('barang')
			);
			$update = $this->tabelkurir_model->update($data,array("tabelkurir.id"=>$id));
			if ($update)
			{ 
				$this->session->set_flashdata('message', "Data Kurir Berhasil Diubah");
				redirect("tabelkurir","refresh");
			}
			else {
				$this->session->set_flashdata('message_error', "Data Kurir Gagal Diubah");
				redirect("tabelkurir","refresh");
			}
		} 
		else
		{
			if(!empty($_POST))
			{ 
				$id = $this->input->post('id'); 
				$this->session->set_flashdata('message_error',validation_errors());
				return redirect("tabelkurir/edit/".$id);	
			}
			else {
				$this->data['id']= $this->uri->segment(3);
				$tabelkurir = $this->tabelkurir_model->getAllById(array("tabelkurir.id"=>$this->data['id']));  
				$this->data['nama_kurir'] =   (!empty($tabelkurir))?$tabelkurir[0]->nama_kurir:"";
				$this->data['alamat_kurir'] =   (!empty($tabelkurir))?$tabelkurir[0]->alamat_kurir:"";
				$this->data['jekel_kurir'] =   (!empty($tabelkurir))?$tabelkurir[0]->jekel_kurir:""; 
				$this->data['usia_kurir'] =   (!empty($tabelkurir))?$tabelkurir[0]->usia_kurir:""; 
				$this->data['jeken_kurir'] =   (!empty($tabelkurir))?$tabelkurir[0]->jeken_kurir:""; 
				$this->data['hobi_kurir'] =   (!empty($tabelkurir))?$tabelkurir[0]->hobi_kurir:""; 
				// $this->data['barang'] =   (!empty($kurir))?$kurir[0]->barang:""; 
				
				$this->data['content'] = 'admin/tabelkurir/edit_v'; 
				$this->load->view('admin/layouts/page',$this->data); 
			}  
		}    
		
	} 

	public function dataList()
	{
		 $columns = array( 
            0 =>'id',  
            1 =>'nama_kurir', 
            2=> 'alamat_kurir',
			3=> 'jekel_kurir',
			4=> 'usia_kurir',
			5=> 'jeken_kurir',
			6=> 'hobi_kurir',
			// 7=> 'barang',
			8=> ''
        );

        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  		$search = array();
  		$limit = 0;
  		$start = 0;
        $totalData = $this->tabelkurir_model->getCountAllBy($limit,$start,$search,$order,$dir); 
        

        if(!empty($this->input->post('search')['value']))
		{
        	$search_value = $this->input->post('search')['value'];
           	$search = array(
           		"tabelkurir.nama_kurir"=>$search_value,
				"tabelkurir.alamat_kurir"=>$search_value,
				"tabelkurir.jekel_kurir"=>$search_value,
				"tabelkurir.usia_kurir"=>$search_value,
				"tabelkurir.jeken_kurir"=>$search_value,
				"tabelkurir.hobi_kurir"=>$search_value,
				// "kurir.barang"=>$search_value
           	); 
           	$totalFiltered = $this->tabelkurir_model->getCountAllBy($limit,$start,$search,$order,$dir); 
        }
		else {
        	$totalFiltered = $totalData;
        } 
       
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
     	$datas = $this->tabelkurir_model->getAllBy($limit,$start,$search,$order,$dir);
     	
        $new_data = array();
        if(!empty($datas))
        {
            foreach ($datas as $key=>$data)
            {  
            	$edit_url = "";
     			$delete_url = "";
     			$delete_url_hard = "";
     		
            	if($this->data['is_can_edit'] && $data->is_deleted == 0)
				{
            		$edit_url = "<a href='".base_url()."tabelkurir/edit/".$data->id."' class='btn btn-sm btn-info white'><i class='fa fa-pencil'></i> Ubah</a>";
            	}  

            	if($this->data['is_can_delete'])
				{
	            	if($data->is_deleted == 0)
					{
	        			$delete_url = "<a href='#' 
	        				url='".base_url()."tabelkurir/destroy/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-danger white delete' >Non Aktifkan
	        				</a>";
	        		}
					else {
	        			$delete_url = "<a href='#' 
	        				url='".base_url()."tabelkurir/destroy/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-primary white delete' 
	        				 >Aktifkan
	        				</a>";
	        			$delete_url_hard = "<a href='#' 
	        				url='".base_url()."tabelkurir/destroy_hard/".$data->id."/".$data->is_deleted."'
	        				class='btn btn-sm btn-danger white delete' 
	        				 >Delete
	        				</a>";
	        		} 
        		}
            	
                $nestedData['id'] = $start+$key+1; 
                $nestedData['nama_kurir'] = $data->nama_kurir; 
				$nestedData['alamat_kurir'] = substr(strip_tags($data->alamat_kurir),0,25); 
				$nestedData['jekel_kurir'] = $data->jekel_kurir;
				$nestedData['usia_kurir'] = $data->usia_kurir;
				$nestedData['jeken_kurir'] = $data->jeken_kurir;
				$nestedData['hobi_kurir'] = $data->hobi_kurir;
				// $nestedData['barang'] = $data->barang;  
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

 		if(!empty($id))
		{
 			$this->load->model("tabelkurir_model");
			$data = array(
				'is_deleted' => ($is_deleted == 1)?0:1
			); 
			$update = $this->tabelkurir_model->update($data,array("id"=>$id));

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
 			$this->load->model("tabelkurir_model");
			$data = array(
				'is_deleted' => ($is_deleted == 1)?0:1
			); 
			$update = $this->tabelkurir_model->delete(array("id"=>$id));

        	$response_data['data'] = $data; 
         	$response_data['status'] = true;
 		}
		else {
 		 	$response_data['msg'] = "ID Harus Diisi";
 		}
		
        echo json_encode($response_data); 
	}
}
