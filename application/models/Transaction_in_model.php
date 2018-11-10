<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_in_model extends MY_Model
{
    public function __construct()
    {
        $this->table = 'transaction_in';
        $this->primary_key = 'transactin_id';
        $this->protected = array('created_at', 'update_at', 'deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
        $this->has_one['item'] = array(
            'foreign_model' => 'Item_model',
            'foreign_table' => 'item',
            'foreign_key' => 'item_id',
            'local_key' => 'item_id'
        );
        $this->has_one['transaction_in_hrg'] = array(
            'foreign_model' => 'Transaction_in_hrg_model',
            'foreign_table' => 'transaction_in_hrg',
            'foreign_key' => 'transactin_id',
            'local_key' => 'transactin_id'
        );
        $this->has_many['transaction_in_detil'] = array(
            'foreign_model' => 'Transaction_in_detil_model',
            'foreign_table' => 'transaction_in_detil',
            'foreign_key' => 'transactin_id',
            'local_key' => 'transactin_id'
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
