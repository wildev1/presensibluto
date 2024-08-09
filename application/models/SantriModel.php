<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SantriModel extends CI_Model {
    
    public function get_all_santri() {
        $this->db->select('santri.*, persentase_tagihan.*, tahun_ajaran.nama_tahun_ajaran, rayon.nama_rayon, COUNT(no_kk) OVER(PARTITION BY no_kk) as siblings_count');
        $this->db->from('santri');
        $this->db->join('tahun_ajaran', 'santri.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
        $this->db->join('persentase_tagihan', 'santri.persentase_tagihan_id = persentase_tagihan.persentase_tagihan_id', 'left');
        $this->db->join('rayon', 'santri.rayon_id = rayon.rayon_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

	public function get_active_santri() {
		$this->db->where('status_santri', 'aktif');
		$query = $this->db->get('santri');
		return $query->result();
	}	
	public function get_non_active_santri() {
		$this->db->where('status_santri', 'non-aktif');
		$query = $this->db->get('santri');
		return $query->result();
	}	

    public function get_santri_by_id($santri_id) {
        $this->db->select('santri.*, persentase_tagihan.*, tahun_ajaran.nama_tahun_ajaran, rayon.nama_rayon');
        $this->db->from('santri');
        $this->db->join('tahun_ajaran', 'santri.tahun_ajaran_id = tahun_ajaran.tahun_ajaran_id', 'left');
        $this->db->join('persentase_tagihan', 'santri.persentase_tagihan_id = persentase_tagihan.persentase_tagihan_id', 'left');
        $this->db->join('rayon', 'santri.rayon_id = rayon.rayon_id', 'left');
        $this->db->where('santri.santri_id', $santri_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_santri($data) {
        return $this->db->insert('santri', $data);
    }

    public function update_santri($santri_id, $data) {
        $this->db->where('santri_id', $santri_id);
        return $this->db->update('santri', $data);
    }

    public function delete_santri($santri_id) {
        $this->db->where('santri_id', $santri_id);
        return $this->db->delete('santri');
    }
}
