<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>

<style type="text/css">
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
</style>

<div id="page_content">
    <div id="page_content_inner" class="page_content-p">
        <br>
        <br>
        <h1 class="heading_b uk-margin-bottom patientMobile">Edit Patient</h1>
        <?php for($i=0;$i<count($patient_data);$i++) {
            $patientPhoto = $patient_data[$i]['patient_photos'];
         ?>
            <div class="md-card uk-margin-large-bottom">
                <div class="md-card-content">
                    <ul id="registration-step">
                        <li id="account" class="highlight">
                            <h2 class="themeTextColor stepSetting"><b>Step 1</b>&nbsp;<span class="material-icons themeTextColor iconStepOne">arrow_right</span><hr></h2>
                        </li>
                        <li id="password"><h2 class="themeTextColor stepSetting"><b>Step 2</b>
                        &nbsp;<span class="material-icons themeTextColor iconStepOne">arrow_right</span><hr></h2></li>
                        <li id="general"><h2 class="themeTextColor stepSetting"><b>Step 3</b>&nbsp;<span class="material-icons themeTextColor iconStepOne">arrow_right</span><hr></h2></li>
                    </ul>

                    <form class="uk-form-stacked" name="frmRegistration" id="registration-form" method="post" action="<?= site_url('admin/patient/updatePatient'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="patientID" value="<?= $patient_data[$i]['pt_id']; ?>">

                    <div id="account-field">
                        <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="md-input-wrapper">
                             <label class="label-p" for="wizard_fullname"><b>Select Doctor</b><span class="req">*</span></label>
                            <select id="select_doctor" name="doctor_id" data-md-selectize>
                                <option value=""><b>Doctor</b></option>
                                   <?php foreach($doctor_data as $doctor){?>
                                     <option <?=($patient_data[$i]['doctor_id'] == $doctor->id)?'selected':'';?>  value="<?= $doctor->id;?>"><?= $doctor->first_name;?></option>
                                   <?php } ?>
                            </select>
                        </div>
                        </div>
                       
                      </div>
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><b>First Name</b><span class="req">*</span><input type="text" name="pt_firstname" id="wizard_fullname" required="" class="md-input demoInputBox input-border" value="<?= $patient_data[$i]['pt_firstname']; ?>"><span class="md-input-bar"></span></div>
                                
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><b>Last Name</b><span class="req">*</span><input type="text" name="pt_lastname" id="wizard_fullname" required="" class="md-input demoInputBox input-border" value="<?= $patient_data[$i]['pt_lastname']; ?>"><span class="md-input-bar"></span></div>
                                
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">

                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="uk-form-row parsley-row">
                                            <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                            <span class="icheck-inline">
                                                <input type="radio" name="pt_gender" value="male" id="val_radio_male" data-md-icheck required <?php echo $patient_data[$i]['pt_gender'] == 'male' ? 'checked' : ''; ?>/>
                                                <label for="val_radio_male" class="inline-label">Male</label>
                                            </span>
                                            <span class="icheck-inline">
                                                <input type="radio" name="pt_gender" id="val_radio_female" value="female" data-md-icheck <?php echo $patient_data[$i]['pt_gender'] == 'female' ? 'checked' : ''; ?>/>
                                                <label for="val_radio_female" class="inline-label">Female</label>
                                            </span>
                                        </div>
                                    </div>
                                     <div class="uk-width-medium-1-2"  style="padding-right: 0px; padding-top: 0px;">
                                        <div class="md-input-wrapper"><label class="label-p" for="wizard_fullname"><b>Age</b></label><input type="text" name="pt_age" id="wizard_fullname" class="md-input demoInputBox input-border" value="<?= $patient_data[$i]['pt_age']; ?>"><span class="md-input-bar"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <!-- <div class="uk-input-group"> -->
                                   <!--  <span class="uk-input-group-addon">
                                        
                                    </span> -->
                                    <label class="label-p" for="wizard_email"><b>Email ID</b></label>
                                    <input type="text" class="md-input input-border" name="pt_email" id="wizard_email" value="<?= $patient_data[$i]['pt_email']; ?>" required />
                                <!-- </div> -->
                            </div>
                        </div>
                    <div style="margin-bottom: 31px !important;" class="uk-form-row">
                        <div class="uk-width-medium-1-2">
                            <br>
                            <label for="lastName" class="form-label"><b>Profile Picture</b></label>
                            <br>
                            <br>
                             <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <?php if($patient_data[$i]['pt_img']!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $patient_data[$i]['pt_img']); ?>" style="width: 100% !important;" alt="user avatar"/>
                                        <?php } else{ ?>
                                            <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
                                        <?php } ?>
                                    </div>
                                    <div class="fileinput-exists thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar" id="uploaded_image"/>
                                    </div>
                                    <label for="lastName" class="form-label" style="position: absolute;width:200%;margin-top:25px;margin-left:15px;">
                                        <div class="user_avatar_controls">
                                            <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput" style="float: left;"><i class="material-icons">&#xE5CD;</i></a>
                                            <span class="btn-file" style="float: left;left:0px;">
                                                <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                                <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                                <input type="file" name="pt_img" id="upload_image">
                                                <input type="hidden" name="pt_img_name" id="ptimg_name" value="">
                                            </span>
                                        </div>    
                                        <!-- Upload Profile Photo -->
                                    </label>                                
                                </div>
                            <br>
                            
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group alert-up-pd">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><b>Images Intra Oral</b></div>
                                        <div class="panel-body">
                                            <input id="input-fa-1" name="images_intra_oral[]" class="user_files_images" type="file" multiple="">
                                        </div>
                                        <?php
                                            $count = 0;
                                            for ($j=0;$j<count($patientPhoto);$j++){
                                                if($patientPhoto[$j]['key']=='Intra Oral Images') {
                                                    $count++;
                                                }
                                            }
                                            if($count>0){
                                        ?>
                                        <ul class="image-thumbnail-preview">
                                            <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                if($patientPhoto[$j]['key']=='Intra Oral Images') {
                                            ?>
                                            <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                            </li>
                                            <?php } } ?>
                                        </ul>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                        <div class="row mobileImageOPG">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group alert-up-pd">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><b>Images OPG</b></div>
                                            <div class="panel-body">
                                                <input id="input-fa-2" name="images_opg[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                            <?php
                                                $count = 0;
                                                for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='OPG Images') {
                                                        $count++;
                                                    }
                                                }
                                                if($count>0){
                                            ?>
                                            <ul class="image-thumbnail-preview">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='OPG Images') {
                                                ?>
                                                <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img  src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                    <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                </li>
                                                <?php } } ?>
                                            </ul>
                                            <?php
                                                }
                                            ?>     
                                        </div>
                                    </div>
                                </div> 
                            </div>          
                        </div>
                        <br>
                        <br>
                    <div id="password-field" style="display:none;">
                    <div class="row imageSpaceSetting">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div class="form-group alert-up-pd">
                             <div class="panel panel-default">
                                 <div class="panel-heading"><b>Images Lateral C</b></div>
                                       <div class="panel-body">
                                            <input id="input-fa-3" name="images_lateral_c[]" class="user_files_images" type="file" multiple="">
                                        </div>
                                        <?php
                                            $count = 0;
                                            for ($j=0;$j<count($patientPhoto);$j++){
                                                if($patientPhoto[$j]['key']=='Lateral C Images') {
                                                    $count++;
                                                }
                                            }
                                            if($count>0){
                                        ?>
                                            <ul class="image-thumbnail-preview pictureBrowseUpperSetting">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='Lateral C Images') {
                                                ?>
                                                    <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                        <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                        <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                    </li>
                                                <?php } } ?>
                                            </ul>
                                        <?php
                                            }
                                        ?>  
                                    </div>
                                </div>
                             </div> 
                          </div>
                          <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-form-row parsley-row scanImpression">
                              <label for="gender" class="uk-form-label"><b>Impressions</b><span class="req">*</span></label>

                               <label><input type="radio" name="pt_scan_impression" onclick="show1();" value="no" <?php echo $patient_data[$i]['pt_scan_impression'] == 'no' ? 'checked' : ''; ?>/>No</label>

                                <label><input type="radio" name="pt_scan_impression" id="pt_scan_impression" value="yes" onclick="show2();" <?php echo $patient_data[$i]['pt_scan_impression'] == 'yes' ? 'checked' : ''; ?>/>Yes</label>                                
                              </div>
                        </div>
                        
                              
                            
                        <div class="row imageSpaceSetting">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Upload STL</b></div>
                                            <div class="panel-body">
                                                <input id="stlFiles" name="images_stl[]" class="user_files_images" type="file" multiple="">
                                            </div>
                                            <?php
                                                $count = 0;
                                                for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='STL File(3D File)') {
                                                        $count++;
                                                    }
                                                }
                                                if($count>0){
                                            ?>
                                            <ul class="image-thumbnail-preview pictureBrowseUpperSetting">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='STL File(3D File)') {
                                                 ?>
                                                  <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                    <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                  </li>
                                                <?php } } ?>
                                            </ul>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                 </div> 
                              </div>
                         <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="parsley-row">
                                    <br>
                                <label class="label-p"  for="exampleFormControlFile1"><b>Treatment Objective</b></label><br>
                                    <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                    <textarea placeholder="lorem ipsum" class="md-input input-border" name="pt_objective" cols="10" rows="8"><?= $patient_data[$i]['pt_objective']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-3 uk-width-large-1-2">
             <label class="label-p" for="exampleFormControlFile1"><b>Referral Name</b></label>

            <select id="select_demo_1" name="pt_referal" data-md-selectize>
                <option value=""><b>Referral Name</b></option>
                   <?php foreach($reference_doctor as $referDoctor){?>
                     <option <?=($patient_data[$i]['pt_referal'] == $referDoctor->doctor_name)?'selected':'';?> value="<?= $referDoctor->doctor_name;?>"><?= $referDoctor->doctor_name;?></option>
                   <?php } ?>
            </select>
        </div>
      </div>
        <div class="collapse uk-margin-medium-top" id="featuresData">
            <label for="exampleFormControlFile1"><b>Type of Treatment</b></label>
            <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
              <?php $typeOfTreatment = json_decode($patient_data[$i]['type_of_treatment'], true);
                foreach($treatment_data as $treatmentData): ?>
                    <div class="col-md-2" style="line-height: 30px;">
                        <input name="treatmentData" value="<?php echo $treatmentData->tr_name; ?>" type="checkbox" id="<?php echo $treatmentData->tr_name; ?>"  class="chk-col-green" <?php if($treatmentData->tr_name == $patient_data[$i]['type_of_treatment']) { echo 'checked'; } ?>/>
                        <label class="label-grey" for="<?php echo $treatmentData->tr_name; ?>"><?php echo $treatmentData->tr_name; ?></label>
                    </div>
                <?php endforeach;   ?>
            </div>
        </div>
        <br>
        <br>
        <br>
 
            <div class="collapse uk-margin-large-top" id="featuresData">
                <label for="exampleFormControlFile1"><b>Type of case:Malocclusion</b></label><br>

                <div style="display: block;" class="demo-checkbox col-md-12">
                  <?php $typeOfCase = json_decode($patient_data[$i]['type_of_case'], true);
                    foreach($treatment_case_data as $treatmentCaseData): ?>
                        <div class="col-md-2" style="line-height: 30px;">
                            <input name="treatmentCaseData" value="<?php echo $treatmentCaseData->case_name; ?>" type="checkbox" id="<?php echo $treatmentCaseData->case_name; ?>" class="chk-col-green" <?php if($treatmentCaseData->case_name == $patient_data[$i]['type_of_case']) { echo 'checked'; } ?> />
                            <label class="label-grey" for="<?php echo $treatmentCaseData->case_name; ?>"><?php echo $treatmentCaseData->case_name; ?></label>
                        </div>
                    <?php endforeach;   ?>
                </div>
            </div>
            <br>
            <div class="collapse uk-margin-medium-top" id="featuresData">
                <label for="exampleFormControlFile1"><b>Arches to be treated</b></label>
                <div style="display: block;" class="demo-checkbox col-md-12 uk-margin-small-top">
                  <?php $arcTreated = json_decode($patient_data[$i]['arc_treated'], true);
                        foreach($arch_data as $archData): ?>
                      <!-- <input name="archData" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" <?php if(in_array($archData->arc_name, $arcTreated)) { echo 'checked'; } ?> class="chk-col-green"/> -->
                      <div class="col-md-2" style="line-height: 30px;">
                        <input name="archData" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" <?php if($archData->arc_name == $patient_data[$i]['arc_treated']) { echo 'checked'; } ?> class="chk-col-green"/>
                        <label class="label-grey" for="<?php echo $archData->arc_name; ?>"><?php echo $archData->arc_name; ?></label>
                      </div>
                    <?php endforeach;  ?>
                </div>
            </div>
         <br>
         <br>
         <br>
         <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
              <div class="uk-form-row parsley-row">
                  <label for="gender" class="uk-form-label label-p"><b>IPR to be performed</b><span class="req">*</span></label>
                  <span class="icheck-inline">
                      <input type="radio" value="0" name="ipr_performed" id="val_radio_male" data-md-icheck required <?php echo $patient_data[$i]['ipr_performed'] == '0' ? 'checked' : ''; ?>/>
                      <label for="val_radio_male" class="inline-label">NO</label>
                  </span>
                  <span class="icheck-inline">
                      <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck <?php echo $patient_data[$i]['ipr_performed'] == '1' ? 'checked' : ''; ?>/>
                      <label for="val_radio_female" class="inline-label">Yes</label>
                  </span>
              </div>
          </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
              <div class="uk-form-row parsley-row">
                  <label for="gender" class="uk-form-label label-p"><b>Attachment to be placed</b><span class="req">*</span></label>
                  <span class="icheck-inline">
                      <input type="radio" value="0" name="attachment_placed" id="val_radio_male" data-md-icheck required <?php echo $patient_data[$i]['attachment_placed'] == '0' ? 'checked' : ''; ?>/>
                      <label for="val_radio_male" class="inline-label">NO</label>
                  </span>
                  <span class="icheck-inline">
                      <input type="radio" value="1" name="attachment_placed" id="val_radio_female" data-md-icheck  <?php echo $patient_data[$i]['attachment_placed'] == '1' ? 'checked' : ''; ?>/>
                      <label for="val_radio_female" class="inline-label">Yes</label>
                  </span>
              </div>
          </div>
        </div>
                             <div class="uk-grid treatmentPlan">
                            <div class="uk-width-1-1">
                                <div class="">
                                <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan*</b></label><br><br>
                                    <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                    <textarea placeholder="lorem ipsum" class="md-input input-border" name="pt_treatment_plan" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $patient_data[$i]['pt_treatment_plan']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                    </div>

                    <div id="general-field" style="display:none;">
                      
                        <div class="row imageSpaceSetting">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Treatment Plan File</b></div>
                                         <div class="panel-body">
                                                       <input id="input-fa-6" name="images_treatment_plan[]" accept="application/pdf" class="user_files_images" type="file" multiple="">

                                            </div>
                                            <?php
                                                $count = 0;
                                                for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='Treatment Plan') {
                                                        $count++;
                                                    }
                                                }
                                                if($count>0){
                                            ?>
                                            <ul class="image-thumbnail-preview pictureBrowseUpperSetting">
                                                        <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                            if($patientPhoto[$j]['key']=='Treatment Plan') {
                                                         ?>
                                                          <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                            <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                            <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                          </li>
                                                        <?php } } ?>
                                                      </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                 </div> 
                              </div>
                        <br>
                        <br>
                        <div class="uk-grid">
                             <div class="uk-width-medium-1-3 uk-width-large-1-2">
                                 <label for="exampleFormControlFile1" class="label-p"><b>Select Approval</b></label><br>
                            <select id="select_demo_1" name="pt_approval" data-md-selectize>
                            <option value=""><b>Approval</b></option>
                           <option value="1" <?=($patient_data[$i]['pt_approval'] == "1")?'selected':'';?>>Yes</option>
                           <option value="0" <?=($patient_data[$i]['pt_approval'] == "0")?'selected':'';?>>No</option>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-3 uk-width-large-1-2 approval-date">
                          <!--   <div class="uk-grid">
                                <div class="uk-width-large-2-3 uk-width-1-1"> -->
  <label for="uk_dp_1" class="label-p"><b>Approval Date</b></label>
                                    <!-- <label for="wizard_fullname"><b></b><span class="req">*</span></label> -->
                                    <div class="uk-input-group" style="width: 100%;">
                                        <!-- <span class="uk-input-group-addon"> -->
                                            <i style="position: absolute; top: 42%; right: 4%;" class="uk-input-group-icon uk-icon-calendar"></i>
                                    <!-- </span> -->
                                        <!-- <label for="uk_dp_1"><b>Approval Date</b></label> -->
                                        <input class="md-input input-border" name="pt_approval_date" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="<?= $patient_data[$i]['pt_approval_date']; ?>" placeholder="Approval Date">
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                            </div>
                            <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>Status</b><span class="req">*</span><input type="text" name="pt_custom_status" id="wizard_fullname"  class="md-input input-border" value="<?= $patient_data[$i]['pt_custom_status']; ?>" placeholder="Status"><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>Type of Case</b><span class="req">*</span><input type="text" name="pt_case_type" id="wizard_fullname"  class="md-input input-border" value="<?= $patient_data[$i]['pt_case_type']; ?>"><span class="md-input-bar" placeholder="Type of Case"></span></div>
                                        
                                    </div>
                                </div>
                                 <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>No of Aligners</b><span class="req">*</span><input type="text" name="pt_aligners" id="wizard_fullname" class="md-input input-border" value="<?= $patient_data[$i]['pt_aligners']; ?>"><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>No of Aligners Dispatched</b><span class="req">*</span><input type="text" name="pt_aligners_dispatch" id="wizard_fullname" class="md-input input-border" value="<?= $patient_data[$i]['pt_aligners_dispatch']; ?>"><span class="md-input-bar" ></span></div>
                                        
                                    </div>
                                </div>
                               <!--  <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>Total Bill Amount</b><span class="req">*</span><input type="text" name="pt_cost_plan" id="wizard_fullname" required="" class="md-input input-border" value="<?= $patient_data[$i]['pt_cost_plan']; ?>"><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>Total Amount Paid</b><span class="req">*</span><input type="text" name="pt_amount_paid" id="wizard_fullname" required="" class="md-input input-border" value="<?= $patient_data[$i]['pt_amount_paid']; ?>"><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                </div> -->
                                 <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                        
                                  <!-- hidden input -->
                                  <!-- <input type="hidden" name="" value="<?= $patient_data[$i]['pt_shipping_details']; ?>"> -->
                                    <label for="exampleFormControlFile1" class="label-p"><b>Select Shipping Address</b></label>
                                        <div class="drop-multiaddress">
                                            <div class="uk-form-select uk-select-st" style="" data-uk-form-select>
                                                                <span id="show-shipping">Select Shipping Address</span>
                                                <i class="uk-icon-caret-down" style="    float: right;
                                            padding: 2px 5px; color: #C4C4C4;"></i>

                                                        <input type="hidden" id="selected_shipping_address" name="" value="<?= $patient_data[$i]['pt_shipping_details']; ?>">
                                                                <select id="shipping_address" name="pt_shipping_details">
                                                                    <i class="uk-icon-caret-down"></i>
                                            <!--    <?php foreach($doctor_data as $doctor){?>
                                                             <option value="<?= $doctor->id;?>" ><?= $doctor->shipping_address;?></option>
                                                           <?php } ?> -->
                        <!--                            <option value="">...</option>-->
                                                </select>
                                            </div>
                    
                       
                    <a class="drop-multiaddress-icon" style="color: green;" data-uk-modal="{target:'#shipping_modal'}" href="#">
                       
                            <svg style="font-size: 20px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M696 480H544V328c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v152H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h152v152c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V544h152c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z" fill="currentColor"/><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z" fill="currentColor"/>
                        </svg>
                       
                    </a>
                           </div>             
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <div class="md-input-wrapper"><b>Billing Address</b><span class="req">*</span><input type="text" name="pt_billing_address" id="wizard_fullname"  class="md-input input-border" value="<?= $patient_data[$i]['pt_billing_address']; ?>"><span class="md-input-bar"></span></div>
                                        
                                    </div>
                                </div>

                                <div class="uk-grid dispatchDate">
                            <div class="uk-width-medium-1-2">
                           <!--  <div class="uk-grid">
                                <div class="uk-width-large-2-3 uk-width-1-1"> -->
                                    <label for="exampleFormControlFile1" class="label-p"><b>Dispatch Date</b></label><br>
                                    <div class="uk-input-group" style="width:100%;">
                                        <!-- <span class="uk-input-group-addon"> -->
                            <i style="position: absolute; top: 42%; right: 4%;" class="uk-input-group-icon uk-icon-calendar">
                            </i>
                      <!-- </span> -->
                                        
                                        <input class="md-input input-border" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}" name="pt_dispatch_date" value="<?= $patient_data[$i]['pt_dispatch_date']; ?>" placeholder="Dispatch Date">
                                    </div>
                               <!--  </div>
                            </div> -->
                        </div>
                            </div>
                        <div class="row imageOpgSetting">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>IPR</b></div>
                                        <div class="panel-body">
                                               <input id="input-fa-7" name="ipr_files[]" class="user_files_images" type="file" multiple="">
                                                
                                            </div>
                                            <?php   
                                                $count = 0;
                                                for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='IPR') {
                                                        $count++;
                                                    }
                                                }
                                                if($count>0){
                                            ?>
                                            <ul class="image-thumbnail-preview">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='IPR') {
                                                 ?>
                                                  <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                    <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                  </li>
                                                <?php } } ?>
                                              </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                 </div>
                        </div>
                        <!-- <div class="row imageOpgSetting">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Invoice</b></div>
                                            <div class="panel-body">
                                               <input id="input-fa-8" name="invoice_files[]" accept="application/pdf" class="user_files_images" type="file" multiple="">
                                                <ul class="image-thumbnail-preview">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='Invoice') {
                                                 ?>
                                                  <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="80">
                                                    <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                  </li>
                                                <?php } } ?>
                                              </ul><br><br><br><br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                 </div> 
                        </div> -->
                    </div>
                    <div>
                    <input class="md-btn md-btn-primary btnBack finishMobileBack" type="button" name="back" id="back" value="Back" style="display:none;padding:4px 25px;">
                    <a class="md-btn md-btn-primary md-btn-wave-light cancleButton waves-effect waves-button waves-light buttonStyling borderSetting" href="<?= site_url('admin/patient/patientListing') ?>">Cancel</a>
                    <input class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Next">
                    <input class="md-btn md-btn-primary btnNext finishMobile" type="button" name="next" id="secondNext" value="Next">
                    <input class="md-btn md-btn-primary btnNext finishMobile" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
                   <!--  <input class="btnNext" type="button" name="next" id="next" value="Next" > -->
                    <!-- <input class="btnNext" type="submit" name="finish" id="finish" value="Finish" style="display:none;"> -->
                    </div>
                    </form>
                    </div>
            </div>
        <?php } ?>


