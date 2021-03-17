<?php

class Appointment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function allposts_count()
    {
        $this->db->select("dr.doctor_name,a.cust_name,a.cust_phone,a.appointment_time");
        $this->db->from("rspi_appoinment a");
        $this->db->join("rspi_roster r","a.roster_id=r.id","inner");
        $this->db->join("rspi_doctor_data dr","r.doctor_id=dr.doctor_id","inner");
        $this->db->where("a.practice_date=CURDATE()");
        $this->db->where("a.is_booking_status=2");
        // $this->db->where("dr.poliklinik!=5");
        // $this->db->where("TIMEDIFF(CURRENT_TIMESTAMP,a.appointment_time)<='01:25:00' AND TIMEDIFF(CURRENT_TIMESTAMP,a.appointment_time)>'00:05;00'");
        
        return $this->db->count_all_results();
    }

    function allposts($limit,$start,$col,$dir,$temp='')
    {
        $this->db->select("dr.doctor_name,a.cust_name,a.cust_phone,a.appointment_time");
        $this->db->from("rspi_appoinment a");
        $this->db->join("rspi_roster r","a.roster_id=r.id","inner");
        $this->db->join("rspi_doctor_data dr","r.doctor_id=dr.doctor_id","inner");
        $this->db->where("a.practice_date=CURDATE()");
        $this->db->where("a.is_booking_status=2");
        // $this->db->where("dr.poliklinik!=5");
        // $this->db->where("TIMEDIFF(CURRENT_TIMESTAMP,a.appointment_time)<='01:25:00' AND TIMEDIFF(CURRENT_TIMESTAMP,a.appointment_time)>'00:05;00'");

        $this->db->limit($limit,$start);
        $this->db->order_by($col,$dir);
        $query =  $this->db->get();
        if($this->db->count_all_results()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }
    }

    function posts_search($limit,$start,$search,$col,$dir)
    {
        $this->db->select("dr.doctor_name,a.cust_name,a.cust_phone,a.appointment_time");
        $this->db->from("rspi_appoinment a");
        $this->db->join("rspi_roster r","a.roster_id=r.id","inner");
        $this->db->join("rspi_doctor_data dr","r.doctor_id=dr.doctor_id","inner");
        $this->db->where("a.practice_date=CURDATE()");
        $this->db->where("a.is_booking_status=2");
        // $this->db->where("dr.poliklinik!=5");
        // $this->db->where("TIMEDIFF(CURRENT_TIMESTAMP,a.appointment_time)<='01:25:00' AND TIMEDIFF(CURRENT_TIMESTAMP,a.appointment_time)>'00:05;00'");

        $this->db->where("(dr.doctor_name like '%".$search."%' or a.cust_name like '%".$search."%' or a.cust_phone like '%".$search."%' or a.appointment_time like '%".$search."%')");

        $this->db->limit($limit,$start);
        $this->db->order_by($col,$dir);
        $query =  $this->db->get();

        if( $this->db->count_all_results()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }

    }

    function posts_search_count($search)
    {
        $this->db->select("dr.doctor_name,a.cust_name,a.cust_phone,a.appointment_time");
        $this->db->from("rspi_appoinment a");
        $this->db->join("rspi_roster r","a.roster_id=r.id","inner");
        $this->db->join("rspi_doctor_data dr","r.doctor_id=dr.doctor_id","inner");
        $this->db->where("a.practice_date=CURDATE()");
        $this->db->where("a.is_booking_status=2");
        // $this->db->where("dr.poliklinik!=5");
        // $this->db->where("TIMEDIFF(CURRENT_TIMESTAMP,a.appointment_time)<='01:25:00' AND TIMEDIFF(CURRENT_TIMESTAMP,a.appointment_time)>'00:05;00'");

        $this->db->where("(dr.doctor_name like '%".$search."%' or a.cust_name like '%".$search."%' or a.cust_phone like '%".$search."%' or a.appointment_time like '%".$search."%')");
        
        return $this->db->count_all_results();
    }

    function getAllPoli(){
        $this->db->select("dr.doctor_name,a.cust_name,a.cust_phone,a.appointment_time");
        $this->db->from("rspi_appoinment a");
        $this->db->join("rspi_roster r","a.roster_id=r.id","inner");
        $this->db->join("rspi_doctor_data dr","r.doctor_id=dr.doctor_id","inner");
        $this->db->where("a.practice_date=CURDATE()");
        $this->db->where("a.is_booking_status=2");
        // $this->db->where("dr.poliklinik!=5");
        $this->db->where("TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP,a.appointment_time)<=10");
        $this->db->where("TIMESTAMPDIFF(MINUTE,CURRENT_TIMESTAMP,a.appointment_time)>=-10");
        $this->db->order_by("a.appointment_time");
        // $this->db->limit(1);

        $query=$this->db->get();
        if( $this->db->count_all_results()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }
    }

}