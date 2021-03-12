<?php
class Handphone_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function get($id){
        $hp=$this->load->database('otherdb2',TRUE);
        $hp->select('*');
        $hp->from('handphone');
        $hp->where('id',$id);
        $query=$hp->get();
        return $query->result();
    }
}