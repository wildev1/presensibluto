<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('RolesModel');
    }

	public function index() {
		$this->data['title'] = 'Users';

		$this->data['users'] = $this->UsersModel->get_all_users();
		$this->data['roles'] = $this->RolesModel->get_all_roles();
        $this->data['content_view'] = 'pages/users/index';
        $this->load->view('templates/content', $this->data);
	}

	public function create() {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('roles', 'Roles', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

		if ($this->form_validation->run() === FALSE) {
			$data['roles'] = $this->RolesModel->get_all_roles();
			$this->load->view('users/create', $data);
		} else {
			
			$data = array(
				'users_id' => md5(date('YmdHis') . rand(1000, 9999)),
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'status' => 'aktif',
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
			redirect('users');
		}
	}
	



}
