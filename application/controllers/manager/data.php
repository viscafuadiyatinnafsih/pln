<?php
class data extends CI_Controller {
    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="1") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
        } 
        $this->load->model('Mdata');
    }

    public function index()
    {
        $data['data'] = true;
        $data['hasil'] = $this->Mdata->getList();
        $this->load->view('manager/data-view.php',$data);
    }  
    
    public function add($id_datapenugasan=NULL)
     {
        $c = $this->input->post('nilai_pengadaan');
        $d = $this->input->post('nilai_persekot');
        $b = $this->input->post('nilai_penugasan');
        if ($c+$d>$b){
            $this->session->set_flashdata('nilai','Pesan Eror');
            redirect(site_url('manager/data/add'));
        }else if ($c+$d<$b){
              $this->session->set_flashdata('nilai1','Pesan Eror');
            redirect(site_url('manager/data/add'));
        }

        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nama_penugasan');
            $b = $this->input->post('nilai_penugasan');
            $c = $this->input->post('nilai_pengadaan');
            $d = $this->input->post('nilai_persekot');
            $e = $this->input->post('no_WBS');
            $f = $this->input->post('deadline');
            $g = $this->input->post('id_datapenugasan');
            $this->form_validation->set_rules('nama_penugasan', 'Nama Penugasan', 'required');
            $this->form_validation->set_rules('nilai_penugasan', 'Nilai Penugasan', 'required');
            $this->form_validation->set_rules('no_WBS', 'No WBS', 'required');
            $this->form_validation->set_rules('deadline', 'Deadline', 'required');

            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mdata->setData($a,$b,$c,$d,$e,$f);
                if ($g){
                    // Simpan Edit data
                    $this->Mdata->edit($g);
                } else{
                    // simpan data baru
                    $this->Mdata->add();
                }
                redirect('manager/data');
            }
        } 
        //jika membawa ID, artinya EDIT
        if ($id_datapenugasan) {
            $data['detail'] = $this->Mdata->detail($id_datapenugasan);   
        }
        $data['judul']="Tambah Data";
        $this->load->view('manager/data-add', $data);
        } 

     public function delete($id_datapenugasan){
            $this->Mdata->delete($id_datapenugasan);
            redirect('manager/data');
        }

    public function ubahStatus($id)
    {
        $data = array(
            'status' => 'Selesai'
        );

        $this->db->where('id_datapenugasan',$id);
        $this->db->update('data_penugasan',$data);
        echo"<script>alert('Status berhasil diperbaharui!'); window.location = '..'</script>";

    }        
    
}

?>