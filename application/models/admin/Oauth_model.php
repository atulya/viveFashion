<?php

class Oauth_model extends CI_Model {

    public function verify($para) {
        $this->db->select('id, name, email');
        $this->db->from(TBL_ADMIN);
        $this->db->where('email', $para['email']);
        $this->db->where('password', $para['password']);
        $this->db->limit(1);
        $que = $this->db->get();
        return $que->row_array();
    }

    public function isOldPasswordCorrect($oldPassword, $myID) {
        $this->db->select('id');
        $this->db->from(TBL_ADMIN);
        $this->db->where('id', $myID);
        $this->db->where('password', $oldPassword);
        $this->db->limit(1);
        $que = $this->db->get();
        return ($que->num_rows() > 0) ? TRUE : FALSE;
    }

}

?>