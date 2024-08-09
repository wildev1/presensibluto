<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SantriModel');
        $this->load->model('RayonModel');
        $this->load->model('TahunAjaranModel');
        $this->load->model('PersentaseModel');
    }

    public function index() {
        $this->data['title'] = 'Santri';

		$this->data['rayon'] = $this->RayonModel->get_all_rayon();
		$this->data['persentase_tagihan'] = $this->PersentaseModel->get_all_persentase_tagihan();
        $this->data['tahun_ajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->data['santri'] = $this->SantriModel->get_all_santri();
        $this->data['content_view'] = 'pages/santri/index';
        $this->load->view('templates/content', $this->data);
    }

    public function create() {
        $data['rayon'] = $this->RayonModel->get_all_rayon();
        $data['tahun_ajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->load->view('santri/create', $data);
    }

    public function simpan() {
        $this->form_validation->set_rules('nama_santri', 'Nama Santri', 'required');
		$this->form_validation->set_rules('nik_santri', 'NIK Santri', 'required|is_unique[santri.nik_santri]');
		$this->form_validation->set_rules('nis', 'NIK Santri', 'required|is_unique[santri.nis]');
        
        if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('alert', '<div class="alert  alert-danger">Data berhasil di tambahkan!</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('santri');
        } else {
            $data = array(
                'santri_id' => uniqid(),
                'rayon_id' => $this->input->post('rayon_id'),
                'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
                'persentase_tagihan_id' => $this->input->post('persentase_tagihan_id'),
                'nis' => $this->input->post('nis'),
                'nik_santri' => $this->input->post('nik_santri'),
                'no_kk' => $this->input->post('no_kk'),
                'nama_santri' => $this->input->post('nama_santri'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'hubungan_wali' => $this->input->post('hubungan_wali'),
            );

            $this->SantriModel->insert_santri($data);
			$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di tambahkan!</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
            redirect('santri');
        }
    }

    public function edit($santri_id) {
        $data['santri'] = $this->SantriModel->get_santri_by_id($santri_id);
        $data['rayon'] = $this->RayonModel->get_all_rayon();
        $data['tahun_ajaran'] = $this->TahunAjaranModel->get_all_tahun_ajaran();
        $this->load->view('santri/edit', $data);
    }

    public function update($santri_id) {
        $this->form_validation->set_rules('nama_santri', 'Nama Santri', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($santri_id);
        } else {
            $data = array(
                'rayon_id' => $this->input->post('rayon_id'),
                'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
                'nis' => $this->input->post('nis'),
                'nik_santri' => $this->input->post('nik_santri'),
                'no_kk' => $this->input->post('no_kk'),
                'nama_santri' => $this->input->post('nama_santri'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'nik_ayah' => $this->input->post('nik_ayah'),
                'tanggal_lahir_ayah' => $this->input->post('tanggal_lahir_ayah'),
                'tempat_lahir_ayah' => $this->input->post('tempat_lahir_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'nik_ibu' => $this->input->post('nik_ibu'),
                'tanggal_lahir_ibu' => $this->input->post('tanggal_lahir_ibu'),
                'tempat_lahir_ibu' => $this->input->post('tempat_lahir_ibu'),
                'hubungan_wali' => $this->input->post('hubungan_wali'),
                'tanggal_aktivasi' => $this->input->post('tanggal_aktivasi'),
                'tanggal_penutupan' => $this->input->post('tanggal_penutupan'),
                'fingerprint_data' => $this->input->post('fingerprint_data'),
                'status_kartu' => $this->input->post('status_kartu')
            );

            $this->SantriModel->update_santri($santri_id, $data);
            $this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update!</div>');
      		$this->session->set_flashdata('alert_timeout', 4000);
            redirect('santri');
        }
    }

    public function delete($santri_id) {
        $this->SantriModel->delete_santri($santri_id);
        $this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di hapus!</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('santri');
    }
}
?>
