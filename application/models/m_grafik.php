<?php
class m_grafik extends CI_Model{
 
    function get_data_stok(){
        $query = $this->db->query("SELECT data_penugasan.*, sum(dana_pengadaan.nilai_kontrak) as jumlah_dana_pengadaan, sum(dana_persekot.jumlah) as jumlah_dana_persekot
		FROM data_penugasan
		LEFT JOIN dana_pengadaan ON data_penugasan.id_datapenugasan = dana_pengadaan.id_datapenugasan
		LEFT JOIN dana_persekot  ON data_penugasan.id_datapenugasan = dana_persekot.id_datapenugasan
		GROUP BY data_penugasan.id_datapenugasan");


          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function dataGrafik()
      {
        $this->db->select("data_penugasan.deadline bulan_deadline, (sum(dana_pengadaan.nilai_kontrak) + sum(dana_persekot.jumlah)) as total");
        $this->db->from('data_penugasan');
        $this->db->join('dana_pengadaan','data_penugasan.id_datapenugasan = dana_pengadaan.id_datapenugasan','left');
        $this->db->join('dana_persekot','data_penugasan.id_datapenugasan = dana_persekot.id_datapenugasan','left');
        $this->db->group_by('MONTH(data_penugasan.deadline)');
        $this->db->order_by('data_penugasan.deadline', 'ASC');
        return $this->db->get()->result();
      } 
 
}