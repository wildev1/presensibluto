<?php
class GroupShiftModel extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_all_group_shifts() {
        $this->db->select('group_shifts.*, shifts.nama_shift');
        $this->db->from('group_shifts');
        $this->db->join('shifts', 'group_shifts.shift_id = shifts.shift_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_group_shift_by_id($group_shift_id) {
        $this->db->select('group_shifts.*, shifts.nama_shift');
        $this->db->from('group_shifts');
        $this->db->join('shifts', 'group_shifts.shift_id = shifts.shift_id');
        $this->db->where('group_shifts.group_shift_id', $group_shift_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert($data) {
        return $this->db->insert('group_shifts', $data);
    }

    public function update($group_shift_id, $data) {
        $this->db->where('group_shift_id', $group_shift_id);
        return $this->db->update('group_shifts', $data);
    }

    public function delete($group_shift_id) {
        return $this->db->delete('group_shifts', array('group_shift_id' => $group_shift_id));
    }

    public function get_shift_groups() {
        $query = $this->db->get('shift_groups');
        return $query->result();
    }

    public function get_shifts() {
        $query = $this->db->get('shifts');
        return $query->result();
    }
}
