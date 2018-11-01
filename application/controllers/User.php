<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User  extends MY_Controller{

    public function __construct()
    {
        parent::__construct();

        // config
        $this->data->title = 'User';

        // load model
        $this->load->model('User_model','user_model');

        // save session url
        $this->save_session_url(current_url());
    }

    public function index()
    {
        // get all data
        $users = $this->user_model->get_all();

        // inisialisasi struktur
        $this->data->users = $users;

        // return to view
        $this->template->render('User', $this->data);

    }

    public function save()
    {
        // get id from post['id']`
        $id = $this->input->post('id');

        // store result query
        $user = $this->user_model->where('user_id', $id)->get();

        // store post[] into array
        $user_data = array(
                'user_id'       => $id,
                'user_name'     => $this->input->post('user_name'),
                'user_password' => $this->input->post('user_password'),
                'user_admin'    => $this->input->post('user_admin')
        );

        // check if exist
        if ($user) {
            try {
                // store proses kedalam variabel
                $user_update = $this->user_model->update($user_data,'user_id');

                // cek jika berhasil diupdate
                if ($user_update) {
                    // set session temp message
                    $this->pesan->berhasil('Data User berhasil diupdate.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data User gagal diupdate.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        } else {
            try {
                // store proses kedalam variabel
                $user_create = $this->user_model->insert($user_data);

                // check jika berhasil dibuat
                if ($user_create) {
                    // set session temp message
                    $this->pesan->berhasil('Data User berhasil dibuat.');
                } else {
                    // set session temp message
                    $this->pesan->gagal('Data User gagal dibuat.');
                }
            } catch (\Exception $e) {
                // set session temp message
                $this->pesan->gagal('ERROR : ' . $e);
            }

        }

        // redirect to Index
        redirect('user');

    }

    public function add()
    {
        // create guid()
        $id = $this->user_model->guid();

        // inisialisasi struktur
        $this->data->id = $id;

        // return to view
        $this->load->view('CRUD_User', $this->data);
    }

    public function edit($id)
    {
        // get data from param id
        $user = $this->user_model->where('user_id', $id)->get();

        // cek if not exists
        if (! $user) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('user');
        }

        // inisialisasi struktur
        $this->data->user = $user;

        // return to view
        $this->load->view('CRUD_User', $this->data);

    }

    public function delete($id)
    {
        // get data from param id
        $user = $this->user_model->where('user_id', $id)->get();

        // cek if not exists
        if (! $user) {
            // set session temp message
            $this->pesan->gagal('Mohon maaf data tidak ditemukan.');

            redirect('user');
        }

        try {
            // store proses kedalam variabel
            $user_delete = $this->user_model->where('user_id', $id)->delete();

            // cek jika berhasil dihapus
            if ($user_delete) {
                // set session temp message
                $this->pesan->berhasil('Data User berhasil dihapus.');
            } else {
                // set session temp message
                $this->pesan->gagal('Data User gagal dihapus.');
            }
        } catch (\Exception $e) {
            // set session temp message
            $this->pesan->gagal('ERROR : ' . $e);
        }

        //redirect
        redirect('user');
    }

}
?>
