<?php
class pengadaan extends CI_controller {
	function __construct(){
        parent::__construct();
        $this->load->model('m_grafik');
        if ($this->session->userdata('level')!="2") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login'); }
        //*$this->load->model('Mdanapenugasan');} 
    }

	public function index()
	{
		$this->load->view("pengadaan/index");
	}
}