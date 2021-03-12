<?php
class Vaksin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Downloads_model','downloads');
        $this->load->model('Handphone_model','hp');
        $this->handphone=$this->hp->get(1);
        $this->token=$this->handphone[0]->token;
        $this->phone=$this->handphone[0]->nomor;
    }

    public function index(){
        $data['halaman']='vaksin';
        $vacs=$this->downloads->getVaksin();
        $vaccines=[];
        foreach($vacs as $vac){
            $vaccines[$vac->vaksinID]=$vac->jumlah;
        }
        $data['vaksin']=$vaccines;
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar');
        $this->load->view('vaksin');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }

    function getJumlahWeb(){
        $link = "http://vaksin.national-hospital.com/detail/tariksis";
		
        $dataKu = file_get_contents($link);
		echo $dataKu;
		$dataNya=json_decode($dataKu);
		// echo "<br>";
		// // echo json_last_error();
		$message="Data Poling Vaksin\n\n";
        foreach($dataNya as $datan){
            $this->downloads->insertTotal($datan->vaksin,$datan->total);
            $message.=$datan->nama." : ".$datan->total."\n";
		}
        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $endDate = intval(date_format($dateNow,'H'));
        if($endDate==7||$endDate==17){
        
            $nomor="6287857850111,6285156924541,6281252999309";
            //Pesan saja
            //Set URL
            $url = "https://panel.leadwalker.com/api/send";

            //Set Data
            $phone=$this->phone;
            $token=$this->token;
            $recipient = $nomor; //change this
            // $recipient = "6287857850111";
            $data = json_encode(array("phone" => $phone, "token" => $token, "recipient" => $recipient, "message" => $message));

            //Call API
            $ch = curl_init($url);
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch);
            curl_close($ch);

            //API will return OK if all is good
            if ($result == "OK") {echo $nomor.":PESAN TERKIRIM PROGRAM PAMIT\n";}
        }
        sleep(5);
    }

    function getJumlahWebSMS(){
        $link = "http://vaksin.national-hospital.com/detail/tariksis";
		
        $dataKu = file_get_contents($link);
		echo $dataKu;
		$dataNya=json_decode($dataKu);
		// echo "<br>";
		// // echo json_last_error();
		$message="Data Poling Vaksin\n\n";
        foreach($dataNya as $datan){
            if($datan->nama=="Sinopharm"||$datan->nama=="Moderna")
            {
                $message.=$datan->nama." : ".$datan->total."\n";
            }
		}
        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $endDate = intval(date_format($dateNow,'H'));
        $nomor="6287857850111";
        
            $nomor="6287857850111";
            //Pesan saja
            //Set URL
            $url = "https://sms.smartme.co.id:43452/smsjson?";

            //Set Data
            $username = "admin_nathos";
            $password = "8Gh6XnkZ";
            $sender = "NATHOS";
            $msisdn = $nomor;
            $url.="username=".$username.
            "&password=".$password.
            "&sender=".$sender.
            "&msisdn=".$msisdn.
            "&message=".urlencode($message);

            //Call API
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYPEER => false,)
            );
            $result = curl_exec($ch);
            curl_close($ch);

            //API will return OK if all is good
            if ($result) {
                echo "\n\n".$result;
            }
            else{
                echo "\n$url\nGa Balik Gan";
            }
    }

}