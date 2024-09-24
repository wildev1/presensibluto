<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presensi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PresensiModel');
        $this->load->model('ShiftGroupModel');
        $this->load->model('ShiftModel');
        $this->load->library('upload'); 
    }

    public function index() {
        $this->data['title'] = 'Presensi';
        $this->data['presensi'] = $this->PresensiModel->get_all_presensi();
        $this->data['content_view'] = 'pages/presensi/index';
        $this->load->view('templates/content', $this->data);
    }

public function addpresensi() {
    $this->data['title'] = 'Proses Absensi';
    $user_id = $this->session->userdata('users_id');

    // Jika user belum login, redirect ke halaman login
    if (!$user_id) {
        redirect('login');
    }

    // Ambil data shift berdasarkan user_id yang login
    $shifts = $this->ShiftModel->get_shift_by_user($user_id);

    // Periksa jika tidak ada shift untuk user
    if (empty($shifts)) {
        $this->data['message'] = 'Anda tidak memiliki shift atau grup shift. Silakan hubungi administrator.';
        $this->data['content_view'] = 'pages/presensi/no_shift';
        $this->load->view('templates/content', $this->data);
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
        $this->data['content_view'] = 'pages/presensi/no_shift';
        $this->load->view('templates/content', $this->data);
        return; // Keluar dari fungsi jika tidak ada shift pada hari ini
    }

    // Ambil data shift yang aktif
    $this->data['current_shift'] = $valid_shift;

    // Ambil data presensi untuk tanggal hari ini dan shift yang sesuai
    $current_date = date('Y-m-d');
    $this->data['presensi'] = $this->PresensiModel->get_presensi_by_date_shift($user_id, $current_date, $this->data['current_shift']->shift_id);

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
        
        // Aktifkan tombol check-out meskipun sudah lewat dari jam selesai
        $this->data['check_out_active'] = true; // Tetap aktifkan tombol check-out
    }
} else {
    // Jika data presensi tidak ada dan berada dalam rentang waktu shift, aktifkan tombol check-in
    $this->data['message'] = 'Anda belum melakukan check-in hari ini (' . $current_day . ').';
    $this->data['check_in_active'] = $is_in_shift; // Aktifkan tombol check-in jika masih dalam shift
    $this->data['check_out_active'] = false; // Nonaktifkan tombol check-out
}


    $this->data['content_view'] = 'pages/presensi/addpresensi';
    $this->load->view('templates/content', $this->data);
}


/**
 * Fungsi untuk menguraikan rentang hari (misalnya Senin-Sabtu) menjadi array hari-hari individu
 */
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



public function check_in() {
    // Ambil user_id dari session
    $user_id = $this->session->userdata('users_id');
    if (!$user_id) {
        redirect('login');
    }

    // Ambil role user dari session
    $user_role = $this->session->userdata('roles'); 

    // Ambil shift user yang sedang berlangsung
    $current_date = date('Y-m-d');
    $user_shift = $this->PresensiModel->get_user_shift($user_id, $current_date);

    if (!$user_shift) {
        echo "Shift tidak ditemukan.";
        return;
    }

    // Waktu saat ini (untuk cek in)
    $current_time = date('H:i:s');

    // Hitung durasi keterlambatan (dalam menit)
    $shift_start_time = new DateTime($user_shift->jam_mulai);
    $check_in_time = new DateTime($current_time);
    $interval = $shift_start_time->diff($check_in_time);
    $minutes_late = $interval->h * 60 + $interval->i;

    // Cek jika user terlambat
    $is_late = ($minutes_late > $user_shift->durasi) ? 1 : 0;
    $lama_terlambat = $is_late ? $minutes_late : 0;

    // Load library upload
    $this->load->library('upload');
    
    // Proses upload foto
    $photo_path = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $config['upload_path'] = './upload/presensi/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 10048; // 10MB
        $config['file_name'] = $user_id . '_' . time() . '_' . $_FILES['photo']['name'];
        $this->upload->initialize($config);

        if ($this->upload->do_upload('photo')) {
            $photo_data = $this->upload->data();
            $photo_path = $photo_data['file_name']; // Path yang benar
        } else {
            $error = $this->upload->display_errors();
            echo "Upload foto gagal: " . $error;
            return;
        }
    } else {
        echo "File tidak ada atau terjadi kesalahan saat upload.";
        return;
    }

    // Simpan data ke tabel presensi
    $data = array(
        'presensi_id' => md5(date('YmdHis') . rand(1000, 9999)),
        'users_id' => $user_id,
        'shift_id' => $user_shift->shift_id,
        'tanggal' => $current_date,
        'waktu_masuk' => $current_time,
        'terlambat' => $is_late,
        'lama_terlambat' => $lama_terlambat,
        'jenis_presensi' => 'Kerja',
        'photo_path' => $photo_path,  // Simpan path foto
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    );

    $this->db->insert('presensi', $data);

    // Set alert message berdasarkan status kehadiran
    if ($is_late) {
        $this->session->set_flashdata('alert', '<div class="alert alert-info">Anda terlambat '.$lama_terlambat.' Menit</div>');
    } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-info">Anda berhasil cek-in !</div>');
    }

    // Redirect ke halaman yang sesuai berdasarkan roles
    if ($user_role === 'Karyawan') {
         redirect('presensi/addpresensi'); // Redirect ke halaman umum / dashboard

    } else {
        redirect('dashboard');  // Redirect ke halaman karyawan

    }
}

