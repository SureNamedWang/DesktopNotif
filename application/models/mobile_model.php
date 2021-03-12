<?php
class mobile_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function get($tgl){
        $mobile=$this->load->database('enigma',TRUE);

        $query=$mobile->query("
        SELECT 'Tunggu Pembayaran' AS STATUS
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Tunggu Pembayaran'
        AND a.`status`='Daftar'
        AND a.tests='2,'
        )AS 'PCR'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Tunggu Pembayaran'
        AND a.`status`='Daftar'
        AND a.tests='4,'
        )AS 'Saliva'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Tunggu Pembayaran'
        AND a.`status`='Daftar'
        AND a.tests='6,'
        )AS 'Antigen'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Tunggu Pembayaran'
        AND a.`status`='Daftar'
        AND a.tests='7,'
        )AS 'Antigen2'

        UNION

        SELECT 'Lunas Belum Registrasi' AS STATUS
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Lunas'
        AND a.`status`='Sudah Bayar'
        AND a.tests='2,'
        )AS 'PCR'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Lunas'
        AND a.`status`='Sudah Bayar'
        AND a.tests='4,'
        )AS 'Saliva'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Lunas'
        AND a.`status`='Sudah Bayar'
        AND a.tests='6,'
        )AS 'Antigen'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Lunas'
        AND a.`status`='Sudah Bayar'
        AND a.tests='7,'
        )AS 'Antigen2'

        UNION

        SELECT 'Lunas Sudah Registrasi' AS STATUS
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Lunas'
        AND a.`status`='Sudah Registrasi'
        AND a.tests='2,'
        )AS 'PCR'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Lunas'
        AND a.`status`='Sudah Registrasi'
        AND a.tests='4,'
        )AS 'Saliva'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Lunas'
        AND a.`status`='Sudah Registrasi'
        AND a.tests='6,'
        )AS 'Antigen'
        ,(
        select COUNT(a.id)AS 'tot'
        FROM lab_appointment a
        WHERE DATE(a.date)='".$tgl."'
        AND a.status_bayar='Lunas'
        AND a.`status`='Sudah Registrasi'
        AND a.tests='7,'
        )AS 'Antigen2'
       
        ");

        return $query->result();
    }
}