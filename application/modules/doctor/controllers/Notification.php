<?php

class Notification extends MY_Controller {
    public function index()
    {
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('doctor/notifications/doctorNotification');
        $this->load->view('elements/admin_footer',$data);  
    }
}