<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends MY_Model{
    public function __construct()
    {
        // config
        $this->table = 'user';
        $this->primary_key = 'user_id';
        $this->protected = array('created_at', 'update_at','deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
        parent::__construct();
    }

    public function user_counter()
    {
        // config
        $this->table = 'user';
        $this->primary_key = 'user_id';
        $this->protected = array('created_at', 'update_at','deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
    }

    public function category_counter()
    {
        // config
        $this->table = 'category';
        $this->primary_key = 'category_id';
        $this->protected = array('created_at', 'update_at','deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
    }

}
?>
