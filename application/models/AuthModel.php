<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk memeriksa keberadaan user di database dan mengambil role
    public function check_user($username, $password)
    {
        // Ambil data user berdasarkan username
        $this->db->select('users.*, roles.nama_roles');
        $this->db->from('users');
        $this->db->join('users_roles', 'users.users_id = users_roles.users_id', 'left');
        $this->db->join('roles', 'users_roles.roles_id = roles.roles_id', 'left');
        $this->db->where('users.username', $username);
        $query = $this->db->get();

        // Jika user ditemukan
        if ($query->num_rows() == 1) {
            $user = $query->row();

            // Verifikasi password
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        // Jika user tidak ditemukan atau password salah
        return false;
    }
}
