<?php

class Home extends CI_Controller{
    
    function index(){
        $this->load->model('page_details_model');
        $data['page_title'] = $this->page_details_model->get_page_title(1);
        $this->load->model('menu_model');
        $data['menu_items'] = $this->menu_model->get_menu_items();
        $this->load->model('cakes_model');
        $data['popular_cakes'] = $this->cakes_model->get_popular_cakes();
        $this->load->view('home_view', $data);
    }
}