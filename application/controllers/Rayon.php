<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rayon extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('RayonModel');
    }

	public function index() {
		$this->data['title'] = 'Rayon';
		$this->data['rayon'] = $this->RayonModel->get_all_rayon();
        $this->data['content_view'] = 'pages/rayon/index';
        $this->load->view('templates/content', $this->data);
	}

    public function simpan() {
		$rayon = rand(10000, 99999);
		$kode_rayon = 'RN-' . $rayon;
        $data = array(
            'rayon_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'nama_rayon' => $this->input->post('nama_rayon'),
            'kode_rayon' => $kode_rayon,
            'deskripsi' => $this->input->post('deskripsi'),
        );

        $this->RayonModel->insert_rayon($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambah !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('rayon');
    }
	
	public function update() {
        $rayon_id = $this->input->post('rayon_id');
        $data = array(
			'nama_rayon' => $this->input->post('nama_rayon'),
            'kode_rayon' => $this->input->post('kode_rayon'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        $this->RayonModel->update_rayon($rayon_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('rayon');
    }

	public function delete() {

		$rayon_id = $this->input->post('rayon_id');
		$this->RayonModel->delete_rayon($rayon_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
      	$this->session->set_flashdata('alert_timeout', 4000);
		redirect('rayon');
	}
	
}
