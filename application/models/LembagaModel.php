<?php
class LembagaModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_lembaga() {
		return $this->db->get('lembaga')->result();
	}

	public function get_logo_filename($lembaga_id) {
        $this->db->select('logo');
        $this->db->where('lembaga_id', $lembaga_id);
        $query = $this->db->get('lembaga');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->logo;
        }
        return null;
    }

    public function update_lembaga($lembaga_id, $data) {
        $this->db->where('lembaga_id', $lembaga_id);
        $this->db->update('lembaga', $data);
    }

}?>
