<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item  extends MY_Controller{

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('Item_model','item_model');

        // save session url
        $this->save_session_url(current_url());
    }

    public function index()
    {
        $page = array();

        // config page
        $this->template->add_title_segment('Item');

        // get all data
        $items = $this->item_model->get_all();

        // inisialisasi struktur
        $page['items'] = $items;

        // return to view
        $this->template->render('Item', $this->data);

    }

    public function save()
    {
        // get id from post['id']`
        $id = $this->input->post('id');

        // store result query
        $item = $this->item_model->where('item_id', $id)->get();

        // store post[] into array
        $item_data = array(
                'item_id'       => $id,
                'item_paloma'     => $this->input->post('item_paloma'),
                'item_fast'     => $this->input->post('item_fast'),
                'item_name' => $this->input->post('item_name'),
                'item_hrg_modal'    => $this->input->post('item_hrg_modal'),
                'item_hrg_jual'    => $this->input->post('item_hrg_jual'),
        );

        // check if exist
        if ($item) {
            try {
                // store proses kedalam variabel
                $item_update = $this->item_model->update($item_data,'item_id');

                // cek jika berhasil diupdate
                if ($item_update) {
                    // set session temp message
                    $this->pesan->berhasil('Data Item berhasil diupdate.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data Item gagal diupdate.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        } else {
            try {
                // store proses kedalam variabel
                $item_create = $this->item_model->insert($item_data);

                // check jika berhasil dibuat
                if ($item_create) {
                    // set session temp message
                    $this->pesan->berhasil('Data Item berhasil dibuat.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data Item gagal dibuat.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        }

        // redirect to Index
        redirect('item');

    }

    public function add()
    {
        // create guid()
        $id = $this->item_model->guid();

        // inisialisasi struktur
        $this->data->id = $id;

        // return to view
        $this->load->view('CRUD_Item', $this->data);
    }

    public function edit($id)
    {
        // get data from param id
        $item = $this->item_model->where('item_id', $id)->get();

        // cek if not exists
        if (! $item) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('item');
        }

        // inisialisasi struktur
        $this->data->item = $item;

        // return to view
        $this->load->view('CRUD_Item', $this->data);

    }

    public function delete($id)
    {
        // get data from param id
        $item = $this->item_model->where('item_id', $id)->get();

        // cek if not exists
        if (! $item) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('item');
        }

        try {
            // store proses kedalam variabel
            $item_delete = $this->item_model->where('item_id', $id)->delete();

            // cek jika berhasil dihapus
            if ($item_delete) {
                // set session temp message
                $this->pesan->berhasil('Data Item berhasil dihapus.');
            } else {
                // set session temp message
                $this->pesan->gagal('Data Item gagal dihapus.');
            }
        } catch (\Exception $e) {
            // set session temp message
            $this->pesan->gagal('ERROR : ' . $e);
        }

        //redirect
        redirect('item');
    }

}
?>
