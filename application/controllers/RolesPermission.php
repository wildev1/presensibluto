<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolesPermission extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('RolesPermissionModel');
        $this->load->model('RolesModel');
        $this->load->model('PermissionModel');
    }

    public function index() {
		$this->data['title'] = 'Permission';

		$roles = $this->RolesPermissionModel->get_roles_with_permission();
        $permissions = $this->PermissionModel->get_permissions();
        
        $this->data['roles'] = $roles;
        $this->data['permissions'] = $permissions;
		$this->data['content_view'] = 'pages/rolespermission/index';
        $this->load->view('templates/content', $this->data);
    }

	public function save_permissions() {
        $permissions = $this->input->post('permission');
        
        foreach ($permissions as $roles_id => $permission_ids) {
            $this->RolesPermissionModel->update_role_permissions($roles_id, $permission_ids);
        }
        
        redirect('rolespermission');
    }

}
