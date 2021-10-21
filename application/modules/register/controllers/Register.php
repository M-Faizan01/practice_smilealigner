<?php
/**
 * Controller Name: Register
 * Description: front end Register
 * @author Muhammad Irfan Aslam
 * Created date: 2021-07-02
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends MY_Controller
{
    /**
     * Setting class elements
     * @author Muhammad irfan aslam
     */
    
    public $data;  
    /**
     * function to invoke necessary component
     * @author Muhammad Irfan Aslam
     */
    function __construct()
    {
        parent::__construct();  
        $this->load->model(array("Register_model","admin/Admin_model"));   
    }
    /**
     * @author Muhammad Irfan Aslam
     */
    public function index()
    {
        redirect('home?redirecturl=register');
        $this->load->view('elements/front_topbar',$data);
        $this->load->view('index',$data);
        $this->load->view('elements/front_footer',$data);         
    }  
    public function submitRegister()
    {
        $userEmail = $this->input->post('email');
        $upload_path = 'assets/uploads/images/';
        if (!empty($_FILES['user_edit_avatar_control']['name']) && $_FILES['user_edit_avatar_control']['error'] == 0) {
            $file_name = time().str_replace(' ','_',$_FILES['user_edit_avatar_control']['name']);
            move_uploaded_file($_FILES['user_edit_avatar_control']['tmp_name'], $upload_path . $file_name);
            $doctor_image =time().str_replace(' ','_',$_FILES['user_edit_avatar_control']['name']);
        }
        $alreadyuser_data = $this->Register_model->getUserData($userEmail);
        if(empty($alreadyuser_data)){
            $verification_code = mt_rand(1000, 9999);
            $userdata = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('lastName'),
                'email' => $this->input->post('email'),
                'phone_number' => $this->input->post('phone_number'),
                'shipping_address' => $this->input->post('shipping_address'),
                'billing_address' => $this->input->post('billing_address'),
                'gst_no' => $this->input->post('gst_no'),
                'refer_by' => $this->input->post('radio_group'),
                'refer_text' => $this->input->post('reference_person'),
                'profile_image' => $doctor_image,
                'user_type_id' => 2,
                'is_active' => 0,
                'source' => 0,
                'created' => date('Y-m-d')
            );
            $result = $this->Register_model->insertUser($userdata);

            $to_email = $this->input->post('email');
            $firstName = $this->input->post('first_name');
            $lastName = $this->input->post('lastName');

            if($result){

                $config = Array(
                  'protocol' => 'sendmail',
                  'smtp_host' => 'ssl://smtp.gmail.com',
                  'smtp_port' => 465,
                  'smtp_user' => 'surfiq.testemail@gmail.com', // change it to yours
                  'smtp_pass' => 'Surfiq123', // change it to yours
                  'mailtype' => 'html',
                  'charset' => 'iso-8859-1',
                  'wordwrap' => TRUE
                );

                $message = 'Thank you for registering with us. Your account is currently in the process of being approved. We’ll notify you once we’ve reviewed your application.';
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('info@smilealigners.in', 'Smilealigners'); // change it to yours
                $this->email->to($to_email);// change it to yours
                $this->email->subject('Thank you for registering with us.');
                $this->email->message($message);
                $mailRes = $this->email->send();

                // $subject = "Dear ".$firstName." ".$lastName.", Your Application is Under Review";
                // $message = 'Thank you for registering with us. Your account is currently in the process of
                //                 being approved. We’ll notify you once we’ve reviewed your application.';
                
                // // Always set content-type when sending HTML email
                // $headers = "MIME-Version: 1.0" . "\r\n";
                // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // // More headers
                // $headers .= 'From: <info@smilealigners.in>' . "\r\n";

                // $mailRes = mail($to_email,$subject,$message,$headers);

                if($mailRes){
                     $this->session->set_flashdata('success', "Dear user, your account details are being reviewed by our staff. We’ll notify you once the review is complete!");
                                redirect('home?redirecturl=login');
                }else{
                        
                      $this->session->set_flashdata('error', "Email has not been sent.");
                                redirect('home');
                }
            }

            // if($email_sent){
            //     $this->session->set_flashdata('success', "Dear user, your account details are being reviewed by our staff. We’ll notify you once the review is complete!");
            //                     redirect('home');
            // } else{
            //     $this->session->set_flashdata('error', "something went wrong.");
            //     redirect('register');
            // }
        }else{
            $this->session->set_flashdata('error', "User Already Registerd agaist this Email.");
            redirect('home');
        }
    }
    public function check_email_avalibility() {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $response = array("success" => "0", "message" => "failed", "reason" => "Invalid Email");
        } else {
            if ($this->Register_model->is_email_available($_POST["email"])) {
                $response = array("success" => "0", "message" => "failed", "reason" => "User account already exists");
            } else {
                $response = array("success" => "1", "message" => "failed", "reason" => "Email Available");
            }
        }
        echo json_encode($response);
        exit;
    }

     public function check_email_avalibility_sendlink() {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $response = array("success" => "0", "message" => "failed", "reason" => "Invalid Email");
        } else {
            if ($this->Register_model->is_email_available($_POST["email"])) {
                $response = array("success" => "1", "message" => "failed", "reason" => "Email Available");
            } else {
                $response = array("success" => "0", "message" => "failed", "reason" => "Invalid Email");
            }
        }
        echo json_encode($response);
        exit;
    }

    public function imgCrop()
    {
        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);

        $image_name = 'assets/uploads/images/' . time() . '.png';

        file_put_contents($image_name, $data);
        echo $image_name;
    }

}
