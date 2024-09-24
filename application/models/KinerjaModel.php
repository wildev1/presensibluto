<?php
class KinerjaModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_kinerja() {
        $query = $this->db->get('laporan_kinerja');
		return $query->result();
    }

    public function get_kinerja_by_id($laporan_id) {
        $query = $this->db->get_where('laporan_kinerja', array('laporan_id' => $laporan_id));
        return $query->row_array();
    }
	
	public function get_kinerja_by_user_id($user_id) {
        $this->db->where('users_id', $user_id);
        $query = $this->db->get('laporan_kinerja');
        return $query->result();
    }

    public function insert($data) {
        return $this->db->insert('laporan_kinerja', $data);
    }

    public function update($laporan_id, $data) {
        $this->db->where('laporan_id', $laporan_id);
        return $this->db->update('laporan_kinerja', $data);
    }

    public function delete($laporan_id) {
        return $this->db->delete('laporan_kinerja', array('laporan_id' => $laporan_id));
    }
}
