<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'core/Admin_Controller.php';

class Inputbarang extends Admin_Controller {
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
			// join table
			$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
			$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();

			$this->data['content'] = 'admin/inputbarang/create_v'; 	
		}
		else {
			$this->data['content'] = 'errors/html/restrict'; 
		}
		
		$this->load->view('admin/layouts/page',$this->data);  
	}

	public function create()
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
				'created_by' => $this->data['users']->id,
				'updated_by' => $this->data['users']->id
			); 

			if ($this->inputbarang_model->insert($data))
			{ 
				$this->session->set_flashdata('message', "Input Barang Berhasil Disimpan");
				redirect("tabelbarangmasuk");
			}
			else {
				$this->session->set_flashdata('message_error',"Input Barang Gagal Disimpan");
				redirect("tabelbarangmasuk");
			}
		} 
		else {
			// join table
			$this->data['satuan_barang'] = $this->inputbarangsatuan_model->getAllById();
			$this->data['data_kurir'] = $this->tabelkurir_model->getAllById();
			
			$this->data['content'] = 'admin/inputbarang/create_v'; 
			$this->load->view('admin/layouts/page',$this->data); 
		}
	} 
}
