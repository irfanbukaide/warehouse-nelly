<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load library
        $this->load->library('session');
        $this->load->library('pesan');

        // load helper
        $this->load->helper('url');

        // load model
        $this->load->model('User_model', 'user_model');
    }

    public function login($mode = 'index')
    {
        if ($mode == 'do') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_data = array(
                'user_name' => $username,
                'user_password' => $password
            );

            $user = $this->user_model->where($user_data)->get();

            if ($user) {
                $session_data = array(
                    'user_id' => $user->user_id,
                    'user_fullname' => $user->user_fullname,
                    'user_name' => $user->user_name,
                    'user_admin' => $user->user_admin,
                );

                $this->session->set_userdata($session_data);
                redirect('/');
            } else {
                $this->pesan->gagal('Username atau password salah.');
                redirect('auth/login');
            }

        } else {
            $this->load->view('Login');
        }

    }

    public function logout()
    {

    }
}