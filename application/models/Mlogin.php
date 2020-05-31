<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model{


  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function CheckUser($username, $pass)
	{
		$this->db->select('username,pass,level');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('pass',$pass);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows()==1){
			return $query->result();
		} else {
			return false;
		}


	}


  public function tampil_data($username){


	 $this->db->select('*');
	 $this->db->from('user');
	 $this->db->where('username',$username);
	 $query = $this->db->get();
  	 return $query->row();
  		
	}

	

}