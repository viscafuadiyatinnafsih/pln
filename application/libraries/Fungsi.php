<?php

Class Fungsi {

	Protected $ci;

	public function __construct() {
		$this->ci =& get_instance();
	}

	function user_login()
	{
		$this->ci->load->model('Mlogin');
		$userid = $this->ci->session->userdata('id_user');
		$user_data = $this->ci->Mlogin->get($id_user)->row();
		return $user_data;
	}
}


