<?php

class Account_model extends CI_Model {

    function get_account_details($id) {
        $sql = $this->db->query("SELECT users_name,users_email FROM users WHERE users_id='$id'");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

}
