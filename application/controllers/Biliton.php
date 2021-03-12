<?php
class Biliton extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->library('session');
                $this->load->helper('form');
                $this->load->model('Medinfras_model','medinfras');
        }

        public function index()
        {
                $data['halaman']='biliton';

                $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
                $endDate = date_format($dateNow,'Y-m-d');
                $dateWeek = $dateNow->modify('-6 day');
                $startDate = date_format($dateWeek,'Y-m-d');

                $data['start']=$startDate;
                $data['end']=$endDate;
                $data['tests']=$this->medinfras->getJumlahBiliton($startDate,$endDate);
                $data['pcr']=0;
                $data['multiplex']=0;
                $data['saliva']=0;
                $data['antigen']=0;
                $data['antibodi']=0;
                foreach($data['tests'] as $test){
                        $data['pcr']+=$test->pcr;
                        $data['multiplex']+=$test->multiplex;
                        $data['saliva']+=$test->saliva;
                        $data['antigen']+=$test->antigen;
                        $data['antibodi']+=$test->antibodi;
                }

                $this->load->view('templates/header',$data);
                $this->load->view('templates/navbar');
                $this->load->view('biliton');
                $this->load->view('templates/sidebar');
                $this->load->view('templates/footer');
        }

        public function laporan(){
                if(null==($this->input->post('dFrom'))){
                        redirect('/Biliton/index');
                }
                else{
                        $data['halaman']='laporan';

                        $startDate = new DateTime($this->input->post('dFrom'));
                        $startDate = $startDate->format('Y-m-d');
                        $endDate = new DateTime($this->input->post('dTo'));
                        $endDate = $endDate->format('Y-m-d');
                        
                        $data['start']=$startDate;
                        $data['end']=$endDate;
                        $data['tests']=$this->medinfras->getJumlahBiliton($startDate,$endDate);
                        $data['pcr']=0;
                        $data['multiplex']=0;
                        $data['saliva']=0;
                        $data['antigen']=0;
                        $data['antibodi']=0;
                        foreach($data['tests'] as $test){
                                $data['pcr']+=$test->pcr;
                                $data['multiplex']+=$test->multiplex;
                                $data['saliva']+=$test->saliva;
                                $data['antigen']+=$test->antigen;
                                $data['antibodi']+=$test->antibodi;
                        }

                        $this->load->view('templates/header',$data);
                        $this->load->view('templates/navbar');
                        $this->load->view('biliton');
                        $this->load->view('templates/sidebar');
                        $this->load->view('templates/footer');
                }
        }

}