<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        // $this->load->model('RayonModel');
    }

	public function index() {
		$this->data['title'] = 'Profile';
		// $this->data['rayon'] = $this->RayonModel->get_all_rayon();
        $this->data['content_view'] = 'pages/profile/index';
        $this->load->view('templates/content', $this->data);
	}

	
}
