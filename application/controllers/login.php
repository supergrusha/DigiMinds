
<?php

class Login extends CI_Controller {

    function index() {
        $this->load->view('login_view');
    }

    function validate_credentials() {
        $this->load->model('login_model');
        $query = $this->login_model->validate();

        if ($query) {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => TRUE
            );
            $this->session->set_userdata($data);
            redirect(base_url().'settings');
        } else {
            $this->index();
        }
    }
    function log_out(){
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }
}