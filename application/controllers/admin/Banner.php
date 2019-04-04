<?php

class Banner extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('get_designed_message', 'check_session', 'upload_image'));
        isLoggedIn();
    }

    public function index() {
        $data['row'] = $this->dml->getRow(TBL_BANNER, 'id', 1);
        $this->backEnd('admin/banner/index', $data, true);
    }

    public function update() {
        $params['title'] = $this->input->post('title');
        if (!empty($_FILES['banner_image']['name'])) {
            $params['image_name'] = uploadBanner('banner_image');
        } else {
            $params['image_name'] = $this->input->post('image_name');
        }

        $res = $this->dml->update(TBL_BANNER, 'id', 1, $params);
        if ($res['status']) {
            $message = getDesignedMessage('Banner information is updated successfully.');
        } else {
            $message = getDesignedMessage('Something wrong happpned, Please try again.', 2);
        }
        $this->session->set_flashdata('message', $message);
        redirect(base_url('admin/banner'));
    }

}
