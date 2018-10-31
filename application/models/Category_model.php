<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model{
    public function __construct()
    {
        $this->table = 'category';
        $this->primary_key = 'category_id';
        $this->protected = array('created_at', 'update_at','deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
        $this->has_many['item_category'] = array(
            'foreign_model'=>'Item_category_model',
            'foreign_table'=>'item_category',
            'foreign_key'=>'category_id',
            'local_key'=>'category_id'
        );
        parent::__construct();
    }

    public function guid()
    {
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');

        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

}
?>
