<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qty extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load library
        $this->load->model('Item_model', 'item_model');
        $this->load->model('Item_prd_model', 'item_prd_model');
        $this->load->model('Item_qty_type_model', 'item_qty_type_model');
    }

    public function index()
    {
        $page = array();

        // config page
        $this->template->add_title_segment('Production');

        // create guid()
        $id = 'PRD-' . date('ymd-hi-s');;

        // get data
//        $qtys = $this->item_prd_model->with_item()->where('item_prd_date', date('Y-m-d'))->get_all();
        $qtys = $this->item_prd_model->get_all();
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
                $item = $this->item_model->where('item_id', $qty->item_id)->get();

                if ($item) {
                    $qty->item_name = $item->item_code;

                    if (isset($item->item_code2) && $item->item_code) {
                        $qty->item_name = $qty->item_name . ' (' . $item->item_code2 . ')';
                    }
                }
                $qty->sablon_rusak = $qty->item_prd_bahan - $qty->item_prd_sablon;
                $qty->jahit_rusak = $qty->item_prd_sablon - $qty->item_prd_jahit;
                $qty->finish_total = $qty->item_prd_jahit;
            }

            foreach ($qtys as $qty) {
                $bahan_total += $qty->item_prd_bahan;
                $sablon_total += $qty->item_prd_sablon;
                $jahit_total += $qty->item_prd_jahit;
                $sablon_rusak += $qty->sablon_rusak;
                $jahit_rusak += $qty->jahit_rusak;
                $grand_total += $qty->finish_total;
            }
        }

        if ($items) {
            foreach ($items as $item) {
                if (isset($item->item_code2) && $item->item_code2) {
                    $item->item_name = $item->item_code . ' (' . $item->item_code2 . ')';
                } else {
                    $item->item_name = $item->item_code;
                }
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
        $id = $this->input->post('item_prd_id');

        // store result query
        $item_qty = $this->item_prd_model->where('item_prd_id', $id)->get();

        // store post[] into array
        $item_qty_data = array(
            'item_prd_id' => $id,
            'item_prd_date' => date('Y-m-d H:i:s'),
            'item_id' => $this->input->post('item_id'),
            'item_prd_bahan' => $this->input->post('item_prd_bahan'),
            'item_prd_sablon' => $this->input->post('item_prd_sablon'),
            'item_prd_jahit' => $this->input->post('item_prd_jahit')
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
                $item_qty_update = $this->item_prd_model->update($item_qty_data, 'item_prd_id');

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
                $item_qty_create = $this->item_prd_model->insert($item_qty_data);

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