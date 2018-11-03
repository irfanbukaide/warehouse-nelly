<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('Category_model','category_model');

        // save session url
        $this->save_session_url(current_url());
    }

    public function index()
    {
        $page = array();

        // config page
        $this->template->add_title_segment('Category');

        // get all data
        $page['categories'] = $this->category_model->get_all();

        // return to view
        $this->template->render('Category', $page);

    }

    public function save()
    {
        // form validation
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[category.category_name]');

        // get id from post['id']`
        $id = $this->input->post('category_id');

        // store result query
        $category = $this->category_model->where('category_id', $id)->get();

        // store post[] into array
        $category_data = array(
            'category_id' => $id,
            'category_name' => $this->input->post('category_name'),
            'category_description' => $this->input->post('category_description'),
            'category_active' => $this->input->post('category_active')
        );

        // check if exist
        if ($category) {
            // validation
            if ($this->form_validation->run() === false && $category_data['category_name'] != $category->category_name) {
                echo 'false';
//                $this->template->render('CRUD/CRUD_Category', $category_data);
            }

            // try
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
            // check validation
            if ($this->form_validation->run() === false) {
                echo 'false';
//                $this->template->render('CRUD/CRUD_Category', $category_data);
            }

            // try
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
        $page = array();

        // set mode
        $page['mode'] = 'create';

        // config page
        $this->template->add_title_segment('Add Category');

        // create guid()
        $id = $this->category_model->guid();

        // inisialisasi struktur
        $page['id'] = $id;

        // return to view
        $this->template->render('CRUD/CRUD_Category', $page);
    }

    public function edit($id)
    {
        $page = array();

        // config page
        $this->template->add_title_segment('Edit Category');

        // set mode
        $page['mode'] = 'edit';

        // get data from param id
        $page['category'] = $this->category_model->where('category_id', $id)->get();

        // cek if not exists
        if ($page['category'] == NULL) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            // redirect to category url
            redirect('category');
        }

        // return to view
        $this->template->render('CRUD/CRUD_Category', $page);

    }

    public function delete($id)
    {
        // get data from param id
        $category = $this->category_model->where('category_id', $id)->get();

        // cek if not exists
        if ($category == NULL) {
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
