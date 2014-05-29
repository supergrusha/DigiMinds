<?php

class Pages_model extends CI_Model {

    function get_page_content_list() {
        $sql = $this->db->query('SELECT content_id, page_id, users_username, content_edit_date FROM content JOIN users WHERE users.users_id=content.user_id');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function get_page_content($page_id) {
        $sql = $this->db->query("SELECT page_id, content_name, content_text, content_edit_date, users_username FROM content JOIN users WHERE page_id='$page_id' AND users.users_id=content.user_id");
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function update_page_content($content_id, $data) {
        $this->db->where('content_id', $content_id);
        $result = $this->db->update('content', $data);
        return $result;
    }

}
