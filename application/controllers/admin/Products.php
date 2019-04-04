<?php

class Products extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'pagination'));
        $this->load->helper(array('get_designed_message', 'upload_image', 'check_session', 'create_permalink'));
        $this->load->model('admin/product_model', 'model');
        isLoggedIn();
    }

    public function index() {
        $this->load->config('pagination');
        $config = $this->config->item('pagination');
        $offset = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);
        $config["uri_segment"] = 4;
        $config["base_url"] = base_url('admin/products/index/');
        $config["total_rows"] = $this->model->countTotal();
        $this->pagination->initialize($config);
        $data['records'] = $this->model->get($offset);
        $this->backEnd('admin/product/list', $data, TRUE);
    }

    public function add() {
        $this->load->model('admin/menu_model', 'menu');
        $data['menus'] = $this->menu->getMenus();
        $this->backEnd('admin/product/add', $data, TRUE);
    }

    public function edit($product_id) {
        $this->load->model('admin/menu_model', 'menu');
        $data['row'] = $this->dml->getRow(TBL_PRODUCTS, 'product_id', $product_id);
        $data['menus'] = $this->menu->getMenus();
        $data['sub_menus'] = $this->menu->getSubMenus($data['row']['menu_id']);
        $data['images'] = $this->dml->get(TBL_PRODUCT_IMAGES, 'product_id', $product_id);
        $this->backEnd('admin/product/add', $data, true);
    }

    public function save() {
        $product_id = $this->input->post('product_id');
        $params['menu_id'] = $this->input->post('menu_id');
        $params['sub_menu_id'] = $this->input->post('sub_menu_id');
        $params['name'] = $this->input->post('name');
        $params['description'] = $this->input->post('editor1');
        $params['manufactured_by'] = $this->input->post('manufactured_by');
        $params['permalink'] = createPermaLink($params['name']);
        if (empty($product_id)) { // Add Product
            $result = $this->dml->insert(TBL_PRODUCTS, $params);
        } else {// Update Product
            $result = $this->dml->update(TBL_PRODUCTS, 'product_id', $product_id, $params);
        }
        if ($result['status']) {
            $product_id = $result['id'];
            uploadProfile($product_id, $_FILES['images']);
            $message = getDesignedMessage('Product is added successfully.');
        } else {
            $message = getDesignedMessage('Something wrong happened, Please try again.', 2);
        }
        $this->session->set_flashdata('message', $message);
        redirect(base_url('admin/products'));
    }

    public function delete_image() {
        $image_name = $this->input->post('image_name');
        print_r($this->model->deleteImage($image_name));
    }

}
