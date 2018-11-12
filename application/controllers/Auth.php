<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('User_model', 'user_model');

        var_dump($this->get_session_url());
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

                if ($this->get_session_url()) {
                    redirect($this->get_session_url());
                } else {
                    redirect('/');
                }
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
        $data_session = array('user_id', 'user_fullname', 'user_name', 'user_admin');
        $this->session->unset_userdata($data_session);

        $this->pesan->berhasil('Anda telah berhasil logout.');

        redirect('auth/login');
    }
}