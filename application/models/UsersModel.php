<?php
class UsersModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function get_all_users() {
		$this->db->select('users.*, GROUP_CONCAT(roles.nama_roles) as roles, status_pegawai.nama_status_pegawai');
		$this->db->from('users');
		$this->db->join('users_roles', 'users.users_id = users_roles.users_id', 'left');
		$this->db->join('roles', 'users_roles.roles_id = roles.roles_id', 'left');
		$this->db->join('status_pegawai', 'users.status_pegawai_id = status_pegawai.status_pegawai_id', 'left');
		$this->db->group_by('users.users_id');
		$query = $this->db->get();
		return $query->result();
	}


    public function get_users($users_id) {
        $this->db->select('users.*, GROUP_CONCAT(roles.nama_roles) as roles, status_pegawai.nama_status_pegawai');
        $this->db->from('users');
        $this->db->join('users_roles', 'users.users_id = users_roles.users_id', 'left');
        $this->db->join('roles', 'users_roles.roles_id = roles.roles_id', 'left');
		$this->db->join('status_pegawai', 'users.status_pegawai_id = status_pegawai.status_pegawai_id', 'left');
        $this->db->where('users.users_id', $users_id);
        $this->db->group_by('users.users_id');
        $query = $this->db->get();
        return $query->row();
    }
	

    public function insert_users($data) {
        $this->db->insert('users', $data);
		return $this->db->insert_id();
    }

    public function update_users($users_id, $data) {
        $this->db->where('users_id', $users_id);
        return $this->db->update('users', $data);
    }

	public function insert_users_roles($users_roles) {
        $this->db->insert('users_roles', $users_roles);
    }
	public function update_users_roles($user_id, $data) {
        $this->db->where('users_id', $user_id);
        $this->db->update('users_roles', $data);
    }

    public function delete_users($users_id) {
        $this->db->where('users_id', $users_id);
        return $this->db->delete('users');
    }

	public function get_user_photo($user_id) {
		$this->db->select('photo');
		$this->db->from('users');
		$this->db->where('users_id', $user_id);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->row()->photo;
		} else {
			return FALSE;
		}
	}

}
?>
