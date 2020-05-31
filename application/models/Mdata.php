<?php 
class Mdata extends CI_Model{
	public $table = "data_penugasan";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nama_penugasan,$nilai_penugasan,$nilai_pengadaan,$nilai_persekot,$no_WBS,$deadline){
		$this->a = $nama_penugasan;
		$this->b = $nilai_penugasan;
		$this->c = $nilai_pengadaan;
		$this->d = $nilai_persekot;
		$this->e = $no_WBS;
		$this->f = $deadline;
	}
	
	public function add(){
		$arrayData = array(
			'nama_penugasan'=>$this->a,
			'nilai_penugasan'=>$this->b,
			'nilai_pengadaan' =>$this->c,
			'nilai_persekot' =>$this->d,
			'no_WBS'=>$this->e,
			'deadline'=>$this->f,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_datapenugasan){
		$arrayData = array(
			'nama_penugasan'=>$this->a,
			'nilai_penugasan'=>$this->b,
			'nilai_pengadaan' =>$this->c,
			'nilai_persekot' =>$this->d,
			'no_WBS'=>$this->e,
			'deadline'=>$this->f,
		);
		$this->db->where('id_datapenugasan', $id_datapenugasan);
		return $this->db->update($this->table, $arrayData); 
	}

	public function delete($id_datapenugasan){
		return $this->db->delete($this->table, array('id_datapenugasan'=>$id_datapenugasan));
	}	
	
	public function getList(){
		$this->db->where('status','BelumSelesai');
		$this->db->order_by('id_datapenugasan',"DESC");
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getpenugasan($id_datapenugasan)
	{
		$this->db->select('*');
	    $this->db->from('data_penugasan');
		$this->db->where('id_datapenugasan',$id_datapenugasan);
		$query = $this->db->get();
		return $query->row();
	}

	public function detail($id_datapenugasan){
		$condition = array("id_datapenugasan"=>$id_datapenugasan);
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
	
}
?>