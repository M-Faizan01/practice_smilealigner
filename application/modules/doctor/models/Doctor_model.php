<?php
/**
 * model Name: Doctor_model
 * Description: front end Doctor_model
 * @author Surfiq Tech
 * Created date: 2020-05-07
 */
class Doctor_model extends CI_Model {

    /**
     * function to invoke necessary component
     * @author  Surfiq Tech
     */
    function __construct() {
        parent :: __construct();
    }
    function insertDocument($docData)
    {
        $this->db->insert('documents',$docData);
        return $this->db->insert_id();
    }
    function insertPatientsData($patientData)
    {
        $this->db->insert('patients',$patientData);
        return $this->db->insert_id();
    }
    function getDocumentDataByID($doc_id)
    {
        $this->db->select('*');
        $this->db->where('doc_id',$doc_id);
        $res = $this->db->get('documents');
        return $res->result();
    }
    function getPostDataByID($postID)
    {
        $this->db->select('*');
        $this->db->where('post_id',$postID);
        $res = $this->db->get('photos');
        return $res->result();
    }
     function getPatientList($userID)
    {
        $this->db->select("*");
        $this->db->where('added_by!=""');
        $this->db->where('doctor_id',$userID);
        $this->db->from('patients');
        $q = $this->db->get();
        return $q->result_array();
    }
    function getPatientListByID($userID)
    {
        $this->db->select('*');
        $this->db->where('added_by!=""');
        $this->db->where('doctor_id',$userID);
        $this->db->order_by('pt_id','DESC');
        $res = $this->db->get('patients');
        return $res->result_array();
    }
    function getDocumentListByID($userID)
    {
        $this->db->select('*');
        $this->db->from('documents');
        $this->db->where('documents.added_by!=""');
        $this->db->where('doctor_id',$userID);
        $this->db->join('patients', 'patients.pt_id = documents.patient_id');
        $this->db->order_by('documents.doc_id','desc');
        $res = $this->db->get();
        return $res->result_array();
    }
    function updateDocumentData($docid, $data)
    {
        $this->db->where('doc_id',$docid);
        return $this->db->update('documents',$data);
    }
    function getPhotosByID($postID)
    {
        $this->db->select('*');
        $this->db->where('post_id',$postID);
        $this->db->where('type','document');
        $res = $this->db->get('photos');
        return $res->result_array();
    }
    function getSinglePatient($ptID)
    {
        $this->db->select("*");
        $this->db->from('patients');
        $this->db->join('users', 'users.id = patients.added_by');
        $this->db->where('patients.pt_id', $ptID);
        $q = $this->db->get();
        return $q->result_array();
    }
    function getDoctorPatients($doctorID){
        $this->db->select("*");
        $this->db->from('patients');
        $this->db->where('patients.doctor_id', $doctorID);
        $this->db->order_by("pt_id", "DESC");
        $q = $this->db->get();
        return $q->result_array();
    }
    function getDoctorByID($doctorID)
    {
        $this->db->select('*');
        $this->db->where('id',$doctorID);
        $res = $this->db->get('users');
        return $res->result();
    }
     function getPatientPhotosByID($postID)
    {
        $this->db->select('*');
        $this->db->where('user_id',$postID);
        $this->db->where('type','patient');
        $res = $this->db->get('photos');
        return $res->result_array();
    }
    function deleteImagesByID ($imgID){
      $this->db->where('photos_id',$imgID);
      $this->db->delete("photos");
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

        function getPhotosTyoePostID($docType, $postID)
    {
        if($docType == 'oral_opg_lateral'){
            $this->db->select('*');
            $this->db->group_start();
            $this->db->where('key','Intra Oral Images');
            $this->db->or_where('key','OPG Images');
            $this->db->or_where('key','Lateral C Images');
            $this->db->group_end();
            $this->db->where('user_id',$postID);
            $res = $this->db->get('photos');
            return $res->result_array();
        }else if($docType == 'images_stl'){
            $key = 'STL File(3D File)';
        }else if($docType == 'images_treatment_plan'){
            $key = 'Treatment Plan';
        }else if($docType == 'ipr_files'){
            $key = 'IPR';
        }else if($docType == 'invoice_files'){
            $key = 'Invoice';
        }
        $this->db->select('*');
        $this->db->where('key',$key);
        $this->db->where('user_id',$postID);
        $res = $this->db->get('photos');
        return $res->result_array();
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

     function getImageByTypeAndID($patientID, $imageType){
        $this->db->select('*');
        $this->db->where('user_id',$patientID);
        $this->db->where('key',$imageType);
        $res = $this->db->get('photos');
        return $res->result_array();   
    }
    

}
