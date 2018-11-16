<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('Customer_model', 'customer_model');
        $this->load->model('Provinces_model', 'provinces_model');
        $this->load->model('Transaction_out_model', 'transaction_out');
        $this->load->model('Transaction_in_model', 'transaction_in');

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
        $this->template->add_title_segment('Customer');

        // get all data
        $customers = $this->customer_model->with_provinces()->get_all();

        // inisialisasi struktur
        $page['customers'] = $customers;

        // return to view
        $this->template->render('Customer', $page);

    }

    public function save()
    {
        // get id from post['id']`
        $id = $this->input->post('customer_id');

        // store result query
        $customer = $this->customer_model->where('customer_id', $id)->get();

        // store post[] into array
        $customer_data = array(
            'customer_id' => $id,
            'customer_name' => $this->input->post('customer_name'),
            'customer_contact' => $this->input->post('customer_contact'),
            'customer_email' => $this->input->post('customer_email'),
            'customer_pic' => $this->input->post('customer_pic'),
            'customer_address' => $this->input->post('customer_address'),
            'province_id' => $this->input->post('province_id')
        );

        // check if exist
        if ($customer) {
            try {
                // store proses kedalam variabel
                $customer_update = $this->customer_model->update($customer_data, 'customer_id');

                // cek jika berhasil diupdate
                if ($customer_update) {
                    // set session temp message
                    $this->pesan->berhasil('Data Customer berhasil diupdate.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data Customer gagal diupdate.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        } else {
            try {
                // store proses kedalam variabel
                $customer_create = $this->customer_model->insert($customer_data);

                // check jika berhasil dibuat
                if ($customer_create) {
                    // set session temp message
                    $this->pesan->berhasil('Data Customer berhasil dibuat.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data Customer gagal dibuat.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        }

        // redirect to Index
        redirect('customer');

    }

    public function add()
    {
        $page = array();
        $page['mode'] = 'create';

        // config page
        $this->template->add_title_segment('Add Customer');

        // create guid()
        $id = 'CTM-' . date('ymd-hi-s');
        $provinces = $this->provinces_model->get_all();

        // inisialisasi struktur
        $page['id'] = $id;
        $page['provinces'] = $provinces;

        // return to view
        $this->template->render('CRUD/CRUD_Customer', $page);
    }

    public function edit($id)
    {
        $page = array();
        $page['mode'] = 'edit';

        // config page
        $this->template->add_title_segment('Edit Customer');

        // get data from param id
        $customer = $this->customer_model->where('customer_id', $id)->get();
        $provinces = $this->provinces_model->get_all();

        // cek if not exists
        if (!$customer) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('customer');
        }

        // inisialisasi struktur
        $page['customer'] = $customer;
        $page['provinces'] = $provinces;

        // return to view
        $this->template->render('CRUD/CRUD_Customer', $page);

    }

    public function delete($id)
    {
        // get data from param id
        $customer = $this->customer_model->where('customer_id', $id)->get();

        $transaction_out = $this->transaction_out->where('customer_id', $id)->get();
        $transaction_in = $this->transaction_in->where('customer_id', $id)->get();

        // cek if not exists
        if (!$customer) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('customer');
        }

        if ($transaction_in OR $transaction_out) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak dapat dihapus karena masih digunakan dalam transaksi lain.');

            redirect('customer');
        }



        try {
            // store proses kedalam variabel
            $customer_delete = $this->customer_model->where('customer_id', $id)->delete();

            // cek jika berhasil dihapus
            if ($customer_delete) {
                // set session temp message
                $this->pesan->berhasil('Data Customer berhasil dihapus.');
            } else {
                // set session temp message
                $this->pesan->gagal('Data Customer gagal dihapus.');
            }
        } catch (\Exception $e) {
            // set session temp message
            $this->pesan->gagal('ERROR : ' . $e);
        }

        //redirect
        redirect('customer');
    }

}
?>
