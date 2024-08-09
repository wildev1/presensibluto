<?php
class PermissionModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_permission() {
        $query = $this->db->get('permission');
        return $query->result();
    }

	public function get_permissions() {
        $query = $this->db->get('permission');
        return $query->result_array();
    }

    public function get_permission($permission_id) {
        $query = $this->db->get_where('permission', array('permission_id' => $permission_id));
        return $query->row();
    }

    public function insert_permission($data) {
        return $this->db->insert('permission', $data);
    }

    public function update_permission($permission_id, $data) {
        $this->db->where('permission_id', $permission_id);
        return $this->db->update('permission', $data);
    }

    public function delete_permission($permission_id) {
        $this->db->where('permission_id', $permission_id);
        return $this->db->delete('permission');
    }
}
?>
