<?php

class Import extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('get_designed_message', 'check_session', 'create_permalink'));
        isLoggedIn();
    }

    public function index() {
        $this->load->model('admin/menu_model', 'menu');
        $data['menus'] = $this->menu->getMenus();
        $this->backEnd('admin/product/import-products', $data, true);
    }

    public function products() {
        $menu_id = $this->input->post('menu_id');
        $sub_menu_id = !empty($this->input->post('sub_menu_id')) ? $this->input->post('sub_menu_id') : 0;
        if (is_uploaded_file($_FILES['import_file']['tmp_name'])) {

            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['import_file']['tmp_name'], 'r');

            //skip first line
            fgetcsv($csvFile);
            $params['menu_id'] = $menu_id;
            $params['sub_menu_id'] = $sub_menu_id;
            //parse data from csv file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                if (!empty($line[0])) {
                    $params['name'] = $line[0];
                    $params['permalink'] = createPermaLink($line[0]);
                    $params['description'] = $line[1];
                    $params['manufactured_by'] = $line[2];
                    $this->dml->insert(TBL_PRODUCTS, $params);
                }
            }
            //close opened csv file
            fclose($csvFile);
            $message = getDesignedMessage('Products imported successfully.');
            $this->session->set_flashdata('message', $message);
            redirect(base_url('admin/import/index'));
        }
    }

}
