<style type="text/css">
.carousel-cell {
    display: flex;
    align-items: center;
    width: 100%;
    height: 200px;
    margin-right: 10px;
    border-radius: 5px;
}
/* cell number */
.carousel-cell:before {
  /* display: block; */
  text-align: center;
  /* content: counter(carousel-cell); */
  line-height: 200px;
  font-size: 80px;
  color: white;
}
.carousel-nav .carousel-cell {
  height: 40px;
  width: max-content;
}
.carousel-nav .carousel-cell:before {
  font-size: 50px;
  /* line-height: 80px; */
}
.carousel-nav .carousel-cell.is-nav-selected {
  background: #ED2;
}
</style>
<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>
    <?php foreach($singlePatient as $patientData): ?>

        <?php if($notification->user_id == $patientData['pt_id']): ?>
            <?php if($notification->seen == 0): ?>
            <div class="uk-grid">
                <div class="uk-width-medium-1-1 bg-light-green uk-flex uk-flex-between p-15p br-8p">
                    <span>
                        <img src="<?php echo base_url('assets/images/info-icon.svg'); ?>">
                        <span class="text-d-green pl-10p">Treatment Plan Updated</span>
                    </span>
                    <span>
                        <a class="updateNotification" data-id="<?= $notification->id; ?>"><img src="<?php echo base_url('assets/images/black-cross-icon.svg'); ?>"></a>
                    </span>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="uk-grid">
            <div class="uk-width-medium-2-5">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <div class="uk-flex n">
                            <span class="">
                                <a href="<?= site_url('doctor/patientList/'); ?>">
                                    <img src="<?php echo base_url('assets/images/left-arrow-round-bg.svg'); ?>">                    
                                </a>
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            <h1 class="patientMobile uk-margin-remove"><b>Patient Card</b></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-3-5 uk-margin-small-top" style="display: block; justify-content:end;">                
                <div style="text-align: right;">
                    <?php $i=0; ?>
                    <?php foreach($getPatientNewTreatmentPlans as $treatmentPlans): ?>
                    <?php if($treatmentPlans->seen == 0): ?>
                        <?php if($i == 0): ?>
                        <a class="uk-margin-small-top md-btn new-plan-d shiner-icon" href="<?php echo base_url('doctor/viewNewTreatmentPlan/').$patientData['pt_id']; ?>">New Plan</a>
                        <?php $i++; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>

                    <a class="uk-margin-small-top md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?php echo base_url('doctor/viewTreatmentPlan/').$patientData['pt_id']; ?>"><img src="<?php echo base_url('assets/images/eye-icon.svg'); ?>">&nbsp;&nbsp;View Treatment Plans</a>
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?= base_url('doctor/editPatient/').$patientData['pt_id']; ?>" style="margin-right: 15px !important;" class="uk-margin-small-top md-btn md-btn-primary add-pay-btn md-btn-wave-light waves-effect waves-button waves-light buttonStyling"> <img src="<?php echo base_url('assets/images/edit-user-icon.svg'); ?>" alt="">
                              Edit Patient Profile
                    </a>
                   </div>

            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-10-10">
                <div class="md-card">
                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                        <!-- Start First Column -->
                        <div class="uk-width-medium-3-5 pt-card-r-pd">

                            <!-- Start Scans Slider-->
                            <div class="carousel carousel-nav mt-20p" data-flickity='{"contain": true, "pageDots": false}'>
                                <?php foreach($patientScans as $scanData): ?>
                                <div class="carousel-cell">
                                    <button class="uk-button uk-button-default treatmentPlan-cases-btn uk-flex uk-flex-middle scanPreviewBtn" data-id="<?= $scanData['id']; ?>">
                                        <b class="uk-text-truncate"><?= $scanData['title'] ?></b>
                                        <a href="<?php echo base_url('doctor/editscan/'.$scanData['id']); ?>" class="text-grey pl-5p"> 
                                            <img style="height: 14px;" src="<?php echo base_url('assets/images/edit-icon.svg'); ?>">
                                        </a>
                                    </button>
                                </div>
                                <?php endforeach; ?>
                                <div class="carousel-cell">
                                    <a  href="<?= base_url('doctor/addscan/').$patientData['pt_id']; ?>" class="uk-button uk-button-default treatmentPlan-cases-btn">
                                        <img src="<?php echo  base_url('assets/images/plus-add-icon.svg') ?>">
                                        <b class="pl-5p">Add A New Scan</b>
                                    </a>
                                </div>
                            </div>
                            <!-- End Scans Slider-->

                            <!-- Start Patient Info -->
                            <div class="user_heading userDataBackground border-top-left-10p">
                                <div class="user_heading_avatar doctorViewImageSetting">
                                    <div class="thumbnail">
                                    <?php if($patientData['pt_img']!=''){ ?>
                                        <img src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>" alt="user avatar" class="">
                                    <?php } else{ ?>
                                        <img src="<?php echo base_url('assets/images/round-bg.png'); ?>" alt="user avatar" class="">
                                            <div class="marginprofilepicture" id="viewProfileText" style="margin-right:auto;margin-left: auto;margin-top: 15px;">        
                                                <?php 
                                                    $userName = $patientData['pt_firstname'];
                                                    $lastName = $patientData['pt_lastname'];
                                                    echo $userName[0].$lastName[0]; 
                                                ?>
                                            </div>
                                        </img>
                                    <?php } ?>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="user_heading_content doctorViewNameSetting">                                                                            
                                    <h2 style="color:#6D3745 !important;" class="p-card-heading heading_b uk-margin-small-bottom m-0p">
                                        <span class="uk-text-truncate">
                                            <?= $patientData['pt_firstname']?>  &nbsp;<?= $patientData['pt_lastname'] ?>
                                        </span>                                                                                    
                                        <?php if(!empty($getAcceptedPatientPlan)){ ?>
                                            <span><img class="pl-15p" src="<?php echo base_url('assets/images/accepted-dot-icon.svg'); ?>"></span>
                                        <?php }elseif(!empty($getRejectedPatientPlan)){ ?>
                                            <span><img class="pl-15p" src="<?php echo base_url('assets/images/rejected-dot-icon.svg'); ?>"></span>                                    
                                        <?php }elseif(!empty($getModifyAccPatientPlan) || !empty($getModifyRejPatientPlan)){ ?>
                                            <span><img class="pl-15p" src="<?php echo base_url('assets/images/modify-dot-icon.svg'); ?>"></span>                                                    
                                        <?php }elseif(!empty($getPendingPatientPlan)){ ?>
                                            <span><img class="pl-15p" src="<?php echo base_url('assets/images/pending-dot-icon.svg'); ?>"></span>                                               
                                        <?php }else{ ?>                                                    
                                        <?php } ?>
                                    </h2>                                                                                                                                                           
                                </div>
                            </div>
                            <div class="user_content pb-0p">
                                <ul id="" class="uk-margin mb-0p">
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Patient ID</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_id']?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Receiving Date</b></span>
                                        </div>
                                        <?php $dt = new DateTime( $patientData['cur_date']);?>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['cur_date'] ? $dt->format('d F').', '.$dt->format('Y') : 'N/A'); ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Email ID</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_email'] != '') ? $patientData['pt_email'] : 'N/A';?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Age</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                            <?php 
                                                if(!empty($patientData['pt_age'])) {
                                                    echo $patientData['pt_age'];}
                                                else {
                                                    echo 'N/A'; 
                                                }
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Gender</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_gender'] != '') ? $patientData['pt_gender'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Treatment Objectives</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10 uk-flex pr-15p">
                                        <?php if($patientData['pt_objective'] != '') { ?>
                                            <?php if(strlen($patientData['pt_objective']) > 40){ ?>
                                            <div style="width:94%">
                                                <p><?php echo substr($patientData['pt_objective'], 0, 40); ?><span id="accordion-dots">......</span><span id="accordion-more"><?php echo substr($patientData['pt_objective'], 40, 30000); ?></span></p>
                                            </div>
                                            <div style="width:6%">
                                                <button href="" class="custom-accordion-drop-icon" onclick="readMoreFunction()" id="accordion-drop-btn"><img src="<?php echo base_url('assets/images/accordion-drop.svg') ?>"></button>
                                            </div>
                                            <?php }else{ ?>
                                                <p><?= $patientData['pt_objective']; ?></p>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <p>N/A</p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Special Instruction</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10 uk-flex pr-15p">
                                        <?php if($patientData['pt_special_instruction'] != '') { ?>
                                            <?php if(strlen($patientData['pt_special_instruction']) > 40){ ?>
                                            <div style="width:94%">
                                                <p><?php echo substr($patientData['pt_special_instruction'], 0, 40); ?><span id="instruction-accordion-dots">......</span><span id="instruction-accordion-more"><?php echo substr($patientData['pt_special_instruction'], 40, 30000); ?></span></p>
                                            </div>
                                            <div style="width:6%">
                                                <button href="" class="instruction-custom-accordion-drop-icon" onclick="readMoreInstructionFunction()" id="instruction-accordion-drop-btn"><img src="<?php echo base_url('assets/images/accordion-drop.svg') ?>"></button>
                                            </div>
                                            <?php }else{ ?>
                                                <p><?= $patientData['pt_special_instruction'] ?></p>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <p>N/A</p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Referral Name</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_referal'] != '') ? $patientData['pt_referal'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Treatment Plan</b></span>
                                        </div>
                                        <!-- Check if Array Empty -->
                                        <?php if(!empty($getPatientTreatmentPlans)){ ?>
                                            <?php 
                                                foreach($getPatientTreatmentPlans as $plans){
                                                    if($plans->pre_status == 1 && $plans->status == 1){
                                                        $planID = $plans->id;
                                                    }
                                                    if($plans->pre_status == 1 && $plans->status == 2){
                                                        $rejectedPlanID = $plans->id;
                                                    }
                                                    $patientID = $plans->patient_id;
                                                }
                                            ?>
                                            <?php if(!empty($getAcceptedPatientPlan)){ ?>
                                                <div class="uk-width-large-6-10 pr-15p">
                                                    <span class="uk-flex uk-flex-between">
                                                        <a href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$getAcceptedPatientPlan->id) ?>" class="themeTextColor text-decoration-underline">
                                                            <b><?= $getAcceptedPatientPlan->title ?></b>
                                                        </a>
                                                        <img src="<?php echo base_url('assets/admin/assets/img/arrow-right.svg'); ?>">
                                                    </span>
                                                </div>
                                            <?php }elseif(!empty($getRejectedPatientPlan)){ ?>
                                                <div class="uk-width-large-6-10 pr-15p">
                                                    <span>
                                                        <a href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$rejectedPlanID) ?>" class="themeTextColor text-decoration-underline">
                                                            <b><?= $getRejectedPatientPlan->title ?></b>
                                                        </a>
                                                        <img src="<?php echo base_url('assets/admin/assets/img/arrow-right.svg'); ?>">
                                                    </span>                                                    
                                                </div>
                                            <?php }elseif(!empty($getModifyAccPatientPlan) || !empty($getModifyAccPatientPlan)){ ?>
                                                <div class="uk-width-large-6-10">
                                                    <span><a href="<?php echo base_url('doctor/viewPlan/'.$patientID) ?>" class="text-black">View Treatment Plan</a></span>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="uk-width-large-6-10">
                                                    <span><a href="<?php echo base_url('doctor/viewPlan/'.$patientID) ?>" class="text-black">View Treatment Plan</a></span>
                                                </div>
                                            <?php } ?>
                                        <?php }else{ ?>
                                            <div class="uk-width-large-6-10">
                                                <span><?= 'N/A'; ?></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Approval Date</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_approval_date'] != '') ? $patientData['pt_approval_date'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Type of Treatment</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['type_of_treatment'] != null || $patientData['type_of_treatment'] != '') ? $patientData['type_of_treatment'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Status</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_custom_status'] != '') ? $patientData['pt_custom_status'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Type of Case</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['type_of_case'] != null || $patientData['type_of_case'] != '') ? $patientData['type_of_case'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Arches Treated</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['arc_treated'] != null || $patientData['arc_treated'] != '') ? $patientData['arc_treated'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>IPR to be Performed</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                                <?php if($patientData['ipr_performed']==1) { echo 'Yes'; } else{ echo "No"; } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Attachement to be Placed</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>
                                                <?php if($patientData['attachment_placed']==1) { echo 'Yes'; } else{ echo "No"; } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>No of Aligners</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_aligners'] != '') ? $patientData['pt_aligners'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>No of Aligners Dispatched</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_aligners_dispatch'] != '') ? $patientData['pt_aligners_dispatch'] : 'N/A'; ?></span>
                                        </div>
                                    </div>                                        
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Cost of Plan</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_cost_plan'] != '') ? $patientData['pt_cost_plan'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Total Amount Paid</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_amount_paid'] != '') ? $patientData['pt_amount_paid'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Balance Amount</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_cost_plan'] - $patientData['pt_amount_paid']?></span>
                                        </div>
                                    </div>
                                    <?php 
                                        $pt_shipping_details = $patientData['pt_shipping_details'];
                                        foreach ($shipping_address as $address) { 
                                            if($pt_shipping_details == $address->id ){
                                                $pt_shipping_address = $address->street_address .", ". $address->city.", ". $address->state.", ". $address->country.", ". $address->zip_code;
                                            }
                                        }
                                    ?>                                        
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Shipping Address</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($pt_shipping_address != '') ? $pt_shipping_address : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <?php 
                                        $pt_billing_address = $patientData['pt_billing_address'];
                                        foreach ($billing_address as $address) { 
                                            if($pt_billing_address == $address->id ){
                                                $pt_billing_address = $address->street_address .", ". $address->city.", ". $address->state.", ". $address->country.", ". $address->zip_code;
                                            }
                                        }
                                    ?>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Billing Address</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($pt_billing_address != '') ? $pt_billing_address : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd pb-20p" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Dispatch Date</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_dispatch_date'] != '') ? $patientData['pt_dispatch_date'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <!-- End First Column -->

                        <!-- Start Second Column -->
                        <div class="uk-width-medium-2-5 fileSetting" style="margin-top: 20px;">
                            <h3 class="primary-color pl-12p"><b>Documents</b></h3>
                            <!-- <div class="uk-grid"> -->
                            <div class="uk-width-medium-1-1">
                                <div class="md-card filesCardSetting border-radius-15p ml-12p" style="padding-left:0px;">
                                    <div class="md-card-content" style="padding: 10px;">
                                    <?php $oral_opg_lateral_count=0; ?>
                                    <?php $stl_count=0; ?>
                                    <?php $ipr_count=0; ?>
                                    <?php $invoice_count=0; ?>
                                    <?php foreach($patientData['patient_photos'] as $photos){
                                        if($photos['key'] == 'Lateral C Images' || $photos['key'] == 'OPG Images' || $photos['key'] == 'Intra Oral Images'){
                                            $oral_opg_lateral_count++;
                                        }elseif($photos['key'] == 'STL File(3D File)'){
                                            $stl_count++;
                                        }elseif($photos['key'] == 'IPR'){
                                            $ipr_count++;
                                        }elseif($photos['key'] == 'Invoice'){
                                            $invoice_count++;
                                        }
                                    }
                                    ?>
                                        <div class="">
                                            <div class="uk-accordion" data-uk-accordion id="my-accordion">
                                                <h3 class="uk-accordion-title" style="background: transparent;"><b>View</b></h3>
                                                <div class="uk-accordion-content">
                                                    
                                                    <!-- Intra Oral | OPG | Lateral PREVIEW -->
                                                    <p class="mb-5p"><b class="neutral-black">Intra Oral | OPG | Lateral</b></p>
                                                    <div>
                                                        <div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                            <div>
                                                            <?php $oral_opg_lateral_count=0; ?>
                                                            <?php $stl_count=0; ?>
                                                            <?php $ipr_count=0; ?>
                                                            <?php foreach($patientData['patient_photos'] as $photos){
                                                                if($photos['key'] == 'Lateral C Images' || $photos['key'] == 'OPG Images' || $photos['key'] == 'Intra Oral Images'){
                                                                    $oral_opg_lateral_count++;
                                                                }elseif($photos['key'] == 'STL File(3D File)'){
                                                                    $stl_count++;
                                                                }elseif($photos['key'] == 'IPR'){
                                                                    $ipr_count++;
                                                                }
                                                            } 
                                                            ?>
                                                                <a class="pr-10p get-images text-black" id="opgPreviewBtn" data-doctype="patient" data-scanID="" data-id="<?php echo $patientData['pt_id']; ?>" data-type="oral_opg_lateral"><span class="pl-10p">Photos(<span class="patientCardOpgCount"><?= $oral_opg_lateral_count; ?></span>)</span></a>
                                                            </div>
                                                            <div>
                                                            <?php if($oral_opg_lateral_count == 0){ ?>
                                                                <a class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/oral_opg_lateral/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                                </a>
                                                            <?php } ?>                                                                    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- STL PREVIEW -->
                                                    <p class="mb-5p"><b class="neutral-black">STL | DCM | PLY Files</b></p>
                                                    <div>
                                                        <div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                            <div>
                                                                <a class="pr-10p stl_preview text-black" id="stlPreviewBtn" data-doctype="patient" data-scanID="" data-id="<?php echo $patientData['pt_id']; ?>" data-type="stl_file"><span class="pl-10p">Files(<span class="patientCardStlCount"><?= $stl_count; ?></span>)</span></a>                                                                    
                                                            </div>
                                                            <div>
                                                                <a href="" class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src=""></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- IPR PREVIEW -->
                                                    <p class="mb-5p"><b class="neutral-black">IPR Files</b></p>
                                                    <div>
                                                        <div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                            <div> 
                                                                <a class="pr-10p get-images text-black "id="iprPreviewBtn" data-doctype="patient" data-scanID=""  data-id="<?php echo $patientData['pt_id']; ?>" data-type="ipr_file"> <span class="pl-10p ">IPR file(<span class="patientCardIprCount"><?= $ipr_count; ?></span>)</span></a>                                                                   
                                                            </div>
                                                            <div>
                                                            <?php if($ipr_count == 0){ ?>
                                                                <a  class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/ipr_files/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                                </a>
                                                            <?php } ?>                                                                    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Invoice PREVIEW -->
                                                    <p class="mb-5p"><b class="neutral-black">Invoice Files</b></p>
                                                    <div>
                                                        <div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                            <div> 
                                                                <a class="pr-10p get-images text-black" id="invoicePreviewBtn" data-doctype="patient" data-scanID=""  data-id="<?php echo $patientData['pt_id']; ?>" data-type="invoice"> <span class="pl-10p ">Invoice file(<span class="patientCardInvoiceCount"><?= $invoice_count; ?></span>)</span></a>                                                                   
                                                            </div>
                                                            <div>
                                                            <?php if($invoice_count == 0){ ?>
                                                                <a  class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/invoice_files/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                                </a>
                                                            <?php } ?>                                                                                                                                   
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <!-- Composite Preview -->
                                                     <p class="mb-5p"><b class="neutral-black">Composite Files</b></p>
                                                    <div>
                                                        <div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                            <div> 
                                                                <a class="pr-10p get-images text-black" id="compositePreviewBtn" data-doctype="patient" data-scanID="" data-id="<?php echo $patientData['pt_id']; ?>" data-type="invoice"> <span class="pl-10p ">Composite file(<span class="patientCardCompositeCount"><?= $invoice_count; ?></span>)</span></a>                                                                   
                                                            </div>
                                                            <div>
                                                            <?php if($invoice_count == 0){ ?>
                                                                <a  class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                                </a>
                                                            <?php }else{ ?>
                                                                <a href="<?= site_url('doctor/getdownloadPostFile/invoice_files/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
                                                                    <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                                </a>
                                                            <?php } ?>                                                                                                                                   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <?php if(!empty($getAcceptedPatientPlan)){ ?>
                            <!-- Aligners -->
                            <div class="payment-sec-l">
                                <div class="ml-12p mr-12p">
                                    <div class="uk-width-medium-1-1">
                                        <div class="sec-two">
                                            <h5>Number Of Alligners</h5>
                                            <h1><?= $getAcceptedPatientPlan->upper.'U '. $getAcceptedPatientPlan->lower.'L' ?></h1>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <div class="sec-two">
                                            <h5>Number Of Alligners Required</h5>
                                            <h1><?= $plan_details->upper_aligners.'U '. $plan_details->lower_aligners.'L' ?></h1>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <div class="sec-two">
                                            <h5>Number Of Alligners Dispatched</h5>
                                            <h1>5U 10L</h1>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <div class="sec-two">
                                            <h5>Further Alligners</h5>
                                            <h1><?= $getAcceptedPatientPlan->upper-$plan_details->upper_aligners.'U '. $getAcceptedPatientPlan->lower-$plan_details->lower_aligners.'L' ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Left Side Treatment Plan -->
                            <?php $dt = new DateTime($getAcceptedPatientPlan->created_at);?>
                            <div class="uk-panel uk-panel-box view-treatment-d" style=" padding:10px;margin: 20px 16px !important;">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-margin-small-top">
                                        <p><?= $dt->format('d F').', '.$dt->format('Y'); ?></p>
                                    </div>
                                    <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-small-top">
                                        <img class="pl-15p" src="<?php echo base_url('assets/images/accepted-tick-icon.svg'); ?>">
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-margin-medium-top">
                                        <span>
                                            <h3 style="margin:0px;"><b><?= ($getAcceptedPatientPlan->title != '') ? $getAcceptedPatientPlan->title : 'Treatment Plan Title';?></b></h3>
                                        </span>
                                    </div>
                                    <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-medium-top">
                                        <a class="clickme" data-id="<?= $getAcceptedPatientPlan->id; ?>" href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$getAcceptedPatientPlan->id); ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>"></a>
                                    </div>
                                </div>
                            </div>                                  
                            <?php }elseif(!empty($getRejectedPatientPlan)){ ?>                                       
                                <?php $dt = new DateTime($getRejectedPatientPlan->created_at);?>
                                <div class="uk-panel uk-panel-box view-treatment-d" style=" padding:10px;margin: 20px 16px !important;">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-margin-small-top">
                                            <p><?= $dt->format('d F').', '.$dt->format('Y'); ?></p>
                                        </div>
                                        <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-small-top">
                                            <img class="pl-15p" src="<?php echo base_url('assets/images/rejected-cross-icon.svg'); ?>">
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-margin-medium-top">
                                            <span>
                                                <h3 style="margin:0px;"><b><?= ($getRejectedPatientPlan->title != '') ? $getRejectedPatientPlan->title : 'Treatment Plan Title';?></b></h3>
                                            </span>
                                        </div>
                                        <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-medium-top">
                                            <a class="clickme" data-id="<?= $getRejectedPatientPlan->id; ?>" href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$getRejectedPatientPlan->id); ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>"></a>
                                        </div>
                                    </div>
                                </div>
                            <?php }elseif(!empty($getUpdatedPatientPlan)){ ?>           
                                <?php $dt = new DateTime($getUpdatedPatientPlan->created_at);?>
                                <div class="uk-panel uk-panel-box view-treatment-d" style=" padding:10px;margin: 20px 16px !important;">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-margin-small-top">
                                             <p><?= $dt->format('d F').', '.$dt->format('Y'); ?></p>
                                        </div>
                                         <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-small-top">
                                            <a class="uk-margin-small-top md-btn new-plan-d shiner-icon" >Updated</a>
                                        </div>
                                    </div>
                                    <div class="uk-grid mt-10p">
                                        <div class="uk-width-medium-1-1 uk-flex">
                                            <img src="<?php echo base_url('assets/images/info-icon.svg'); ?>">
                                            <span class="text-d-green pl-10p">Treatment Plan Updated</span>
                                        </div>
                                    </div>
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-margin-small-top">
                                            <span>
                                                <h3 style="margin:0px;"><b><?= ($getUpdatedPatientPlan->title != '') ? $getUpdatedPatientPlan->title : 'Treatment Plan Title';?></b></h3>
                                            </span>
                                        </div>
                                        <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-small-top">
                                            <a class="clickme" data-id="<?= $getUpdatedPatientPlan->id; ?>" href="<?php echo base_url('doctor/viewTreatmentPlanDetails/'.$getUpdatedPatientPlan->id); ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>"></a>
                                        </div>
                                    </div>
                                </div>                                        
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
        <div class="uk-modal uk-close-btn images_modal" id="images_modal">
            <div class="uk-modal-dialog ">
                <div class="uk-modal-header mb-0p">
                    <h5 class="uk-modal-title">
                    <div class="img-preview-heading">
                    </div>
                    <button id="modal-close" class="uk-close uk-close-btn" style="font-size: 25px; float:right;top: 2%;right: 2%;position: absolute;" type="button" uk-close></button>
                    </h5>
                </div>
                <div class="modal-body" style="height :100%; overflow-y:auto;">
                    <div class="uk-grid" id="show_images">
                        <!--  <div  class="uk-width-medium-1-4" >
                        </div> -->
                    </div>

                    <h3 class="img-preview-heading-opg mb-0p mt-40p">OPG Images</h3>

                     <div class="uk-grid" id="show_opg_images">
                        <!--  <div  class="uk-width-medium-1-4" >
                        </div> -->
                    </div>
    
                    <h3 class="img-preview-heading-lateral mb-0p mt-40p">Lateral C Images</h3>

                    <div class="uk-grid" id="show_lateral_images">
                        <!--  <div  class="uk-width-medium-1-4" >
                        </div> -->
                    </div>

                </div>
            </div>
        </div>
        <!--END Image Preview MODEL-->

        <!--STL Preview MODEL-->
        <div class="uk-modal uk-close-btn" id="stl_preview_modal">
            <div class="uk-modal-dialog ">
                <div class="uk-modal-header">
                    <h5 class="uk-modal-title">
                    <div class="img-preview-heading">
                    </div>
                    <button id="stl_preview_modal_close" class="uk-close uk-close-btn" style="font-size: 25px; float:right;top: 2%;right: 2%;position: absolute;" type="button" uk-close></button>
                    </h5>
                </div>
                <div class="modal-body" id="stl_preview_modal_body" style="height :100%;">

                    <div class="uk-grid" id="show_stl"></div>

                    <div style="overflow-x:auto;">
                        <div class="uk-grid show_stl_icon">
                        
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!--END STL Preview MODEL-->

<!-- Scan Slider Js -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script type="text/javascript">
    function doesFileExist(urlToFile) {
        var xhr = new XMLHttpRequest();
        xhr.open('HEAD', urlToFile, false);
        xhr.send();
         
        return xhr.status !== 404;
    }

    $(".scanPreviewBtn").on('click', function(e){
        $id = $(this).data('id');
        $.ajax({
            url: "<?php echo base_url();?>doctor/getScanDocumentsCount/",
            type: 'GET',
            data: {'id': $id},
            dataType: 'json',
            success: function(response){
                $(".patientCardOpgCount").text(response.opg);
                $(".patientCardStlCount").text(response.stl);
                $(".patientCardIprCount").text(response.ipr);
                $(".patientCardInvoiceCount").text(response.invoice);
                $(".patientCardCompositeCount").text(response.composite);
            }
        });
        $("#opgPreviewBtn").attr('data-doctype', 'scan');
        $("#stlPreviewBtn").attr('data-doctype', 'scan');
        $("#iprPreviewBtn").attr('data-doctype', 'scan');
        $("#invoicePreviewBtn").attr('data-doctype', 'scan');
        $("#compositePreviewBtn").attr('data-doctype', 'scan');
        $("#opgPreviewBtn").attr('data-scanID', $(this).data('id'));
        $("#stlPreviewBtn").attr('data-scanID', $(this).data('id'));
        $("#iprPreviewBtn").attr('data-scanID', $(this).data('id'));
        $("#invoicePreviewBtn").attr('data-scanID', $(this).data('id'));
        $("#compositePreviewBtn").attr('data-scanID', $(this).data('id'));
    });
</script>

<script type = "text/javascript">

    //For closing The Model
    $('#modal-close').click(function(){
        UIkit.modal('.images_modal').hide();
    });
    $('#stl_preview_modal_close').click(function(){
        UIkit.modal('#stl_preview_modal').hide();
    });

    //Image Preview Model
    $('.get-images').on('click', function(e){
        e.preventDefault();
        var patientID = $(this).data('id');
        var key = $(this).data('type');
        var docType = $(this).attr('data-doctype');
        var scanID = $(this).attr('data-scanID');
        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        var statis_img_url = "<?php echo site_url();?>assets/images/";

        var img_site_url =  "<?php echo site_url();?>";
        // alert(patientID);
        $.ajax({
            url:"<?php echo base_url();?>doctor/getPatientImagetype/",
            type: 'GET',
            data: {'id':patientID, 'key':key, 'type' :docType, 'scanID': scanID},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#show_images').html('');
                $('#show_opg_images').html('');
                $('#show_lateral_images').html('');
                $('.img-preview-heading-opg').html('');
                $('.img-preview-heading-lateral').html('');

                $.each(response,function(index,data){

                if(doesFileExist(img_url+data['img'])){

                    if(data['key'] == 'Intra Oral Images' ||data['key'] == 'OPG Images' ||data['key'] == 'Lateral C Images' ){
                        if( data['key'] == 'Intra Oral Images'){
                        $('.img-preview-heading').text( "Intra Oral Images" );

                             $('#show_images').append('<div style="margin-top: 10px;"  class="uk-width-medium-1-4"><div style="position:relative;"><img class="image-preview-popup-d" src="'+img_url+data['img']+'"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div></div>');
                        }
                        if( data['key'] == 'OPG Images'){
                        $('.img-preview-heading-opg').text( "OPG Images" );

                            $('#show_opg_images').append('<div style="margin-top: 10px;"  class="uk-width-medium-1-4"><div style="position:relative;"><img class="image-preview-popup-d" src="'+img_url+data['img']+'"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div></div>');
                        }
                        if( data['key'] == 'Lateral C Images'){
                        $('.img-preview-heading-lateral').text( "Lateral C Images" );

                            $('#show_lateral_images').append('<div style="margin-top: 10px;"  class="uk-width-medium-1-4"><div style="position:relative;"><img class="image-preview-popup-d" src="'+img_url+data['img']+'"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div></div>');

                        }
                    }else if(data['key'] == 'Scans'){
                        $('.img-preview-heading').text( "Scans Images" );
                        $('#show_images').append('<div style="margin-top: 10px;"  class="uk-width-medium-1-4"><img src="'+img_url+data['img']+'" class="h-100"> </div>');
                    }else if(data['key'] == 'Treatment Plan'){
                        $('.img-preview-heading').text( "Treatment Plan File" );
                        var html = '<div style="margin-top: 10px;"  class="uk-width-medium-3-6">'
                            html += '   <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+data['img']+'">'
                            html += '       <div class="kv-file-content">'
                            html += '           <embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;">'
                            html += '       </div>'
                            html += '       <div class="file-thumbnail-footer">'
                            html += '           <div class="file-footer-caption" title="'+data['img']+'">'
                            html += '               <div class="file-caption-info">'+data['img']+'</div>'
                            html += '               <div class="file-size-info"> <samp>(114.02 KB)</samp></div>'
                            html += '           </div>'   
                            html += '           <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>'
                            html += '           <div class="file-actions">'
                            html += '               <div class="file-footer-buttons">'
                            html += '                   <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>'
                            html += '               </div>'
                            html += '           </div>'
                            html += '           <div class="clearfix"></div>'
                            html += '       </div>'
                            html += '   </div>'
                            html += '</div>';
                        $('#show_images').append(html);
                        
                    }else if(data['key'] == 'IPR'){
                        $('.img-preview-heading').text( "IPR Images" );
                        $('#show_images').append('<div style="margin-top: 10px;"  class="uk-width-medium-1-4"><div style="position:relative;"><img class="image-preview-popup-d" src="'+img_url+data['img']+'"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div></div>');
                    }else if(data['key'] == 'Invoice'){
                        $('.img-preview-heading').text( "Invoice File" );
                        var html = '<div style="margin-top: 10px;"  class="uk-width-medium-3-6">'
                            html += '   <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1634213394583_50-0" data-fileindex="0" data-template="pdf" title="'+data['img']+'">'
                            html += '       <div class="kv-file-content">'
                            html += '<div style="position:relative;"><embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;"><span class="image-preview-popup-down"><a href="'+img_site_url+'treatmentplanner/patient/getdownloadSinglePostFile/'+data['photos_id']+'"><img src="'+statis_img_url+'download-arrow.svg"></a></span></div>'
                            // html += '           <embed class="kv-preview-data file-preview-pdf" src="'+img_url+data['img']+'" type="application/pdf" style="width:100%;height:160px;">'
                            html += '       </div>'
                            html += '       <div class="file-thumbnail-footer">'
                            html += '           <div class="file-footer-caption" title="'+data['img']+'">'
                            html += '               <div class="file-caption-info">'+data['img']+'</div>'
                            html += '               <div class="file-size-info"> <samp>(114.02 KB)</samp></div>'
                            html += '           </div>'   
                            html += '           <div class="file-upload-indicator" title="Not uploaded yet"><i class="glyphicon glyphicon-plus-sign text-warning"></i></div>'
                            html += '           <div class="file-actions">'
                            html += '               <div class="file-footer-buttons">'
                            html += '                   <button type="button" class="kv-file-zoom btn btn-sm btn-kv btn-outline-secondary" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></button>'
                            html += '               </div>'
                            html += '           </div>'
                            html += '           <div class="clearfix"></div>'
                            html += '       </div>'
                            html += '   </div>'
                            html += '</div>';
                        $('#show_images').append(html);
                    }
                    
                    UIkit.modal('.images_modal').show();
                
                }    // location.reload(true);
                
                });
            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
    });

    //STL Files Preview Modal
    $('.stl_preview').on('click', function(e){
        e.preventDefault();
        var patientID = $(this).data('id');
        var imageType = $(this).data('type');
        var static_img_url = "<?php echo base_url();?>assets/images/";

        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        $.ajax({
            url:"<?php echo base_url();?>doctor/getPatientImagetype/",
            type: 'GET',
            data: {'id':patientID, 'imageType':imageType},
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('.img-preview-heading').html('');
                $('.img-preview-heading-opg').html('');
                $('.img-preview-heading-lateral').html('');
                $('.show_stl_icon').html('');
                var count = 0;
                $.each(response,function(index,data){

                if(doesFileExist(img_url+data['img'])){

                    if(data['key'] == 'Intra Oral Images' ||data['key'] == 'OPG Images' ||data['key'] == 'Lateral C Images' ){
                        $('.img-preview-heading').text( "Intra Oral/ OPG/ Lateral C Images" );
                    }else if(data['key'] == 'Scans'){
                        $('.img-preview-heading').text( "Scans Images" );
                    }else if(data['key'] == 'Treatment Plan'){
                        $('.img-preview-heading').text( "Treatment Plan File" );
                    }else if(data['key'] == 'IPR'){
                        $('.img-preview-heading').text( "IPR Images" );
                    }else if(data['key'] == 'Invoice'){
                        $('.img-preview-heading').text( "Invoice File" );
                    }

                    $('.img-preview-heading').text('STL File(3D File)');


                    if(count == 0){
                        $('.show_stl_icon').append('<div  class="uk-width-medium-1-4 stl-preview-active"><div class="stl-preview-bg"><img class="" src="'+static_img_url+'3d-stl-icon.svg"><br><br><span class="stl-preview-popup-down"><img src="'+static_img_url+'download-arrow.svg"></span></div></div><br><br>');
                    }else{
                          $('.show_stl_icon').append('<div class="uk-width-medium-1-4"><div class="stl-preview-bg"><img class="" src="'+static_img_url+'3d-stl-icon.svg"><br><br><span class="stl-preview-popup-down"><img src="'+static_img_url+'download-arrow.svg"></span></div></div><br><br>');
                    }




                    if(count == 0){
                        $('#show_stl').append('<div class="uk-width-medium-1-1 stl-view-v" style="display:visible;"><div id="stl_viewer_'+count+'" class="stl_viewer_active"></div></div>');
                    }else{
                        $('#show_stl').append('<div class="uk-width-medium-1-1 stl-view-n" style="display:none;"><div id="stl_viewer_'+count+'" class="stl_viewer_active"></div></div>');
                    }


                    UIkit.modal('#stl_preview_modal').show();

                    var stl_viewer=new StlViewer
                    (
                        document.getElementById("stl_viewer_"+count),
                        {
                            models:
                            [
                                {filename:"<?php echo site_url();?>assets/uploads/images/"+data['img']}
                            ]
                        }
                    );
                    count++;
                    // location.reload(true);
                    }
                });
            },
            error: function () {
                alert('Data Not Deleted');
            }
        });
    });

   
</script>  

<script type="text/javascript">
    const slider = document.querySelector('.scrolling-wrapper');
let isDown = false;
let startX;
let scrollLeft;
slider.addEventListener('mousedown', (e) => {
let rect = slider.getBoundingClientRect();
isDown = true;
slider.classList.add('active');
// Get initial mouse position
startX = e.pageX - rect.left;
// Get initial scroll position in pixels from left
scrollLeft = slider.scrollLeft;
console.log(startX, scrollLeft);
});
slider.addEventListener('mouseleave', () => {
isDown = false;
slider.dataset.dragging = false;
slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
isDown = false;
slider.dataset.dragging = false;
slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
if (!isDown) return;
let rect = slider.getBoundingClientRect();
e.preventDefault();
slider.dataset.dragging = true;
// Get new mouse position
const x = e.pageX - rect.left;
// Get distance mouse has moved (new mouse position minus initial mouse position)
const walk = (x - startX);
// Update scroll position of slider from left (amount mouse has moved minus initial scroll position)
slider.scrollLeft = scrollLeft - walk;
console.log(x, walk, slider.scrollLeft);
});
</script>

<script>
// Read More/Less
function  readMoreFunction() {
    // alert();
  var dots = document.getElementById("accordion-dots");
  var moreText = document.getElementById("accordion-more");
  var btnText = document.getElementById("accordion-drop-btn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
     $("#accordion-drop-btn").removeClass("custom-accordion-rotate-down");
     $("#accordion-drop-btn").addClass("custom-accordion-rotate-up");
    // btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
     $("#accordion-drop-btn").removeClass("custom-accordion-rotate-up");

     $("#accordion-drop-btn").addClass("custom-accordion-rotate-down");

    dots.style.display = "none";
    // btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

function  readMoreInstructionFunction() {
    // alert();
  var instruction_dots = document.getElementById("instruction-accordion-dots");
  var instruction_moreText = document.getElementById("instruction-accordion-more");
  var instruction_btnText = document.getElementById("instruction-accordion-drop-btn");

  if (instruction_dots.style.display === "none") {
    instruction_dots.style.display = "inline";
     $("#instruction-accordion-drop-btn").removeClass("instruction-custom-accordion-rotate-down");
     $("#instruction-accordion-drop-btn").addClass("instruction-custom-accordion-rotate-up");
    // btnText.innerHTML = "Read more"; 
    instruction_moreText.style.display = "none";
  } else {
     $("#instruction-accordion-drop-btn").removeClass("instruction-custom-accordion-rotate-up");

     $("#instruction-accordion-drop-btn").addClass("instruction-custom-accordion-rotate-down");

    instruction_dots.style.display = "none";
    // btnText.innerHTML = "Read less"; 
    instruction_moreText.style.display = "inline";
  }
}
</script>
<script type="text/javascript">

    $(document).ready(function(){
        $('.clickme').on('click',function(){

            var id = $(this).attr('data-id');
            // alert(id);
            $.ajax({
                url: '<?php echo base_url(); ?>doctor/updatePlanStatus',
                method: 'POST',
                data: {
                    'plan_id': id
                },
                success: function(remote_response) {
                    console.log(remote_response);
                    // location.reload(true);
                }
                
            });
           
        });
    });

    $(document).ready(function(){
        $('.updateNotification').on('click',function(){

            var id = $(this).attr('data-id');
            // alert(id);
            $.ajax({
                url: '<?php echo base_url(); ?>doctor/updateNotification',
                method: 'POST',
                data: {
                    'notification_id': id
                },
                success: function(remote_response) {
                    console.log(remote_response);
                    location.reload(true);
                }
                
            });
           
        });
    });


    // Delete PDF File
     function myFunction123(ukid) {
        var id = ukid.id;
        // alert(id);
        if(id == 1){
            $("#input-id-1").attr("disabled",false);
        }else{
            $("#input-id-2").attr("disabled",false);
        }
        // $.ajax({
        //     url:"<?php echo base_url();?>treatmentplanner/patient/deletePdfPlanFile/"+ plan_id,
        //     type: 'POST',
        //     data: {"id":plan_id},
        //     dataType: 'json',
        //     success: function(response) {
        //         console.log(response);
        //         $('#preview-plan-pdf').hide();
        //         $('#preview-plan-input').show();
        //     },
        //     error: function () {
        //         alert('Data Not Deleted');
        //     }
        // });
    }
</script>
