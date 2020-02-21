<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    // Menampilkan Menu Login
    public function index() {
        // $session = $this->session->set_userdata($data_session); 
        // if($session != $data_session){
        //     $this->load->view('login');
        // }else{
        //     redirect('transaksi');
        // }
        $this->load->view('login');
    }

    // Menampilkan Daftar Sopir
    public function getSopir() {
        $where = array(
            'user_group' => 3
        );
        return $this->db->get_where($this->table, $where)->result();
    }

    // Melakukan Cek Login
    public function cek_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => md5($password)
        );

        $cek = $this->user_model->login($where)->num_rows();
        if($cek > 0){
            $data_session = array(
                'nama' => $username,
                'status' => 'login'
            );

            $this->session->set_userdata($data_session);
            redirect(base_url('transaksi'));
        } else {
            redirect(base_url());
        }
    }

    // Logout
    function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}