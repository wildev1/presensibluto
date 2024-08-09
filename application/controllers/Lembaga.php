<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('LembagaModel');
    }

	public function index() {
		$this->data['title'] = 'Lembaga';
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
        $this->data['content_view'] = 'pages/profillembaga/index';
        $this->load->view('templates/content', $this->data);
	}

    public function update_lembaga() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$lembaga_id = $this->input->post('lembaga_id');
				
			// Handling logo upload
			if (!empty($_FILES['logo']['name'])) {
				$this->load->library('upload');
				$config['upload_path'] = './upload/logo/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = 2048; // 2 MB
				$config['encrypt_name'] = TRUE;
	
				$this->upload->initialize($config);
	
				if ($this->upload->do_upload('logo')) {
					$data['logo'] = $this->upload->data('file_name');
					$old_logo_filename = $this->LembagaModel->get_logo_filename($lembaga_id);
					$old_logo_path = './upload/logo/' . $old_logo_filename;
	
					if (file_exists($old_logo_path)) {
						unlink($old_logo_path);
					}
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger">Data gagal di update! Error: ' . $this->upload->display_errors() . '</div>');
					$this->session->set_flashdata('alert_timeout', 4000);
					redirect('lembaga');
				}
			} else {
				$data['logo'] = $this->LembagaModel->get_logo_filename($lembaga_id);
			}
	
			// Generate QR code
			$nama_pimpinan = $this->input->post('nama_pimpinan'); 
			$nip = $this->input->post('nip');
			$data_qrcode = $nama_pimpinan.'-'.$nip; 
			$filename = 'qrcode_' . $nip;
			$size = '250x250'; 
			$logoPath = FCPATH . './upload/qrcode/logo.png'; 
	
			$this->load->helper('qrcode');
			$old_file = $this->LembagaModel->get_lembaga($lembaga_id); // Assuming this method returns lembaga data including old qrcode
	
			if (!empty($old_file['qrcode'])) {
				$qrCodePath = generate_qr_code_with_logo($data_qrcode, $filename, $logoPath, $size, $old_file['qrcode']);
			} else {
				$qrCodePath = generate_qr_code_with_logo($data_qrcode, $filename, $logoPath, $size);
			}
	
			$qrCodeFileName = basename($qrCodePath);
			$data = array(
				'nama_lembaga' => $this->input->post('nama_lembaga'),
				'nsm' => $this->input->post('nsm'),
				'npsm' => $this->input->post('npsm'),
				'alamat' => $this->input->post('alamat'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kabupaten' => $this->input->post('kabupaten'),
				'provinsi' => $this->input->post('provinsi'),
				'nama_pimpinan' => $this->input->post('nama_pimpinan'),
				'nip' => $this->input->post('nip'),
				'qrcode' => $filename.'.png',
			);
	
			$this->LembagaModel->update_lembaga($lembaga_id, $data);
			$this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil di update!</div>');
			$this->session->set_flashdata('alert_timeout', 4000);
			redirect('lembaga');
		}
	}
	

}
