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
    <div id="page_content_inner">
        <br>
        <br>
        <h2 class="heading_b uk-margin-bottom patientMobile">Edit Patient</h2>
  
        <?php for($i=0;$i<count($singlePatient);$i++) {
            $patientPhoto = $singlePatient[$i]['patient_photos'];
         ?>
            <div class="md-card uk-margin-large-bottom">
                <div class="md-card-content">
                    <ul id="registration-step">
                        <li id="account" class="highlight">
                            <h2 class="themeTextColor stepSetting"><b>Step 1</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="material-icons themeTextColor iconStepOne">arrow_right</span></h2>
                        </li>
                        <li id="password"><h2 class="themeTextColor stepSetting"><b>Step 2</b></h2></li>
                    </ul>

                    <form class="uk-form-stacked" name="frmRegistration" id="registration-form" method="post" action="<?= site_url('doctor/updatePatient'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="patientID" value="<?= $singlePatient[$i]['pt_id']; ?>">

                    <div id="account-field">
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><b>First Name</b><span class="req">*</span><input type="text" name="pt_firstname" id="wizard_fullname" required="" class="md-input demoInputBox" value="<?= $singlePatient[$i]['pt_firstname']; ?>"><span class="md-input-bar"></span></div>
                                
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="md-input-wrapper"><b>Last Name</b><span class="req">*</span><input type="text" name="pt_lastname" id="wizard_fullname" required="" class="md-input demoInputBox" value="<?= $singlePatient[$i]['pt_lastname']; ?>"><span class="md-input-bar"></span></div>
                                
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                           <div class="uk-width-medium-1-2">
                                <div class="uk-form-row parsley-row">
                                    <label for="gender" class="uk-form-label"><b>Gender</b><span class="req">*</span></label>
                                    <span class="icheck-inline">
                                        <input type="radio" name="pt_gender" value="male" id="val_radio_male" data-md-icheck required <?php echo $singlePatient[$i]['pt_gender'] == 'male' ? 'checked' : ''; ?>/>
                                        <label for="val_radio_male" class="inline-label">Male</label>
                                    </span>
                                    <span class="icheck-inline">
                                        <input type="radio" name="pt_gender" value="female" id="val_radio_female" data-md-icheck <?php echo $singlePatient[$i]['pt_gender'] == 'female' ? 'checked' : ''; ?>/>
                                        <label for="val_radio_female" class="inline-label">Female</label>
                                    </span>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon">
                                    </span>
                                    <label for="wizard_email"><b>Email ID</b></label>
                                    <input type="text" class="md-input" name="pt_email" id="wizard_email" value="<?= $singlePatient[$i]['pt_email']; ?>" required />
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom: 31px !important;" class="uk-form-row">
                            <div class="uk-width-medium-1-2">
                            <br>
                            <label for="lastName" class="form-label"><b>Profile Picture</b></label>
                            <br>
                            <br>
                            <br>
                           <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <?php if($singlePatient[$i]['pt_img']!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $singlePatient[$i]['pt_img']); ?>" style="width: 54% !important;" alt="user avatar"/>
                                        <?php } else{ ?>
                                            <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 54% !important;" alt="user avatar"/>
                                        <?php } ?>
                                    </div>
                                    <div class="fileinput-exists thumbnail">
                                        <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 54% !important;" alt="user avatar" id="uploaded_image"/>
                                    </div>
                                    <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="pt_img" id="upload_image">
                                            <input type="hidden" name="pt_img_name" id="pt_img_name" value="">
                                        </span>
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                    </div>                                    
                                </div>
                            <br>
                            <label for="lastName" class="form-label">Upload Profile Photo</label>
                            
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
                                                   <ul class="image-thumbnail-preview col-md-12">
                                                    <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                        if($patientPhoto[$j]['key']=='Intra Oral Images') {
                                                     ?>
                                                      <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                        <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="120">
                                                        <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                      </li>
                                                    <?php } } ?>
                                                  </ul><br><br><br><br><br><br>
                                                </div>
                                            </div>
                                        </div>
                                     </div> 
                                  </div>
                        <div class="row treatmentPlan">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div class="form-group alert-up-pd">
                             <div class="panel panel-default">
                                 <div class="panel-heading"><b>Images OPG</b></div>
                                     <div class="panel-body">
                                           <input id="input-fa-2" name="images_opg[]" class="user_files_images" type="file" multiple="">
                                            <ul class="image-thumbnail-preview col-md-12">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='OPG Images') {
                                                 ?>
                                                  <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="120">
                                                    <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                  </li>
                                                <?php } } ?>
                                              </ul><br><br><br><br><br><br>
                                        </div>
                                    </div>
                                </div>
                             </div> 
                          </div>          
                    </div>


                    <div id="password-field" style="display:none;">


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <div class="form-group alert-up-pd">
                             <div class="panel panel-default">
                                 <div class="panel-heading"><b>Images Lateral C</b></div>
                                     <div class="panel-body">
                                           <input id="input-fa-3" name="images_lateral_c[]" class="user_files_images" type="file" multiple="">
                                              <ul class="image-thumbnail-preview col-md-12">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='Lateral C Images') {
                                                 ?>
                                                  <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="120">
                                                    <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                  </li>
                                                <?php } } ?>
                                              </ul><br><br><br><br><br><br>
                                        </div>
                                    </div>
                                </div>
                             </div> 
                          </div>
                          <br><br>
                          <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                               
                                <div class="uk-form-row parsley-row">
                                  <label for="gender" class="uk-form-label"><b>Scan/Impressions</b><span class="req">*</span></label>
                                  <label><input type="radio" name="pt_scan_impression" onclick="show1();" value="no" <?php echo $singlePatient[$i]['pt_scan_impression'] == 'no' ? 'checked' : ''; ?>/>No</label>
              <label><input type="radio" name="pt_scan_impression" value="yes" onclick="show2();"  <?php echo $singlePatient[$i]['pt_scan_impression'] == 'yes' ? 'checked' : ''; ?>/>Yes</label>
                                 <!--  <span class="icheck-inline">
                                      <input type="radio" name="val_radio_gender" id="val_radio_male" data-md-icheck required />
                                      <label for="val_radio_male" class="inline-label">NO</label>
                                  </span>
                                  <span class="icheck-inline">
                                      <input type="radio" name="val_radio_gender" id="val_radio_female" data-md-icheck />
                                      <label for="val_radio_female" class="inline-label">Yes</label>
                                  </span> -->
                              </div>
                            </div>
                        </div>
                        <div id="div1" class="row imageOpgSetting hide">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="form-group alert-up-pd">
             <div class="panel panel-default">
                 <div class="panel-heading"><b>Scan/Impressions Images</b></div>
                     <div class="panel-body">
                           <input id="input-fa-4" name="images[]" class="user_files_images" type="file" multiple="">
                        </div>
                    </div>
                </div>
             </div> 
          </div> 
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group alert-up-pd">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"><b>Upload STL</b></div>
                                         <div class="panel-body">
                                               <input id="stlFiles" name="images_stl[]" class="user_files_images" type="file" multiple="">
                                               <ul class="image-thumbnail-preview col-md-12">
                                                <?php for ($j=0;$j<count($patientPhoto);$j++){
                                                    if($patientPhoto[$j]['key']=='STL File(3D File)') {
                                                 ?>
                                                  <li class="image-thumbnail-preview-frame" style="border: 1px solid;">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/images/<?php echo $patientPhoto[$j]['img']; ?>" height="50" width="120">
                                                    <button type="button" class="btn btn-sm btn-kv btn-default btn-outline-secondary car_images" id="<?php echo $patientPhoto[$j]['photos_id']; ?>"><i class="material-icons">delete</i></button>
                                                  </li>
                                                <?php } } ?>
                                              </ul><br><br><br><br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                 </div> 
                              </div>
                         <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="parsley-row">
                                <label for="exampleFormControlFile1"><b>Treatment Objective</b></label><br><br>
                                    <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                                    <textarea placeholder="lorem ipsum" class="md-input" name="pt_objective" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $singlePatient[$i]['pt_objective']; ?></textarea>
                                </div>
                            </div>
                        </div>
                       <!--  <div class="uk-grid">
                             <div class="uk-width-medium-1-2 ">
                              <div class="form-group form-float">
                              <div class="form-line focused">
                                <label for="wizard_fullname"><b>Referral Name</b><span class="req">*</span></label>
                               <select class="form-control referalName" name="pt_referal" id="cat_id" required="">
                                 <option value="1">Select</option>
                                 <option value="0">Ahmed</option>
                               </select>
                              </div>
                              </div>
                            </div>
                            </div> -->
                            <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3 uk-width-large-1-2">
                        <select id="select_demo_1" name="pt_referal" data-md-selectize>
                            <option value=""><b>Referral Name</b></option>
                               <?php foreach($reference_doctor as $referDoctor){?>
                                 <option <?=($singlePatient[$i]['pt_referal'] == $referDoctor->ref_id)?'selected':'';?> value="<?= $referDoctor->ref_id;?>"><?= $referDoctor->doctor_name;?></option>
                               <?php } ?>
                        </select>
                        </div>
                      </div>
                        <br> 
        <div class="collapse" id="featuresData">
            <label for="exampleFormControlFile1"><b>Type of Treatment</b></label><br><br>
            <div style="display: block;" class="demo-checkbox col-md-12">
              <?php $typeOfTreatment = json_decode($singlePatient[$i]['type_of_treatment'], true);
                foreach($treatment_data as $treatmentData): ?>
                  <input name="treatmentData[]" value="<?php echo $treatmentData->tr_name; ?>" type="checkbox" id="<?php echo $treatmentData->tr_name; ?>" <?php if(in_array($treatmentData->tr_name, $typeOfTreatment)) { echo 'checked'; } ?> class="chk-col-green"/>
                <label  for="<?php echo $treatmentData->tr_name; ?>"><?php echo $treatmentData->tr_name; ?></label>
                <?php endforeach;  ?>
            </div>
        </div>
 <br>
 <br> 
            <div class="collapse" id="featuresData">
                <label for="exampleFormControlFile1"><b>Type of case:Malocclusion</b></label><br><br>

                <div style="display: block;" class="demo-checkbox col-md-12">
                  <?php $typeOfCase = json_decode($singlePatient[$i]['type_of_case'], true);
                    foreach($treatment_case_data as $treatmentCaseData): ?>
                      <input name="treatmentCaseData[]" value="<?php echo $treatmentCaseData->case_name; ?>" type="checkbox" id="<?php echo $treatmentCaseData->case_name; ?>" <?php if(in_array($treatmentCaseData->case_name, $typeOfCase)) { echo 'checked'; } ?> class="chk-col-green"/>
                    <label  for="<?php echo $treatmentCaseData->case_name; ?>"><?php echo $treatmentCaseData->case_name; ?></label>
                    <?php endforeach;   ?>
                </div>
            </div>
         <br>
         <br> 
            <div class="collapse" id="featuresData">
                <label for="exampleFormControlFile1"><b>Arches to be treated</b></label><br><br>
                <div style="display: block;" class="demo-checkbox col-md-12">
                  <?php $arcTreated = json_decode($singlePatient[$i]['arc_treated'], true);
                    foreach($arch_data as $archData): ?>
                      <input name="treatmentCaseData[]" value="<?php echo $archData->arc_name; ?>" type="checkbox" id="<?php echo $archData->arc_name; ?>" <?php if(in_array($archData->arc_name, $arcTreated)) { echo 'checked'; } ?> class="chk-col-green"/>
                    <label  for="<?php echo $archData->arc_name; ?>"><?php echo $archData->arc_name; ?></label>
                    <?php endforeach;   ?>
                </div>
            </div>
         <br>
         <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
              <div class="uk-form-row parsley-row">
                  <label for="gender" class="uk-form-label"><b>IPR to be performed</b><span class="req">*</span></label>
                  <span class="icheck-inline">
                      <input type="radio" value="0" name="ipr_performed" id="val_radio_male" data-md-icheck required <?php echo $singlePatient[$i]['ipr_performed'] == '0' ? 'checked' : ''; ?>/>
                      <label for="val_radio_male" class="inline-label">NO</label>
                  </span>
                  <span class="icheck-inline">
                      <input type="radio" value="1" name="ipr_performed" id="val_radio_female" data-md-icheck <?php echo $singlePatient[$i]['ipr_performed'] == '1' ? 'checked' : ''; ?>/>
                      <label for="val_radio_female" class="inline-label">Yes</label>
                  </span>
              </div>
          </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
              <div class="uk-form-row parsley-row">
                  <label for="gender" class="uk-form-label"><b>Attachment to be placed</b><span class="req">*</span></label>
                  <span class="icheck-inline">
                      <input type="radio" value="0" name="attachment_placed" id="val_radio_male" data-md-icheck required <?php echo $singlePatient[$i]['attachment_placed'] == '0' ? 'checked' : ''; ?>/>
                      <label for="val_radio_male" class="inline-label">NO</label>
                  </span>
                  <span class="icheck-inline">
                      <input type="radio" value="1" name="attachment_placed" id="val_radio_female" data-md-icheck  <?php echo $singlePatient[$i]['attachment_placed'] == '1' ? 'checked' : ''; ?>/>
                      <label for="val_radio_female" class="inline-label">Yes</label>
                  </span>
              </div>
          </div>
        </div>

                    </div>
                    <div style="margin-top: 34px !important; margin-bottom: 57px !important;">
                    <input class="btnBack finishMobileBack " type="button" name="back" id="back" value="Back" style="display:none;">
                    <a class="md-btn md-btn-primary md-btn-wave-light cancleButton waves-effect waves-button waves-light buttonStyling" href="<?= site_url('doctor/doctor/patientList') ?>">Cancel</a>
                    <input class="btnNext finishMobile" type="button " name="next" id="next" value="Next" >
                    <input class="btnNext finishMobile" type="submit" name="finish" id="finish" value="Finish" style="display:none;">
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
                        <div style="text-align:right;">
                           <i class="fas fa-times" data-dismiss="modal"></i>
                        </div>
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
                  <button type="button" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- OLD CROP MODEL -->
<!--           <div class="modal uk-modal" id="modal">
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
<script type="text/javascript">
  $(document).ready(function(){  
    $(document).on('click', '.car_images', function(){ 
     var img_id= $(this).attr("id"); 
     $.ajax({  
      url: "<?php echo site_url(''); ?>doctor/deleteImagData", 
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
    $("#next").click(function(){
        // var output = validate();
        // if(output) {
            var current = $(".highlight");
            var next = $(".highlight").next("li");
            if(next.length>0) {
                $("#"+current.attr("id")+"-field").hide();
                $("#"+next.attr("id")+"-field").show();
                $("#back").show();
                $("#finish").show();
                $("#next").hide();
                $(".highlight").removeClass("highlight");
                next.addClass("highlight");
                if($(".highlight").attr("id") == $("li").last().attr("id")) {
                    $("#next").hide();
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
            $("#next").show();
            $("#finish").hide();
            $(".highlight").removeClass("highlight");
            prev.addClass("highlight");
            if($(".highlight").attr("id") == $("li").first().attr("id")) {
                $("#back").hide();          
            }
        }
    });
});
</script>
<script>

$(document).ready(function(){

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