<?php
class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Appointment_model','data');
	}

	public function index()
	{	
		$data['halaman']='registration';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('registration');
		$this->load->view('templates/footer');
	}

	public function appointments()
	{	
		$data['halaman']='home';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

	public function listAppointments(){
		$columns = array(
				0=> 'appointment_time',
				1=> 'doctor_name',
				2=> 'cust_name',
				3=> 'cust_phone'
		);
		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];
		$temp=$this->input->post('filter');

		$totalData = $this->data->allposts_count();
		$totalFiltered = $totalData;

		if(empty($this->input->post('search')['value']))
		{
				$posts = $this->data->allposts($limit,$start,$order,$dir,$temp);
		}
		else {
				$search = $this->input->post('search')['value'];

				$posts =  $this->data->posts_search($limit,$start,$search,$order,$dir);

				$totalFiltered = $this->data->posts_search_count($search);
		}
		
		$data = array();
		if(!empty($posts))
		{
				foreach ($posts as $post)
				{
						$nestedData['appointment_time']=$post->appointment_time;
						$nestedData['doctor_name'] = $post->doctor_name;
						$nestedData['cust_name'] = $post->cust_name;
						$nestedData['cust_phone'] = $post->cust_phone;
						
						$data[] = $nestedData;
				}
		}
		$json_data = array(
				"draw"            => intval($this->input->post('draw')),
				"recordsTotal"    => intval($totalData),
				"recordsFiltered" => intval($totalFiltered),
				"data"            => $data,
				"token"           =>$this->security->get_csrf_hash()
		);

		echo json_encode($json_data);
	}

	public function getAllPoli(){
		$allpoli=$this->data->getAllPoli();
		
		echo json_encode($allpoli);
	}
}