<?php 
class Mdanapengadaan extends CI_Model{
	public $table = "dana_pengadaan";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($uraian,$vendor,$nomor_kontrak,$nilai_kontrak){
		$this->a = $uraian;
		$this->b = $vendor;
		$this->c = $tanggal_pengadaan;
		$this->d = $nomor_kontrak;
		$this->e = $nilai_kontrak;
	}

	public function cek_nilai_penugasan($id_datapenugasan){
		$this->db->select('nilai_penugasan');
		$this->db->from('data_penugasan');
		$this->db->where('id_datapenugasan', $id_datapenugasan);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_nilai_penugasan($id_datapenugasan)
	{
	  	$this->db->select('data_penugasan.*, sum(dana_pengadaan.nilai_kontrak) as jumlah_dana_pengadaan, sum(dana_persekot.jumlah) as jumlah_dana_persekot');
	  	$this->db->from('data_penugasan');
	  	$this->db->join('dana_pengadaan','data_penugasan.id_datapenugasan = dana_pengadaan.id_datapenugasan','left');
	  	$this->db->join('dana_persekot','data_penugasan.id_datapenugasan = dana_persekot.id_datapenugasan','left');
	  	$this->db->group_by('data_penugasan.id_datapenugasan');
	  	$this->db->where('data_penugasan.id_datapenugasan',$id_datapenugasan);
	  	return $this->db->get()->result_array();
	}
	
	public function add($id_danapengadaan){
		$arrayData = array(
			'uraian'=>$this->a,
			'vendor'=>$this->b,
			'tanggal_pengadaan'=>$this->c,
			'nomor_kontrak'=>$this->d,
			'nilai_kontrak'=>$this->e,
		);
		return $this->db->insert($this->table, $arrayData); 
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data); 
	}
	
	public function get_sum($id_datapenugasan)
	{
		$this->db->select_sum('nilai_kontrak');
		$this->db->where('id_datapenugasan',$id_datapenugasan);
		$this->db->from('dana_pengadaan');
		return $this->db->get('')->row();
	}
	
	public function edit($data){
		$arrayData = array(
			'uraian'=>$data['uraian'],
			'tanggal_pengadaan'=>$data['tanggal_pengadaan'],
			'vendor'=>$data['vendor'],
			'nomor_kontrak'=>$data['nomor_kontrak'],
			'nilai_kontrak'=>$data['nilai_kontrak']
		);
		$this->db->where('id_danapengadaan', $data['id_danapengadaan']);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_penugasan($id_datapenugasan)
	{
		$this->db->select('*');
	    $this->db->from('dana_pengadaan');
	    $this->db->order_by('id_danapengadaan',"DESC");
		$this->db->where('id_datapenugasan',$id_datapenugasan);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function delete($id_danapengadaan){
		return $this->db->delete($this->table, array('id_danapengadaan'=>$id_danapengadaan));
	}
	
	function detail($id_danapengadaan){
		$this->db->join('data_penugasan','data_penugasan.id_datapenugasan = dana_pengadaan.id_datapenugasan');
		$condition = array("dana_pengadaan.id_danapengadaan"=>$id_danapengadaan);
		$this->db->select('*,data_penugasan.nilai_penugasan as nilai_penugasan');
		$query = $this->db->get_where($this->table,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}	
	
	public function getTotal(){
		return $this->db->count_all_results($this->tnews);
	}

	public function detail_penugasan($id_datapenugasan)
	{
		$condition = array("id_datapenugasan"=>$id_datapenugasan);
		$query = $this->db->get_where($this->table,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}
	
}
?>