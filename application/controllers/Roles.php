<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('RolesModel');
    }

	public function index() {
		$this->data['title'] = 'Roles';

		$this->data['roles'] = $this->RolesModel->get_all_roles();
        $this->data['content_view'] = 'pages/roles/index';
        $this->load->view('templates/content', $this->data);
	}

	public function simpan() {
        $data = array(
            'roles_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'nama_roles' => $this->input->post('nama_roles'),
        );

        $this->RolesModel->insert_roles($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambah !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('roles');
    }

	public function update() {
        $roles_id = $this->input->post('roles_id');
        $data = array(
			'nama_roles' => $this->input->post('nama_roles'),
        );

        $this->RolesModel->update_roles($roles_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('roles');
    }

	public function delete() {

		$roles_id = $this->input->post('roles_id');
		$this->RolesModel->delete_roles($roles_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
      	$this->session->set_flashdata('alert_timeout', 4000);
		redirect('roles');
	}

}
