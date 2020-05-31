<?php
class danapersekot extends CI_controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="1") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
    	}
    	$this->load->model('Mdanapersekot');
    	$this->load->model('Mdata'); 
    }

	public function index()
	{
		$data['hasil'] = $this->Mdanapersekot->getList();
		$this->load->view("manager/danapersekot",$data);
	}

	public function get_persekot($id_datapenugasan)
	{
		$this->load->model('Mdata');
		$data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
		$data['hasil'] = $this->Mdanapersekot->get_penugasan($id_datapenugasan);
		$data['sum_hasil'] = $this->Mdanapersekot->get_sum($id_datapenugasan);
		$this->load->view('manager/danapersekot',$data);

	}
}