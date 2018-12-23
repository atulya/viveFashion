<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        header('Cache-Control: no-store,no-cache,must-revalidate');
        header('Cache-Control: post-check=0,pre-check=0', false);
        header('Pragma:no-cache');
    }

    public function backEnd($common, $data = array(), $return = FALSE) {
        if ($return):
            $this->load->view('admin/common/header');
            $this->load->view('admin/common/side-menu');
            $this->load->view($common, $data);
            $this->load->view('admin/common/footer');
        else:
            $this->load->view('admin/common/header');
            $this->load->view('admin/common/side-menu');
            $this->load->view($common);
            $this->load->view('admin/common/footer');
        endif;
    }

}

?>
