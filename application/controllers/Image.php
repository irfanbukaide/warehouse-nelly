<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('Item_model', 'item_model');
        $this->load->model('Item_img_model', 'item_img_model');

    }

    public function item_upload($id = NULL)
    {
        $page = array();

        $page['id'] = $id;

        $this->load->view('CRUD/CRUD_Item_upload', $page);
    }

    public function do_item_upload()
    {
        $item_id = $this->input->post('item_id');
        $imgData = file_get_contents($_FILES['item_img']['tmp_name']);
        $imageProperties = getimageSize($_FILES['item_img']['tmp_name']);

        $item_img_data = array(
            'item_id' => $item_id,
            'item_img_type' => $imageProperties['mime'],
            'item_img_data' => $imgData
        );

        $item_img = $this->item_img_model->where('item_id', $item_id)->get();

        if ($item_img) {
            // try
            try {
                // store proses kedalam variabel
                $item_img_update = $this->item_img_model->update($item_img_data, 'item_id');

                // check jika berhasil dibuat
                if ($item_img_update) {
                    // set session temp message
                    $this->pesan->berhasil('Gambar berhasil diperbarui.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Gambar gagal diperbarui.');
                }

            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }
        } else {
            // try
            try {
                // store proses kedalam variabel
                $item_img_create = $this->item_img_model->insert($item_img_data);

                // check jika berhasil dibuat
                if ($item_img_create) {
                    // set session temp message
                    $this->pesan->berhasil('Gambar berhasil dibuat.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Gambar gagal dibuat.');
                }

            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }
        }

    }
}