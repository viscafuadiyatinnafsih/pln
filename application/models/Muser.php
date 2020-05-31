<?php 
class Muser extends CI_Model{
	public $table = "user";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nama,$username,$pass,$email,$level){
		$this->a = $nama;
		$this->b = $username;
		$this->c = $pass;
		$this->d = $email;
		$this->e = $level;
	}
	
	public function add(){
		$arrayData = array(
			'nama'=>$this->a,
			'username'=>$this->b,
			'pass'=>$this->c,
			'email'=>$this->d,
			'level'=>$this->e,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_user){
		$arrayData = array(
			'nama'=>$this->a,
			'username'=>$this->b,
			'pass'=>$this->c,
			'email'=>$this->d,
			'level'=>$this->e,
		);
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$this->db->order_by('id_user',"DESC");
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function delete($id_user){
		return $this->db->delete($this->table, array('id_user'=>$id_user));
	}
	
	function detail($id_user){
		$condition = array("id_user"=>$id_user);
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