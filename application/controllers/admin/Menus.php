<?php

class Menus extends MY_Controller {

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
        $offset = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);
        $config["uri_segment"] = 4;
        $config["base_url"] = base_url('admin/menus/index/');
        $config["total_rows"] = $this->model->countTotal();
        $this->pagination->initialize($config);
        $data['records'] = $this->model->get($offset);
        $this->backEnd('admin/menu/list', $data, TRUE);
    }

    public function save() {
        $params['name'] = $this->input->post('menu_name');
        $params['permalink'] = createPermaLink($params['name']);
        $menu_id = $this->input->post('menu_id');
        if (empty($menu_id)) { // Add
            $result = $this->dml->insert(TBL_MENU_LINKS, $params);
        } else { // Edit
            $result = $this->dml->update(TBL_MENU_LINKS, 'menu_id', $menu_id, $params);
        }

        if ($result['status']) { // Success
            $message = getDesignedMessage('Menu type is saved successfully.');
        } else { // Error
            $message = getDesignedMessage('Something wrong happened, Please try again.', 2);
        }
        $this->session->set_flashdata('message', $message);
        redirect(base_url('admin/menus'));
    }

    public function save_sub_menu() {
        $params['name'] = $this->input->post('sub_menu_name');
        $params['permalink'] = createPermaLink($params['name']);
        $params['parent_id'] = $this->input->post('menu_id');
        $result = $this->dml->insert(TBL_MENU_LINKS, $params);
        if ($result['status']) { // Success
            $message = getDesignedMessage('Sub Menu type is saved successfully.');
        } else { // Error
            $message = getDesignedMessage('Something wrong happened, Please try again.', 2);
        }
        echo $message;
    }

}