<div class="modal uk-modal" id="modal" >
   <div id="modal-container" class="uk-modal-container" uk-modal>
      <div class="uk-modal-dialog" style="padding: 14px;">
         <div class="modal-dialog modal-size">
            <div  class="modal-content">
               <div class="modal-header" style="height:26px;
                  margin-bottom: 10px;
                  border-bottom: 1px solid #e5e5e5;
                  ">
                  <div class="modal-title">
                     <div class="" style="display:flex; justify-content: space-between;">
                        Crop Image
                     </div>
                     <br><br>
                  </div>
               </div>
               <div class="modal-body">
                  <div class="uk-grid">
                     <div class="uk-width-2-3">
                        <img src="" id="sample_image" />
                     </div>
                     <div class="uk-width-1-3">
                        <div class="preview"></div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer" style="text-align: right;
                  border-top: 1px solid #e5e5e5;  margin-top: 15px;   padding: 15px 0px 0px;">
                  <button type="button" id="crop" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;">Crop</button>
                  <button type="button" id="cropClose" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--ADD SHIPPING ADDRESS MODEL-->
<div class="uk-modal" id="shipping_modal">
    <div class="uk-modal-dialog">

        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h2><b>Add New Address</b></h2>
                    </div>
                </div>
                <div class="modal-body">

                    <!-- <form id="createShippingAddress" method="POST" action="<?= site_url('admin/Doctor/addNewAddress'); ?>"> -->
                    <form id="createShippingAddress">

                        <input type="hidden" id="assign_doctorID" name="doctorID">

                        <div class="uk-grid">
                            <div class="uk-width-medium-1-1">
                                <div class="parsley-row">
                                    <label for="exampleFormControlFile1"><b>Add New Address</b></label>
                                    <input type="text" id="new_address" name="new_address" class="md-input" value="" />
                                    <!--                                                                        <textarea class="md-input" name="new_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>-->
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <button class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor uk-modal-close" type="button" name="back" id="cancelBtn" value="Close" style="float:left !important;">Cancel</button>
                            </div>
                            <div class="uk-width-1-2">
                                <button class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" type="submit" name="next" id="next" value="Done" >Add</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END ADD SHIPPING ADDRESS MODEL-->
