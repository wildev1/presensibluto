<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persentase extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('PersentaseModel');
    }

	public function index() {
		$this->data['title'] = 'Persentase Tagihan';
		$this->data['persentase_tagihan'] = $this->PersentaseModel->get_all_persentase_tagihan();
        $this->data['content_view'] = 'pages/persentase/index';
        $this->load->view('templates/content', $this->data);
	}

    public function simpan() {
		$pembayaran = $this->input->post('pembayaran');
		$potongan = 100-$pembayaran;
        $data = array(
            'persentase_tagihan_id' => md5(date('YmdHis') . rand(1000, 9999)),
            'jabatan_santri' => $this->input->post('jabatan_santri'),
            'pembayaran' => $this->input->post('pembayaran'),
            'potongan' => $potongan,
            'deskripsi' => $this->input->post('deskripsi'),
        );

        $this->PersentaseModel->insert_persentase_tagihan($data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambah !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('persentase');
    }
	public function update() {
        $persentase_tagihan_id = $this->input->post('persentase_tagihan_id');
		$pembayaran = $this->input->post('pembayaran');
		$potongan = 100-$pembayaran;
        $data = array(
			'jabatan_santri' => $this->input->post('jabatan_santri'),
			'pembayaran' => $this->input->post('pembayaran'),
            'potongan' => $potongan,
            'deskripsi' => $this->input->post('deskripsi'),
        );

        $this->PersentaseModel->update_persentase_tagihan($persentase_tagihan_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('persentase');
    }

	public function delete() {

		$persentase_tagihan_id = $this->input->post('persentase_tagihan_id');
		$this->PersentaseModel->delete_persentase_tagihan($persentase_tagihan_id);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus !</div>');
      	$this->session->set_flashdata('alert_timeout', 4000);
		redirect('persentase');
	}

	public function cetak() {
		$this->data['title'] = 'Cetak Persentase Tagihan';
		$this->data['persentase_tagihan'] = $this->PersentaseModel->get_all_persentase_tagihan();
        $this->load->view('pages/persentase/cetak', $this->data);
	}
	
}
