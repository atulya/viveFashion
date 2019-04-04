<?php

class Menu_model extends CI_Model {

    public function get() {
        $this->db->select('menu_id AS id, permalink, name');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('is_deleted', 0);
        $this->db->where('parent_id', 0);
        $result = $this->db->get()->result_array();
        foreach ($result AS $key => $menu) {
            $result[$key]['sub_menus'] = $this->getSubMenu($menu['id']);
        }
        return $result;
    }

    public function getSubMenu($menu_id) {
        $this->db->select('menu_id AS id, permalink, name');
        $this->db->from(TBL_MENU_LINKS);
        $this->db->where('parent_id', $menu_id);
        $this->db->where('is_deleted', 0);
        return $this->db->get()->result_array();
    }

}
