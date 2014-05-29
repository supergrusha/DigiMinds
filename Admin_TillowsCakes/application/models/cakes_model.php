<?php

class Cakes extends CI_Model {

    function get_cake_list() {
        $sql = $this->db->query('SELECT * FROM cakes INNER JOIN caketype WHERE cakes.cake_type_id=caketype.cake_type_id');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function get_popular_cake_list() {
        $sql = $this->db->query('SELECT * FROM cakes INNER JOIN caketype,cakes_popular WHERE cakes.cake_type_id=caketype.cake_type_id AND cakes.cakes_id=cakes_popular.cakes_id');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function get_caketypes_list() {
        $sql = $this->db->query('SELECT * FROM caketype');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function add_cake($data) {
        $this->db->insert('cakes', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
    }

    function update_cake($cake_id, $data) {
        $this->db->where('cakes_id', $cake_id);
        $result = $this->db->update('cakes', $data);
        return $result;
    }

    function delete_cake() {
        $this->db->where('cakes_id', $this->uri->segment(3));
        $this->db->delete('cakes');
    }

    function add_caketype($data) {
        $this->db->insert('caketype', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
    }

    function update_caketype($cake_type_id, $data) {
        $this->db->where('cake_type_id', $cake_type_id);
        $result = $this->db->update('caketype', $data);
        return $result;
    }

    function delete_caketype($cake_type_id) {
        $this->db->where('cake_type_id', $this->uri->segment(3));
        $this->db->delete('caketype');
    }
    function remove_cake_popular($cake_id){
        $this->db->where('cake_popular_id', $this->uri->segment(3));
        $this->db->delete('cakes_popular');
    }
    function add_cake_popular($data){
        $this->db->insert('cakes_popular', $data);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        
    }

}