public function check_out() {
    // Ambil user_id dari session
    $user_id = $this->session->userdata('users_id');
    if (!$user_id) {
        redirect('login');
    }

    // Ambil role user dari session
    $user_role = $this->session->userdata('roles');

    // Ambil data presensi hari ini berdasarkan user_id dan tanggal
    $current_date = date('Y-m-d');
    $this->db->where('users_id', $user_id);
    $this->db->where('tanggal', $current_date);
    $presensi = $this->db->get('presensi')->row();

    // Jika presensi belum ada, tampilkan pesan kesalahan
    if (!$presensi) {
        echo "Anda belum check in hari ini.";
        return;
    }

    // Waktu saat ini (untuk cek out)
    $current_time = date('H:i:s');

    // Ambil data shift untuk mengecek apakah karyawan keluar lebih awal
    $this->db->where('shift_id', $presensi->shift_id);
    $shift = $this->db->get('shifts')->row();

    if (!$shift) {
        echo "Data shift tidak ditemukan.";
        return;
    }

    // Tentukan apakah karyawan keluar lebih awal dari jam selesai shift
    $lebih_awal = ($current_time < $shift->jam_selesai) ? 'Ya' : 'Tidak';

    // Hitung durasi keluar lebih awal jika diperlukan
    $waktu_lebih_awal = '';
    if ($lebih_awal === 'Ya') {
        $shift_end_time = new DateTime($shift->jam_selesai);
        $check_out_time = new DateTime($current_time);
        $interval = $check_out_time->diff($shift_end_time);
        $waktu_lebih_awal = $interval->format('%H:%I:%S'); // Format durasi
    }

    // Proses upload foto (jika ada)
    $photo_path = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $config['upload_path'] = './upload/presensiout/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = time() . '_' . $_FILES['photo']['name'];

        $this->upload->initialize($config);

        if ($this->upload->do_upload('photo')) {
            $photo_data = $this->upload->data();
            $photo_path = $photo_data['file_name'];
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-info">Anda gagal upload check-out!</div>');
            $this->session->set_flashdata('alert_timeout', 4000);
            redirect('presensi/addpresensi');
        }
    }

    // Update data presensi dengan waktu keluar, status lebih awal, dan foto
    $data = [
        'waktu_keluar' => $current_time,
        'lebih_awal' => $lebih_awal,  // 'Ya' jika keluar lebih awal dari jam shift
        'waktu_lebih_awal' => $waktu_lebih_awal,  // Durasi waktu jika keluar lebih awal dari jam shift
        'photo_path_keluar' => $photo_path,  // Simpan path foto check-out (jika ada)
        'updated_at' => date('Y-m-d H:i:s')
    ];

    $this->db->where('presensi_id', $presensi->presensi_id);
    if ($this->db->update('presensi', $data)) {
        // Set alert message untuk check-out berhasil
        $this->session->set_flashdata('alert', '<div class="alert alert-info">Anda berhasil check-out!</div>');
        $this->session->set_flashdata('alert_timeout', 4000);

        // Redirect ke halaman yang sesuai berdasarkan roles
        if ($user_role === 'Karyawan') {
           redirect('presensi/addpresensi'); // Redirect ke halaman karyawan
        } else {
            redirect('dashboard');  // Redirect ke halaman umum / dashboard
        }
    } else {
        // Set alert message untuk check-out gagal
        $this->session->set_flashdata('alert', '<div class="alert alert-info">Anda gagal check-out!</div>');
        $this->session->set_flashdata('alert_timeout', 4000);
        redirect('presensi/addpresensi');
    }
}



}
