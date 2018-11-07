<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('Item_model', 'item_model');
        $this->load->model('Transaction_model', 'transaction_model');

    }

    public function index()
    {
        $this->template->add_title_segment('In & Out');

        $page = array();
        $page['mode'] = 'list';

        $transactions = $this->transaction_model->get_all();
        $page['transactions'] = $transactions;


        $this->template->render('Transaction');

    }

    public function in($mode = 'create')
    {
        $page = array();
        if ($mode == 'create') {
            $id = 'IN-' . date('ymdhis');
            $page['id'] = $id;

            $items = $this->item_model->get_all();

            if ($items) {
                foreach ($items as $item) {
                    if (isset($item->item_code2) && $item->item_code2) {
                        $item->item_name = $item->item_code . ' (' . $item->item_code2 . ')';
                    } else {
                        $item->item_name = $item->item_code;
                    }
                }
            } else {
                $items = NULL;
            }

            $page['items'] = $items;

            $this->template->render('CRUD/CRUD_In', $page);
        }
    }

    public function out()
    {

    }


    public function delivery_order()
    {

    }


}