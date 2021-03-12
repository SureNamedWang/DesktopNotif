<?php
class Downloads_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function get($start,$end){
        $downloads=$this->load->database('downloads',TRUE);
        $query=$downloads->query("
        select *
        from platform
        where tanggal between '".$start."' and '".$end."'
        order by tanggal");
        return $query->result();
    }

    public function getAll(){
        $downloads=$this->load->database('downloads',TRUE);
        $query=$downloads->query("
        select *
        from platform
        order by tanggal");
        return $query->result();
    }

    public function getVaksin(){
        $downloads=$this->load->database('downloads',TRUE);
        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $dateNow = $dateNow->format('Y-m-d');
        $query=$downloads->query("
        SELECT f.*
        FROM report.`fetch` f
        WHERE DATE(f.created)='".$dateNow."'
        ORDER BY f.created DESC
        LIMIT 5");
        return $query->result();
    }

    function insertTotal($id,$jumlah)
    {
        $dateNow = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
        $dateTimeSekarang=date_format($dateNow,'Y-m-d H:i:s');
        
        $downloads=$this->load->database('downloads',TRUE);
        $downloads->set('vaksinID',$id);
        $downloads->set('jumlah',$jumlah);
        $downloads->set('created',$dateTimeSekarang);
        $downloads->insert("report.`fetch`");
    }
}