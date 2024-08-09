<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
		$this->data['title'] = 'Dashboard';
        $this->data['content_view'] = 'pages/dashboard/index';
        $this->load->view('templates/content', $this->data);
	}

}
