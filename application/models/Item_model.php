<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends MY_Model{
    public function __construct()
    {
        $this->table = 'item';
        $this->primary_key = 'item_id';
        $this->protected = array('created_at', 'update_at','deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
        $this->has_one['item_img'] = array(
            'foreign_model' => 'Item_img_model',
            'foreign_table' => 'item_img',
            'foreign_key' => 'item_id',
            'local_key' => 'item_id'
        );
        $this->has_many['item_category'] = array(
            'foreign_model'=>'Item_category_model',
            'foreign_table'=>'item_category',
            'foreign_key'=>'item_id',
            'local_key'=>'item_id'
        );
        $this->has_many['item_prd'] = array(
            'foreign_model' => 'Item_prd_model',
            'foreign_table' => 'item_prd',
            'foreign_key' => 'item_id',
            'local_key' => 'item_id'
        );
        $this->has_many['transaction_in'] = array(
            'foreign_model' => 'Transaction_in_model',
            'foreign_table' => 'transaction_in',
            'foreign_key' => 'item_id',
            'local_key' => 'item_id'
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
