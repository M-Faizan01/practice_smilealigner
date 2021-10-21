<?php
/**
 * Controller Name: Admin
 * Description: back end admin
 * @author Surfiq Tech
 * Created date: 2021-07-02
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends MY_Controller
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
        $this->load->model(array("Admin_model", "Import_model"));
        $this->load->library('Excel');
    }
    /**
     * @author Surfiq Tech
    */

    //Import main page
    public function import(){
        $data['admin_data']    = $this->adminData;
        $this->load->view('elements/admin_header',$data);
        $this->load->view('admin_topbar',$data);
        $this->load->view('admin_sidebar',$data);
        $this->load->view('Setting/index.php',$data);
        $this->load->view('elements/admin_footer',$data);
    }

    //To import patient data
    public function importPatientInfo(){
        if(isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            // error_reporting(E_ALL);
            // ini_set('display_errors', TRUE);
            // ini_set('display_startup_errors', TRUE);
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++) {
                    $doctor_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    if(empty($doctor_id)){
                        $doctor_id = 1;
                    }
                    $pt_firstname = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $pt_lastname = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $pt_objective = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $pt_treatment_plan = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $cur_date = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $type_of_treatment = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $status = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $pt_shipping_details = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $pt_billing_address = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $data[] = array(
                        'doctor_id'  => $doctor_id,
                        'pt_firstname'   => $pt_firstname,
                        'pt_lastname'    => $pt_lastname,
                        'pt_objective'   => $pt_objective,
                        'pt_treatment_plan'   => $pt_treatment_plan,
                        'cur_date'   => $cur_date,
                        'type_of_treatment'   => $type_of_treatment,
                        'status'   => $status,
                        'pt_shipping_details'   => $pt_shipping_details,
                        'pt_billing_address'   => $pt_billing_address
                    );
                }
            }
            
            $this->Import_model->insertPatientData($data);
            $this->session->set_flashdata('success', "Patients Imported Successfully");
            redirect('admin/patient/patientListing');

        }
    }

    public function importDoctorInfo(){
        if(isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++) {
                    $first_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $last_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $material_status = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $date_of_birth = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $phone_number = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $shipping_address = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $billing_address = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $age = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $gst_no = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $refer_by = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $refer_text = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $gender = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $user_type_id = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $is_active = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $added_by = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $created = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $updated = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $data[] = array(
                        'first_name'  => $first_name,
                        'last_name'   => $last_name,
                        'material_status'    => $material_status,
                        'date_of_birth'   => $date_of_birth,
                        'phone_number'   => $phone_number,
                        'email'   => $email,
                        'shipping_address'   => $shipping_address,
                        'billing_address'   => $billing_address,
                        'age'   => $age,
                        'gst_no'   => $gst_no,
                        'refer_by'   => $refer_by,
                        'refer_text'   => $refer_text,
                        'gender'   => $gender,
                        'user_type_id'   => $user_type_id,
                        'is_active'   => $is_active,
                        'added_by'   => $added_by,
                        'created'   => $created,
                        'updated'   => $updated
                    );
                }
            }
        
            $this->excel_import_model->insertDoctorData($data);
            $this->session->set_flashdata('success', "Doctors Imported Successfully");
            redirect('admin/doctors');

        }
    }

    
}