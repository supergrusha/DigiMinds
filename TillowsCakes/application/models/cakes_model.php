<?php

class Cakes_model extends CI_Model {

    function get_popular_cakes() {
        $q = $this->db->query("SELECT cakes_name, cakes_img_src, cakes_desc FROM cakes INNER JOIN cakes_popular WHERE cakes.cakes_id=cakes_popular.cakes_id");
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
