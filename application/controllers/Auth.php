<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel'); 
        $this->load->model('LembagaModel'); 
    }

	public function index() {
		$this->data['title'] = 'Login';
		$this->data['lembaga'] = $this->LembagaModel->get_lembaga();
        $this->load->view('auth/login', $this->data);
	}

    public function login() {
        // Cek apakah form telah di-submit
        if ($this->input->post()) {
            // Ambil data dari form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Validasi input
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                // Panggil fungsi dari model untuk mengecek user
                $user = $this->AuthModel->check_user($username, $password);

                if ($user) {
                    // Jika user ditemukan, buat session dengan role
                    $session_data = array(
                        'users_id' => $user->users_id,
                        'nama' => $user->nama,
                        'username' => $user->username,
                        'role' => $user->nama_roles,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($session_data);

                    // Redirect ke halaman dashboard atau halaman lain yang diinginkan
                    redirect('dashboard');
                } else {
                    // Jika login gagal, tampilkan pesan error
                    $this->session->set_flashdata('error', 'Username atau password salah.');
                    redirect('auth');
                }
            }
        }

        // Load view login
        $this->load->view('auth');
    }
    public function logout()
    {
        // Hapus semua session
        $this->session->sess_destroy();
        redirect('auth');
    }
}
