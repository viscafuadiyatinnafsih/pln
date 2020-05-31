<?php
class danapengadaan extends CI_Controller {
    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="1") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
        } 
        $this->load->model('Mdanapengadaan');
        $this->load->model('Mdata');
    }

    public function index()
    {
        $data['data'] = true;
        $data['hasil'] = $this->Mdanapengadaan->getList();
        $this->load->view('manager/danapengadaan.php',$data);
    }  

    public function create($id_datapenugasan)
    {   
        if ($id_datapenugasan) {
            $data['detail'] = $this->Mdanapengadaan->detail_penugasan($id_datapenugasan);   
        }
        $this->load->view('manager/add_danapengadaan',$data);
    }
    
    public function add($id_danapengadaan=NULL)
     {
            $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('uraian');
            $b = $this->input->post('vendor');
            $c = $this->input->post('nomor_kontrak');
            $d = $this->input->post('nilai_kontrak');
            $this->form_validation->set_rules('uraian', 'Uraian', 'required');
            $this->form_validation->set_rules('vendor', 'Vendor', 'required');
            $this->form_validation->set_rules('nomor_kontrak', 'Nomor Kontrak', 'required');
            $this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required');

            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mdanapengadaan->setData($a,$b,$c);
                if ($d){
                    // Simpan Edit data
                    $this->Mdanapengadaan->edit($d);
                } else{
                    // simpan data baru
                    $this->Mdanapengadaan->add();
                }
                
        $this->load->model('Mdata');
        $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
        $data['hasil'] = $this->Mdanapengadaan->get_penugasan($id_datapenugasan);
        $data['sum_hasil'] = $this->Mdanapengadaan->get_sum($id_datapenugasan);
        $this->load->view('manager/danapengadaan',$data);
            }
        } 
        //jika membawa ID, artinya EDIT
        if ($id_danapengadaan) {
            $data['detail'] = $this->Mdanapengadaan->detail($id_danapengadaan);   
        }
        $data['judul']="Tambah Data";
        $this->load->view('manager/danapengadaan-add', $data);
    } 

    public function tambah($id_datapenugasan)
    {
        $data = array ('id_danapengadaan'=>$this->input->post('id_danapengadaan'),
                        'uraian'=>$this->input->post('uraian'),
                        'vendor'=>$this->input->post('vendor'),
                        'nomor_kontrak'=>$this->input->post('nomor_kontrak'),
                        'nilai_kontrak'=>$this->input->post('nilai_kontrak'),
                        'id_datapenugasan'=>$id_datapenugasan
        );

        $this->Mdanapengadaan->insert($data);
        $this->session->set_flashdata('tambah', "<div style='color:#00a65a;'>Data berhasil ditambah.</div>");
        $this->load->model('Mdata');
        $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
        $data['hasil'] = $this->Mdanapengadaan->get_penugasan($id_datapenugasan);
        $data['sum_hasil'] = $this->Mdanapengadaan->get_sum($id_datapenugasan);
        $this->load->view('manager/danapengadaan-',$data);
    }
        
    public function delete($id_danapengadaan){
        $this->Mdanapengadaan->delete($id_danapengadaan);
        $this->load->model('Mdata');
        $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
        $data['hasil'] = $this->Mdanapengadaan->get_penugasan($id_datapenugasan);
        }

    //menampilkan data per id
    public function get_pengadaan($id_datapenugasan)
    {
        $this->load->model('Mdata');
        $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
        $data['hasil'] = $this->Mdanapengadaan->get_penugasan($id_datapenugasan);
        $data['sum_hasil'] = $this->Mdanapengadaan->get_sum($id_datapenugasan);
        $this->load->view('manager/danapengadaan',$data);

    }
}

?> 