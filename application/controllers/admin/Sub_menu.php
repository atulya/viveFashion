<?php

class Sub_menu extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'pagination'));
        $this->load->helper(array('get_designed_message', 'check_session', 'create_permalink'));
        isLoggedIn();
    }

    public function index() {
        $this->load->model('admin/menu_model', 'model');
        $this->load->config('pagination');
        $config = $this->config->item('pagination');
        $menu_id = $this->uri->segment(4);
        $offset = (empty($this->uri->segment(5))) ? 0 : $this->uri->segment(5);
        $config["uri_segment"] = 4;
        $config["base_url"] = base_url('admin/sub_menu/index/');
        $config["total_rows"] = $this->model->countSubMenuTotal($menu_id);
        $this->pagination->initialize($config);
        $data['records'] = $this->model->getSubMenu($menu_id, $offset);
        $data['main_menu_id'] = $menu_id;
        $this->backEnd('admin/menu/sub-menu-list', $data, TRUE);
    }

    public function save($main_menu_id = 0) {
        $params['name'] = $this->input->post('sub_menu_name');
        $params['permalink'] = createPermaLink($params['name']);
        $menu_id = $this->input->post('menu_id');
        $result = $this->dml->update(TBL_MENU_LINKS, 'menu_id', $menu_id, $params);

        if ($result['status']) { // Success
            $message = getDesignedMessage('Sub Menu is saved successfully.');
        } else { // Error
            $message = getDesignedMessage('Something wrong happened, Please try again.', 2);
        }
        $this->session->set_flashdata('message', $message);
        redirect(base_url('admin/sub_menu/index/' . $main_menu_id));
    }

}
