<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SantriModel');
        $this->load->model('RayonModel');
        $this->load->model('TahunAjaranModel');
        $this->load->model('PersentaseModel');
    }

    public function index() {
        $this->data['title'] = 'Alumni';

		$this->data['rayon'] = $this->RayonModel->get_all_rayon();
		$this->data['persentase_tagihan'] = $this->PersentaseModel->get_all_persentase_tagihan();
        $this->data['tahun_ajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->data['santri'] = $this->SantriModel->get_non_active_santri();
        $this->data['content_view'] = 'pages/santri/alumni';
        $this->load->view('templates/content', $this->data);
    }

}
?>
