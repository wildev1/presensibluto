<?php
class PresensiModel extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

	public function get_all_presensi() {
		$this->db->select('
			presensi.*,
			shifts.nama_shift,
			shifts.jam_mulai,
			shifts.jam_selesai,
			users.nama,
			users.email
		');
		$this->db->from('presensi');
		$this->db->join('shifts', 'presensi.shift_id = shifts.shift_id');
		$this->db->join('users', 'presensi.users_id = users.users_id', 'left');
		$this->db->join('users_shift_groups', 'presensi.users_id = users_shift_groups.users_id', 'left');

		$this->db->group_by('presensi.presensi_id');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_presensi_by_date($date_awal, $date_akhir) {
		$this->db->select('
			presensi.*,
			shifts.nama_shift,
			shifts.jam_mulai,
			shifts.jam_selesai,
			users.nama,
			users.email
		');
		$this->db->from('presensi');
		$this->db->join('shifts', 'presensi.shift_id = shifts.shift_id');
		$this->db->join('users', 'presensi.users_id = users.users_id', 'left');
		$this->db->join('users_shift_groups', 'presensi.users_id = users_shift_groups.users_id', 'left');
		$this->db->where('tanggal >=', $date_awal);
		$this->db->where('tanggal <=', $date_akhir);
		$this->db->group_by('presensi.presensi_id');
		$query = $this->db->get();
		return $query->result();
	}

	 public function get_presensi_by_user_and_date($user_id, $date_awal, $date_akhir) {
        $this->db->select('p.*, s.nama_shift, s.jam_mulai, s.jam_selesai');
        $this->db->from('presensi p');
        $this->db->join('shifts s', 'p.shift_id = s.shift_id');
        $this->db->where('p.users_id', $user_id);
        $this->db->where('p.tanggal >=', $date_awal);
        $this->db->where('p.tanggal <=', $date_akhir);
        $this->db->order_by('p.tanggal', 'ASC');
        
        $query = $this->db->get();
        return $query->result();
    }


	 public function get_current_shift($user_id) {
        $current_day = date('l'); // Mengambil hari ini (misal 'Monday')

        $this->db->select('group_shifts.*, shifts.nama_shift, shifts.jam_mulai, shifts.jam_selesai, shifts.durasi');
        $this->db->from('users_shift_groups');
        $this->db->join('group_shifts', 'group_shifts.group_shift_id = users_shift_groups.group_shift_id');
        $this->db->join('shifts', 'shifts.shift_id = group_shifts.shift_id');
        $this->db->where('users_shift_groups.users_id', $user_id);
        
        $query = $this->db->get();

        return $query->row(); // Mengembalikan baris pertama hasil query atau NULL jika tidak ada
    }

	public function get_user_shift($user_id) {
		$this->db->select('group_shifts.*, shifts.nama_shift, shifts.jam_mulai, shifts.jam_selesai, shifts.durasi');
		$this->db->from('users_shift_groups');
		$this->db->join('group_shifts', 'group_shifts.group_shift_id = users_shift_groups.group_shift_id');
		$this->db->join('shifts', 'shifts.shift_id = group_shifts.shift_id');
		$this->db->where('users_shift_groups.users_id', $user_id);
		$query = $this->db->get();

		return $query->row();
	}

	  public function get_presensi_by_date_shift($user_id, $date, $shift_id) {
        $this->db->where('users_id', $user_id);
        $this->db->where('tanggal', $date);
        $this->db->where('shift_id', $shift_id);
        $query = $this->db->get('presensi');
        
        // Jika data ditemukan, kembalikan data presensi, jika tidak, kembalikan null
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return null;
    }

    // Menyimpan data absensi termasuk foto
    public function save_absensi($data) {
        return $this->db->insert('check_in_out_logs', $data);
    }

    // Mendapatkan data absensi berdasarkan user dan group shift
    public function get_absensi($users_id, $group_shift_id) {
        $this->db->where('users_id', $users_id);
        $this->db->where('group_shift_id', $group_shift_id);
        $query = $this->db->get('check_in_out_logs');
        return $query->row_array();
    }

    // Mendapatkan waktu mulai shift dari group_shift_id
    public function get_shift_start($group_shift_id) {
        $this->db->select('s.jam_mulai');
        $this->db->from('shifts s');
        $this->db->join('group_shifts gs', 's.shift_id = gs.shift_id');
        $this->db->where('gs.group_shift_id', $group_shift_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->jam_mulai : NULL;
    }

}
