<?php 

class Mlaporan extends CI_model
{


   public function all_penugasan($where)
  {
  	$this->db->select('data_penugasan.*, sum(dana_pengadaan.nilai_kontrak) as jumlah_dana_pengadaan, sum(dana_persekot.jumlah) as jumlah_dana_persekot');
  	$this->db->from('data_penugasan');
  	$this->db->join('dana_pengadaan','data_penugasan.id_datapenugasan = dana_pengadaan.id_datapenugasan','left');
  	$this->db->join('dana_persekot','data_penugasan.id_datapenugasan = dana_persekot.id_datapenugasan','left');
  	$this->db->group_by('data_penugasan.id_datapenugasan');
  	$this->db->where($where);
  	return $this->db->get()->result();
  }

  public function all()
  {
    $this->db->select('*');
    $this->db->from('data_penugasan');
    return $this->db->get()->result();
  } 
}