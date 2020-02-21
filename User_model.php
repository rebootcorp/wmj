<?php

class User_model extends CI_Model {
    private $table = 'users';

    public $username, $password;

    public function login($where) {
        return $this->db->get_where($this->table, $where);
    }
}