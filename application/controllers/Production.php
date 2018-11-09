<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load library
        $this->load->model('Item_model', 'item_model');
        $this->load->model('Item_prd_model', 'item_prd_model');
    }

    public function index()
    {
        $page = array();

        // config page
        $this->template->add_title_segment('Production');

        // create guid()
        $id = 'PRD-' . date('ymd-hi-s');;

        // get data
//        $productions = $this->item_prd_model->with_item()->where('item_prd_date', date('Y-m-d'))->get_all();
        $productions = $this->item_prd_model->get_all();
        $items = $this->item_model->get_all();

        // sum
        $bahan_total = 0;
        $jahit_total = 0;
        $sablon_total = 0;
        $sablon_rusak = 0;
        $jahit_rusak = 0;
        $grand_total = 0;
        if ($productions != NULL) {
            foreach ($productions as $production) {
                $item = $this->item_model->where('item_id', $production->item_id)->get();

                if ($item) {
                    $production->item_name = $item->item_code;

                    if (isset($item->item_code2) && $item->item_code) {
                        $production->item_name = $production->item_name . ' (' . $item->item_code2 . ')';
                    }
                }
                $production->sablon_rusak = $production->item_prd_bahan - $production->item_prd_sablon;
                $production->jahit_rusak = $production->item_prd_sablon - $production->item_prd_jahit;
                $production->finish_total = $production->item_prd_jahit;
            }

            foreach ($productions as $production) {
                $bahan_total += $production->item_prd_bahan;
                $sablon_total += $production->item_prd_sablon;
                $jahit_total += $production->item_prd_jahit;
                $sablon_rusak += $production->sablon_rusak;
                $jahit_rusak += $production->jahit_rusak;
                $grand_total += $production->finish_total;
            }
        }

        if ($items) {
            foreach ($items as $item) {
                if (isset($item->item_code2) && $item->item_code2 != '') {
                    $item->item_name = $item->item_code . ' (' . $item->item_code2 . ')';
                } else {
                    $item->item_name = $item->item_code;
                }
            }
        }


        // inisialisasi struktur
        $page['id'] = $id;
        $page['productions'] = $productions;
        $page['items'] = $items;
        $page['bahan_total'] = $bahan_total;
        $page['sablon_total'] = $sablon_total;
        $page['jahit_total'] = $jahit_total;
        $page['sablon_rusak'] = $sablon_rusak;
        $page['jahit_rusak'] = $jahit_rusak;
        $page['grand_total'] = $grand_total;

        // return to view
        $this->template->render('CRUD/CRUD_Production', $page);
    }


    public function save()
    {
        // form validation
        $this->form_validation->set_rules('item_id', 'Item', 'required');
        $this->form_validation->set_rules('item_production_type', 'Item Type', 'required');

        // get id from post['id']`
        $id = $this->input->post('item_prd_id');

        // store result query
        $item_production = $this->item_prd_model->where('item_prd_id', $id)->get();

        // store post[] into array
        $item_production_data = array(
            'item_prd_id' => $id,
            'item_prd_date' => date('Y-m-d H:i:s'),
            'item_id' => $this->input->post('item_id'),
            'item_prd_bahan' => $this->input->post('item_prd_bahan'),
            'item_prd_sablon' => $this->input->post('item_prd_sablon'),
            'item_prd_jahit' => $this->input->post('item_prd_jahit')
        );

        // check if exist
        if ($item_production) {
            // validation
            if ($this->form_validation->run() === false && $item_production_data['item_production_name'] != $item_production->item_production_name) {
                echo 'false';
//                $this->template->render('CRUD/CRUD_Category', $item_production_data);
            }

            // try
            try {
                // store proses kedalam variabel
                $item_production_update = $this->item_prd_model->update($item_production_data, 'item_prd_id');

                // cek jika berhasil diupdate
                if ($item_production_update) {
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
//                $this->template->render('CRUD/CRUD_Category', $item_production_data);
            }

            // try
            try {
                // store proses kedalam variabel
                $item_production_create = $this->item_prd_model->insert($item_production_data);

                // check jika berhasil dibuat
                if ($item_production_create) {
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
        redirect('production');
    }
}