<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load library
        $this->load->library('session');

        // load helper
        $this->load->helper('url');

        // load model
        $this->load->model('User_model', 'user_model');
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}