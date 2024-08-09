<?php
class RolesPermissionModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_roles_with_permission() {
        $this->db->select('roles.roles_id, roles.nama_roles, roles.created_at, permission.permission_id, permission.nama_permission');
        $this->db->from('roles');
        $this->db->join('roles_permission', 'roles.roles_id = roles_permission.roles_id', 'left');
        $this->db->join('permission', 'roles_permission.permission_id = permission.permission_id', 'left');
        $query = $this->db->get();
        
        $roles = array();
        foreach ($query->result() as $row) {
            if (!isset($roles[$row->roles_id])) {
                $roles[$row->roles_id] = array(
                    'roles_id' => $row->roles_id,
                    'nama_roles' => $row->nama_roles,
                    'created_at' => $row->created_at,
                    'permission' => array()
                );
            }
            if ($row->permission_id) {
                $roles[$row->roles_id]['permission'][] = array(
                    'permission_id' => $row->permission_id,
                    'nama_permission' => $row->nama_permission
                );
            }
        }
        
        return array_values($roles);
    }
	
	
	private function generate_uuid() {
        return bin2hex(random_bytes(16));
    }

	public function update_role_permissions($roles_id, $permission_ids) {
        $this->db->delete('roles_permission', array('roles_id' => $roles_id));
        foreach ($permission_ids as $permission_id) {
            $data = array(
				'roles_permission_id' => $this->generate_uuid(),
                'roles_id' => $roles_id,
                'permission_id' => $permission_id
            );
            $this->db->insert('roles_permission', $data);
        }
    }
    public function delete_roles_permission($roles_permission_id) {
        $this->db->where('roles_permission_id', $roles_permission_id);
        return $this->db->delete('roles_permission');
    }

}?>
