<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_qty_model extends MY_Model
{
    public function __construct()
    {
        $this->table = 'item_qty';
        $this->primary_key = 'item_qty_id';
        $this->protected = array('created_at', 'update_at', 'deleted_at');
        $this->timestamps = TRUE;
        $this->soft_deletes = FALSE;
        $this->has_one['item'] = array(
            'foreign_model' => 'Item_model',
            'foreign_table' => 'item',
            'foreign_key' => 'item_id',
            'local_key' => 'item_id'
        );

//        $this->has_one['item_qty_type'] = array(
//            'foreign_model' => 'Item_qty_type_model',
//            'foreign_table' => 'item_qty_type',
//            'foreign_key' => 'type_id',
//            'local_key' => 'item_qty_type'
//        );
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

    public function counters()
    {
        $query = $this->db->query('select item_qty_date, item.item_name, sum(item_qty_bahan) as item_qty_bahan, sum(item_qty_sablon) as item_qty_sablon, sum(item_qty_jahit) as item_qty_jahit
                          from item_qty
                          left join item
                          on item_qty.item_id = item.item_id
                          group by item_qty.item_id; ');
        return $query->result();
    }

}

?>
