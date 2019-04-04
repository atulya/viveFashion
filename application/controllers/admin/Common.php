<?php

class Common extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('get_designed_message');
    }

    public function delete() {
        $type = $this->input->post('type');
        $record_id = $this->input->post('record_id');
        switch ($type) {
            case 'menu':
                $field_name = 'menu_id';
                $table_name = TBL_MENU_LINKS;
                break;
            case 'product':
                $field_name = 'product_id';
                $table_name = TBL_PRODUCTS;
                break;
            case 'inquiry':
                $field_name = 'inquiry_id';
                $table_name = TBL_INQUIRY;
                break;
            default:
                break;
        }
        $response = $this->dml->delete($table_name, $field_name, $record_id);
        echo getDesignedMessage('Record is deleted successfully.');
    }

    public function search_sub_menu() {
        $this->load->model('admin/menu_model', 'menu');
        $menu_id = $this->input->post('menu_id');
        $result = $this->menu->getSubMenus($menu_id);
        print_r(json_encode($result));
    }

}
