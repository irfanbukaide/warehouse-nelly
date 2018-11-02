<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier  extends MY_Controller{

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('User_model','supplier_model');

        // save session url
        $this->save_session_url(current_url());
    }

    public function index()
    {
        $page = array();

        // config page
        $this->template->add_title_segment('Supplier');

        // get all data
        $suppliers = $this->supplier_model->get_all();

        // inisialisasi struktur
        $page['suppliers'] = $suppliers;

        // return to view
        $this->template->render('Supplier', $page);

    }

    public function save()
    {
        // get id from post['id']`
        $id = $this->input->post('id');

        // store result query
        $supplier = $this->supplier_model->where('supplier_id', $id)->get();

        // store post[] into array
        $supplier_data = array(
                'supplier_id'       => $id,
                'supplier_name'     => $this->input->post('supplier_name'),
                'supplier_password' => $this->input->post('supplier_password'),
                'supplier_admin'    => $this->input->post('supplier_admin')
        );

        // check if exist
        if ($supplier) {
            try {
                // store proses kedalam variabel
                $supplier_update = $this->supplier_model->update($supplier_data,'supplier_id');

                // cek jika berhasil diupdate
                if ($supplier_update) {
                    // set session temp message
                    $this->pesan->berhasil('Data Supplier berhasil diupdate.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data Supplier gagal diupdate.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        } else {
            try {
                // store proses kedalam variabel
                $supplier_create = $this->supplier_model->insert($supplier_data);

                // check jika berhasil dibuat
                if ($supplier_create) {
                    // set session temp message
                    $this->pesan->berhasil('Data Supplier berhasil dibuat.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data Supplier gagal dibuat.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        }

        // redirect to Index
        redirect('supplier');

    }

    public function add()
    {
        $page = array();
        $page['mode'] = 'create';

        // config page
        $this->template->add_title_segment('Add Supplier');

        // create guid()
        $id = $this->supplier_model->guid();

        // inisialisasi struktur
        $page['id'] = $id;

        // return to view
        $this->template->render('CRUD/CRUD_Supplier', $page);
    }

    public function edit($id)
    {
        // get data from param id
        $supplier = $this->supplier_model->where('supplier_id', $id)->get();

        // cek if not exists
        if (! $supplier) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('supplier');
        }

        // inisialisasi struktur
        $this->data->supplier = $supplier;

        // return to view
        $this->load->view('CRUD_Supplier', $this->data);

    }

    public function delete($id)
    {
        // get data from param id
        $supplier = $this->supplier_model->where('supplier_id', $id)->get();

        // cek if not exists
        if (! $supplier) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('supplier');
        }

        try {
            // store proses kedalam variabel
            $supplier_delete = $this->supplier_model->where('supplier_id', $id)->delete();

            // cek jika berhasil dihapus
            if ($supplier_delete) {
                // set session temp message
                $this->pesan->berhasil('Data Supplier berhasil dihapus.');
            } else {
                // set session temp message
                $this->pesan->gagal('Data Supplier gagal dihapus.');
            }
        } catch (\Exception $e) {
            // set session temp message
            $this->pesan->gagal('ERROR : ' . $e);
        }

        //redirect
        redirect('supplier');
    }

}
?>
