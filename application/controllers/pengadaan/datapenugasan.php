<?php
class datapenugasan extends CI_controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="2") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
    	}
    	
    }
	public function index()
	{
		$this->load->model('Mdata');
		$data['hasil'] = $this->Mdata->getList();
		$this->load->view("pengadaan/datapenugasan",$data);
	}
}