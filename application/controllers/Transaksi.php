<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index() {
		$this->data['title'] = 'Transaksi';
        $this->data['content_view'] = 'pages/Transaksi/index';
        $this->load->view('templates/content', $this->data);
	}

}
