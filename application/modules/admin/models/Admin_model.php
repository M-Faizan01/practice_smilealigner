<?php
/**
 * model Name: Admin_model
 * Description: front end Admin_model
 * @author Muhammad Irfan Aslam
 * Created date: 2020-05-07
 */
class Admin_model extends CI_Model {

    /**
     * function to invoke necessary component
     * @author  Irfan Aslam
     */
    function __construct() {
        parent :: __construct();
    }
    function getRegUsers()
    {
        $this->db->select('*');
        $this->db->where('user_type_id',2);
        $this->db->where('added_by',0);
        $this->db->order_by('id','DESC');
        $res = $this->db->get('users');
        return $res->result();
    }

    function acceptedUsers()
    {
        $this->db->select('*');
        $this->db->where('user_type_id',2);
        $this->db->where('is_active',1);
        $this->db->where('added_by',0);
        $res = $this->db->get('users');
        return $res->result();
    }
    function doctorsList()
    {
        $this->db->select('*');
        $this->db->where('user_type_id',2);
        $this->db->where('is_active',1);
        $res = $this->db->get('users');
        return $res->result();
    }
    function plannersList()
    {
        $this->db->select('*');
        $this->db->where('user_type_id',4);
        $this->db->where('is_active',1);
        $res = $this->db->get('users');
        return $res->result();
    }
    function developersList()
    {
        $this->db->select('*');
        $this->db->where('user_type_id',5);
        $this->db->where('is_active',1);
        $res = $this->db->get('users');
        return $res->result();
    }
    function declinedUsers()
    {
        $this->db->select('*');
        $this->db->where('id!=1');
        $this->db->where('is_active',2);
        $res = $this->db->get('users');
        return $res->result();
    }
    function pendingUsers()
    {
        $this->db->select('*');
        $this->db->where('id!=1');
        $this->db->where('is_active',0);
        $res = $this->db->get('users');
        return $res->result();
    }
    function udpateDoctorStatus($doctorID, $data)
    {
        $this->db->where('id',$doctorID);
        return $this->db->update('users',$data);
    }
    function udpatePlannerStatus($id, $data)
    {
        $this->db->where('id',$id);
        return $this->db->update('users',$data);
    }
    function getDoctorByID($doctorID)
    {
        $this->db->select('*');
        $this->db->where('id',$doctorID);
        $res = $this->db->get('users');
        return $res->result();
    }
    function getPlannerByID($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $res = $this->db->get('users');
        return $res->result();
    }
    function insertRejectedUsers($rejData)
    {
        $this->db->insert('rejected_history',$rejData);
        return $this->db->insert_id();
    }
    function getRejectedByID($doctorID)
    {
        $this->db->select('*');
        $this->db->where('user_id',$doctorID);
        $res = $this->db->get('rejected_history');
        return $res->result();        
    }
    // Delete Request By Doctor ID
    function deleteDoctorRequestByID($recordID) {
        $this->db->where('user_id', $recordID);
        $this->db->delete('rejected_history');
        return $this->db->affected_rows();
    }
    function deleteDoctorByID($recordID, $table_name) {
        $this->db->where('id', $recordID);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    }
    function deletePlannerByID($recordID, $table_name) {
        $this->db->where('id', $recordID);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    } 
    function deletePatientByID($recordID, $table_name) {
        $this->db->where('pt_id', $recordID);
        $this->db->delete($table_name);
        return $this->db->affected_rows();
    } 
    function getReferenceDoctors()
    {
        $this->db->select('*');
        $res = $this->db->get('refer_doctor');
        return $res->result();
    }
    function getTreatmentData()
    {
        $this->db->select('*');
        $res = $this->db->get('treatment');
        return $res->result();
    }
    function getTreatmentCaseData()
    {
        $this->db->select('*');
        $res = $this->db->get('treatment_case');
        return $res->result();
    }
    function getArchData()
    {
        $this->db->select('*');
        $res = $this->db->get('arc_treated');
        return $res->result();
    }
    function getPatientDocuments($adminID)
    {
        $this->db->select("*");
        $this->db->from('documents');
        $this->db->join('patients', 'patients.pt_id = documents.patient_id');
        //$this->db->join('documents', 'documents.patient_id = patients.pt_id');
        $this->db->order_by('documents.doc_id','desc');
        $q = $this->db->get();
        return $q->result_array();
    }
    
     function getAllPatientDocuments()
    {
        $this->db->select("*");
        $this->db->from('documents');
        // $this->db->join('patients', 'patients.pt_id = documents.patient_id');
        //$this->db->join('documents', 'documents.patient_id = patients.pt_id');
        $this->db->order_by('documents.doc_id','desc');
        $q = $this->db->get();
        return $q->result_array();
    }
    
    function deletePhotosByID($recordID) {
        $this->db->where('user_id', $recordID);
        $this->db->where('type', 'patient');
        $this->db->delete('photos');
        return $this->db->affected_rows();
    }
    function deleteDocPhotosByID($recordID) {
        $this->db->where('user_id', $recordID);
        $this->db->where('type', 'document');
        $this->db->delete('photos');
        return $this->db->affected_rows();
    }
    function deleteDoctorPatientByID($recordID) {
        $this->db->where('doctor_id', $recordID);
        $this->db->delete('patients');
        return $this->db->affected_rows();
    }  
    function getDoctorPatientData($doctorID)
    {
        $this->db->select('*');
        $this->db->where('doctor_id',$doctorID);
        $res = $this->db->get('patients');
        return $res->result(); 
    }
    function deleteDocumentByID($recordID)
    {
        $this->db->where('patient_id', $recordID);
        $this->db->delete('documents');
        return $this->db->affected_rows();
    }
	//    Get Shipping Addres
	function getShipppingAddress($userID){
		$this->db->select('*');
		$this->db->where('doctor_id', $userID);
		$res = $this->db->get('shipping_address');
		return $res->result_array();

	}

	//	INSERT Shipping Address
	function insertShippingAddress($shippingData)
	{
		$this->db->insert('shipping_address',$shippingData);
		return $this->db->insert_id();
	}

	//	GET Shipping Address For Edit
	function getEditShippingAddress($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$res = $this->db->get('shipping_address');
		return $res->row();
	}

	//	UPDATE Shipping Address
	function updateShippingAddress($id, $data)
	{
		$this->db->where('id',$id);
		return $this->db->update('shipping_address',$data);
	}

	//	DELETE Shipping Address
	function deleteShippingAddress ($id){
		$this->db->where('id',$id);
		$this->db->delete("shipping_address");
	}

	//	GET Specific Doctor Shipping Address
	function getSpecificDoctorAddress($id){
		$this->db->select('*');
		$this->db->where('doctor_id',$id);
		$res = $this->db->get('shipping_address');
		return $res->result();
	}

    // Get Accepted Doctor Row
    function getAcceptedDoctorDetails($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->where('is_active', 1);
        $res = $this->db->get('users');
        return $res->row();
    }

     // Get Rejected Doctor Row
    function getRejectedDoctorDetails($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->where('is_active', 2);
        $res = $this->db->get('users');
        return $res->row();
    }

    // Get Doctor Row
     function getDoctorProfile($doctorID)
    {
        $this->db->select('*');
        $this->db->where('id',$doctorID);
        $res = $this->db->get('users');
        return $res->row();
    }
}
