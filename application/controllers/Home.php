<?php

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['banner'] = $this->dml->getRow(TBL_BANNER, 'id', 1);
        $this->frontEnd('index', $data, true);
    }

}
