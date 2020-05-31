<?php
class danapengadaan extends CI_Controller {
    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="2") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
        } 
        $this->load->model('Mdanapengadaan');
        $this->load->model('Mlaporan');
        $this->load->model('Mdata');
    }

    public function index()
    {
        $data['data'] = true;
        $data['hasil'] = $this->Mdanapengadaan->getList();
        $this->load->view('pengadaan/danapengadaan-view.php',$data);
    }  

    public function create($id_datapenugasan)
    {   
        if ($id_datapenugasan) {
            $data['detail'] = $id_datapenugasan;   
        }
        $this->load->view('pengadaan/add_danapengadaan',$data);
    }
    
    public function tambah($id_datapenugasan)
    {
        if($id_datapenugasan != '')
        $data = array ('id_danapengadaan'=>$this->input->post('id_danapengadaan'),
                        'uraian'=>$this->input->post('uraian'),
                        'tanggal_pengadaan'=>$this->input->post('tanggal_pengadaan'),
                        'vendor'=>$this->input->post('vendor'),
                        'nomor_kontrak'=>$this->input->post('nomor_kontrak'),
                        'nilai_kontrak'=>$this->input->post('nilai_kontrak'),
                        'id_datapenugasan'=>$id_datapenugasan
        );

        $get_nilai_penugasan = $this->Mdanapengadaan->get_nilai_penugasan($id_datapenugasan);
        $nilai_penugasan = $get_nilai_penugasan[0]['nilai_penugasan'];
        $nilai_total_dana_pengadaan = $get_nilai_penugasan[0]['jumlah_dana_pengadaan'];
        $jumlah_dana_pengadaan = $nilai_total_dana_pengadaan + $this->input->post('nilai_kontrak');
        // echo $nilai_total_dana_pengadaan;die;
        if($jumlah_dana_pengadaan <= $nilai_penugasan){ 
            $this->Mdanapengadaan->insert($data);
            $this->session->set_flashdata('tambah', "<div style='color:#00a65a;'>Data berhasil ditambah.</div>");
            $this->load->model('Mdata');
            $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
            $data['hasil'] = $this->Mdanapengadaan->get_penugasan($id_datapenugasan);
            $data['sum_hasil'] = $this->Mdanapengadaan->get_sum($id_datapenugasan);
            $this->load->view('pengadaan/danapengadaan-view',$data);
        }else{
            echo "<script>alert('Nilai kontrak melebihi nilai pengadaan');history.go(-1);</script>";
        }
    }


    public function edit($id_danapengadaan)
    {
        $data['judul'] = "Edit";
        $data['detail'] = $this->Mdanapengadaan->detail($id_danapengadaan);
        $this->load->view('pengadaan/danapengadaan-edit.php',$data);
    }

    public function update($id_danapengadaan)
    {

        $data = [
                'id_danapengadaan' => $id_danapengadaan,
                'uraian' => $this->input->post('uraian'),
                'tanggal_pengadaan' => $this->input->post('tanggal_pengadaan'),
                'vendor' => $this->input->post('vendor'),
                'nomor_kontrak' => $this->input->post('nomor_kontrak'),
                'nilai_kontrak' => $this->input->post('nilai_kontrak')
            ];

            $update = $this->Mdanapengadaan->edit($data);

            echo "<script>alert('berhasil');history.go(-1);</script>";
    }
        
    public function delete($id_danapengadaan){
        $this->Mdanapengadaan->delete($id_danapengadaan);
        echo "<script>alert('Berhasil menghapus');history.go(-1);</script>";

    }

    //menampilkan data per id
    public function get_pengadaan($id_datapenugasan)
    {
        $this->load->model('Mdata');
        $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
        $data['hasil'] = $this->Mdanapengadaan->get_penugasan($id_datapenugasan);
        $data['sum_hasil'] = $this->Mdanapengadaan->get_sum($id_datapenugasan);
        $this->load->view('pengadaan/danapengadaan-view',$data);

    }
}

?> 