<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $page = array();

        $page['mode'] = 'list';

        $transactions = $this->transaction->get_all();
    }

    public function in()
    {

    }

    public function out()
    {

    }


    public function delivery_order()
    {

    }


}