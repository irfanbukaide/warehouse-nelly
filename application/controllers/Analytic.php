<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytic extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('Dashboard_model','user_model');

        // save session url
        $this->save_session_url(current_url());

        if (!isset($_SESSION['user_id'])) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $page = array();

        // config page
        $this->template->add_title_segment('Analytic');

        // get all data
        $users = $this->user_model->get_all();

        // inisialisasi struktur
        $page['users'] = $users;

        // return to view
        $this->template->render('Analytic', $page);

    }

}
?>
