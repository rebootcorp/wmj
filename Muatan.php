<?php

class Muatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('muatan_model');
    }

    public function index() {
        $data['muatan'] = $this->muatan_model->getAll();
        $this->load->view('muatan/daftar_muatan', $data);
    }

    public function input_muatan() {
        $this->load->view('muatan/input_muatan');
    }

    public function update_muatan() {
        
    }

    public function konfirmasi_muatan() {
        $this->load->view('muatan/konfirmasi_muatan');
    }
}