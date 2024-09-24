<?php

class StatusPegawaiModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_status_pegawai($data) {
        $this->db->insert('status_pegawai', $data);
    }

    public function get_all_status_pegawai() {
        return $this->db->get('status_pegawai')->result();
    }

    public function update_status_pegawai($status_pegawai_id, $data) {
        $this->db->where('status_pegawai_id', $status_pegawai_id);
        $this->db->update('status_pegawai', $data);
    }

    public function delete_status_pegawai($status_pegawai_id) {
        $this->db->delete('status_pegawai', array('status_pegawai_id' => $status_pegawai_id));
    }

}
