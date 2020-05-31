<?php
class manager extends CI_controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_grafik');
        if ($this->session->userdata('level')!="1") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
        }
    }

    public function index()
    {
        // $x['data']=$this->m_grafik->get_data_stok();
        $x['data']=$this->m_grafik->dataGrafik();

        $this->load->view("manager/index",$x);
    }
} 