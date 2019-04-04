<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        header('Cache-Control: no-store,no-cache,must-revalidate');
        header('Cache-Control: post-check=0,pre-check=0', false);
        header('Pragma:no-cache');
    }

    public function backEnd($common, $data = array(), $return = FALSE) {
        $this->load->model('admin/inquiry_model');
        $nav['unread_count'] = $this->inquiry_model->getUnreadCount();
        if ($return):
            $this->load->view('admin/common/header');
            $this->load->view('admin/common/side-menu', $nav);
            $this->load->view($common, $data);
            $this->load->view('admin/common/footer');
        else:
            $this->load->view('admin/common/header');
            $this->load->view('admin/common/side-menu', $nav);
            $this->load->view($common);
            $this->load->view('admin/common/footer');
        endif;
    }

    public function frontEnd($common, $data = array(), $return = FALSE) {
        $this->load->model('menu_model');
        $nav['menus'] = $this->menu_model->get();
        if ($return):
            $this->load->view('common/header');
            $this->load->view('common/navigation', $nav);
            $this->load->view($common, $data);
            $this->load->view('common/footer');
        else:
            $this->load->view('common/header');
            $this->load->view('common/navigation', $nav);
            $this->load->view($common);
            $this->load->view('common/footer');
        endif;
    }

}

?>
