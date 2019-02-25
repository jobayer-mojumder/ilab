<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_admin_model extends CI_Model {
	
    /************************product models function***************************/
    function get_product_lists() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('products');
        return $query->result();
    }

    function product_add($data) {
        $result = $this->db->insert('products', $data);
        return $result;
    }

    function product_update($id, $data) {
        $this->db->where('product_id', $id);
        $result = $this->db->update('products', $data);
        return $result;
    }

    function get_product_by_id($id) {
        $query = $this->db->get_where('products', array('product_id' => $id));
        $result = $query->result();
        return $result[0];
    }

    function get_product_image_by_id($id) {
        $this->db->where('product_id', $id);
        $query = $this->db->get('products');
        $result = $query->result();
        return $result[0];
    }

    function product_del($id) {
        $this->db->where('product_id', $id);
        $result = $this->db->delete('products');
        return $result;
    }


}