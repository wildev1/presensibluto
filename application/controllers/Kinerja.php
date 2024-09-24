<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kinerja extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('KinerjaModel');
		$this->load->library('form_validation');
        $this->load->library('upload');
		$this->load->library('session');
		if (!$this->session->userdata('logged_in')) {
            redirect('auth'); 
        }
    }

	public function index() {
		$this->data['title'] = 'Kinerja';
		$this->data['user_role'] = $this->session->userdata('role'); 
		$user_role = $this->session->userdata('role'); 
		$user_id = $this->session->userdata('users_id'); 
		if ($user_role == 'Admin') {
			$this->data['kinerja'] = $this->KinerjaModel->get_all_kinerja();
		} else {
			$this->data['kinerja'] = $this->KinerjaModel->get_kinerja_by_user_id($user_id);
		}
        $this->data['content_view'] = 'pages/kinerja/index';
        $this->load->view('templates/content', $this->data);
	}

	public function validasi() {
        $laporan_id = $this->input->post('laporan_id');
        $data = array(
			'status_validasi' => $this->input->post('status_validasi'),
			'catatan' => $this->input->post('catatan'),
        );

        $this->KinerjaModel->update($laporan_id, $data);
		$this->session->set_flashdata('alert', '<div class="alert  alert-info">Data berhasil di update !</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('kinerja');
    }


	public function create() {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        
        $config['upload_path'] = './upload/document/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 10048; // 2MB

        $this->upload->initialize($config);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('kinerja');
        } else {
            // File upload
            if ($this->upload->do_upload('photo')) {
                $file_data = $this->upload->data();
                $photo = $file_data['file_name'];
            } else {
                $photo = NULL;
            }

			$users_id = $this->session->userdata('users_id'); 
            $data = array(
				'laporan_id' => md5(date('YmdHis') . rand(1000, 9999)),
                'users_id' => $users_id,
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal'    => date('Y-m-d H:i:s'), // Tanggal dan waktu saat ini
           		'hari'       => date('l'), 
                'photo' => $photo
            );
            $this->KinerjaModel->insert($data);

            // Redirect or show success message
            redirect('kinerja');
        }
    }
	

	public function update() {
		$laporan_id = $this->input->post('laporan_id');

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = array(
				'deskripsi' => $this->input->post('deskripsi'),
				'tanggal'   => date('Y-m-d')
			);

			if (!empty($_FILES['photo']['name'])) {
				$this->load->library('upload');

				$config['upload_path']   = './upload/document/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size']      = 10048; // 2MB
				$config['encrypt_name']  = TRUE;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('photo')) {
					$data['photo'] = $this->upload->data('file_name');
					$current_kinerja = $this->KinerjaModel->get_kinerja_by_id($laporan_id);
					$old_photo_path = './upload/document/' . $current_kinerja['photo'];

					// Hapus foto lama jika ada file baru yang diunggah dan file lama ada
					if (file_exists($old_photo_path) && $current_kinerja['photo']) {
						unlink($old_photo_path);
					}
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger">Gagal mengunggah foto baru. Silakan coba lagi.</div>');
					$this->session->set_flashdata('alert_timeout', 4000);
					redirect('kinerja/update/' . $laporan_id);
				}
			} else {
				// Jika tidak ada foto baru yang diunggah, tetap gunakan foto lama
				$current_kinerja = $this->KinerjaModel->get_kinerja_by_id($laporan_id);
				$data['photo'] = $current_kinerja['photo'];
			}

			$this->KinerjaModel->update($laporan_id, $data);
			$this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil diupdate</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('kinerja');
		} else {
			// gagal
			redirect('kinerja');
		}
	}

	public function delete() {
		$laporan_id = $this->input->post('laporan_id');
		$current_kinerja = $this->KinerjaModel->get_kinerja_by_id($laporan_id);

		if ($current_kinerja) {
			$photo_path = './upload/document/' . $current_kinerja['photo'];
			if (!empty($current_kinerja['photo']) && file_exists($photo_path)) {
				unlink($photo_path);
			}

			$this->KinerjaModel->delete($laporan_id);
			$this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus.</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
		} else {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">Data tidak ditemukan.</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
		}

		redirect('kinerja');
	}

}
