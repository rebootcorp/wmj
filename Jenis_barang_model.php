<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_barang_model extends CI_Model {

    private $_table = "jenis_barang";

    public $id_jenis_barang, $jenis_barang;

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }
}