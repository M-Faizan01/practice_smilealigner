<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-04
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Treatmentplanner extends MY_Controller
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
    public function plannersList()
    {
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->plannersList();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/indexList.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function plannersGrid()
    {
        $data['admin_data']    = $this->adminData;
        $data['accepted_users'] = $this->Admin_model->plannersList();
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/indexGrid',$data);
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
    public function addPlanner()
    {
        $data['admin_data']    = $this->adminData;
        $adminID = $data['admin_data']['id'];
        $data['doctor_data'] = $this->Admin_model->getDoctorByID($adminID);

        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/add',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function submitPlanner()
    {
        $upload_path = 'assets/uploads/images/';

        $plannerData = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'age' => $this->input->post('age'),
                'phone_number' => $this->input->post('phone_number'),
                'password' => sha1($this->input->post('password')),
                'profile_image' => $this->input->post('planner_img_name'),
                'user_type_id' => 4,
                'is_active' => 1,
                'source' => 0,
                'created' => date('Y-m-d')
        );
        $plannerID = $this->db->insert('users',$plannerData);
        if($plannerID)
        {
            $this->session->set_flashdata('success','Treatment Planner Added!');
            redirect('admin/treatmentplanner/plannersList');
        }
        else{
            $this->session->set_flashdata('error','Something went wrong!');
            redirect('admin/treatmentplanner/plannersList');
        }
    }
    public function edit($id)
    {
        $data['admin_data']    = $this->adminData;
        $data['planner_data'] = $this->Admin_model->getDoctorByID($id);
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/edit',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function udpatePlannerData()
    {
        $upload_path = 'assets/uploads/images/';

        $id = $this->input->post('plannerID');

        $updateData['first_name'] = $this->input->post('first_name');  
        $updateData['last_name'] = $this->input->post('last_name');  
        $updateData['email'] = $this->input->post('email');    
        $updateData['age'] = $this->input->post('age');    
        $updateData['phone_number'] = $this->input->post('phone_number'); 
        if($this->input->post('password')!='') { 
            $updateData['password'] = sha1($this->input->post('password'));  
        }
        if($this->input->post('planner_img_name')!='') {
            $updateData['profile_image'] = $this->input->post('planner_img_name');     
        }

        $result = $this->Admin_model->udpatePlannerStatus($id , $updateData);
        if($result){
            $this->session->set_flashdata('success', "Treatment Planner Updated");
            redirect('admin/treatmentplanner/plannersList');
         } else {
            $this->session->set_flashdata('error', "Somethin went wrong!.");
            redirect('admin/treatmentplanner/plannersList');
        }
    }
    public function view($id)
    {
        $data['admin_data']    = $this->adminData;
        $data['planner_data'] = $this->Admin_model->getDoctorByID($id);
        
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('TreatmentPlanner/show.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }
    public function deletePlannerByID()
    {
        $recordID = $this->input->post('recordID');
        $table_name = $this->input->post('table_name');
        $resultData = $this->Admin_model->deleteDoctorByID($recordID, $table_name);
        
        if ($resultData) {
            //$this->session->set_flashdata('success', 'Doctor Deleted');
            $response = array("type"=>"success","message"=>"Treatment Planner Deleted"); 
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


}