<?php

class Product_model extends CI_Model {

    public function countTotal($menu_id) {
        $this->db->select('COUNT(product_id) AS total');
        $this->db->from(TBL_PRODUCTS);
        $this->db->where('is_deleted', 0);
        $this->db->where('menu_id = ' . $menu_id . ' OR sub_menu_id = ' . $menu_id);
        return $this->db->get()->row()->total;
    }

    public function get($offset, $menu_id) {
        $this->db->select('product_id AS id, name, permalink');
        $this->db->from(TBL_PRODUCTS);
        $this->db->where('is_deleted', 0);
        $this->db->where('menu_id = ' . $menu_id . ' OR sub_menu_id = ' . $menu_id);
        $this->db->order_by('added_on', 'DESC');
        $this->db->limit(10, $offset);
        $result = $this->db->get()->result_array();
        foreach ($result AS $key => $value) {
            $result[$key]['image_name'] = $this->getProductImageName($value['id']);
        }
        return $result;
    }

    public function getProductImageName($product_id) {
        $this->db->select('image_name');
        $this->db->from(TBL_PRODUCT_IMAGES);
        $this->db->where('product_id', $product_id);
        $this->db->limit(1);
        $row = $this->db->get()->row_array();
        return !empty($row) ? $row['image_name'] : '';
    }

    public function getByName($offset, $search_key) {
        $this->db->select('product_id AS id, name, permalink');
        $this->db->from(TBL_PRODUCTS);
        $this->db->like('name', $search_key, 'both');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('added_on', 'DESC');
        $this->db->limit(10, $offset);
        $result = $this->db->get()->result_array();
        foreach ($result AS $key => $value) {
            $result[$key]['image_name'] = $this->getProductImageName($value['id']);
        }
        return $result;
    }

    public function getByNameCount($search_key) {
        $this->db->select('COUNT(product_id) AS total');
        $this->db->from(TBL_PRODUCTS);
        $this->db->like('name', $search_key, 'both');
        $this->db->where('is_deleted', 0);
        return $this->db->get()->row()->total;
    }

    public function getMenuID($permalink) {
        $this->db->select('menu_id');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('permalink', $permalink);
        $this->db->limit(1);
        $row = $this->db->get()->row();
        return !empty($row) ? $row->menu_id : 0;
    }

}
