    <div id="page_content">
        <div id="page_content_inner">
            <br>
            <h1 class="patientMobile"><b>Single Patient</b></h1>
            <?php foreach($singlePatient as $patientData): ?>
                <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                            <div class="uk-width-large-5-10">

                            <div class="user_heading userDataBackground">
                                <div class="user_heading_avatar doctorViewImageSetting">
                                    <div class="thumbnail">
                                        <?php if($patientData['pt_img']!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>" alt="user avatar" class="">
                                        <?php } else{ ?>
                                            <div class="marginprofilepicture" id="profileImageUser" style="margin-right:auto;margin-left: auto;margin-top: 15px;">
                                            <?php 
                                            $userName = $patientData['pt_firstname'];
                                            $lastName = $patientData['pt_lastname'];
                                            echo $userName[0].$lastName[0]; 
                                        ?></div>
                                        <?php } ?>
                                    </div>
                                </div><br><br><br><br>
                                <div class="user_heading_content doctorViewNameSetting">
                                    <h2 style="color:#6D3745 !important;" class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?= $patientData['pt_firstname']?><br><?= $patientData['pt_lastname'] ?></span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <ul id="" class="uk-margin">
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Doctor</span>
                                        </div>
                                         
                                        <div class="uk-width-large-6-10">
                                            <span><?=
                                                $patientData['first_name']; ?>
                                                <?=
                                                $patientData['last_name']; ?></span>
                                        </div>
                                         
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Patient ID</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_id']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Email ID</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_email']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Gender</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_gender']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Treatment Objectives</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_objective']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Referral Name</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_referal']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Treatment Plan</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_treatment_plan']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Approval Date</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_approval_date']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Type of Treatment</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?php
                                             $treatmentType = json_decode($patientData['type_of_treatment']);
                                             foreach($treatmentType as $treatment){
                                             ?> <label><?php echo $treatment; } ?></label></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Type of Case</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?php
                                             $caseType = json_decode($patientData['type_of_case']);
                                             foreach($caseType as $case){
                                             ?> <label><?php echo $case; } ?></label></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Arches Treated</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?php
                                             $arc = json_decode($patientData['arc_treated']);
                                             foreach($arc as $arc){
                                             ?> <label><?php echo $arc; } ?></label></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Status</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?php if($patientData['pt_status'] == 1){?>Active<?php }else{ ?> InActive<?php } ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">No of Aligners</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_aligners']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">No of Aligners Dispatched</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                            <?php
                                             if($patientData['pt_aligners_dispatch'])
                                             {
                                                echo $patientData['pt_aligners_dispatch'];
                                             }
                                             else{
                                                echo "----";
                                             } ?> </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Cost of Plan</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                                <?php
                                             if($patientData['pt_cost_plan'])
                                             {
                                                echo $patientData['pt_cost_plan'];
                                             }
                                             else{
                                                echo "----";
                                             } ?>
                                         </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Total Amount Paid</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                                 <?php
                                             if($patientData['pt_amount_paid'])
                                             {
                                                echo $patientData['pt_amount_paid'];
                                             }
                                             else{
                                                echo "----";
                                             } ?>
                                         </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Shipping Details</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                                 <?php
                                             if($patientData['pt_shipping_details'])
                                             {
                                                echo $patientData['pt_shipping_details'];
                                             }
                                             else{
                                                echo "----";
                                             } ?>
                                         </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Billing Address</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                                 <?php
                                             if($patientData['pt_billing_address'])
                                             {
                                                echo $patientData['pt_billing_address'];
                                             }
                                             else{
                                                echo "----";
                                             } ?></span>

                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor">Dispatch Date</span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                                <?php
                                             if($patientData['pt_dispatch_date'])
                                             {
                                                echo $patientData['pt_dispatch_date'];
                                             }
                                             else{
                                                echo "----";
                                             } ?>
                                                 
                                             </span>

                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom">
                            </div><div class="uk-grid uk-margin-medium-top uk-margin-large-bottom">
                            </div><div class="uk-grid uk-margin-medium-top uk-margin-large-bottom">
                            </div><div class="uk-grid uk-margin-medium-top uk-margin-large-bottom">
                            </div><div class="uk-grid uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid uk-margin-medium-top">
                            </div>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-large-5-10 fileSetting" style="min-height: 1622px; margin-top: 20px;">
                            <div class="md-card filesCardSetting">
                                <div class="md-card-content">
                                    <div class="uk-margin-medium-bottom">
                                        <div class="md-list-content">
                                            <span style="color:#6D3745 !important;" class="md-list-heading"><b>Files</b></span>
                                        </div>
                                          <div class="uk-grid marginTop">
                             <div class="uk-width-medium-1-3 ">
                              <div class="form-group form-float">
                              <div class="form-line focused">
                                <label for="wizard_fullname"><b class="viewPatientFileFont">Intra Oral/OPG/Lateral C</b><span class="req">*</span></label><br>
                              <div class="filesBackground">
                                <span class="material-icons themeTextColor">
                                collections
                                </span><span>Files.jpg</span>
                                <span class="material-icons themeTextColor">file_download</span>
                              </div>
                              </div>
                              </div>
                            </div>
                            <div class="uk-width-medium-1-3 ">
                              <div class="form-group form-float">
                              <div class="form-line focused">
                                <label for="wizard_fullname"><b class="viewPatientFileFont">STL file of PL</b><span class="req">*</span></label>
                            <br>
                              <div class="filesBackground">
                                <span class="material-icons themeTextColor">
                                collections
                                </span><span>Files.jpg</span>
                                <span class="material-icons themeTextColor">file_download</span>
                              </div>
                              </div>
                              </div>
                            </div>
                            <div class="uk-width-medium-1-3 ">
                              <div class="form-group form-float">
                              <div class="form-line focused">
                                <label for="wizard_fullname"><b class="viewPatientFileFont">Scans / Impressions</b><span class="req">*</span></label>
                              <br>
                              <div class="filesBackground">
                                <span class="material-icons themeTextColor">
                                collections
                                </span><span>Files.jpg</span>
                                <span class="material-icons themeTextColor">file_download</span>
                              </div>
                              </div>
                              </div>
                            </div>
                            </div>
                            <div class="uk-grid marginTop">
                             <div class="uk-width-medium-1-3 ">
                              <div class="form-group form-float">
                              <div class="form-line focused">
                                <label for="wizard_fullname"><b class="viewPatientFileFont">Treatment Plan Doc</b><span class="req">*</span></label>
                              <br>
                              <div class="filesBackground">
                                <span class="material-icons themeTextColor">
                                collections
                                </span><span>Files.jpg</span>
                                <span class="material-icons themeTextColor">file_download</span>
                              </div>
                              </div>
                              </div>
                            </div>
                            <div class="uk-width-medium-1-3 ">
                              <div class="form-group form-float">
                              <div class="form-line focused">
                                <label for="wizard_fullname"><b class="viewPatientFileFont">IPR</b></label>
                             <br>
                              <div class="filesBackground">
                                <span class="material-icons themeTextColor">
                                collections
                                </span><span>Files.jpg</span>
                                <span class="material-icons themeTextColor">file_download</span>
                              </div>
                              </div>
                              </div>
                            </div>
                            <div class="uk-width-medium-1-3 ">
                              <div class="form-group form-float">
                              <div class="form-line focused">
                                <label for="wizard_fullname"><b class="viewPatientFileFont">Invoice</b></label>
                             <br>
                              <div class="filesBackground">
                                <span class="material-icons themeTextColor">
                                collections
                                </span><span>Files.jpg</span>
                                <span class="material-icons themeTextColor">file_download</span>
                              </div>
                              </div>
                              </div>
                            </div>
                            </div>
                                   
                           </div>
                                </div>
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div> <div class="uk-grid uk-margin-medium-top spaceHidding uk-margin-large-bottom ">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding  uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            <div class="uk-grid spaceHidding uk-margin-medium-top uk-margin-large-bottom">
                            </div>
                            
                            <div class="uk-grid viewButtoMobile uk-margin-medium-top uk-margin-large-bottom">
                                <div class="uk-width-large-2-10">
                                </div>
                                <div class="uk-width-large-2-10">
                                </div>
                                <div class="uk-width-large-2-10">
                                    <a class="md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('doctor/patientList'); ?>">Back</a>
                                </div>
                                <div class="uk-width-large-1-10">
                                </div>
                                <div class="uk-width-large-2-10">
                                    <a class="md-btn editbtnBackground btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('doctor/editPatient/').$patientData['pt_id']; ?>">Edit</a>
                                </div>
                            </div>
                    </div>
                    </div>
                    </div>

                    </div>
                </div>
            <?php endforeach; ?>
        
        </div>
    </div>