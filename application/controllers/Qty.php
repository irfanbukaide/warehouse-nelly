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

        // config page
        $this->template->add_title_segment('QTY');

        // create guid()
        $id = $this->item_qty_model->guid();

        // get data
//        $qtys = $this->item_qty_model->with_item()->where('item_qty_date', date('Y-m-d'))->get_all();
        $qtys = $this->item_qty_model->counters();
        $items = $this->item_model->get_all();

        // sum
        $bahan_total = 0;
        $jahit_total = 0;
        $sablon_total = 0;
        $sablon_rusak = 0;
        $jahit_rusak = 0;
        $grand_total = 0;
        if ($qtys != NULL) {
            foreach ($qtys as $qty) {
                $qty->sablon_rusak = $qty->item_qty_bahan - $qty->item_qty_sablon;
                $qty->jahit_rusak = $qty->item_qty_sablon - $qty->item_qty_jahit;
                $qty->finish_total = $qty->item_qty_jahit;
            }

            foreach ($qtys as $qty) {
                $bahan_total += $qty->item_qty_bahan;
                $sablon_total += $qty->item_qty_sablon;
                $jahit_total += $qty->item_qty_jahit;
                $sablon_rusak += $qty->sablon_rusak;
                $jahit_rusak += $qty->jahit_rusak;
                $grand_total += $qty->finish_total;
            }
        }


        // inisialisasi struktur
        $page['id'] = $id;
        $page['qtys'] = $qtys;
        $page['items'] = $items;
        $page['bahan_total'] = $bahan_total;
        $page['sablon_total'] = $sablon_total;
        $page['jahit_total'] = $jahit_total;
        $page['sablon_rusak'] = $sablon_rusak;
        $page['jahit_rusak'] = $jahit_rusak;
        $page['grand_total'] = $grand_total;

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
            'item_qty_date' => date('Y-m-d'),
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