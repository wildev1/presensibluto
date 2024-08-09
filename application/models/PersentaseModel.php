<?php

class PersentaseModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_persentase_tagihan($data) {
        $this->db->insert('persentase_tagihan', $data);
    }

    public function get_all_persentase_tagihan() {
        return $this->db->get('persentase_tagihan')->result();
    }

    public function update_persentase_tagihan($persentase_tagihan_id, $data) {
        $this->db->where('persentase_tagihan_id', $persentase_tagihan_id);
        $this->db->update('persentase_tagihan', $data);
    }

    public function delete_persentase_tagihan($persentase_tagihan_id) {
        $this->db->delete('persentase_tagihan', array('persentase_tagihan_id' => $persentase_tagihan_id));
    }

}
