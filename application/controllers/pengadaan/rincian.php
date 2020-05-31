<?php
class rincian extends CI_Controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="2") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
        } 
        $this->load->model('Mdanapengadaan');
        $this->load->model('Mdata');
    }

    public function index()
	{
		$data['hasil'] = $this->Mdanapengadaan->getList();
		$this->load->view("pengadaan/rincian_pengadaan",$data);
	}

    public function get_pengadaan($id_datapenugasan)
    {
        $this->load->model('Mdata');
        $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
        $data['hasil'] = $this->Mdanapengadaan->get_penugasan($id_datapenugasan);
        $data['sum_hasil'] = $this->Mdanapengadaan->get_sum($id_datapenugasan);
        $this->load->view('pengadaan/rincian_pengadaan',$data);
    }
}