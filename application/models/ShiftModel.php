<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShiftModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_shifts() {
        $query = $this->db->get('shifts');
        return $query->result();
    }

	
	 public function get_shift_by_user($user_id) {
        $this->db->select('group_shifts.*, shifts.nama_shift, shifts.jam_mulai, shifts.jam_selesai, shifts.durasi');
        $this->db->from('users_shift_groups');
        $this->db->join('group_shifts', 'group_shifts.group_shift_id = users_shift_groups.group_shift_id');
        $this->db->join('shifts', 'shifts.shift_id = group_shifts.shift_id');
        $this->db->where('users_shift_groups.users_id', $user_id);
        $query = $this->db->get();

        return $query->result();
    }

public function get_next_shift_by_user($user_id, $current_shift_id) {
    $current_date = date('Y-m-d');
    $current_time = date('H:i:s');

    $this->db->select('shifts.*');
    $this->db->from('users_shift_groups');
    $this->db->join('group_shifts', 'group_shifts.group_shift_id = users_shift_groups.group_shift_id');
    $this->db->join('shifts', 'shifts.shift_id = group_shifts.shift_id');
    $this->db->where('users_shift_groups.users_id', $user_id);
    $this->db->where('shifts.shift_id !=', $current_shift_id); // Tidak termasuk shift yang sedang aktif
    $this->db->where('shifts.jam_mulai >', $current_time); // Shift setelah waktu sekarang
    $this->db->order_by('shifts.jam_mulai', 'ASC'); // Urutkan berdasarkan jam mulai untuk mendapatkan shift berikutnya
    $query = $this->db->get();

    return $query->row(); // Kembalikan shift berikutnya, null jika tidak ada
}



	public function get_current_shift($user_id) {
        $this->db->select('group_shifts.*, shifts.nama_shift, shifts.jam_mulai, shifts.jam_selesai, shifts.durasi');
        $this->db->from('users_shift_groups');
        $this->db->join('group_shifts', 'group_shifts.group_shift_id = users_shift_groups.group_shift_id');
        $this->db->join('shifts', 'shifts.shift_id = group_shifts.shift_id');
        $this->db->where('users_shift_groups.users_id', $user_id);
        $this->db->where('users_shift_groups.hari', date('l'));  // Ambil shift sesuai hari ini
        $query = $this->db->get();

        return $query->row();
    }

    // Method untuk mencatat presensi
    public function save_presensi($data) {
        $this->db->insert('presensi', $data);
    }

    public function get_shift_by_id($shift_id) {
        $query = $this->db->get_where('shifts', array('shift_id' => $shift_id));
        return $query->row();
    }

    public function insert($data) {
        return $this->db->insert('shifts', $data);
    }

    public function update($shift_id, $data) {
        $this->db->where('shift_id', $shift_id);
        return $this->db->update('shifts', $data);
    }

    public function delete($shift_id) {
        return $this->db->delete('shifts', array('shift_id' => $shift_id));
    }
}
