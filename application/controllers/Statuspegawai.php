<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statuspegawai extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('StatusPegawaiModel');
    }

	public function index() {
		$this->data['title'] = 'Kepegawaian';
		$this->data['status_pegawai'] = $this->StatusPegawaiModel->get_all_status_pegawai();
        $this->data['content_view'] = 'pages/status_pegawai/index';
        $this->load->view('templates/content', $this->data);
	}

    public function simpan() {
		$status_pegawai = rand(1000, 9999);
		$kode_status_pegawai = 'PG-' . $status_pegawai;
        $data = array(
            'status_pegawai_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'nama_status_pegawai' => $this->input->post('nama_status_pegawai'),
            'kode_status_pegawai' => $kode_status_pegawai,
            'deskripsi' => $this->input->post('deskripsi'),
        );

        $this->StatusPegawaiModel->insert_status_pegawai($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambah !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('statuspegawai');
    }
	
	public function update() {
        $status_pegawai_id = $this->input->post('status_pegawai_id');
        $data = array(
			'nama_status_pegawai' => $this->input->post('nama_status_pegawai'),
            'kode_status_pegawai' => $this->input->post('kode_status_pegawai'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        $this->StatusPegawaiModel->update_status_pegawai($status_pegawai_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('statuspegawai');
    }

	public function delete() {

		$status_pegawai_id = $this->input->post('status_pegawai_id');
		$this->StatusPegawaiModel->delete_status_pegawai($status_pegawai_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
      	$this->session->set_flashdata('alert_timeout', 4000);
		redirect('statuspegawai');
	}
	
}
