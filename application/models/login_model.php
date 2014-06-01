<?php

class Login_model extends CI_Model {

    function validate() {
        $username = $this->input->post('username');
        $pass = md5($this->input->post('password'));
        $sql = $this->db->query("SELECT users_id, users_name, users_email, userType_id FROM users WHERE users_username='$username' AND users_pass='$pass'");
        if ($sql->num_rows() == 1) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

}
