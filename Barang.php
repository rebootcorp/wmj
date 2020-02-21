<?php

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('barang_model');
    }

    // Tambah Barang
    public function tambah_barang() {
        $data = array(
            'jml_coli' => $this->input->post('jml_coli'),
            'nama_barang' => $this->input->post('nama_barang'),
            'berat' => $this->input->post('berat'),
            'ongkos' => $this->input->post('ongkos'),
            'id_transaksi' => $this->input->post('id_transaksi')
        );

        $this->barang_model->add($data);
        echo json_encode(array("status" => true));
    }
    
    // Edit Barang
    public function edit_barang() {
        
        $data = array(
            'jml_coli' => $this->input->post('jml_coli'),
            'nama_barang' => $this->input->post('nama_barang'),
            'berat' => $this->input->post('berat'),
            'ongkos' => $this->input->post('ongkos'),
            'id_transaksi' => $this->input->post('id_transaksi')
        );

        $this->barang_model->update($data);
    }

    // Hapus Barang
    public function hapus_barang($id = null) {
        if (!isset($id)) show_404();
        $this->barang_model->delete($id);
        echo json_encode(array("status" => true));
    }
}