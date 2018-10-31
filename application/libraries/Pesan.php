<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan {
    private $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function berhasil($msg = '')
    {
        return $this->session->set_flashdata('berhasil', $msg);
    }

    public function gagal($msg = '')
    {
        return $this->session->set_flashdata('gagal', $msg);
    }
}
?>
