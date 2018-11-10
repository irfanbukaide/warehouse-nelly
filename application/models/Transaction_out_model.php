<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_out_model extends MY_Model
{
    public function __construct()
    {
        $this->table = 'transaction_out';
        $this->primary_key = 'transactout_id';
        $this->protected = array('created_at', 'update_at', 'deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
        $this->has_one['item'] = array(
            'foreign_model' => 'Item_model',
            'foreign_table' => 'item',
            'foreign_key' => 'item_id',
            'local_key' => 'item_id'
        );
        $this->has_one['customer'] = array(
            'foreign_model' => 'Customer_model',
            'foreign_table' => 'customer',
            'foreign_key' => 'customer_id',
            'local_key' => 'customer_id'
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
