<?php

class Search extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('pagination'));
        $this->load->model('product_model', 'model');
    }

    public function index() {
        $search_key = urldecode($this->uri->segment(2));
        $offset = empty($this->uri->segment(3)) ? 0 : $this->uri->segment(3);
        $this->load->config('pagination');
        $config = $this->config->item('front_pagination');
        $config["uri_segment"] = 3;
        $config["base_url"] = base_url('search/' . $search_key);
        $config["total_rows"] = $this->model->getByNameCount($search_key);
        $this->pagination->initialize($config);
        $data['search_name'] = $search_key;
        $data['products'] = $this->model->getByName($offset, $search_key);
        $data['product_count'] = $config["total_rows"];
        $this->frontEnd('search-list', $data, TRUE);
    }

}
