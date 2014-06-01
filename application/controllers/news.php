<?php

class News extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        is_user_logged_in();
    }
    function index(){
        $this->load->view('news_view');
    }
}