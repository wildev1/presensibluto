<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('PresensiModel');
		$this->load->model('UsersModel');
        $this->load->model('StatusPegawaiModel');
        $this->load->model('RolesModel');
    }

	public function index() {
		$this->data['title'] = 'Rekap Presensi Semua Pegawai';
		$date_awal = $this->input->post('date_awal');
		$date_akhir = $this->input->post('date_akhir');

		if ($date_awal && $date_akhir) {
			$presensi = $this->PresensiModel->get_presensi_by_date($date_awal, $date_akhir);
			$this->data['date_awal'] = $date_awal;
			$this->data['date_akhir'] = $date_akhir;
		} else {
			$presensi = $this->PresensiModel->get_all_presensi();
		}

		$this->data['presensi'] = $presensi;
		$this->data['content_view'] = 'pages/presensi/laporan';
		$this->load->view('templates/content', $this->data);
	}

	public function print() {
		// Ambil parameter tanggal dari URL
		$date_awal = $this->input->get('date_awal');
		$date_akhir = $this->input->get('date_akhir');

		// Ambil data berdasarkan filter
		if ($date_awal && $date_akhir) {
			$presensi = $this->PresensiModel->get_presensi_by_date($date_awal, $date_akhir);
		} else {
			$presensi = $this->PresensiModel->get_all_presensi();
		}

		// Kirim data ke view untuk ditampilkan
		$this->load->view('pages/presensi/cetak-laporan', [
			'title' => 'Laporan Presensi',
			'presensi' => $presensi,
			'date_awal' => $date_awal,
			'date_akhir' => $date_akhir
		]);
	}


	public function personal() {
		$this->data['title'] = 'Rekap Presensi individu';
		$this->data['users'] = $this->UsersModel->get_all_users();
		$this->data['status_pegawai'] = $this->StatusPegawaiModel->get_all_status_pegawai();
		$this->data['roles'] = $this->RolesModel->get_all_roles();
        $this->data['presensi'] = $this->PresensiModel->get_all_presensi();
        $this->data['content_view'] = 'pages/presensi/laporanpersonal';
        $this->load->view('templates/content', $this->data);
	}

	public function get_user_attendance() {
		$user_id = $this->input->get('user_id');
		$date_awal = $this->input->get('date_awal');
		$date_akhir = $this->input->get('date_akhir');
		
		$presensi = $this->PresensiModel->get_presensi_by_user_and_date($user_id, $date_awal, $date_akhir);
		
		// Load a view that generates HTML for the attendance data
		$this->load->view('pages/presensi/attendance_data', [
			'presensi' => $presensi
		]);
	}

	
}
