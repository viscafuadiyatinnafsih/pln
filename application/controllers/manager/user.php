<?php
class user extends CI_Controller {
    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="1") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
        } 
        $this->load->model('Muser');
    }

    public function index()
    {
        $data['data'] = true;
        $data['hasil'] = $this->Muser->getList();
        $this->load->view('manager/user-view.php',$data);
    }  
    
     public function add($id_user=NULL)
     {
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nama');
            $b = $this->input->post('username');
            $c = $this->input->post('pass');
            $d = $this->input->post('email');
            $e = $this->input->post('level');
            $f = $this->input->post('id_user');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('level', 'Level', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Muser->setData($a,$b,$c,$d,$e);
                if ($f){
                    // Simpan Edit data
                    $this->Muser->edit($f);
                } else{
                    // simpan data baru
                    $this->Muser->add();
                }
                redirect('manager/user');
            }
        } 
        //jika membawa ID, artinya EDIT
        if ($id_user) {
            $data['detail'] = $this->Muser->detail($id_user);   
        }
        $data['judul']="Tambah Data";
        $this->load->view('manager/user-add', $data);
    } 
        
        public function delete($id_user){
            $this->Muser->delete($id_user);
            redirect('manager/user');
        }
}

?>