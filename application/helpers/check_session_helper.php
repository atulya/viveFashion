<?php

function isLoggedIn() {
    $CI = & get_instance();
    $adminID = $CI->session->userdata('admin_id');
    if (!$adminID) {
        redirect(base_url('admin/login'));
    }
}

?>