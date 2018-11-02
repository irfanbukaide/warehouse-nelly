<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinces_model extends MY_Model
{
    public function __construct()
    {
        $this->table = 'provinces';
        $this->primary_key = 'id';
        $this->protected = array('created_at', 'update_at', 'deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
        parent::__construct();
    }

}

?>
