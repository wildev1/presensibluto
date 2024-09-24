<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('StatusPegawaiModel');
        $this->load->model('RolesModel');
        // if (!$this->session->userdata('logged_in')) {
        //     redirect('auth');
        // }
		// check_access('Admin');
    }

	public function index() {
		$this->data['title'] = 'Users';

		$this->data['users'] = $this->UsersModel->get_all_users();
		$this->data['roles'] = $this->RolesModel->get_all_roles();
        $this->data['content_view'] = 'pages/users/index';
        $this->load->view('templates/content', $this->data);
	}

	public function karyawan() {
		$this->data['title'] = 'Karyawan';

		$this->data['users'] = $this->UsersModel->get_all_users();
		$this->data['status_pegawai'] = $this->StatusPegawaiModel->get_all_status_pegawai();
		$this->data['roles'] = $this->RolesModel->get_all_roles();
        $this->data['content_view'] = 'pages/karyawan/index';
        $this->load->view('templates/content', $this->data);
	}

	public function create() {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('roles', 'Roles', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

		if ($this->form_validation->run() === FALSE) {
			redirect('karyawan');
		} else {
			
			$data = array(
				'users_id' => md5(date('YmdHis') . rand(1000, 9999)),
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('no_pegawai'),
				'email' => $this->input->post('email'),
				'telepon' => $this->input->post('telepon'),
				'no_pegawai' => $this->input->post('no_pegawai'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'status_pegawai_id' => $this->input->post('status_pegawai_id'),
				'photo' => 'user.jpg',
				'status' => 'aktif',
				'password' => password_hash($this->input->post('no_pegawai'), PASSWORD_DEFAULT),
				'created_at' => date('Y-m-d H:i:s')
			);
	
			$this->UsersModel->insert_users($data);
	
			$users_roles = array(
				'users_roles_id' => md5(date('YmdHis') . rand(1000, 9999)),
				'users_id' => $data['users_id'],
				'roles_id' => $this->input->post('roles'),
			);

			$this->UsersModel->insert_users_roles($users_roles);

			$this->session->set_flashdata('alert', '<div class="alert alert-success">User berhasil ditambahkan!</div>');
			redirect('karyawan');
		}
	}
	
	public function update($user_id) {
		// Set rules untuk validasi
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('roles', 'Roles', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() === FALSE) {
			$data['roles'] = $this->RolesModel->get_all_roles();
			$data['user'] = $this->UsersModel->get_users($user_id); 
			
			$this->load->view('profile', $data);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('no_pegawai'),
				'email' => $this->input->post('email'),
				'telepon' => $this->input->post('telepon'),
				'no_pegawai' => $this->input->post('no_pegawai'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'status_pegawai_id' => $this->input->post('status_pegawai_id'),
				'photo' => 'user.jpg',
				'status' => 'aktif',
				'password' => password_hash($this->input->post('no_pegawai'), PASSWORD_DEFAULT),
				'updated_at' => date('Y-m-d H:i:s')
			);
			
			$this->UsersModel->update_users($user_id, $data);
			$users_roles = array(
				'roles_id' => $this->input->post('roles'),
			);

			$this->UsersModel->update_users_roles($user_id, $users_roles);

			$this->session->set_flashdata('alert', '<div class="alert alert-success">User berhasil diperbarui!</div>');
			redirect('karyawan');
		}
	}




}
