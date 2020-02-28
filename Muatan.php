<?php

class Muatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('muatan_model');
        $this->load->model('wilayah_model');
        $this->load->model('kendaraan_model');
        $this->load->model('user_model');
        $this->load->model('transaksi_model');
    }

    // Tampil Menu Daftar Muatan
    public function index() {
        $_SESSION['resi'] = array();
        $data['muatan'] = $this->muatan_model->getAll();
        $this->load->view('muatan/daftar_muatan', $data);
    }

    // Tambah Resi Session
    public function tambah_resi() {
        $resi = $this->input->post('resi');

        $_SESSION['resi'][$resi] = $resi;
    }

    // Hapus Resi Session
    public function hapus_resi() {
        
        unset($_SESSION['resi'][$_POST['id']]);
    }

    // Tampil Menu Input Muatan
    public function input_muatan() {
        $where = array(
            $this->db->or_where('resi', 'A')
        );
        foreach($_SESSION['resi'] as $key => $val) {
            $where = $this->db->or_where('resi', $key);
        }
        $data['transaksi'] = $this->transaksi_model->getByResi($where);
        $data['wilayah'] = $this->wilayah_model->getAll();
        $data['kendaraan'] = $this->kendaraan_model->getAll();
        $data['sopir'] = $this->user_model->getSopir();
        $this->load->view('muatan/input_muatan', $data);
    }

    // Tambah Muatan
    public function input_action() {
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'id_wilayah' => $this->input->post('wilayah'),
            'no_dm' => $this->input->post('nodm'),
            'id_kendaraan' => $this->input->post('kendaraan'),
            'id_sopir' => $this->input->post('sopir'),
            'co_sopir' => $this->input->post('cosopir'),
            'id_admin' => $this->input->post('penyusun')
        );
        $id_muatan = $this->muatan_model->add($data);
        foreach($_SESSION['resi'] as $key => $val) {
            $resi = $_SESSION['resi'][$key];
            $this->transaksi_model->update(array('id_muatan' => $id_muatan), array('resi' => $resi));
        }
        redirect('muatan/update_muatan/'.$id_muatan,'refresh');
    }

    // Menampilkan Print
    public function print($id) {
        $data["transaksi"] = $this->transaksi_model->getById($id);
        $data["barang"] =$this->barang_model->getByTransaksiId($id);
        $data["wilayah"] = $this->wilayah_model->getAll();
        $data["jenis_barang"] = $this->jenis_barang_model->getAll();
        $data["pembayaran"] = $this->pembayaran_model->getAll();
        $this->load->view('transaksi/print_transaksi', $data);
    }

    // Tambah Transaksi dalam Muatan
    public function tambah_transaksi() {
        $data = array(
            'id_muatan' => $this->input->post('id_muatan')
        );
        $where = array(
            'resi' => $this->input->post('resi')
        );
        $this->transaksi_model->update($data, $where);
    }

    // Hapus Transaksi dalam Muatan
    public function hapus_transaksi($id) {
        $data = array(
            'id_muatan' => null
        );
        $where = array(
            'id_transaksi' => $id
        );
        $this->transaksi_model->update($data, $where);
    }

    // Tampil Menu Update Muatan
    public function update_muatan($id) {
        $data['wilayah'] = $this->wilayah_model->getAll();
        $data['muatan'] = $this->muatan_model->getById($id);
        $data['kendaraan'] = $this->kendaraan_model->getAll();
        $data['sopir'] = $this->user_model->getSopir();
        $data['transaksi'] = $this->transaksi_model->getByMuatanId($id);
        $this->load->view('muatan/update_muatan', $data);
    }

    // Update Muatan
    public function update_action() {
        $id = $this->input->post('id');
        $where = array(
            'id_muatan' => $id
        );
        $data = array(
            'tanggal' => $this->input->post('tanggal'),
            'id_wilayah' => $this->input->post('wilayah'),
            'no_dm' => $this->input->post('nodm'),
            'id_kendaraan' => $this->input->post('kendaraan'),
            'id_sopir' => $this->input->post('sopir'),
            'co_sopir' => $this->input->post('cosopir'),
            'id_admin' => $this->input->post('penyusun')
        );
        $this->muatan_model->update($data, $where);
    }

    // Hapus Muatan
    public function hapus_muatan($id) {
        $this->muatan_model->delete($id);
    }

    // Tampil Konfirmasi Muatan
    public function konfirmasi_muatan() {
        $this->load->view('muatan/konfirmasi_muatan');
    }

    // Tampil Daftar Transaksi by No DM
    public function tampil_action() {
        $where = array(
            'no_dm' => $this->input->post('nodm')
        );
        $transaksi = $this->transaksi_model->getByNodm($where)->result();
        // $this->load->view('muatan/konfirmasi_muatan', $data);
        $result = '';
            $no = 1;
            foreach($transaksi as $tran) {
                $result .= '
                <tr>
                    <td>'.$no++.'</td>
                    <td>'.$tran->tanggal.'</td>
                    <td>'.$tran->wilayah.'</td>
                    <td>'.$tran->resi.'</td>
                    <td>'.$tran->pengirim.'</td>
                    <td>'.$tran->penerima.'</td>
                    <td>'.$tran->pembayaran.'</td>
                    <td>
                        <a href="" class="btn btn-outline-success btn-block btn-sm">Terkirim</a>
                        <a href="" class="btn btn-outline-danger btn-block btn-sm">Hapus</a>
                    </td>
                </tr>
                ';
            }
            echo $result;
    }
}