<?php
class Detail extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
        $data['halaman']='detail';
        $data['product']=$_GET['id'];
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('detail');
		$this->load->view('templates/footer');
	}
}