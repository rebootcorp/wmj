<?php

class Muatan_model extends CI_Model {
    private $table = 'muatan';

    // Menambahkan Muatan
    public function add($data) {
        return $this->db->insert($this->table, $data);
    }

    // Menampilkan Daftar Muatan
    public function getAll() {
        $this->db->select('muatan.*, wilayah.wilayah, kendaraan.plat, users.nama');
        $this->db->join('wilayah', 'muatan.id_wilayah = wilayah.id_wilayah');
        $this->db->join('kendaraan', 'muatan.id_kendaraan = kendaraan.id_kendaraan');
        $this->db->join('users', 'muatan.id_sopir = users.id_user');
        return $this->db->get($this->table)->result();
    }

    // Menampilkan Muatan by Id
    public function getById($id) {
        $where = array(
            'id_muatan' => $id
        );
        return $this->db->get_where($this->table, $where)->row();
    }

    // Update Muatan
    public function update($data, $where) {
        return $this->db->update($this->table, $data, $where);
    }

    public function delete($id) {
        $where = array(
            'id_muatan' => $id
        );
        return $this->db->delete($this->table, $where);
    }
}