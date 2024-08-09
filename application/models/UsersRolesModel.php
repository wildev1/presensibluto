<?php
class UsersRolesModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_users_roles() {
        $query = $this->db->get('users_roles');
        return $query->result();
    }

    public function get_users_role($users_role_id) {
        $query = $this->db->get_where('users_roles', array('users_role_id' => $users_role_id));
        return $query->row();
    }

    public function insert_users_role($data) {
        return $this->db->insert('users_roles', $data);
    }

    public function update_users_role($users_role_id, $data) {
        $this->db->where('users_role_id', $users_role_id);
        return $this->db->update('users_roles', $data);
    }

    public function delete_users_role($users_role_id) {
        $this->db->where('users_role_id', $users_role_id);
        return $this->db->delete('users_roles');
    }
}
?>
