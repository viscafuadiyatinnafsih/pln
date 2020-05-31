<?php
class login extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Mlogin');
		$this->load->library('form_validation');
	}

    public function index()
    {
    	$data['home'] = true;
    	$this->load->view('login',$data);

    }

     public function validasi()
    {

			$username = $this->input->post('username');
	        $pass = $this->input->post('pass');

	        $ceklogin = $this->Mlogin->CheckUser($username,$pass);

	        if ($ceklogin){
	            foreach($ceklogin as $row);
	            $this->session->set_userdata('username', $row->username);
	            
	            $this->session->set_userdata('level', $row->level);

	            if($this->session->userdata('level')=="1"){
	                redirect('manager/manager', 'referesh');
	            } elseif ($this->session->userdata('level')=="2") {
	                redirect('pengadaan/pengadaan', 'referesh');
	                
	            } elseif ($this->session->userdata('level')=="3") {
	                redirect('SPV/SPV', 'referesh');
	                
	            }
	        } else {
	              $this->session->set_flashdata('pesan','Pesan Error');
	           redirect(site_url('login'));
	        }
	    
  } 

    public function logout ()
    {
    	$this->session->sess_destroy();
    	redirect('login', 'referesh');
    }
}