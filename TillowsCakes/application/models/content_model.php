<?php

class Content_model extends CI_Model {

    function get_page_content($page_id) {
        $sql = $this->db->query("SELECT content_name, content_text FROM content WHERE page_id='$page_id'");
        if ($sql->num_rows() > 0) {
            $data = $sql->result();
        }
        return $data;
    }

}
