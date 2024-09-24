<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model('UsersModel');
		$this->load->model('ShiftModel');
		$this->load->model('PresensiModel');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

		// check_access('Admin');
    }

	public function index() {
    $this->data['title'] = 'Dashboard';
    $users_id = $this->session->userdata('users_id'); 
    $user = $this->UsersModel->get_users($users_id);

    if ($user) {
        $this->data['user'] = $user;

        // Check if the user role is 'karyawan'
        if ($user->roles === 'Karyawan') {
            // Ambil data shift berdasarkan user_id yang login
            $shifts = $this->ShiftModel->get_shift_by_user($users_id);

            // Periksa jika tidak ada shift untuk user
            if (empty($shifts)) {
                $this->data['message'] = 'Anda tidak memiliki shift atau grup shift. Silakan hubungi administrator.';
				$this->data['check_in_active'] = false; // Disable check-in
				$this->data['check_out_active'] = false; // Disable check-out
                $this->load->view('pages/v-karyawan/index', $this->data);
                return; // Keluar dari fungsi jika tidak ada shift
            }

            // Ambil hari ini dalam format bahasa Indonesia (Senin, Selasa, dll.)
            $days_in_indonesia = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
            $current_day = $days_in_indonesia[date('l')]; // Ambil hari saat ini dan terjemahkan ke dalam bahasa Indonesia

            // Filter shift berdasarkan hari yang sesuai
            $valid_shift = null;
            foreach ($shifts as $shift) {
                $shift_days = $this->parse_shift_days($shift->hari);

                // Jika hari pada shift sesuai dengan hari saat ini
                if (in_array($current_day, $shift_days)) {
                    $valid_shift = $shift;
                    break;
                }
            }

            if (!$valid_shift) {
                $this->data['message'] = 'Tidak ada shift yang sesuai dengan hari ini (' . $current_day . ').';
				$this->data['check_in_active'] = false; // Disable check-in
				$this->data['check_out_active'] = false; // Disable check-out
                $this->load->view('pages/v-karyawan/index', $this->data);
                return; // Keluar dari fungsi jika tidak ada shift pada hari ini
            }

            // Ambil data shift yang aktif
            $this->data['current_shift'] = $valid_shift;

            // Ambil data presensi untuk tanggal hari ini dan shift yang sesuai
            $current_date = date('Y-m-d');
            $this->data['presensi'] = $this->PresensiModel->get_presensi_by_date_shift($users_id, $current_date, $this->data['current_shift']->shift_id);

            // Tentukan status tombol berdasarkan shift dan data presensi
            $shift_mulai = $this->data['current_shift']->jam_mulai;
            $shift_selesai = $this->data['current_shift']->jam_selesai;
            $current_time = date('H:i:s');

            // Periksa apakah saat ini berada dalam rentang waktu shift
            $is_in_shift = ($current_time >= $shift_mulai && $current_time <= $shift_selesai);

            // Tambahkan data untuk ditampilkan di view
            $this->data['shift_info'] = [
                'nama_shift' => $this->data['current_shift']->nama_shift,
                'jam_mulai' => $shift_mulai,
                'jam_selesai' => $shift_selesai,
                'hari' => $current_day,
                'current_time' => $current_time
            ];

            if ($this->data['presensi']) {
                if ($this->data['presensi']->waktu_masuk && $this->data['presensi']->waktu_keluar) {
                    // Jika sudah check-in dan check-out
                    $this->data['message'] = 'Anda sudah melakukan check-in dan check-out untuk shift ini (' . $current_day . ').';
                    $this->data['check_in_active'] = false; // Nonaktifkan tombol check-in
                    $this->data['check_out_active'] = false; // Nonaktifkan tombol check-out
                } else if ($this->data['presensi']->waktu_masuk && !$this->data['presensi']->waktu_keluar) {
                    // Jika sudah check-in tapi belum check-out
                    $this->data['message'] = 'Anda sudah melakukan check-in, silakan check-out hari ini (' . $current_day . ').';
                    $this->data['check_in_active'] = false; // Nonaktifkan tombol check-in
                    $this->data['check_out_active'] = true; // Tetap aktifkan tombol check-out
                }
            } else {
                // Jika data presensi tidak ada dan berada dalam rentang waktu shift, aktifkan tombol check-in
                $this->data['message'] = 'Anda belum melakukan check-in hari ini (' . $current_day . ').';
                $this->data['check_in_active'] = $is_in_shift; // Aktifkan tombol check-in jika masih dalam shift
                $this->data['check_out_active'] = false; // Nonaktifkan tombol check-out
            }

            $this->load->view('pages/v-karyawan/index', $this->data);
        } else {
            $this->data['content_view'] = 'pages/dashboard/index';
            $this->load->view('templates/content', $this->data);
        }
    } else {
        $this->data['user'] = null;
        $this->data['content_view'] = 'pages/dashboard/index'; // Default view if user not found
    }
}

private function parse_shift_days($shift_days) {
    // Jika formatnya "Senin-Sabtu", konversi menjadi ['Senin', 'Selasa', ..., 'Sabtu']
    $days_mapping = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    
    if (strpos($shift_days, '-') !== false) {
        // Jika ada rentang hari
        list($start_day, $end_day) = explode('-', $shift_days);
        $start_index = array_search($start_day, $days_mapping);
        $end_index = array_search($end_day, $days_mapping);
        
        // Ambil semua hari dari start hingga end
        return array_slice($days_mapping, $start_index, $end_index - $start_index + 1);
    } else {
        // Jika tidak ada tanda hubung, pecah berdasarkan koma untuk beberapa hari
        return explode(',', $shift_days);
    }
}

}
