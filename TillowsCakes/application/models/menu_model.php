<?php

class Menu_model extends CI_Model {

    function get_menu_items() {
        $q = $this->db->query('SELECT page_id FROM menuPage WHERE menu_id="1"');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $page_id = $row->page_id;
                $a = $this->db->query("SELECT pageDet_name, page_link FROM pageDetails INNER JOIN pages  WHERE pageDetails.page_id=$page_id  AND pages.page_id=pageDetails.page_id");
                foreach ($a->result() as $row) {
                    $data[] = $row;
                }
            }
        }
        return $data;
    }

}
