<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
    //Deklarasi tabel DB
    private $table = "transaksi";

    // Menambahkan data
    public function add($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Menampilkan semua data
    public function getAll()
    {
        $this->db->select('transaksi.*, wilayah.wilayah');
        $this->db->join('wilayah', 'transaksi.id_wilayah = wilayah.id_wilayah');
        $this->db->from('transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Menampilkan data sesuai Id
    public function getById($id)
    {
        $this->db->select('transaksi.*, wilayah.wilayah, jenis_barang.jenis_barang, pembayaran.pembayaran');
        $this->db->join('wilayah', 'transaksi.id_wilayah = wilayah.id_wilayah');
        $this->db->join('jenis_barang', 'transaksi.id_jns_barang = jenis_barang.id_jenis_barang');
        $this->db->join('pembayaran', 'transaksi.id_jns_pembayaran = pembayaran.id_pembayaran');
        return $this->db->get_where($this->table, ["id_transaksi" => $id])->row();
    }

    // Menampilkan data sesuai Id dengan Array
    // Lambang
    public function getByIdArray($id)
    {
        $this->db->select('transaksi.*, wilayah.wilayah, jenis_barang.jenis_barang, pembayaran.pembayaran');
        $this->db->join('wilayah', 'transaksi.id_wilayah = wilayah.id_wilayah');
        $this->db->join('jenis_barang', 'transaksi.id_jns_barang = jenis_barang.id_jenis_barang');
        $this->db->join('pembayaran', 'transaksi.id_jns_pembayaran = pembayaran.id_pembayaran');
        return $this->db->get_where($this->table, ["id_transaksi" => $id])->result_array();
    }

    // Menampilkan data sesuai resi
    public function getByResi() {
        $this->db->select('transaksi.*, wilayah.wilayah');
        $this->db->join('wilayah', 'transaksi.id_wilayah = wilayah.id_wilayah');
        return $this->db->get($this->table)->result();
    }

    // Menampilkan Transaksi by ID Muatan
    public function getByMuatanId($id) {
        $this->db->select('transaksi.*, wilayah.wilayah');
        $this->db->join('wilayah', 'transaksi.id_wilayah = wilayah.id_wilayah');
        return $this->db->get_where($this->table, ["id_muatan" => $id])->result();
    }

    // Menampilkan Transaksi by No DM
    public function getByNodm($where) {
        $this->db->select('transaksi.tanggal, wilayah.wilayah, transaksi.resi, transaksi.pengirim, transaksi.penerima, pembayaran.pembayaran');
        $this->db->join('wilayah', 'transaksi.id_wilayah = wilayah.id_wilayah');
        $this->db->join('pembayaran', 'transaksi.id_jns_pembayaran = pembayaran.id_pembayaran');
        $this->db->join('muatan', 'transaksi.id_muatan = muatan.id_muatan');
        $this->db->get_where($this->table, $where);
    }

    // Melakukan update data
    public function update($data, $where)
    {
        return $this->db->update($this->table, $data, $where);
    }

    // Hapus Data
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_transaksi" => $id));
    }
}