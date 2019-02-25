<?php
class Home_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_product_by_category($category)
    {
        $this->db->select('*');
        $this->db->order_by("product_id", "ASC");
        $this->db->where('status', '1');
        $this->db->where('product_category', $category);
        $query = $this->db->get('products');
        $result = $query->result();
        return $result;
    }

    public function get_product_by_id($id)
    {
        $this->db->select('*');
        $this->db->where("product_id", $id);
        $this->db->where('status', '1');
        $query = $this->db->get('products');
        $result = $query->result();
        return $result[0];
    }

    public function order_insert($data){
        $result = $this->db->insert('orders', $data);
        return $result;
    }

}
