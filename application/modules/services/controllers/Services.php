<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
        $this->load->view('elements/front_topbar');
        $this->load->view('services');
        $this->load->view('elements/front_footer');
    }
}
