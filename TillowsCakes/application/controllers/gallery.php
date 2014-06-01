<?php

class Gallery extends CI_Controller{
    
    function index(){
        $this->load->model('page_details_model');
        $data['page_title'] = $this->page_details_model->get_page_title(3);
        $this->load->model('menu_model');
        $data['menu_items'] = $this->menu_model->get_menu_items();
        $this->load->model('content_model');
        $data['content'] = $this->content_model->get_page_content(3);
        $this->load->view('general_view', $data);
    }
}