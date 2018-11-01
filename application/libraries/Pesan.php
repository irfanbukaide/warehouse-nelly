<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan {
    private $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }

    public function berhasil($msg = '')
    {
        return $this->CI->session->set_flashdata('berhasil', $msg);
    }

    public function gagal($msg = '')
    {
        return $this->CI->session->set_flashdata('gagal', $msg);
    }
}
?>
