<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {
    private $table = "barang";

    // Menambah Barang
    public function add($data) {
        return $this->db->insert($this->table, $data);
    }

    // Tampil Barang by Transaksi Id
    public function getByTransaksiId($id) {
        return $this->db->get_where($this->table, ["id_transaksi" => $id])->result();
    }

    // Tampil Barang by Id
    public function getById($id) {
        return $this->db->get_where($this->table, ["id_barang" => $id])->row();
    }

    //  Update Barang
    public function update($data, $where) {
        return $this->db->update_where($this->table, $data, $where);
    }

    // Delete Barang
    public function delete($id) {
        return $this->db->delete($this->table, array("id_barang" => $id));
    }
}