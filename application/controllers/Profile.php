<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth'); 
        }
    }

    public function index() {
        $this->data['title'] = 'Profile'; 
        $users_id = $this->session->userdata('users_id'); 
        $user = $this->UsersModel->get_users($users_id);

        if ($user) {
            $this->data['user'] = $user;
        } else {
            $this->data['user'] = null;
        }

        $this->data['content_view'] = 'pages/profile/index';
        $this->load->view('templates/content', $this->data);
    }

	public function update($user_id) {
    // Set rules untuk validasi
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    if ($this->form_validation->run() === FALSE) {
        // Jika validasi gagal, ambil data yang diperlukan dan tampilkan view
        $data['roles'] = $this->RolesModel->get_all_roles();
        $data['user'] = $this->UsersModel->get_users($user_id); 
        $this->load->view('profile', $data);
    } else {
        // Ambil foto lama dari database
        $current_photo = $this->UsersModel->get_user_photo($user_id);
        $old_photo = $current_photo ? $current_photo : 'user.jpg';

        // Upload foto dan dapatkan nama foto baru jika berhasil
        $photo = $this->upload_photo($old_photo);

        // Data untuk update
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('no_pegawai'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
            'no_pegawai' => $this->input->post('no_pegawai'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'photo' => $photo ? $photo : $old_photo,
        );

        // Update data pengguna
        $this->UsersModel->update_users($user_id, $data);
        // Set flashdata untuk notifikasi dan redirect
        $this->session->set_flashdata('alert', '<div class="alert alert-success">User berhasil diperbarui!</div>');
        redirect('profile');
    }
}

private function upload_photo($old_photo) {
    $config['upload_path'] = './upload/photo/';
    $config['allowed_types'] = 'jpeg|jpg|png';
    $config['max_size'] = 10048; // 2MB
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    // Jika ada file yang di-upload
    if ($this->upload->do_upload('photo')) {
        $upload_data = $this->upload->data();
        $new_photo = $upload_data['file_name'];

        // Hapus foto lama jika bukan foto default
        if ($old_photo != 'user.jpg' && file_exists('./upload/photo/' . $old_photo)) {
            unlink('./upload/photo/' . $old_photo);
        }

        return $new_photo;
    } else {
        return FALSE;
    }
}


	
}
