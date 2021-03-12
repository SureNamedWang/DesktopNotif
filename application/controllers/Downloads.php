<?php
class Downloads extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Downloads_model','downloads');
    }

    public function index(){
        $data['halaman']='downloads';

        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $dateNow = $dateNow->modify('-2 day');
        $endDate = date_format($dateNow,'Y-m-d');
        $dateWeek = $dateNow->modify('-6 day');
        $startDate = date_format($dateWeek,'Y-m-d');

        $data['start']=$startDate;
        $data['end']=$endDate;
        $data['tests']=$this->downloads->get($startDate,$endDate);
        $data['ios']=0;
        $data['android']=0;
        foreach($data['tests'] as $test){
            $data['ios']+=$test->ios;
            $data['android']+=$test->android;
        }

        $data['totals']=$this->downloads->getAll();
        $data['totalIos']=0;
        $data['totalAndroid']=0;
        foreach($data['totals'] as $tot){
            $data['totalIos']+=$tot->ios;
            $data['totalAndroid']+=$tot->android;
        }

        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar');
        $this->load->view('downloads');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }

    public function laporan(){
        if(null==($this->input->post('dFrom'))){
            redirect('/Downloads/index');
        }
        else{
            $data['halaman']='downloads';

            $startDate = new DateTime($this->input->post('dFrom'));
            $startDate = $startDate->format('Y-m-d');
            $endDate = new DateTime($this->input->post('dTo'));
            $endDate = $endDate->format('Y-m-d');
            
            $data['start']=$startDate;
            $data['end']=$endDate;
            $data['tests']=$this->downloads->get($startDate,$endDate);
            $data['ios']=0;
            $data['android']=0;
            foreach($data['tests'] as $test){
                $data['ios']+=$test->ios;
                $data['android']+=$test->android;
            }

            $data['totals']=$this->downloads->getAll();
            $data['totalIos']=0;
            $data['totalAndroid']=0;
            foreach($data['totals'] as $tot){
                $data['totalIos']+=$tot->ios;
                $data['totalAndroid']+=$tot->android;
            }

            $this->load->view('templates/header',$data);
            $this->load->view('templates/navbar');
            $this->load->view('downloads');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/footer');
        }
    }

}