<!-- OLD CROP MODEL -->
<!--         <div class="modal uk-modal" id="modal">
    <div class="uk-modal-dialog">
        
    <div class="modal-dialog modal-size"> 
        <div  class="modal-content">
            <div class="modal-header" >
                <div class="modal-title">
                    Crop Image
                    <br><br>
                </div>
            </div>
            <div class="modal-body">
                <img src="" id="sample_image" />
                <div class="col-md-4">
                    <div class="preview"></div>
                </div> 
            </div>
            <div class="modal-footer">
                            <button type="button" id="crop" class="btnBack">Crop</button>
                            <button type="button" class="btnBack" data-dismiss="modal">Cancel</button>
                        </div>
        </div>
    </div>
    </div>
</div> -->
</div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>


<!-- Shipping Modal With Ajax Call-->
<script type="text/javascript">
    
            //Add New Shipping Address From Patient
            $("#createShippingAddress").submit(function (event) {

                var doctor_id = $('#assign_doctorID').val();
                event.preventDefault(); //prevent the browser to execute default action. Here, it will prevent browser to be refresh
                $.ajax({
                    url: "<?php echo base_url('admin/Patient/addNewAddress'); ?>", //backend url
                    data: $("#createShippingAddress").serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function (response) {

                        

                        if(doctor_id){
                            firstAjax().success(secondAjax);
                        }
                        
                       // Get Doctor Default Shipping/Billing Address                        
                        function firstAjax() {
                        return $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorProfile/"+ doctor_id,
                                type: 'POST',
                                data: {"id":doctor_id},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);
                                    
                                    $('#show-shipping').html('');
                                    $('#show-shipping').html(response.shipping_address);
                                    // $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });
                        }

                        // Get Doctor Multiple Shipping Address
                        function secondAjax() {
                            $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorAddress/"+ doctor_id,
                                type: 'POST',
                                data: {"id":doctor_id},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);

                                    // Remove options
                                    $('#shipping_address').find('option').not(':first').remove();

                                    // Add options
                                    $('#shipping_address').each(function() {
                                        if (this.selectize) {
                                            for(x=0; x < 10; ++x){
                                                this.selectize.addOption({value:x, text: x});
                                            }
                                        }
                                    });
                                    $.each(response,function(index,data){
                                        $('#assign_doctorID').val(data['doctor_id']);

                                        // If Patient Address is equal to Doctor Shipping Address
                                        var selected_shipping_address =  $('#selected_shipping_address').val();
                                        if(selected_shipping_address == data['shipping_address']){
                                            $('#show-shipping').html('');
                                            $('#show-shipping').html(data['shipping_address']);
                                         }
                                        
                                        $('#shipping_address').append('<option data-value="'+data['id']+'" class="option" data-selectable>'+data['shipping_address']+'</option>');
                                    });
                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });
                        }



                        // Hide Shipping Modal
                        UIkit.modal('#shipping_modal').hide();
                        $('#createShippingAddress')[0].reset(); //reset form
                        // alert('Successfully inserted');
                    },
                    error: function ()
                    {
                        alert("error"); //error occurs
                    }
                });
            });
