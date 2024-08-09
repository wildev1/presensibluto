<?php

class RayonModel extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_rayon($data) {
        $this->db->insert('rayon', $data);
    }

    public function get_all_rayon() {
        return $this->db->get('rayon')->result();
    }

    public function update_rayon($rayon_id, $data) {
        $this->db->where('rayon_id', $rayon_id);
        $this->db->update('rayon', $data);
    }

    public function delete_rayon($rayon_id) {
        $this->db->delete('rayon', array('rayon_id' => $rayon_id));
    }

}
