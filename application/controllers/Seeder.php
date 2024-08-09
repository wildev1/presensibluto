<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder extends CI_Controller {

    public function run() {
        $this->load->database();

        $this->db->insert('roles', [
            'roles_id' => '1',
            'nama_roles' => 'admin',
        ]);
		
        $this->db->insert('permission', [
            'permission_id' => '1',
            'nama_permission' => 'roles/index',
        ]);

        $this->db->insert('roles_permission', [
            'roles_permission_id' => '1',
            'roles_id' => '1',
            'permission_id' => '1',
        ]);

        $this->db->insert('users', [
            'users_id' => '1',
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
            'email' => 'admin@example.com',
            'telepon' => '123456789',
            'alamat' => 'Admin Address',
            'status' => 'aktif',
        ]);


        $this->db->insert('users_roles', [
            'users_roles_id' => '1',
            'users_id' => '1',
            'roles_id' => '1',
        ]);

        echo "Seeding done!";
    }
}
