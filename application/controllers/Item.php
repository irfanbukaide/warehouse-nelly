<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('Item_model', 'item_model');
        $this->load->model('Item_img_model', 'item_img_model');
        $this->load->model('Category_model', 'category_model');
        $this->load->model('Item_category_model', 'item_category_model');

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
        if ($items != NULL) {
            foreach ($items as $item) {
                $item_category = $this->item_category_model->with_category()->where('item_id', $item->item_id)->get();
                $item_img = $this->item_img_model->where('item_id', $item->item_id)->get();
                if (isset($item_category->category)) {
                    $item->category = $item_category->category->category_name;
                }

                if ($item_img) {
                    $item->item_image = 'data:' . $item_img->item_img_type . ';base64, ' . ((base64_encode($item_img->item_img_data)));
                } else {
                    $item->item_image = NULL;
                }
            }
        }

        // inisialisasi struktur
        $page['items'] = $items;

        // return to view
        $this->template->render('Item', $page);


//        echo '<pre>';
//        var_dump($items);
//        echo '</pre>';

    }

    public function save()
    {
        // get id from post['id']`
        $id = $this->input->post('item_id');
        $category_id = $this->input->post('category_id');

        // store result query
        $item = $this->item_model->where('item_id', $id)->get();
        $item_category = $this->item_category_model->where(array('item_id' => $id, 'category_id' => $category_id))->get();

        // store post[] into array
        $item_data = array(
            'item_id' => $id,
            'item_code' => $this->input->post('item_code'),
            'item_code2' => $this->input->post('item_code2'),
            'item_status' => $this->input->post('item_status'),
            'item_description' => $this->input->post('item_description'),
        );

        $item_category_data = array(
            'item_category_id' => $this->item_category_model->guid(),
            'item_id' => $id,
            'category_id' => $category_id
        );

        // check relasi
        if ($item_category) {
            try {
                $this->item_category_model->update($item_category_data, 'item_category_id');
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }
        } else {
            try {
                $this->item_category_model->insert($item_category_data);
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }
        }

        // check if exist
        if ($item) {
            try {
                // store proses kedalam variabel
                $item_update = $this->item_model->update($item_data, 'item_id');

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
        $page = array();
        $page['mode'] = 'create';

        // config page
        $this->template->add_title_segment('Add Item');

        // create guid()
        $id = 'IEM-' . date('ymd-hi-s');
        $categories = $this->category_model->get_all();

        // inisialisasi struktur
        $page['id'] = $id;
        $page['categories'] = $categories;

        // return to view
        $this->template->render('CRUD/CRUD_Item', $page);
    }

    public function edit($id)
    {
        $page = array();
        $page['mode'] = 'edit';

        // config page
        $this->template->add_title_segment('Edit Item');

        // get data from param id

        $item = $this->item_model->where('item_id', $id)->get();
        $category = $this->item_category_model->where('item_id', $id)->get();
        if ($category) {
            $item->category_id = $category->category_id;
        } else {
            $item->category_id = '';
        }

        $categories = $this->category_model->get_all();

        // cek if not exists
        if (!$item) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('item');
        }

        // inisialisasi struktur
        $page['item'] = $item;
        $page['categories'] = $categories;

        // return to view
        $this->template->render('CRUD/CRUD_Item', $page);

    }

    public function delete($id)
    {
        // get data from param id
        $item = $this->item_model->where('item_id', $id)->get();

        // cek if not exists
        if (!$item) {
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
