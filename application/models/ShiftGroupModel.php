<?php
class ShiftGroupModel extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_all_shift_groups() {
        $query = $this->db->get('shift_groups');
        return $query->result();
    }

   public function get_group_by_user($user_id) {
    $this->db->select('shift_groups.*');
    $this->db->from('users_shift_groups');
    $this->db->join('shift_groups', 'users_shift_groups.shift_group_id = shift_groups.shift_group_id');
    $this->db->where('users_shift_groups.users_id', $user_id);
    $this->db->where('users_shift_groups.hari <=', date('w', strtotime())); 
    $this->db->order_by('users_shift_groups.hari', 'DESC');
    $query = $this->db->get();
    return $query->row(); // Mengembalikan satu baris hasil
}

public function get_shift_groups_by_day($day) {
    $this->db->select('shift_groups.*');
    $this->db->from('group_shifts');
    $this->db->join('shift_groups', 'group_shifts.shift_group_id = shift_groups.shift_group_id');
    $this->db->where('DAYOFWEEK(group_shifts.created_at)', date('w', strtotime($day))); 
    $query = $this->db->get();
    return $query->result();
}


public function get_shift_by_group_and_date($shift_group_id, $hari) {
    $this->db->select('shifts.*');
    $this->db->from('group_shifts');
    $this->db->join('shifts', 'group_shifts.shift_id = shifts.shift_id');
    $this->db->where('group_shifts.shift_group_id', $shift_group_id);
    $this->db->where('DATE(group_shifts.created_at)', $hari); // Asumsi `created_at` digunakan untuk mendeteksi shift pada hari tertentu
    $query = $this->db->get();
    return $query->row(); // Mengembalikan satu baris hasil
}

 public function get_group_by_users($user_id) {
        $this->db->select('shift_groups.*');
        $this->db->from('users_shift_groups');
        $this->db->join('shift_groups', 'users_shift_groups.shift_group_id = shift_groups.shift_group_id');
        $this->db->where('users_shift_groups.users_id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan satu baris data jika ditemukan
        } else {
            return null; // Mengembalikan null jika tidak ditemukan
        }
    }


    public function get_shift_group_by_id($shift_group_id) {
        $query = $this->db->get_where('shift_groups', array('shift_group_id' => $shift_group_id));
        return $query->row_array();
    }

    public function insert($data) {
        return $this->db->insert('shift_groups', $data);
    }

    public function update($shift_group_id, $data) {
        $this->db->where('shift_group_id', $shift_group_id);
        return $this->db->update('shift_groups', $data);
    }

    public function delete($shift_group_id) {
        return $this->db->delete('shift_groups', array('shift_group_id' => $shift_group_id));
    }
}
