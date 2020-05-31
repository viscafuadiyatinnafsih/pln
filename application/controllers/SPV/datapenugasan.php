<?php
class datapenugasan extends CI_controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="3") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
    	}
    }
	public function index()
	{
		$this->load->model('Mdata');
		$data['hasil'] = $this->Mdata->getList();
		$this->load->view("SPV/datapenugasan",$data);
	}
	function detail($id_datapenugasan){
		$condition = array("id_datapenugasan"=>$id_datapenugasan);
		$query = $this->db->get_where($this->table,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}	
	public function getTotal(){
		return $this->db->count_all_results($this->tnews);
	}
	
}