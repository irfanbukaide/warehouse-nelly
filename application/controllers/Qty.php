<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qty extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load library
        $this->load->model('Item_model', 'item_model');
        $this->load->model('Item_qty_model', 'item_qty_model');
    }

    public function index()
    {
        $page = array();

        // set mode
        $page['mode'] = 'create';

        // config page
        $this->template->add_title_segment('Input QTY');

        // get data
        $items = $this->item_model->get_all();

        // create guid()
        $id = $this->item_qty_model->guid();

        // inisialisasi struktur
        $page['id'] = $id;
        $page['items'] = $items;

        // return to view
        $this->template->render('CRUD/CRUD_Qty', $page);
    }
}