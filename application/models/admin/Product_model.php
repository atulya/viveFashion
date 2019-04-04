<?php

include_once APPPATH . 'custom_class/Model.php';

class Product_model extends CI_Model {

    public function get($offset) {
        $this->db->select('product_id, name, manufactured_by, added_on');
        $this->db->from(TBL_PRODUCTS);
        $this->db->where('is_deleted', 0);
        $this->db->order_by('added_on', 'DESC');
        $this->db->limit(Model::ADMIN_PAGE_LIMIT, $offset);
        return $this->db->get()->result_array();
    }

    public function countTotal() {
        $this->db->select('COUNT(product_id) AS total');
        $this->db->from(TBL_PRODUCTS);
        $this->db->where('is_deleted', 0);
        return $this->db->get()->row()->total;
    }

    public function deleteImage($image_name) {
        $this->db->where('image_name', $image_name);
        $this->db->delete(TBL_PRODUCT_IMAGES);
        return $this->db->affected_rows();
    }

}
