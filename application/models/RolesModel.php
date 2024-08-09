<?php
class RolesModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_all_roles() {
        $this->db->select('roles.*, GROUP_CONCAT(permission.nama_permission) as permission');
        $this->db->from('roles');
        $this->db->join('roles_permission', 'roles.roles_id = roles_permission.roles_id', 'left');
        $this->db->join('permission', 'roles_permission.permission_id = permission.permission_id', 'left');
        $this->db->group_by('roles.roles_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_roles($roles_id) {
        $this->db->select('roles.*, GROUP_CONCAT(permission.nama_permission) as permission');
        $this->db->from('roles');
        $this->db->join('roles_permission', 'roles.roles_id = roles_permission.roles_id', 'left');
        $this->db->join('permission', 'roles_permission.permission_id = permission.permission_id', 'left');
        $this->db->where('roles.roles_id', $roles_id);
        $this->db->group_by('roles.roles_id');
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_roles($data) {
        return $this->db->insert('roles', $data);
    }

    public function update_roles($roles_id, $data) {
        $this->db->where('roles_id', $roles_id);
        return $this->db->update('roles', $data);
    }

    public function delete_roles($roles_id) {
        $this->db->where('roles_id', $roles_id);
        return $this->db->delete('roles');
    }
}
?>
