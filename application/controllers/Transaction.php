<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('Customer_model', 'customer_model');
        $this->load->model('Item_model', 'item_model');
        $this->load->model('Item_prd_model', 'item_prd_model');
        $this->load->model('Item_qty_model', 'item_qty_model');
        $this->load->model('Transaction_out_model', 'transaction_out');
        $this->load->model('Transaction_in_model', 'transaction_in');
        $this->load->model('Transaction_in_hrg_model', 'transaction_in_hrg');
        $this->load->model('Transaction_in_detil_model', 'transaction_in_detil');


        // load js
//        $this->template->add_js('https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js');

        // load css
//        $this->template->add_css('https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css');

    }

    public function index()
    {
        $this->template->add_title_segment('In & Out');

        $page = array();
        $page['mode'] = 'list';



        $this->template->render('Transaction_in');

    }

    public function in($mode = 'index')
    {

        $page = array();
        if ($mode == 'index') {
            $this->template->add_title_segment('List Transaction IN');
            $transaction_ins = $this->transaction_in->with_item()->with_transaction_in_hrg()->with_transaction_in_detil()->get_all();
            $page['transaction_ins'] = $transaction_ins;


            $this->template->render('Transaction_in', $page);

        } elseif ($mode == 'create') {
            $this->template->add_title_segment('Create Transaction IN');
            $id = 'IN-' . date('ymd-hi-s');
            $page['id'] = $id;

            $items = $this->item_model->with_item_prd()->get_all();
            $hasil = array();

            if ($items) {
                foreach ($items as $item) {
                    $item_prd = $this->item_prd_model->where(array('item_id' => $item->item_id, 'item_prd_stokin' => 0))->get();

                    if ($item_prd) {
                        $hasil[] = $item;
                    }
                }
                foreach ($hasil as $item) {
                    if (isset($item->item_code2) && $item->item_code2) {
                        $item->item_name = $item->item_code . ' (' . $item->item_code2 . ')';
                    } else {
                        $item->item_name = $item->item_code;
                    }
                }
            } else {
                $hasil = NULL;
            }

            $page['items'] = $hasil;

            $this->template->render('CRUD/CRUD_In', $page);
        } elseif ($mode == 'generate') {
            $transactin_id = $this->input->post('transaction_id');
            $transactin_date = $this->input->post('transaction_date');
            $transactin_item = $this->input->post('transaction_item');
            $transactin_qty = $this->input->post('transaction_qty');

            $item_prd_ids = $this->input->post('item_prd_id');

            $transactin_in_data = array(
                'transactin_id' => $transactin_id,
                'transactin_date' => date_format(date_create($transactin_date), 'Y-m-d H:i'),
                'item_id' => $transactin_item,
                'transactin_qty' => $transactin_qty,
                'transactin_status' => 0
            );

            $transactin_in_hrg_data = array(
                'transactin_id' => $transactin_id,
                'transactin_cost' => 0,
                'transactin_price' => 0,
            );

            $item_qty_data = array(
                'transactin_id' => $transactin_id,
                'item_id' => $transactin_item,
                'item_qty_total' => $transactin_qty
            );

            try {
                $transactin_in = $this->transaction_in->insert($transactin_in_data);
                $transactin_in_hrg = $this->transaction_in_hrg->insert($transactin_in_hrg_data);
                $item_qty = $this->item_qty_model->insert($item_qty_data);

                if (($transactin_in && $transactin_in_hrg) && $item_qty) {
                    foreach ($item_prd_ids as $item_prd_id) {
                        $transactin_in_detil_data = array(
                            'transactin_id' => $transactin_id,
                            'item_prd_id' => $item_prd_id,
                            'transactin_detil_qty' => $item_prd_total = $this->item_prd_model->where('item_prd_id', $item_prd_id)->get()->item_prd_jahit
                        );


                        $this->transaction_in_detil->insert($transactin_in_detil_data);
                        $this->item_prd_model->where('item_prd_id', $item_prd_id)->update(array('item_prd_stokin' => 1));
                    }
                }

                $this->pesan->berhasil('Transaksi IN telah berhasil');
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }
            redirect('transaction/in/index');
        }
    }

    public function out($mode = 'index')
    {
        $page = array();
        if ($mode == 'index') {
            $this->template->add_title_segment('List Transaction IN');
            $transaction_outs = $this->transaction_out->with_item()->with_customer()->get_all();
            $page['transaction_outs'] = $transaction_outs;


            $this->template->render('Transaction_out', $page);

        } elseif ($mode == 'create') {
            $this->template->add_title_segment('Create Transaction IN');
            $id = 'OT-' . date('ymd-hi-s');
            $page['id'] = $id;

            $items = $this->item_model->with_item_prd()->get_all();
            $hasil = array();

            if ($items) {
                foreach ($items as $item) {
                    $item_prd = $this->item_prd_model->where(array('item_id' => $item->item_id, 'item_prd_stokin' => 0))->get();

                    if ($item_prd) {
                        $hasil[] = $item;
                    }
                }
                foreach ($hasil as $item) {
                    if (isset($item->item_code2) && $item->item_code2) {
                        $item->item_name = $item->item_code . ' (' . $item->item_code2 . ')';
                    } else {
                        $item->item_name = $item->item_code;
                    }
                }
            } else {
                $hasil = NULL;
            }

            $page['items'] = $hasil;

            $this->template->render('CRUD/CRUD_Out', $page);
        } elseif ($mode == 'generate') {
            $transactin_id = $this->input->post('transaction_id');
            $transactin_date = $this->input->post('transaction_date');
            $transactin_item = $this->input->post('transaction_item');
            $transactin_qty = $this->input->post('transaction_qty');

            $item_prd_ids = $this->input->post('item_prd_id');

            $transactin_in_data = array(
                'transactin_id' => $transactin_id,
                'transactin_date' => date_format(date_create($transactin_date), 'Y-m-d H:i'),
                'item_id' => $transactin_item,
                'transactin_qty' => $transactin_qty,
                'transactin_status' => 0
            );

            $transactin_in_hrg_data = array(
                'transactin_id' => $transactin_id,
                'transactin_cost' => 0,
                'transactin_price' => 0,
            );

            try {
                $transactin_in = $this->transaction_in->insert($transactin_in_data);
                $transactin_in_hrg = $this->transaction_in_hrg->insert($transactin_in_hrg_data);

                if ($transactin_in && $transactin_in_hrg) {
                    foreach ($item_prd_ids as $item_prd_id) {
                        $transactin_in_detil_data = array(
                            'transactin_id' => $transactin_id,
                            'item_prd_id' => $item_prd_id,
                            'transactin_detil_qty' => $item_prd_total = $this->item_prd_model->where('item_prd_id', $item_prd_id)->get()->item_prd_jahit
                        );


                        $this->transaction_in_detil->insert($transactin_in_detil_data);
                        $this->item_prd_model->where('item_prd_id', $item_prd_id)->update(array('item_prd_stokin' => 1));
                    }
                }

                $this->pesan->berhasil('Transaksi IN telah berhasil');
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }
//            var_dump($_POST['item_prd_id']);
            redirect('transaction/in/index');
        }

    }


    public function delivery_order()
    {

    }


    public function api_get_prd($item_id = '')
    {
        if ($item_id == '') {
            $productions = $this->item_prd_model->get_all();
        } else {
            $productions = $this->item_prd_model->where('item_id', $item_id)->get_all();
        }


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
                    $production->item_name = isset($item->item_code2) && $item->item_code2 != '' ? $item->item_code . ' (' . $item->item_code2 . ')' : $item->item_code;
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

        $hasil = array();
        $repair = array();
        foreach ($productions as $k => $v) {
            $repair[$k]['item_prd_id'] = $v->item_prd_id;
            $repair[$k]['item'] = $v->item_name;
            $repair[$k]['bahan'] = $v->item_prd_bahan;
            $repair[$k]['sablon'] = $v->item_prd_sablon . ' / ' . $v->sablon_rusak;
            $repair[$k]['jahit'] = $v->item_prd_jahit . ' / ' . $v->jahit_rusak;
            $repair[$k]['total'] = $v->item_prd_jahit;
        }
        foreach ($repair as $k => $v) {
            $c = (array)$v;
            $hasil['data'][$k] = array_values($c);
        }

        echo json_encode($hasil);
    }


}