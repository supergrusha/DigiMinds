<?php

class Pages extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_user_logged_in();
    }

    function index() {
        $this->load->model('pages_model');
        $data['pages'] = $this->pages_model->get_page_content_list();
        $this->load->view('pages/index_view' , $data);

    }
    function edit_page(){
        $this->load->view('pages/edit_view');
       //$data['pages'] = $this->pages_model->get_page_content(2);
        $update = array(
            'content_name' => 'My Freshly Update',
            'content_text' => 'Test not bla bla',
            'content_edit_date' => '0000-00-21',
            'user_id' => '2'
        );
       // $data = $this->pages_model->update_page_content(2, $update);
      //  $this->load->view('pages/index_view', $data);
    }

}
