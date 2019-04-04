<?php

class Products extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('pagination'));
        $this->load->model('product_model', 'model');
    }

    public function index() {
        $this->load->model('menu_model');
        $permalink = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $offset = empty($this->uri->segment(3)) ? 0 : $this->uri->segment(3);
        $menu_id = $this->model->getMenuID($permalink);
        $this->load->config('pagination');
        $config = $this->config->item('front_pagination');
        $config["uri_segment"] = 3;
        $config["base_url"] = base_url('products/' . $permalink);
        $config["total_rows"] = $this->model->countTotal($menu_id);
        $this->pagination->initialize($config);
        $data['row'] = $this->dml->getRow(TBL_MENU_LINKS, 'menu_id', $menu_id);
        $data['products'] = $this->model->get($offset, $menu_id);
        $data['product_count'] = $config["total_rows"];
        $data['menus'] = $this->menu_model->get();
        $this->frontEnd('product-list', $data, TRUE);
    }

}
