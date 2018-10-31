<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard  extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        // config
        $this->data->title = 'Dashboard';

        // load model
        $this->load->model('Dashboard_model','user_model');

        // save session url
        $this->save_session_url(current_url());
    }

    public function index()
    {
        // get all data
        $users = $this->user_model->get_all();

        // inisialisasi struktur
        $this->data->users = $users;

        // return to view
        $this->template->render('Dashboard', $this->data);

    }

}
?>
