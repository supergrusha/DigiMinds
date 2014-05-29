<?php

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_user_logged_in();
    }

    function index() {
        $this->load->model('users_model');
        $data['users'] = $this->users_model->get_user_list();
        $this->load->view('users_view', $data);
    }
    
    function delete_user(){
        $this->load->model('users_model');
        $this->users_model->delete_user();
        $this->index();
    }

}
