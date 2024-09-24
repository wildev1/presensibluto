<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_access($required_role){
    $ci =& get_instance();
    $user_role = $ci->session->userdata('role');

    if ($user_role !== $required_role) {
        $ci->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
        redirect('auth/login');
    }
}
