<?php

class Page_details_model extends CI_Model {

    function get_page_title($page_id) {
        $sql = $this->db->query("SELECT pageDet_title FROM pagedetails WHERE page_id='$page_id'");
        if ($sql->num_rows() > 0) {
            $data = $sql->result();
        }
        return $data;
    }

}
