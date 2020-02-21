<?php

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('transaksi_model');
        $this->load->model('barang_model');
        $this->load->model('wilayah_model');
        $this->load->model('jenis_barang_model');
        $this->load->model('pembayaran_model');
    }

    // Menampilkan Daftar Transaksi
    public function index() {
        $_SESSION['barang'] = array();
        $data["transaksi"] = $this->transaksi_model->getAll();
        $this->load->view('transaksi/daftar_transaksi', $data);
    }

    // Menambah Barang Session
    public function tambah_barang() {
        $jml = $this->input->post('jml_coli');
        $nma = $this->input->post('nama_barang');
        $brt = $this->input->post('berat');
        $kos = $this->input->post('ongkos');

        $_SESSION['barang'][] = array(
            'jml' => $jml,
            'nama_barang' => $nma,
            'berat' => $brt,
            'ongkos' => $kos
            );
    }

    // Hapus Barang Session
    public function hapus_barang() {
        unset($_SESSION['barang'][$_POST['id']]);
    }

    // Tampil Halaman Input
    public function input_transaksi() {
        $data["wilayah"] = $this->wilayah_model->getAll();
        $data["jenis_barang"] = $this->jenis_barang_model->getAll();
        $data["pembayaran"] = $this->pembayaran_model->getAll();
        $this->load->view('transaksi/input_transaksi', $data);
    }

    // Tambah Transaksi
    public function input_action() {
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'id_wilayah' => $this->input->post('wilayah'),
            'kota' => $this->input->post('kota'),
            'id_jns_barang' => $this->input->post('jns_barang'),
            'resi' => $this->input->post('resi'),
            'dm_operan' => $this->input->post('dm_operan'),
            'pengirim' => $this->input->post('pengirim'),
            'penerima' => $this->input->post('penerima'),
            'id_jns_pembayaran' => $this->input->post('pembayaran'),
            'ekstra' => $this->input->post('ekstra'),
            'biaya_ekstra' => $this->input->post('biaya_ekstra')
        );
        $id_transaksi = $this->transaksi_model->add($data);

        foreach($_SESSION['barang'] as $value) {
            $data = array(
                'jml_coli' => $value['jml'],
                'nama_barang' => $value['nama_barang'],
                'berat' => $value['berat'],
                'ongkos' => $value['ongkos'],
                'id_transaksi' => $id_transaksi
            );

            $this->barang_model->add($data);
        }
        $this->load->view('transaksi/input_transaksi', $data);
    }

    // Menampilkan Halaman Update
    public function update_transaksi($id = null) {
        $data["transaksi"] = $this->transaksi_model->getById($id);
        $data["barang"] =$this->barang_model->getByTransaksiId($id);
        $data["detailbarang"] =$this->barang_model->getById($id);
        $data["wilayah"] = $this->wilayah_model->getAll();
        $data["jenis_barang"] = $this->jenis_barang_model->getAll();
        $data["pembayaran"] = $this->pembayaran_model->getAll();
        $this->load->view('transaksi/update_transaksi', $data);
    }

    // Update Transaksi
    public function update_action() {
        $id = $this->input->post('id');
        $where = array('id_transaksi' => $id);
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'id_wilayah' => $this->input->post('wilayah'),
            'kota' => $this->input->post('kota'),
            'id_jns_barang' => $this->input->post('jns_barang'),
            'resi' => $this->input->post('resi'),
            'dm_operan' => $this->input->post('dm_operan'),
            'pengirim' => $this->input->post('pengirim'),
            'penerima' => $this->input->post('penerima'),
            'id_jns_pembayaran' => $this->input->post('pembayaran'),
            'ekstra' => $this->input->post('ekstra'),
            'biaya_ekstra' => $this->input->post('biaya_ekstra')
        );

        $this->transaksi_model->update($data, $where);
    }

    public function hapus_transaksi($id = null) {
        if (!isset($id)) show_404();
        $this->transaksi_model->delete($id);
        echo json_encode(array("status" => true));
    }
}