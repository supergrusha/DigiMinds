<?php

class Users_model extends CI_Model {

    function get_user_list() {
        $sql = $this->db->query('SELECT users_username, users_name, users_email, users_id, userType_name FROM users INNER JOIN userType WHERE users.userType_id=userType.userType_id ORDER BY users.userType_id');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function update_user($user_id, $data) {
        $this->db->where('users_id', $user_id);
        $result = $this->db->update('users', $data);
        return $result;
    }

    function add_user($data) {
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
    }

    function delete_user() {
        $this->db->where('users_id', $this->uri->segment(3));
        $this->db->delete('users');
    }

    function change_user_password($user_id, $new_password) {
        $sql = $this->db->query("UPDATE users SET users_pass='$new_password' WHERE users_id='$user_id'");
        if($sql->affected_rows() == 1){
            return TRUE;
        }
    }
    //NEEDS TO SEND EMAIL WITH PASSWORD
    function reset_password($user_id) {
        $rand = substr(md5(microtime()),rand(0,26),8);
        $new_password = md5($rand);
        $result = $this->change_user_password($user_id, $new_password);
        return $result;
    }

    function check_username_available($username) {
        
    }

    function check_email_availabe($email) {
        
    }

}
