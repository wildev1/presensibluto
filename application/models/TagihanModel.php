<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TagihanModel extends CI_Model {

    public function get_all_tagihan() {
		$this->db->select('tagihan.*,santri.*, persentase_tagihan.*, tahun_ajaran.nama_tahun_ajaran as tahun_ajaran');
        $this->db->from('tagihan');
        $this->db->join('santri', 'tagihan.santri_id = santri.santri_id');
        $this->db->join('persentase_tagihan', 'santri.persentase_tagihan_id = persentase_tagihan.persentase_tagihan_id', 'left');
        $this->db->join('tahun_ajaran', 'tagihan.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tagihan_by_id($tagihan_id) {
        $query = $this->db->get_where('tagihan', array('tagihan_id' => $tagihan_id));
        return $query->row();
    }

    public function insert_tagihan($data) {
        return $this->db->insert('tagihan', $data);
    }

	public function insert_kolektif_tagihan($data) {
		return $this->db->insert_batch('tagihan', $data);
	}	

    public function update_tagihan($tagihan_id, $data) {
        $this->db->where('tagihan_id', $tagihan_id);
        return $this->db->update('tagihan', $data);
    }

    public function delete_tagihan($tagihan_id) {
        $this->db->where('tagihan_id', $tagihan_id);
        return $this->db->delete('tagihan');
    }

    public function get_tagihan_by_tahun_ajaran($tahun_ajaran_id) {
        $this->db->where('tahun_ajaran_id', $tahun_ajaran_id);
        $query = $this->db->get('tagihan');
        return $query->result();
    }
}
?>