</script>
<!-- END Shipping Modal With Ajax Call -->

<script type="text/javascript">
  $(document).ready(function(){  
    $(document).on('click', '.car_images', function(){ 
     var img_id= $(this).attr("id"); 
     $.ajax({  
      url: "<?php echo site_url(''); ?>admin/patient/deleteImgPatientData", 
      method:"POST",  
      data:{img_id:img_id},  
      dataType:"json",  
      success:function(data){ 
                setTimeout(function(){// wait for 5 secs(2)
               location.reload(); // then reload the page.(3)
             }, 1000); 
              }  
            });  
   });
  });  
</script> 
<script>
    function show1(){
  document.getElementById('div1').style.display ='none';
}
function show2(){
  document.getElementById('div1').style.display = 'block';
}
// function validate() {
//     var output = true;
//     $(".registration-error").html('');
//     if($("#account-field").css('display') != 'none') {
//         if(!($("#email").val())) {
//             output = false;
//             $("#email-error").html("required");
//         }   
//         if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
//             $("#email-error").html("invalid");
//             output = false;
//         }
//     }

//     if($("#password-field").css('display') != 'none') {
//         if(!($("#user-password").val())) {
//             output = false;
//             $("#password-error").html("required");
//         }   
//         if(!($("#confirm-password").val())) {
//             output = false;
//             $("#confirm-password-error").html("Not Matched");
//         }   
//         if($("#user-password").val() != $("#confirm-password").val()) {
//             output = false;
//             $("#confirm-password-error").html("Not Matched");
//         }   
//     }
//     return output;
// }
$(document).ready(function() {
    if($("#pt_scan_impression").prop('checked') == true){
        $("#div1").show();
    }
    $("#secondNext").hide();
    $("#next").click(function(){
        // var output = validate();
        // if(output) {
        // var select = document.getElementById('select_doctor');
        // var value = select.options[select.selectedIndex].value;


            var current = $(".highlight");
            var next = $(".highlight").next("li");

            if(next.length>0) {
                $("#"+current.attr("id")+"-field").hide();
                $("#"+next.attr("id")+"-field").show();
                $("#back").show();
                $("#finish").hide();
                $("#next").hide();
                $("#secondNext").show();
                $(".highlight").removeClass("highlight");
                next.addClass("highlight");
                if($(".highlight").attr("id") == $("li").last().attr("id")) {
                    $("#next").hide();


                      


                    $("#finish").show();                
                }
            }
        //}
    });
    $("#secondNext").click(function(){
        // var output = validate();
        // if(output) {
		var current = $(".highlight");
		var next = $(".highlight").next("li");

        var select = document.getElementById('select_doctor');
        var value = select.options[select.selectedIndex].value;

            if(next.length>0) {

                $("#"+current.attr("id")+"-field").hide();
                $("#"+next.attr("id")+"-field").show();
                $("#back").show();
                $("#next").hide();
                $("#secondNext").hide();
                $("#finish").show();
                $(".highlight").removeClass("highlight");
                next.addClass("highlight");



                if($(".highlight").attr("id") == $("li").last().attr("id")) {
                    $("#next").hide();
                // alert(value);
                    

                        if(value){
                            firstAjax().success(secondAjax);
                        }

                       // Get Doctor Default Shipping/Billing Address                        
                        function firstAjax() {
                        return $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorProfile/"+ value,
                                type: 'POST',
                                data: {"id":value},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);
                                    $('#billing_address').val(response.billing_address);

                                    $('#show-shipping').html('');
                                    $('#show-shipping').html(response.shipping_address);
                                    $('#shipping_address').append('<option class="option" data-selectable selected>'+response.shipping_address+'</option>');
                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });
                        }

                        // Get Doctor Multiple Shipping Address
                        function secondAjax() {
                            $.ajax({
                                url:"<?php echo base_url();?>/admin/doctor/getSpecificDoctorAddress/"+ value,
                                type: 'POST',
                                data: {"id":value},
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response);
                                    // Remove options
                                    // $('#shipping_address').find('option').not(':first').remove();

                                    // Add options
                                    $('#shipping_address').each(function() {
                                        if (this.selectize) {
                                            for(x=0; x < 10; ++x){
                                                this.selectize.addOption({value:x, text: x});
                                            }
                                        }
                                    });

                                    $.each(response,function(index,data){
                                        $('#assign_doctorID').val(data['doctor_id']);

                                        var selected_shipping_address =  $('#selected_shipping_address').val();

                                        // If Patient Address is equal to Doctor Shipping Address
                                        if(selected_shipping_address == data['shipping_address']){
                                            $('#show-shipping').html('');
                                            $('#show-shipping').html(data['shipping_address']);
                                         }

                                        $('#shipping_address').append('<option data-value="'+data['id']+'" class="option" data-selectable>'+data['shipping_address']+'</option>');
                                    });

                                },
                                error: function () {
                                    alert('Data Not Deleted');
                                }
                            });

                        }

                        

                    $("#finish").show();
                }
            }
        //}
    });

    $("#back").click(function(){ 
        var current = $(".highlight");
        var prev = $(".highlight").prev("li");
        if(prev.length>0) {
            $("#"+current.attr("id")+"-field").hide();
            $("#"+prev.attr("id")+"-field").show();
            $("#finish").hide();
            $(".highlight").removeClass("highlight");
            prev.addClass("highlight");
            if($(".highlight").attr("id") == "account"){
                $("#back").hide();
                $("#next").show();
                $("#secondNext").hide();
            }else if($(".highlight").attr("id") == "password"){
                $("#next").hide();
                $("#secondNext").show();
            }
            if($(".highlight").attr("id") == $("li").first().attr("id")) {
                $("#back").hide();          
            }
        }
    });
});
</script>
<script>

$(document).ready(function(){

    // var $modal = UIkit.modal("#modal");
        var modal = UIkit.modal("#modal");
    var image = document.getElementById('sample_image');

    var cropper;
    $('#cropClose').on('click',function(){
      modal.hide();
    });

    $('#upload_image').on('change',function(event){
        var files = event.target.files;

        var done = function(url){
            image.src = url;
            modal.show(); 
          
        };

        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    modal.on({
        'show.uk.modal': function(){ 
            //alert('pp');
            cropper = new Cropper(document.getElementById('sample_image'), {
                aspectRatio: 1,
                viewMode: 3,
                preview:'.preview'
            });
        },
        'hide.uk.modal': function(){
            cropper.destroy();
            cropper = null;
        }
    });

    $('#crop').click(function(){
        canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
        });

        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result;
                $.ajax({
                    url: site_url + "admin/doctor/doctorimgCrop",
                    method:'POST',
                    data:{image:base64data},
                    success:function(data)
                    {
                        modal.hide();
                        var url = base_url+'assets/uploads/images/'+data;
                        $('#uploaded_image').attr('src', url);
                        $('#pt_img_name').val(data);
                    }
                });
            };
        });
    });
    
});
</script>
