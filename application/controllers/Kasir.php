<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models','m');
	}
	public function index()
	{
		$this->load->view('kasir/index');
	}
	public function produk()
	{
		
		$select = $this->db->select('*');

		$data['read_produk'] = $this->m->Get_All('produk',$select);
		$data['owner'] = $this->m->Get_All('owner',$select);

		$this->load->view('Kasir/produk',$data);
	}
	function create()
	{
		$data=array(
			'nama'			=>	$this->input->post('nama'),
			'kuantitas'		=>	$this->input->post('kuantitas'),
			'harga_jual'	=>	$this->input->post('harga_jual'),
			'harga_beli'	=> 	$this->input->post('harga_beli'),
			'id_owner'		=> 	$this->input->post('id_owner')
		);
		
		$this->m->Save($data, 'produk');
		
		redirect('Kasir/produk');
	}
}
