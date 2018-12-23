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
            default:
                break;
        }
        $response = $this->dml->delete($table_name, $field_name, $record_id);
        echo getDesignedMessage('Record is deleted successfully.');
    }

}
