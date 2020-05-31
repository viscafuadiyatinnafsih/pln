<?php
class laporan extends CI_controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="3") {
            $this->session->set_flashdata('akses','Pesan Error');   
        redirect('login');
        } 
        //*$this->load->model('Mdanapenugasan');} 
    }

	public function index()
	{
		$this->load->view("SPV/laporan-view");
	}

    public function viewreport()
    {
        $this->load->library('form_validation');
        $this->load->model('Mlaporan');
        if($this->input->post('submit',TRUE == 'Submit'))
        {
            $this->form_validation->set_rules('bln','bulan','required');
            $this->form_validation->set_rules('thn','Tahun','required');

            if ($this->form_validation->run() == TRUE)
            {
                $bln = $this->input->post('bln',TRUE);
                $thn = $this->input->post('thn',TRUE);
            }

        } else {
            $bln = date('m');
            $thn = date('Y');
        }

        //YYYY-mm-dd ambil tanggal periode dari view
        $awal = $thn.'-'.$bln.'-1';
        $akhir = $thn.'-'.$bln.'-31';

        //kondisi/kriteria laporan anu dek ditampilkeun
        $where = ['deadline >=' => $awal, 'deadline '];
        $data['bln'] = $bln;
        $data['thn'] = $thn;
        
        
        $data['hasil'] = $this->Mlaporan->all_penugasan($where);
        $this->load->view('SPV/laporan-view',$data);
    }
}