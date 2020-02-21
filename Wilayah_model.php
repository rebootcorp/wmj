<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah_model extends CI_Model {
    private $_table = "wilayah";

    public $id_wilayah, $wilayah;

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }
}