<?php
class Apps extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('mobile_model','mobile');
    }

    public function index(){
        $data['halaman']='apps';

        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $startDate = date_format($dateNow,'Y-m-d');

        $data['start']=$startDate;
        $data['tests']=$this->mobile->get($startDate);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar');
        $this->load->view('apps');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }

    public function laporan(){
        if(null==($this->input->post('dFrom'))){
            redirect('/Apps/index');
        }
        else{
            $data['halaman']='apps';

            $dateNow = new DateTime($this->input->post('dFrom'));
            $startDate = date_format($dateNow,'Y-m-d');

            $data['start']=$startDate;
            $data['tests']=$this->mobile->get($startDate);

            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('apps');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/footer');
        }
    }

}