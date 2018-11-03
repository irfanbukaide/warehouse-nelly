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
        $this->load->model('Item_qty_type_model', 'item_qty_type_model');
    }

    public function index()
    {
        $page = array();

        // set mode
        $page['mode'] = 'create';

        // config page
        $this->template->add_title_segment('Input QTY');

        // get data
        $qtys = $this->item_qty_model->with_item()->get_all();
        $items = $this->item_model->get_all();

        // create guid()
        $id = $this->item_qty_model->guid();

        // inisialisasi struktur
        $page['id'] = $id;
        $page['qtys'] = $qtys;
        $page['items'] = $items;

        // return to view
        $this->template->render('CRUD/CRUD_Qty', $page);
    }

    public function save()
    {
        // form validation
        $this->form_validation->set_rules('item_id', 'Item', 'required');
        $this->form_validation->set_rules('item_qty_type', 'Item Type', 'required');

        // get id from post['id']`
        $id = $this->input->post('item_qty_id');

        // store result query
        $item_qty = $this->item_qty_model->where('item_qty_id', $id)->get();

        // store post[] into array
        $item_qty_data = array(
            'item_qty_id' => $id,
            'item_id' => $this->input->post('item_id'),
            'item_qty_bahan' => $this->input->post('item_qty_bahan'),
            'item_qty_sablon' => $this->input->post('item_qty_sablon'),
            'item_qty_jahit' => $this->input->post('item_qty_jahit')
        );

        // check if exist
        if ($item_qty) {
            // validation
            if ($this->form_validation->run() === false && $item_qty_data['item_qty_name'] != $item_qty->item_qty_name) {
                echo 'false';
//                $this->template->render('CRUD/CRUD_Category', $item_qty_data);
            }

            // try
            try {
                // store proses kedalam variabel
                $item_qty_update = $this->item_qty_model->update($item_qty_data, 'item_qty_id');

                // cek jika berhasil diupdate
                if ($item_qty_update) {
                    // set session temp message
                    $this->pesan->berhasil('Berhasil membuat transaksi.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Gagal membuat transaksi.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        } else {
            // check validation
            if ($this->form_validation->run() === false) {
                echo 'false';
//                $this->template->render('CRUD/CRUD_Category', $item_qty_data);
            }

            // try
            try {
                // store proses kedalam variabel
                $item_qty_create = $this->item_qty_model->insert($item_qty_data);

                // check jika berhasil dibuat
                if ($item_qty_create) {
                    // set session temp message
                    $this->pesan->berhasil('Berhasil membuat transaksi.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Gagal membuat transaksi.');
                }

            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        }

        // redirect to Index
        redirect('qty');
    }
}