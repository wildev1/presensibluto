<?php
class UsersShiftGroupModel extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

public function get_all_users_shift_groups() {
    $this->db->select('users.users_id,no_pegawai, users.nama AS user_name');
    $this->db->from('users');
    $this->db->join('users_shift_groups', 'users.users_id = users_shift_groups.users_id', 'left');
    $this->db->join('group_shifts', 'users_shift_groups.group_shift_id = group_shifts.group_shift_id', 'left'); // Ganti dengan kolom yang benar
    $this->db->group_by('users.users_id');
    $query = $this->db->get();
    return $query->result();
}


public function get_users_shift_group_by_id($users_shift_group_id) {
    $this->db->select('users_shift_groups.*, users.nama AS user_name, group_shifts.group_shift AS nama_group'); // Menggunakan kolom yang benar
    $this->db->from('users_shift_groups');
    $this->db->join('users', 'users_shift_groups.users_id = users.users_id');
    $this->db->join('group_shifts', 'users_shift_groups.group_shift_id = group_shifts.group_shift_id');
    $this->db->where('users_shift_groups.users_shift_group_id', $users_shift_group_id);
    $query = $this->db->get();
    return $query->row_array();
}



public function get_shift_groups_by_user($user_id) {
    $this->db->select('group_shifts.group_shift AS nama_group'); // Menggunakan kolom yang benar
    $this->db->from('users_shift_groups');
    $this->db->join('group_shifts', 'users_shift_groups.group_shift_id = group_shifts.group_shift_id');
    $this->db->where('users_shift_groups.users_id', $user_id);
    $query = $this->db->get();
    return $query->result();
}



    // Pastikan juga ada metode untuk mendapatkan data pengguna dan grup shift jika diperlukan
    public function get_users() {
        $this->db->select('users_id, nama');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_shift_groups() {
        $this->db->select('group_shift_id, nama_group');
        $this->db->from('group_shift');
        $query = $this->db->get();
        return $query->result();
    }

	 public function check_duplicate($users_id, $group_shift_id) {
        $this->db->where('users_id', $users_id);
        $this->db->where('group_shift_id', $group_shift_id);
        $query = $this->db->get('users_shift_groups');
        return $query->num_rows() > 0;
    }

    public function insert($data) {
        return $this->db->insert('users_shift_groups', $data);
    }

    public function update($users_shift_group_id, $data) {
        $this->db->where('users_shift_group_id', $users_shift_group_id);
        return $this->db->update('users_shift_groups', $data);
    }

    public function delete_by_user($users_id) {
        $this->db->where('users_id', $users_id);
        return $this->db->delete('users_shift_groups');
    }

}
