<?php
class GroupShift extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('GroupShiftModel');
        $this->load->model('ShiftGroupModel');
        $this->load->model('ShiftModel');

        $this->load->library('form_validation');
    }

    public function index() {
        
		$this->data['title'] = 'Jadwal Kerja ';
		
     	$this->data['group_shifts'] = $this->GroupShiftModel->get_all_group_shifts();
        $this->data['shifts'] = $this->ShiftModel->get_all_shifts();
		$this->data['content_view'] = 'pages/groupshift/index';
        $this->load->view('templates/content', $this->data);
    }

    public function create() {
        $this->form_validation->set_rules('group_shift', 'Shift Group', 'required');
        $this->form_validation->set_rules('shift_id', 'Shift', 'required');
		$hari = $this->input->post('hari');

        if ($this->form_validation->run() === FALSE) {
            redirect('groupShift');
        } else {
            $data = array(
                'group_shift_id' => md5(date('YmdHis') . rand(1000, 9999)),
                'group_shift' => $this->input->post('group_shift'),
                'shift_id' => $this->input->post('shift_id'),
				'hari' => $hari,
            );
            $this->GroupShiftModel->insert($data);
            redirect('groupShift');
        }
    }

    public function update() {
		$group_shift_id = $this->input->post('group_shift_id');
		$hari = $this->input->post('hari');
        $this->form_validation->set_rules('group_shift', 'Shift Group', 'required');
        $this->form_validation->set_rules('shift_id', 'Shift', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['group_shift'] = $this->GroupShiftModel->get_group_shift_by_id($group_shift_id);
            $data['shifts'] = $this->GroupShiftModel->get_shifts();
            $this->load->view('group_shift_form', $data);
        } else {
            $data = array(
                'group_shift' => $this->input->post('group_shift'),
                'shift_id' => $this->input->post('shift_id'),
                'hari' => $hari,
            );
            $this->GroupShiftModel->update($group_shift_id, $data);
            redirect('groupShift');
        }
    }

    public function delete() {
		$group_shift_id = $this->input->post('group_shift_id');

        $this->GroupShiftModel->delete($group_shift_id);
        redirect('groupShift');
    }
}
