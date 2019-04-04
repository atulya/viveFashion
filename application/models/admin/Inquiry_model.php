<?php

include_once APPPATH . 'custom_class/Model.php';

class Inquiry_model extends CI_Model {

    public function get($offset) {
        $this->db->select('inquiry_id, name, email, mobile, is_read, added_on');
        $this->db->from(TBL_INQUIRY);
        $this->db->where('is_deleted', 0);
        $this->db->order_by('is_read', 'ASC');
        $this->db->order_by('added_on', 'DESC');
        $this->db->limit(Model::ADMIN_PAGE_LIMIT, $offset);
        return $this->db->get()->result_array();
    }

    public function countTotal() {
        $this->db->select('COUNT(inquiry_id) AS total');
        $this->db->from(TBL_INQUIRY);
        $this->db->where('is_deleted', 0);
        return $this->db->get()->row()->total;
    }

    public function getUnreadCount() {
        $this->db->select('COUNT(inquiry_id) AS total');
        $this->db->from(TBL_INQUIRY);
        $this->db->where('is_read', 0);
        $this->db->where('is_deleted', 0);
        return $this->db->get()->row()->total;
    }

}
