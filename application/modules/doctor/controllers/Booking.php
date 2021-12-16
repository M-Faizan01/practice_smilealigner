<?php

class Booking extends MY_Controller {
    public function index()
    {
        $this->load->view('elements/admin_header',$data);
        $this->load->view('doctor_topbar',$data);
        $this->load->view('doctor_sidebar',$data);
        $this->load->view('doctor/booking/doctorBooking');
        $this->load->view('elements/admin_footer',$data);  
    }
}