<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ShiftModel');
    }

    public function index() {
		$this->data['title'] = 'Jam Kerja';

        $this->data['shifts'] = $this->ShiftModel->get_all_shifts();
		$this->data['content_view'] = 'pages/shift/index';
        $this->load->view('templates/content', $this->data);
    }

    public function create() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('shift');
        } else {
            $data = array(
                'shift_id' => md5(date('YmdHis') . rand(1000, 9999)),
                'nama_shift' => $this->input->post('nama_shift'),
                'jam_mulai' => $this->input->post('jam_mulai'),
                'jam_selesai' => $this->input->post('jam_selesai'),
                'durasi' => $this->input->post('durasi')
            );
            $this->ShiftModel->insert($data);
            redirect('shift');
        }
    }

    public function update() {
		$shift_id = $this->input->post('shift_id');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_shift', 'Nama Shift', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('durasi', 'Durasi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['shift'] = $this->ShiftModel->get_shift_by_id($shift_id);
            $this->load->view('shift_edit', $data);
        } else {
            $data = array(
                'nama_shift' => $this->input->post('nama_shift'),
                'jam_mulai' => $this->input->post('jam_mulai'),
                'jam_selesai' => $this->input->post('jam_selesai'),
                'durasi' => $this->input->post('durasi')
            );
            $this->ShiftModel->update($shift_id, $data);
            redirect('shift');
        }
    }

    public function delete() {
		$shift_id = $this->input->post('shift_id');
        $this->ShiftModel->delete($shift_id);
        redirect('shift');
    }
}
