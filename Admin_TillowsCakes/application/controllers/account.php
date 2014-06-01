<?php

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_user_logged_in();
    }

    function index() {
        $this->load->model('account_model');
        $user_id = $this->session->userdata('user_id');
        $data['account_det']  = $this->account_model->get_account_details($user_id);
        $this->load->view('account/index_view', $data);
    }

}
