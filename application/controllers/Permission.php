<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('PermissionModel');
		$this->load->model('UsersModel');
		 if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
		check_access('Admin');
    }

	public function index() {
		$this->data['title'] = 'permission';

		$this->data['permission'] = $this->PermissionModel->get_all_permission();
        $this->data['content_view'] = 'pages/permission/index';
        $this->load->view('templates/content', $this->data);
	}

	public function simpan() {
        $data = array(
            'permission_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'nama_permission' => $this->input->post('nama_permission'),
        );

        $this->PermissionModel->insert_permission($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambah !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('permission');
    }

	public function update() {
        $permission_id = $this->input->post('permission_id');
        $data = array(
			'nama_permission' => $this->input->post('nama_permission'),
        );

        $this->PermissionModel->update_permission($permission_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('permission');
    }

	public function delete() {

		$permission_id = $this->input->post('permission_id');
		$this->PermissionModel->delete_permission($permission_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
      	$this->session->set_flashdata('alert_timeout', 4000);
		redirect('permission');
	}

}
