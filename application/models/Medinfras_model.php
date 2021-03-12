<?php
class Medinfras_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function countItems($items){
        $this->db->select('distinct count(*)');
        $this->db->from('ItemMaster');
        $this->db->where_in('ItemID',$items);
        return $this->db->count_all_results();
    }

    public function getJumlah($startDate,$endDate){
        $query=$this->db->query("
        select a.TransactionDate,
        isnull(a.jumlah,0) as 'pcr',
        isnull(b.jumlah,0) as 'multiplex',
        isnull(c.jumlah,0) as 'saliva',
        isnull(d.jumlah,0) as 'antigen',
        isnull(e.jumlah,0) as 'antibodi'
        from
        (
        select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
        FROM PatientChargesDt d	
        inner join PatientChargesHd h on d.TransactionID=h.TransactionID
        inner join ItemMaster i on d.ItemID=i.ItemID
        WHERE d.isdeleted=0
        and h.gcTransactionStatus<>'x121^999'	
        and i.IsDeleted=0
        and h.TransactionDate between '".$startDate."' and '".$endDate."'
        and i.ItemID = 25883
        group by h.TransactionDate,i.ItemName1
        ) a
        left join (
        select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
        FROM PatientChargesDt d	
        inner join PatientChargesHd h on d.TransactionID=h.TransactionID
        inner join ItemMaster i on d.ItemID=i.ItemID
        WHERE d.isdeleted=0
        and h.gcTransactionStatus<>'x121^999'	
        and i.IsDeleted=0
        and h.TransactionDate between '".$startDate."' and '".$endDate."'
        and i.ItemID = 26909
        group by h.TransactionDate,i.ItemName1
        ) b on a.TransactionDate=b.TransactionDate
        left join (
        select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
        FROM PatientChargesDt d	
        inner join PatientChargesHd h on d.TransactionID=h.TransactionID
        inner join ItemMaster i on d.ItemID=i.ItemID
        WHERE d.isdeleted=0
        and h.gcTransactionStatus<>'x121^999'	
        and i.IsDeleted=0
        and h.TransactionDate between '".$startDate."' and '".$endDate."'
        and i.ItemID = 28257
        group by h.TransactionDate,i.ItemName1
        ) c on c.TransactionDate=a.TransactionDate
        left join (
        select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
        FROM PatientChargesDt d	
        inner join PatientChargesHd h on d.TransactionID=h.TransactionID
        inner join ItemMaster i on d.ItemID=i.ItemID
        WHERE d.isdeleted=0
        and h.gcTransactionStatus<>'x121^999'	
        and i.IsDeleted=0
        and h.TransactionDate between '".$startDate."' and '".$endDate."'
        and i.ItemID in (28159,28160)
        group by h.TransactionDate,i.ItemName1
        ) d on d.TransactionDate=a.TransactionDate
        left join (
            select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
            FROM PatientChargesDt d	
            inner join PatientChargesHd h on d.TransactionID=h.TransactionID
            inner join ItemMaster i on d.ItemID=i.ItemID
            WHERE d.isdeleted=0
            and h.gcTransactionStatus<>'x121^999'	
            and i.IsDeleted=0
            and h.TransactionDate between '".$startDate."' and '".$endDate."'
            and i.ItemID = 28426
            group by h.TransactionDate,i.ItemName1
        ) e on e.TransactionDate=a.TransactionDate
        ");
        // print_r($this->db->last_query());
        return $query->result();
    }
    
    public function getJumlahBiliton($startDate,$endDate){
        $query=$this->db->query("
        select a.TransactionDate,
        isnull(a.jumlah,0) as 'pcr',
        isnull(b.jumlah,0) as 'multiplex',
        isnull(c.jumlah,0) as 'saliva',
        isnull(d.jumlah,0) as 'antigen',
        isnull(e.jumlah,0) as 'antibodi'
        from
        (
            select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
            FROM vRegistration r
            inner join PatientChargesHd h on r.VisitID=h.VisitID
            inner join PatientChargesDt d on d.TransactionID=h.TransactionID
            inner join ItemMaster i on d.ItemID=i.ItemID
            WHERE d.isdeleted=0
            and r.GCRegistrationStatus<>'x020^006'
            and (r.VisitTypeCode='VT033' or r.VisitTypeCode='VT034')
            and h.gcTransactionStatus<>'x121^999'	
            and i.IsDeleted=0
            and h.TransactionDate between '".$startDate."' and '".$endDate."'
            and i.ItemID = 25883
            group by h.TransactionDate,i.ItemName1
        ) a
            left join (
            select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
            FROM vRegistration r
            inner join PatientChargesHd h on r.VisitID=h.VisitID
            inner join PatientChargesDt d on d.TransactionID=h.TransactionID
            inner join ItemMaster i on d.ItemID=i.ItemID
            WHERE d.isdeleted=0
            and r.GCRegistrationStatus<>'x020^006'
            and (r.VisitTypeCode='VT033' or r.VisitTypeCode='VT034')
            and h.gcTransactionStatus<>'x121^999'	
            and i.IsDeleted=0
            and h.TransactionDate between '".$startDate."' and '".$endDate."'
            and i.ItemID = 26909
            group by h.TransactionDate,i.ItemName1
        ) b on a.TransactionDate=b.TransactionDate
        left join (
            select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
            FROM vRegistration r
            inner join PatientChargesHd h on r.VisitID=h.VisitID
            inner join PatientChargesDt d on d.TransactionID=h.TransactionID
            inner join ItemMaster i on d.ItemID=i.ItemID
            WHERE d.isdeleted=0
            and r.GCRegistrationStatus<>'x020^006'
            and (r.VisitTypeCode='VT033' or r.VisitTypeCode='VT034')
            and h.gcTransactionStatus<>'x121^999'	
            and i.IsDeleted=0
            and h.TransactionDate between '".$startDate."' and '".$endDate."'
            and i.ItemID = 28257
            group by h.TransactionDate,i.ItemName1
            ) c on c.TransactionDate=a.TransactionDate
        left join (
            select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
            FROM vRegistration r
            inner join PatientChargesHd h on r.VisitID=h.VisitID
            inner join PatientChargesDt d on d.TransactionID=h.TransactionID
            inner join ItemMaster i on d.ItemID=i.ItemID
            WHERE d.isdeleted=0
            and r.GCRegistrationStatus<>'x020^006'
            and (r.VisitTypeCode='VT033' or r.VisitTypeCode='VT034')
            and h.gcTransactionStatus<>'x121^999'	
            and i.IsDeleted=0
            and h.TransactionDate between '".$startDate."' and '".$endDate."'
            and i.ItemID in (28159,28160)
            group by h.TransactionDate,i.ItemName1
        ) d on d.TransactionDate=a.TransactionDate
        left join (
            select h.TransactionDate,i.ItemName1,isnull(sum(d.ChargedQuantity),0) as 'jumlah'
            FROM vRegistration r
            inner join PatientChargesHd h on r.VisitID=h.VisitID
            inner join PatientChargesDt d on d.TransactionID=h.TransactionID
            inner join ItemMaster i on d.ItemID=i.ItemID
            WHERE d.isdeleted=0
            and r.GCRegistrationStatus<>'x020^006'
            and (r.VisitTypeCode='VT033' or r.VisitTypeCode='VT034')
            and h.gcTransactionStatus<>'x121^999'	
            and i.IsDeleted=0
            and h.TransactionDate between '".$startDate."' and '".$endDate."'
            and i.ItemID = 28426
            group by h.TransactionDate,i.ItemName1
        ) e on e.TransactionDate=a.TransactionDate
        ");
        // print_r($this->db->last_query());
        return $query->result();
    }
}