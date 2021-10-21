    <div id="page_content">
        <div id="page_content_inner">
            <br>
            <h1 class="patientMobile"><b>Registration Request</b></h1>
            <?php foreach($doctor_data as $doctorData): ?>
                <div class="uk-grid" data-uk-grid-match id="user_profile">
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="uk-grid uk-margin-small-top uk-margin-large-bottom ml-0" data-uk-grid-margin>
                                <div class="uk-width-large-6-10">
                                    <div class="user_heading userDataBackground">
                                        <div class="user_heading_avatar doctorViewImageSetting">
                                            <div class="thumbnail">
                                                <?php if($doctorData->profile_image !='') { ?>
                                                    <img style="width:100%; height: 82px;" src="<?php echo base_url('assets/uploads/images/'. $doctorData->profile_image); ?>" alt="user avatar"/>
                                                <?php } else{ ?>
                                                    <img src="<?php echo base_url('assets/uploads/images/round-bg.png'); ?>" alt="user avatar" class="">                                        
                                                    <div class="marginprofilepicture" id="viewProfileText" style="margin-right:auto;margin-left: auto;margin-top: 15px;">
                                                        <?php
                                                            $userName = $doctorData->first_name;
                                                            $lastName = $doctorData->last_name;
                                                            echo $userName[0].$lastName[0]; 
                                                        ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div><br><br><br><br>
                                        <div class="user_heading_content doctorViewNameSetting">
                                            <h2 style="color:#6D3745 !important;" class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?= $doctorData->first_name.'<br> '.$doctorData->last_name; ?></span></h2>
                                        </div>
                                    </div>
                                    <div class="user_content">
                                        <ul id="" class="uk-margin">
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Email ID</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->email; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Mobile No</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->phone_number; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Shipping Address</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->shipping_address; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Billing Address</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->billing_address; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>GST no</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->gst_no; ?></span>
                                                </div>
                                            </div>
                                            <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                                <div class="uk-width-large-4-10">
                                                    <span class="themeTextColor"><b>Reference</b></span>
                                                </div>
                                                <div class="uk-width-large-6-10">
                                                    <span><?= $doctorData->refer_by; ?></span>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="uk-width-large-4-10 pr-35p pl-35p" style="margin-top: 20px;">
                                    <div class="md-card bg-grey">
                                        <div class="md-card-content" style="border-radius: 15px;">
                                            <div class="uk-margin-medium-bottom">
                                                <div class="md-list-content">
                                                    <span style="color:#6D3745 !important;" class="md-list-heading"><b>Previous History</b></span>
                                                </div>
                                                <?php foreach($rejected_data as $rejectData): 
                                                    $curdate = $rejectData->cur_date;
                                                    $split_Date_time = explode("-", $curdate);
                                                    $timesSplit = explode(" ", $split_Date_time[2]);
                                                    $convert_Date_format = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$2/$1/$3", $split_Date_time[0]);
                                                    $one_departing_day_name = date("l", strtotime($convert_Date_format));
                                                    $one_departing_month_name = date("F", strtotime($convert_Date_format));
                                                    $one_departing_year_name = date("Y", strtotime($convert_Date_format));
                                                    $one_departing_date_value = date("j", strtotime($convert_Date_format));
                                                ?>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Rejected on <?= $one_departing_date_value.' '.$one_departing_month_name.' '.$timesSplit[1]; ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-medium-top uk-flex uk-flex-right registration-view-btn" data-uk-grid-margin>
                                <div class="uk-flex uk-margin-medium-bottom pr-35p pl-35p">
                                    <div class="uk-margin-small-left uk-margin-small-right">
                                        <a class="md-btn buttonStyling cancel-btn" href="<?= site_url('admin/regReq'); ?>">Cancel</a>
                                    </div>
                                    <div class="uk-margin-small-left uk-margin-small-right">
                                        <a class="md-btn buttonStyling reject-btn borderSetting" href="<?= site_url('admin/declineDoctor/').$doctorData->id; ?>">&nbsp;Reject&nbsp;</a>
                                    </div>
                                    <?php if($doctorData->is_active==1) {  ?>
                                        <div class="uk-margin-small-left uk-margin-large-right-s">
                                            <a class="md-btn buttonStyling accept-btn" href="#">Accept</a>
                                        </div>
                                    <?php } else{ ?>
                                        <div class="uk-margin-small-left">
                                            <a class="md-btn buttonStyling accept-btn" onclick="setDoctorPassword('<?= $doctorData->id; ?>')" data-uk-modal="{target:'#modal_header_footer'}" href="<?= site_url('admin/acceptDoctor/').$doctorData->id; ?>">&nbsp;Accept&nbsp;</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="uk-modal" id="modal_header_footer">
                <div class="uk-modal-dialog">                                
                    <div class="modal-dialog modal-size"> 
                        <div  class="modal-content">
                            <div class="modal-header" >
                                <div class="modal-title">
                                    Add Password
                                </div>
                            </div>
                            <div class="modal-body">                           
                                <form method="POST" action="<?= site_url('admin/acceptDoctor'); ?>">
                                    <input type="hidden" name="doctorIDVal" id="doctorIDVal" required="" class="md-input demoInputBox">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <div class="md-input-wrapper"><b>Email</b><span class="req">*</span><input type="text" name="email" id="emailID" required="" class="md-input demoInputBox"><span class="md-input-bar"></span></div>
                                            <br>
                                        </div>                                                                
                                        <div class="uk-width-medium-1-1">
                                            <div class="md-input-wrapper"><b>Password</b><span class="req">*</span><input type="text" name="doctorPassword" id="doctorPassword" required="" class="md-input demoInputBox"><span class="md-input-bar"></span></div>                                                                    
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            <input class="btnBack uk-modal-close" type="button" name="back" id="back" value="Close">                    
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <input class="btnNext" type="submit" name="next" id="next" value="Done" >                                                                    
                                        </div>
                                    </div>                                                            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function setDoctorPassword(doctorID){
        $.ajax({
            type: 'POST', 
            url: '<?php echo site_url(''); ?>admin/setDoctorPassword', 
            data: {doctorID:doctorID},
            success: function(response) { 
                  obj1 = JSON.parse(response); 
                  doctorData = obj1.doctorData;
                  if (obj1.success == 1) {
                    // for(var j=0;j<doctorData.length;j++)
                        $("#emailID").val(doctorData[0]['email']);
                        $("#doctorIDVal").val(doctorData[0]['id']);
                        // document.getElementById("doctorIDVal").value = doctorData[j]['email'];

                        // $("#doctorID").html(doctorData[j]['email']);
                  }
                  else{
                     
                  }          
          }                    
        });
        
    }
</script>