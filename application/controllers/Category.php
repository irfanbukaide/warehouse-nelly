<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category  extends MY_Controller{

    public function __construct()
    {
        parent::__construct();

        // config
        $this->data->title = 'Category';

        // load model
        $this->load->model('Category_model','category_model');

        // save session url
        $this->save_session_url(current_url());
    }

    public function index()
    {
        // get all data
        $categorys = $this->category_model->get_all();

        // inisialisasi struktur
        $this->data->categorys = $categorys;

        // return to view
        $this->template->render('Category', $this->data);

    }

    public function save()
    {
        // get id from post['id']`
        $id = $this->input->post('id');

        // store result query
        $category = $this->category_model->where('category_id', $id)->get();

        // store post[] into array
        $category_data = array(
                'category_id'       => $id,
                'category_name'     => $this->input->post('category_name'),
                'category_active'   => $this->input->post('category_active')
        );

        // check if exist
        if ($category) {
            try {
                // store proses kedalam variabel
                $category_update = $this->category_model->update($category_data,'category_id');

                // cek jika berhasil diupdate
                if ($category_update) {
                    // set session temp message
                    $this->pesan->berhasil('Data Category berhasil diupdate.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data Category gagal diupdate.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        } else {
            try {
                // store proses kedalam variabel
                $category_create = $this->category_model->insert($category_data);

                // check jika berhasil dibuat
                if ($category_create) {
                    // set session temp message
                    $this->pesan->berhasil('Data Category berhasil dibuat.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data Category gagal dibuat.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        }

        // redirect to Index
        redirect('category');

    }

    public function add()
    {
        // create guid()
        $id = $this->category_model->guid();

        // inisialisasi struktur
        $this->data->id = $id;

        // return to view
        $this->template->render('CRUD/CRUD_Category', $this->data);
    }

    public function edit($id)
    {
        // get data from param id
        $category = $this->category_model->where('category_id', $id)->get();

        // cek if not exists
        if (! $category) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('category');
        }

        // inisialisasi struktur
        $this->data->category = $category;

        // return to view
        $this->load->view('CRUD_Category', $this->data);

    }

    public function delete($id)
    {
        // get data from param id
        $category = $this->category_model->where('category_id', $id)->get();

        // cek if not exists
        if (! $category) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('category');
        }

        try {
            // store proses kedalam variabel
            $category_delete = $this->category_model->where('category_id', $id)->delete();

            // cek jika berhasil dihapus
            if ($category_delete) {
                // set session temp message
                $this->pesan->berhasil('Data Category berhasil dihapus.');
            } else {
                // set session temp message
                $this->pesan->gagal('Data Category gagal dihapus.');
            }
        } catch (\Exception $e) {
            // set session temp message
            $this->pesan->gagal('ERROR : ' . $e);
        }

        //redirect
        redirect('category');
    }

}
?>
