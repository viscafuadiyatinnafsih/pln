<?php 
class Mdanapersekot extends CI_Model{
	public $table = "dana_persekot";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($uraian_kegiatan,$keterangan,$jumlah){
		$this->a = $uraian_kegiatan;
		$this->b = $tanggal_persekot;
		$this->c = $keterangan;
		$this->d = $jumlah;
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
	
	public function add($id_danapersekot){
		$arrayData = array(
			'uraian_kegiatan'=>$this->a,
			'tanggal_persekot' => $this->b,
			'keterangan'=>$this->c,
			'jumlah'=>$this->d,
		);
		return $this->db->insert($this->table, $arrayData); 
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data); 
	}
	
	public function get_sum($id_datapenugasan)
	{
		$this->db->select_sum('jumlah');
		$this->db->where('id_datapenugasan',$id_datapenugasan);
		$this->db->from('dana_persekot');
		return $this->db->get('')->row();
	}
	

	public function edit($data){
		$arrayData = array(
			'uraian_kegiatan'=>$data['uraian_kegiatan'],
			'tanggal_persekot'=>$data['tanggal_persekot'],
			'keterangan'=>$data['keterangan'],
			'jumlah'=>$data['jumlah'],
		);
		$this->db->where('id_danapersekot', $data['id_danapersekot']);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_penugasan($id_datapenugasan)
	{
		$this->db->select('*');
	    $this->db->from('dana_persekot');
	    $this->db->order_by('id_danapersekot',"DESC");
		$this->db->where('id_datapenugasan',$id_datapenugasan);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function delete($id_danapersekot){
		return $this->db->delete($this->table, array('id_danapersekot'=>$id_danapersekot));
	}
	
	function detail($id_danapersekot){
		$this->db->join('data_penugasan','data_penugasan.id_datapenugasan = dana_persekot.id_datapenugasan');
		$condition = array("dana_persekot.id_danapersekot"=>$id_danapersekot);
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