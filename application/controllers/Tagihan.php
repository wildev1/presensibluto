<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TagihanModel');
		$this->load->model('SantriModel');
		$this->load->model('SemesterModel');
    }

    public function index() {
		$this->data['title'] = 'Tagihan';
		
		$semester = $this->SemesterModel->get_all_semester();
		if ($semester) {
				$this->data['semester'] = $semester;
			} else {
				$this->data['semester'] = null;
		}

		$results = $this->TagihanModel->get_all_tagihan(); 
		foreach ($results as $result) {
			$total_tagihan = $result->jumlah_tagihan * ((100 - $result->potongan) / 100);
			$result->total_tagihan = $total_tagihan;
		}
		$this->data['tagihan'] = $results;
        $this->data['content_view'] = 'pages/tagihan/index';
        $this->load->view('templates/content', $this->data);
    }

    public function view($tagihan_id) {
        $data['tagihan'] = $this->TagihanModel->get_tagihan_by_id($tagihan_id);
        $this->load->view('tagihan/view', $data);
    }

	public function create_kolektif_tagihan() {
		// Dapatkan semua data santri
		$santri_list = $this->SantriModel->get_active_santri();
	
		// Cek apakah ada data santri
		if (empty($santri_list)) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">Data gagal di tambahkan, tidak ada data santri</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('tagihan');
		}
	
		// Set data tagihan yang akan diinputkan
		$data_tagihan = array();
		foreach ($santri_list as $santri) {
			$data_tagihan[] = array(
				'tagihan_id' => uniqid(), // Atau gunakan cara lain untuk generate ID unik
				'santri_id' => $santri->santri_id,
				'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'), // Pastikan tahun ajaran dikirimkan dari form
				'jenis_tagihan' => $this->input->post('jenis_tagihan'),
				'jumlah_tagihan' => $this->input->post('jumlah_tagihan'),
				'tanggal_jatuh_tempo' => $this->input->post('tanggal_jatuh_tempo'),
				'deskripsi' => $this->input->post('deskripsi'),
				'status' => 'Belum Lunas'
			);
		}
	
		// Masukkan data tagihan ke database
		$this->TagihanModel->insert_kolektif_tagihan($data_tagihan);
	
		$this->session->set_flashdata('alert', '<div class="alert alert-info">Data gagal di update! Error</div>');
		$this->session->set_flashdata('alert_timeout', 4000);
		redirect('tagihan');
	}
	

    public function simpan() {
        $data = array(
            'tagihan_id' => $this->input->post('tagihan_id'),
            'santri_id' => $this->input->post('santri_id'),
            'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
            'jenis_tagihan' => $this->input->post('jenis_tagihan'),
            'jumlah_tagihan' => $this->input->post('jumlah_tagihan'),
            'tanggal_jatuh_tempo' => $this->input->post('tanggal_jatuh_tempo'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        );

        $this->TagihanModel->insert_tagihan($data);
        redirect('tagihan');
    }

    public function edit($tagihan_id) {
        $data['tagihan'] = $this->TagihanModel->get_tagihan_by_id($tagihan_id);
        $this->load->view('tagihan/edit', $data);
    }

    public function update($tagihan_id) {
        $data = array(
            'santri_id' => $this->input->post('santri_id'),
            'tahun_ajaran_id' => $this->input->post('tahun_ajaran_id'),
            'jenis_tagihan' => $this->input->post('jenis_tagihan'),
            'jumlah_tagihan' => $this->input->post('jumlah_tagihan'),
            'tanggal_jatuh_tempo' => $this->input->post('tanggal_jatuh_tempo'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status')
        );

        $this->TagihanModel->update_tagihan($tagihan_id, $data);
        redirect('tagihan');
    }

    public function delete($tagihan_id) {
        $this->TagihanModel->delete_tagihan($tagihan_id);
        redirect('tagihan');
    }

    public function filter_by_tahun_ajaran() {
        $tahun_ajaran_id = $this->input->get('tahun_ajaran_id');
        $data['tagihan'] = $this->TagihanModel->get_tagihan_by_tahun_ajaran($tahun_ajaran_id);
        $this->load->view('tagihan/index', $data);
    }
}
?>
