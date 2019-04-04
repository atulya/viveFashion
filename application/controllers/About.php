<?php

class About extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->frontEnd('about-us');
    }

}
