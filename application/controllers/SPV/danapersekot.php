<?php
class danapersekot extends CI_Controller {
    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="3") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
        } 
        $this->load->model('Mdanapersekot');
        $this->load->model('Mlaporan');
        $this->load->model('Mdata');
    }

    public function index()
    {
        $data['data'] = true;
        $data['hasil'] = $this->Mdanapersekot->getList();
        $this->load->view('SPV/danapersekot-view.php',$data);
    }  

    public function create($id_datapenugasan)
    {   
        if ($id_datapenugasan) {
            $data['detail'] = $id_datapenugasan;   
        }
        $this->load->view('SPV/add_danapersekot',$data);
    }

    public function tambah($id_datapenugasan)
    {
        if($id_datapenugasan != '')
        $data = array ('id_danapersekot'=>$this->input->post('id_danapersekot'),
                        'uraian_kegiatan'=>$this->input->post('uraian_kegiatan'),
                        'tanggal_persekot'=>$this->input->post('tanggal_persekot'),
                        'keterangan'=>$this->input->post('keterangan'),
                        'jumlah'=>$this->input->post('jumlah'),
                        'id_datapenugasan'=>$id_datapenugasan
        );

        $get_nilai_penugasan = $this->Mdanapersekot->get_nilai_penugasan($id_datapenugasan);
        $nilai_penugasan = $get_nilai_penugasan[0]['nilai_penugasan'];
        $nilai_total_dana_persekot = $get_nilai_penugasan[0]['jumlah_dana_persekot'];
        $jumlah_dana_persekot = $nilai_total_dana_persekot + $this->input->post('jumlah');

        if($jumlah_dana_persekot <= $nilai_penugasan){ 
            $this->Mdanapersekot->insert($data);
            $this->session->set_flashdata('tambah', "<div style='color:#00a65a;'>Data berhasil ditambah.</div>");
            $this->load->model('Mdata');
            $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
            $data['hasil'] = $this->Mdanapersekot->get_penugasan($id_datapenugasan);
            $data['sum_hasil'] = $this->Mdanapersekot->get_sum($id_datapenugasan);
            $this->load->view('SPV/danapersekot-view',$data);
        }else{
            echo "<script>alert('Jumlah melebihi nilai pembelian langsung');history.go(-1);</script>";
        }
    }

     public function edit($id_danapersekot)
    {
        $data['judul'] = "Edit";
        $data['detail'] = $this->Mdanapersekot->detail($id_danapersekot);
        $this->load->view('SPV/danapersekot-edit.php',$data);
    }

    public function update($id_danapersekot)
    {
        $data = [
                'id_danapersekot' => $id_danapersekot,
                'uraian_kegiatan' => $this->input->post('uraian_kegiatan'),
                'tanggal_persekot' => $this->input->post('tanggal_persekot'),
                'keterangan' => $this->input->post('keterangan'),
                'jumlah' => $this->input->post('jumlah'),
            ];

            $update = $this->Mdanapersekot->edit($data);

            echo "<script>alert('berhasil');history.go(-1);</script>";
    }

        
    public function delete($id_danapersekot){
        $this->Mdanapersekot->delete($id_danapersekot);
        echo "<script>alert('Berhasil menghapus');history.go(-1);</script>";
    }

    //menampilkan data per id
    public function get_persekot($id_datapenugasan)
    {
        $this->load->model('Mdata');
        $data['penugasan'] = $this->Mdata->getpenugasan($id_datapenugasan);
        $data['hasil'] = $this->Mdanapersekot->get_penugasan($id_datapenugasan);
        $data['sum_hasil'] = $this->Mdanapersekot->get_sum($id_datapenugasan);
        $this->load->view('SPV/danapersekot-view',$data);

    }
}

?> 