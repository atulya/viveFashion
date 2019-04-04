<?php

include_once APPPATH . 'custom_class/Model.php';

class Menu_model extends CI_Model {

    public function get($offset) {
        $this->db->select('menu_id, name, added_on');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('parent_id', 0); // Fetch main menu links
        $this->db->where('is_deleted', 0);
        $this->db->order_by('name', 'ASC');
        $this->db->limit(Model::ADMIN_PAGE_LIMIT, $offset);
        return $this->db->get()->result_array();
    }

    public function countTotal() {
        $this->db->select('COUNT(menu_id) AS total');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('parent_id', 0); // Fetch main menu links
        $this->db->where('is_deleted', 0);
        return $this->db->get()->row()->total;
    }

    public function countSubMenuTotal($menu_id) {
        $this->db->select('COUNT(menu_id) AS total');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('parent_id', $menu_id);
        $this->db->where('parent_id!=', 0); // Fetch sub menu links
        $this->db->where('is_deleted', 0);
        return $this->db->get()->row()->total;
    }

    public function getSubMenu($menu_id, $offset) {
        $this->db->select('menu_id, name, added_on');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('parent_id', $menu_id);
        $this->db->where('parent_id!=', 0); // Fetch sub menu links
        $this->db->where('is_deleted', 0);
        $this->db->order_by('name', 'ASC');
        $this->db->limit(Model::ADMIN_PAGE_LIMIT, $offset);
        return $this->db->get()->result_array();
    }

    public function getMenus() {
        $this->db->select('menu_id, name');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('parent_id', 0); // Parent Menu
        $this->db->where('is_deleted', 0);
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getSubMenus($menu_id) {
        $this->db->select('menu_id, name');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('parent_id', $menu_id); // Fetch Sub Menus
        $this->db->where('is_deleted', 0);
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result_array();
    }

}
