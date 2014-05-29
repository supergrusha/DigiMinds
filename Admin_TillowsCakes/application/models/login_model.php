<?php

class Login_model extends CI_Model{
    
     function validate() {
        $this->db->where('users_username', $this->input->post('username'));
        $this->db->where('users_pass', md5($this->input->post('password')));
        $query = $this->db->get('users');

        if ($query->num_rows == 1) {
            return TRUE;
        }
    }
    
}