<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctor extends MY_Controller
{
    /**
     * Setting class elements
     * @author Surfiq Tech
     */
    
    public $data;  
    /**
     * function to invoke necessary component
     * @author Surfiq Tech
     */
    function __construct()
    {
        parent::__construct();    
        $this->checkAdminLogin(); 
        $this->adminData = $this->session->userdata('adminData');
        $this->load->model(array("Admin_model"));
    }
    /**
     * @author Surfiq Tech
     */
    public function doctorList()
    {
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->acceptedUsers();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/doctorList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function doctorGridList()
    {
        // $data['admin_data']    = $this->adminData;
        // $data['accepted_users'] = $this->Admin_model->acceptedUsers();

        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->doctorsList();
        $data['doctor_patients'] = $this->Admin_model->getPatientDocuments($adminID);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/doctorGridList',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function profile()
    {
        $data['admin_data']    = $this->adminData;
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/profile.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function addDoctor()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($adminID);

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/addDoctor',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function submitDoctor()
    {
        $upload_path = 'assets/uploads/images/';

        $doctorData = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'age' => $this->input->post('age'),
                'phone_number' => $this->input->post('phone_number'),
                'password' => sha1($this->input->post('password')),               
                'shipping_address' => $this->input->post('shipping_address'),
                'billing_address' => $this->input->post('billing_address'),
                'gst_no' => $this->input->post('gst_no'),
                'profile_image' => $this->input->post('doctor_img_name'),
                'user_type_id' => 2,
                'is_active' => 1,
                'source' => 0,
                'added_by' => 1,
                'created' => date('Y-m-d')
        );
        $doctorID = $this->db->insert('users',$doctorData);
        $item_id = $this->db->insert_id();
        // $data = array(
        //     'doctor_id' => $item_id,
        //     'shipping_address' => $this->input->post('shipping_address'),
        //     'added_by' => 1,
        // );
        // $doctorShippingAddress = $this->db->insert('shipping_address',$data);

        if($item_id)
        {
            $this->session->set_flashdata('success','Doctor Added!');
            redirect('admin/doctors');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('admin/doctors');
        }
    }

    public function editDoctor($doctorID)
    {
		$data['admin_data']    = $this->adminData;
		$adminID = $data['admin_data']['id'];

        $data['doctor_data'] = $this->Admin_model->getDoctorByID($doctorID);
		$data['shipping_address'] = $this->Admin_model->getShipppingAddress($doctorID);
//		echo "<pre>";
//		print_r($data['shipping_address']);
//		die();
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/editDoctor',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function udpateDoctorData()
    {
        $upload_path = 'assets/uploads/images/';

        $doctorID = $this->input->post('doctorID');

        $updateData['first_name'] = $this->input->post('first_name');  
        $updateData['last_name'] = $this->input->post('last_name');  
        $updateData['email'] = $this->input->post('email');    
        $updateData['age'] = $this->input->post('age');    
        $updateData['phone_number'] = $this->input->post('phone_number'); 
        if($this->input->post('password')!='') { 
            $updateData['password'] = sha1($this->input->post('password'));  
        }
        if($this->input->post('doctor_img_name')!='') {
            $updateData['profile_image'] = $this->input->post('doctor_img_name');     
        }
        $updateData['shipping_address'] = $this->input->post('default_shipping_address');  
        $updateData['billing_address'] = $this->input->post('billing_address');
        $updateData['gst_no'] = $this->input->post('gst_no');

        $result = $this->Admin_model->udpateDoctorStatus($doctorID , $updateData);
        if($result){
            $this->session->set_flashdata('success', "Doctor Updated");
            redirect('admin/doctors');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/doctors');
        }
    }
    public function viewDoctor($doctorID)
    {
        $data['admin_data']    = $this->adminData;
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($doctorID);
        $data['shipping_address'] = $this->Admin_model->getShipppingAddress($doctorID);

        // echo "<pre>";
        // print_r($data['shipping_address']);
        // die();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('doctor/viewDoctor.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function deleteDoctorByID()
    {
        // echo json_encode('yes');
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');
        $resultData = $this->Admin_model->deleteDoctorByID($recordID, $table_name);

        // Delete Doctor Request from Request Table
        $deleteDoctorRequestByID = $this->Admin_model->deleteDoctorRequestByID($recordID);
        
        //getting patient data against doctor ID
        $patientDoctorData = $this->Admin_model->getDoctorPatientData($recordID);
        for($i=0;$i<count($patientDoctorData);$i++)
        {   
            $patientID = $patientDoctorData[$i]->pt_id;
            $table_name = 'patients';
            $this->Admin_model->deletePatientByID($patientID, $table_name);
            $this->Admin_model->deletePhotosByID($patientID);
            $this->Admin_model->deleteDocumentByID($patientID);
            $this->Admin_model->deleteDocPhotosByID($patientID);
        }
        
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Doctor Deleted');
            $response = array("type"=>"success","message"=>"Doctor Deleted"); 
        } 
        else {
            $this->session->set_flashdata('error', 'Seems to an error. Please try again later.');
            $response = array("type"=>"error","message"=>"Something went wrong"); 

        }

        echo json_encode($response);
        exit;
    } 
    public function doctorimgCrop()
    {
        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);

        $image_name = 'assets/uploads/images/' . time() . '.png';
        $fileimage_name =  time() . '.png';

        file_put_contents($image_name, $data);
        echo $fileimage_name;
    }

	//    Add New Shipping Address
	public  function addNewAddress(){
//    	echo "<pre>";
//    	print_r($this->input->post());
//    	die();
		$data['admin_data']    = $this->adminData;
		$adminID = $data['admin_data']['id'];

//		$data['userdata']    = $this->userdata;
//		$adminID = $data['userdata']['id'];
		$doctorID = $this->input->post('doctorID');
		$newAddress = $this->input->post('new_address');
		$shippingData = array(
			'doctor_id' => $doctorID,
			'shipping_address' => $newAddress,
			'added_by' => $adminID,
		);
		$result = $this->Admin_model->insertShippingAddress($shippingData);
		redirect('admin/doctor/editDoctor/'.$doctorID);
		if($result){
			$this->session->set_flashdata('success', "Doctor Updated");
			redirect('admin/doctors');
		} else {
			$this->session->set_flashdata('error', "Somethin went wrong!.");
			redirect('admin/doctors');
		}
	}
    public  function addShippingAddress(){

        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $doctorID = $this->input->post('doctorID');
        $data = array(
            'id' => $doctorID,
            'street-address' => $this->input->post('shipping_streetaddress'),
            'shipping_city' => $this->input->post('shipping_city'),
            'shipping_country' => $this->input->post('shipping_country'),
        );
        $result=$this->db->insert('shipping',$data);
        if($result){
            $this->session->set_flashdata('success', "Address Added");
            redirect('admin/doctor/editDoctor/'.$doctorID);
        } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/doctor/editDoctor/'.$doctorID);
        }

    }


	//    Add Edit Shipping Address
	public  function editAddress(){
//		$data['userdata']    = $this->userdata;
//		$adminID = $data['userdata']['id'];
		$shipping_id = $this->input->post('id');
		$result = $this->Admin_model->getEditShippingAddress($shipping_id);
		echo json_encode($result);
	}

	//    Add Update Shipping Address
	public  function updateAddress(){
//    	echo "<pre>";
//    	print_r($this->input->post());
//    	die();
		$data['admin_data']    = $this->adminData;
		$adminID = $data['admin_data']['id'];
		$doctor_id = $this->input->post('doctorID');
		$shipping_id = $this->input->post('shippingID');
		$address = $this->input->post('new_address');

		$shippingData = array(
			'doctor_id' => $doctor_id,
			'shipping_address' => $address,
			'added_by' => $adminID,
		);
		$result = $this->Admin_model->updateShippingAddress($shipping_id, $shippingData);
		redirect('admin/doctor/editDoctor/'.$doctor_id);
		if($result){
			$this->session->set_flashdata('success', "Doctor Updated");
			redirect('admin/doctors');
		} else {
			$this->session->set_flashdata('error', "Somethin went wrong!.");
			redirect('admin/doctors');
		}
	}

	//    Add Delete Shipping Address
	public function deleteShippingAddress()
	{
		$shipping_id=$this->input->post('id');
		$shippingData=$this->Admin_model->deleteShippingAddress($shipping_id);
		echo json_encode($shippingData);
	}

	public  function getSpecificDoctorAddress(){

    	$doctorID = $this->input->post('id');
		$result = $this->Admin_model->getSpecificDoctorAddress($doctorID);
		echo json_encode($result);
	}

    public  function getSpecificDoctorProfile(){
        $doctorID = $this->input->post('id');
        $result = $this->Admin_model->getDoctorProfile($doctorID);
        echo json_encode($result);
    }


      public function searchDoctor()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];

        $doctorName = $this->input->post('doctor_name');

        $this->db->select('*');
        // $this->db->where('user_type_id', 2);
        // $this->db->where('is_active', 1);
        $this->db->from('users');
        $this->db->like('first_name', $doctorName);
        $this->db->or_like('last_name', $doctorName);
        $this->db->or_like('phone_number', $doctorName);
        $this->db->or_like('email', $doctorName);
        $this->db->or_like('gst_no', $doctorName);

        $res = $this->db->get();
        $result = $res->result_array();

        if ($result) {
            
            echo json_encode($result);
            exit;
        }


    }

        
    

}
