<?php

class Doktor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function getAll()
    {
        $doktor=$this->load->database('db2',TRUE);
        $doktor->select('dr.nama,d.nama as "namaDepartemen",d.name as "departementName", dr.foto');
        $doktor->from('dokter dr');
        $doktor->join('departemen d','dr.idDepartemenMain=d.id','inner');
        $doktor->where('dr.isActive',1);
        $doktor->where('d.isDeleted',0);
        $doktor->order_by('d.nama,dr.nama', 'asc');
        $query=$doktor->get();
        return $query->result();
    }
}