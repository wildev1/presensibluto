<?php
class UsersShiftGroup extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
        $this->load->model('GroupShiftModel');
        $this->load->model('UsersShiftGroupModel');
        $this->load->library('form_validation');
    }

   public function index() {
		$this->data['title'] = 'Jadwal Pegawai';
		$this->data['users'] = $this->UsersModel->get_all_users();
		$this->data['shift_groups'] = $this->GroupShiftModel->get_all_group_shifts();
		$this->data['users_shift_groups'] = $this->UsersShiftGroupModel->get_all_users_shift_groups();

		foreach ($this->data['users_shift_groups'] as &$user_shift_group) {
			$user_shift_group->shift_groups = $this->UsersShiftGroupModel->get_shift_groups_by_user($user_shift_group->users_id);
		}

		$this->data['content_view'] = 'pages/usersshift/index';
		$this->load->view('templates/content', $this->data);
	}

   public function create() {
		$this->form_validation->set_rules('users_id', 'User', 'required');
		$this->form_validation->set_rules('group_shift_id', 'Shift Group', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('usersShiftGroup');
		} else {
			$users_id = $this->input->post('users_id');
			$group_shift_id = $this->input->post('group_shift_id');
			$existing = $this->UsersShiftGroupModel->check_duplicate($users_id, $group_shift_id);
			if ($existing) {
				$this->session->set_flashdata('error', 'Data sudah ada.');
				redirect('usersShiftGroup');
			} else {
				$data = array(
					'users_shift_group_id' => md5(date('YmdHis') . rand(1000, 9999)),
					'users_id' => $users_id,
					'group_shift_id' => $group_shift_id,
				);

				try {
					$this->UsersShiftGroupModel->insert($data);
					$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
				} catch (Exception $e) {
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan data.');
				}

				redirect('usersShiftGroup');
			}
		}
	}


    public function update($users_shift_group_id) {
        $this->form_validation->set_rules('users_id', 'User', 'required');
        $this->form_validation->set_rules('group_shift_id', 'Shift Group', 'required');

        if ($this->form_validation->run() === FALSE) {
               redirect('usersShiftGroup');
        } else {
            $data = array(
                'users_id' => $this->input->post('users_id'),
                'group_shift_id' => $this->input->post('group_shift_id'),
            );
            $this->UsersShiftGroupModel->update($users_shift_group_id, $data);
            redirect('usersShiftGroup');
        }
    }

    public function delete($users_id) {
		if ($this->UsersShiftGroupModel->delete_by_user($users_id)) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus data.');
		}
		redirect('usersShiftGroup');
	}

}
