<?php

class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $permalink = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['row'] = $this->dml->getRow(TBL_PRODUCTS, 'permalink', $permalink);
        if (!empty($data['row'])) { // Found product
            $data['images'] = $this->dml->get(TBL_PRODUCT_IMAGES, 'product_id', $data['row']['product_id']);
            $this->frontEnd('product-detail', $data, TRUE);
        } else {
            show_404();
        }
    }

    public function call_me() {
        $params['name'] = $this->input->post('full_name');
        $params['email'] = $this->input->post('email');
        $params['mobile'] = $this->input->post('phone_number');
        $params['product_id'] = $this->input->post('product_id');
        $params['product_name'] = $this->input->post('product_name');
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdJaIYUAAAAADDHSHjeB1GWJsC_F-0hAH1RDbtB&response=$recaptcha"));
        if ($response->success) { // Valid Captcha
            $params['is_read'] = 0;
            $result = $this->dml->insert(TBL_INQUIRY, $params);
            if ($result['status']) {
                $this->load->helper('send_email');
                sendEmail($params['email'], 2, $params);
                sendEmail('info@vivefab.com', 1, $params);
                echo '<div class="alert alert-success">Your details has been sent to admin successfully. Thank you so much for your time.</div>';
            } else {
                echo '<div class="alert alert-danger">Something wrong happened, Please try again.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Look like you`re Robot.</div>';
        }
    }

}
