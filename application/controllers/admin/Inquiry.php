<?php

class Inquiry extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'pagination'));
        $this->load->helper(array('get_designed_message', 'check_session'));
        isLoggedIn();
        $this->load->model('admin/inquiry_model', 'model');
    }

    public function index() {
        $this->load->config('pagination');
        $config = $this->config->item('pagination');
        $offset = (empty($this->uri->segment(4))) ? 0 : $this->uri->segment(4);
        $config["uri_segment"] = 4;
        $config["base_url"] = base_url('admin/inquiry/index/');
        $config["total_rows"] = $this->model->countTotal();
        $this->pagination->initialize($config);
        $data['inquiries'] = $this->model->get($offset);
        $data['unread_count'] = $this->model->getUnreadCount();
        $this->backEnd('admin/inquiry/list', $data, TRUE);
    }

    public function get_info() {
        $inquiry_id = $this->input->post('inquiry_id');
        print_r(json_encode($this->dml->getRow(TBL_INQUIRY, 'inquiry_id', $inquiry_id)));
    }

    public function mark_as_read() {
        $inquiry_id = $this->input->post('inquiry_id');
        $params['is_read'] = 1;
        $this->dml->update(TBL_INQUIRY, 'inquiry_id', $inquiry_id, $params);
        echo 1;
    }

    public function getUnreadCount() {
        $count = $this->model->getUnreadCount();
        echo $count;
    }

}
