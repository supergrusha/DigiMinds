
<?php

class Login extends CI_Controller {

    function index() {
        $this->load->view('login_view');
    }

    function validate_credentials() {
        $this->load->model('login_model');
        $result = $this->login_model->validate();
        if (isset($result)) {
            foreach ($result as $row) {
                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => TRUE,
                    'user_id' => $row->users_id,
                    'name' => $row->users_name,
                    'email' => $row->users_email,
                    'user_type' => $row->userType_id
                );
            }
            $this->session->set_userdata($data);
            redirect(base_url() . 'settings');
        } else {
            $this->index();
        }
    }

    function log_out() {
        $this->session->sess_destroy();
        redirect(base_url() . 'login');
    }

}
