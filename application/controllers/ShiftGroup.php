<?php
class ShiftGroup extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ShiftGroupModel');
    }

    public function index() {
		$this->data['title'] = 'Shift Group';
		
        $this->data['shift_groups'] = $this->ShiftGroupModel->get_all_shift_groups();
		$this->data['content_view'] = 'pages/shiftgroup/index';
        $this->load->view('templates/content', $this->data);
    }

    public function create() {
        $this->form_validation->set_rules('nama_group', 'Nama Group', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('shift_group_form');
        } else {
            $data = array(
                'shift_group_id' => md5(date('YmdHis') . rand(1000, 9999)),
                'nama_group' => $this->input->post('nama_group'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->ShiftGroupModel->insert($data);
            redirect('shiftGroup');
        }
    }

    public function update() {
		$shift_group_id = $this->input->post('shift_group_id');
        $this->form_validation->set_rules('nama_group', 'Nama Group', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['shiftGroup'] = $this->ShiftGroupModel->get_shift_group_by_id($shift_group_id);
            $this->load->view('shift_group_form', $data);
        } else {
            $data = array(
                'nama_group' => $this->input->post('nama_group'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->ShiftGroupModel->update($shift_group_id, $data);
            redirect('shiftGroup');
        }
    }

    public function delete() {
		$shift_group_id = $this->input->post('shift_group_id');
        $this->ShiftGroupModel->delete($shift_group_id);
        redirect('shiftGroup');
    }
}
