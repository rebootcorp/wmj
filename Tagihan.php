<?php

class Tagihan extends CI_Controller {
    public function index() {
        $this->load->view('tagihan/daftar_tagihan');
    }

    public function input_tagihan() {
        $this->load->view('tagihan/input_tagihan');
    }

    public function konfirmasi_tagihan() {
        $this->load->view('tagihan/konfirmasi_muatan');
    }
}