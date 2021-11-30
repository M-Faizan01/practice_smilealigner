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
        <?php if ($this->session->flashdata('error')) { ?>
        <div class="uk-alert uk-alert-danger" data-uk-alert="">
            <a href="#" class="uk-alert-close uk-close"></a>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php } if ($this->session->flashdata('success')) { ?>                
            <script>jQuery(document).ready(function(){ w3_alert("<?php echo $this->session->flashdata('success'); ?>", "tick-green", "type"); });</script>
        <?php } ?>
        <?php foreach($singlePatient as $patientData): ?>
        <div class="uk-grid">
            <div class="uk-width-medium-3-6">
                <div class="uk-grid">
                    <div class="uk-width-medium-6-6 uk-flex">
                        <div class="uk-flex">
                            <span class="">
                                <a href="<?= site_url('treatmentplanner/patient/patientListing/'); ?>">
                                    <img src="<?php echo base_url('assets/images/left-arrow-round-bg.svg'); ?>">                    
                                </a>
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            <h1 class="patientMobile uk-margin-remove"><b>Patient Card</b></h1>
                            &nbsp;&nbsp;&nbsp;
                        </div>
                        <span>
                            <a href="<?php echo base_url('treatmentplanner/patient/viewPlan/').$patientData['pt_id']; ?>" class="">
                                <img src="<?php echo base_url('assets/images/view_treatment_plan_btn.svg'); ?>" alt="" class="max-width-none-sm">
                            </a>
                        </span>
                    </div>                   
                </div>
            </div>
            <div class="uk-width-medium-3-6" style="display: flex; justify-content: end;">                  
                <a href="<?= base_url('treatmentplanner/patient/editPatient/').$patientData['pt_id']; ?>" style="" class="uk-margin-small-right"> 
                    <img src="<?php echo base_url('assets/images/edit_patient_profile_btn_updated.svg'); ?>" alt="">
                </a>
                <a href="<?php echo base_url('treatmentplanner/patient/createPlan/').$patientData['pt_id']; ?>">
                     <img src="<?php echo base_url('assets/images/create-plan-btn.svg'); ?>">
                </a>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-10-10">
                <div class="md-card">
                    <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                        <div class="uk-width-medium-3-5 pt-card-r-pd">

                            <!-- Start Scans Slider-->
                            <div class="carousel carousel-nav mt-20p" data-flickity='{"contain": true, "pageDots": false}'>
                                <?php foreach($patientScans as $scanData): ?>
                                <div class="carousel-cell">
                                    <button class="uk-button uk-button-default treatmentPlan-cases-btn uk-flex uk-flex-middle">
                                        <b class="uk-text-truncate"><?= $scanData['title'] ?></b>
                                    </button>
                                </div>
                                <?php endforeach; ?>
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
                                        <span>
                                            <?php if(!empty($getAcceptedPatientPlan)){ ?>
                                                <img class="pl-15p uk-margin-small-bottom" src="<?php echo base_url('assets/images/accepted-dot-icon.svg'); ?>">

                                            <?php }elseif(!empty($getRejectedPatientPlan)){ ?>
                                                <img class="pl-15p uk-margin-small-bottom" src="<?php echo base_url('assets/images/rejected-dot-icon.svg'); ?>">

                                            <?php }elseif(!empty($getModifyAccPatientPlan) || !empty($getModifyRejPatientPlan)){ ?>
                                                <img class="pl-15p uk-margin-small-bottom" src="<?php echo base_url('assets/images/modify-dot-icon.svg'); ?>">

                                            <?php }elseif(!empty($getPendingPatientPlan)){ ?>
                                               <img class="pl-15p uk-margin-small-bottom" src="<?php echo base_url('assets/images/pending-dot-icon.svg'); ?>">

                                            <?php }else{ ?>

                                            <?php } ?>
                                        </span>
                                    </h2>
                                    
                                   
                                  <!--  <span class="req-reject-status"><img src="http://localhost/smilealigners/assets/images/red-ellipse.svg">&nbsp;&nbsp;&nbsp;Rejected</span>
                                   <span class="req-accept-status"><img src="http://localhost/smilealigners/assets/images/green-ellipse.svg">&nbsp;&nbsp;&nbsp;Accepted</span> -->
                                </div>
                            </div>
                            <div class="user_content pb-0p">
                                <ul id="" class="uk-margin mb-0p">
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
                                            <span class="themeTextColor"><b>Doctor Name</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['first_name'].' '.$patientData['last_name'] ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Patient ID</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $patientData['pt_id']?></span>
                                        </div>
                                    </div>
                                   <!--  <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Doctor</b></span>
                                        </div>   
                                        <div class="uk-width-large-6-10">
                                            <span>
                                                <?= $patientData['first_name']; ?>
                                                <?= $patientData['last_name']; ?>
                                            </span>
                                        </div>
                                    </div> -->
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Email</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_email'] != '') ? $patientData['pt_email'] : 'N/A';?></span>
                                        </div>
                                    </div>
                                    <!-- <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Age</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_age'] != '') ? $patientData['pt_age'] : 'N/A'; ?></span>
                                        </div>
                                    </div> -->
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
                                            <span class="themeTextColor"><b>Impresssion</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_scan_impression'] != '') ? $patientData['pt_scan_impression'] : 'N/A'; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Treatment Objectives</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10 uk-flex pr-15p">

                                        <?php if($patientData['pt_objective'] != ''){ 
                                        ?>
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

                                            

                                            <!-- <div class="uk-grid">
                                                <div class="uk-width-5-6">
                                                     <p>Lorem ipsum dolor sit amet, consectetur <span id="dots">...</span><span id="more">adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span></p>

                                                </div>
                                                <div class="uk-width-1-6 pl-0p">
                                                    <button href="" class="custom-accordion-drop-icon" onclick=" readMoreFunction()" id="myBtn"><img src="<?php echo base_url('assets/images/accordion-drop.svg') ?>"></button>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>

                                    <div class="uk-grid pt-card-pd" data-uk-grid-margin>
                                        <div class="uk-width-large-4-10">
                                            <span class="themeTextColor"><b>Special Instruction</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10 uk-flex pr-15p">

                                        <?php if($patientData['pt_special_instruction'] != ''){ 
                                            ?>
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
                                                    if($plans['pre_status'] == 1 && $plans['status'] == 1){
                                                        $planID = $plans['id'];
                                                    }
                                                    if($plans['pre_status'] == 1 && $plans['status'] == 2){
                                                        $rejectedPlanID = $plans['id'];
                                                    }
                                                    $patientID = $plans['patient_id'];
                                                }
                                            ?>
                                            <?php if(!empty($getAcceptedPatientPlan)){ ?>
                                                <div class="uk-width-large-6-10 pr-15p">
                                                    <span class="uk-flex uk-flex-between">
                                                        <a href="<?php echo base_url('treatmentplanner/patient/viewTreatmentPlanDetails/'.$planID) ?>" class="themeTextColor text-decoration-underline">
                                                            <b><?= $getAcceptedPatientPlan->title ?></b>
                                                        </a>
                                                        <img src="<?php echo base_url('assets/admin/assets/img/arrow-right.svg'); ?>">
                                                    </span>
                                                </div>
                                            <?php }elseif(!empty($getRejectedPatientPlan)){ ?>
                                                <div class="uk-width-large-6-10 pr-15p">
                                                    <span class="uk-flex uk-flex-between">
                                                        <a href="<?php echo base_url('treatmentplanner/patient/viewTreatmentPlanDetails/'.$rejectedPlanID) ?>" class="themeTextColor text-decoration-underline">
                                                            <b><?= $getRejectedPatientPlan->title ?></b>
                                                        </a>
                                                        <img src="<?php echo base_url('assets/admin/assets/img/arrow-right.svg'); ?>">
                                                    </span>
                                                </div>

                                        <?php }elseif(!empty($getModifyAccPatientPlan) || !empty($getModifyAccPatientPlan)){ ?>
                                            <div class="uk-width-large-6-10">
                                                <span><a href="<?php echo base_url('treatmentplanner/patient/viewPlan/'.$patientID) ?>" class="text-black">View Treatment Plan</a></span>
                                            </div>

                                        <?php }else{ ?>
                                            <div class="uk-width-large-6-10">
                                                <span><a href="<?php echo base_url('treatmentplanner/patient/viewPlan/'.$patientID) ?>" class="text-black">View Treatment Plan</a></span>
                                            </div>
                                        <?php } ?>


                                    <?php }else{ ?>

                                        <div class="uk-width-large-6-10">
                                            <span><?= 'N/A'; ?></span>
                                        </div>

                                    <?php } ?>


                                       <!--  <div class="uk-width-large-6-10">
                                            <span><?= ($patientData['pt_treatment_plan'] != '') ? $patientData['pt_treatment_plan'] : 'N/A'; ?></span>
                                        </div> -->
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

                        <div class="uk-width-medium-2-5 fileSetting" style="margin-top: 20px;">
                           <h3 class="primary-color pl-12p"><b>Documents</b></h3>
                           
                           <!-- Documents Section -->

                           <div class="uk-width-medium-1-1">
                              <div class="md-card filesCardSetting border-radius-15p ml-12p" style="padding-left:0px;">
                                 <div class="md-card-content" style="padding: 10px;">
                                    <div class="">
                                       <div class="uk-accordion" data-uk-accordion id="my-accordion">
                                          <h3 class="uk-accordion-title" style="background: transparent;"><b>View</b></h3>
                                          <div class="uk-accordion-content">
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
                                                      <a class="pr-10p get-images text-black"  data-id="<?php echo $patientData['pt_id']; ?>" data-type="oral_opg_lateral"><span class="pl-10p">Photos(<?= $oral_opg_lateral_count; ?>)</span></a>
                                                   </div>
                                                   <div>
                                                      <?php if($oral_opg_lateral_count == 0){ ?>
                                                      <a class="uk-flex uk-flex-between pr-10p">
                                                      <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                      </a>
                                                      <?php }else{ ?>
                                                      <a href="<?= site_url('treatmentplanner/patient/getdownloadPostFile/oral_opg_lateral/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
                                                      <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                      </a>
                                                      <?php } ?>
                                                   </div>
                                                </div>
                                             </div>
                                             <p class="mb-5p"><b class="neutral-black">STL | DCM | PLY Files</b></p>
                                             <div>
                                                <div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                   <div>
                                                      <a class="pr-10p stl_preview text-black"  data-id="<?php echo $patientData['pt_id']; ?>" data-type="stl_file"><span class="pl-10p">Files(<?= $stl_count; ?>)</span></a>
                                                   </div>
                                                   <div>
                                                      <?php if($stl_count == 0){ ?>
                                                      <a class="uk-flex uk-flex-between pr-10p">
                                                      <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                      </a>
                                                      <?php }else{ ?>
                                                      <a href="<?= site_url('treatmentplanner/patient/getdownloadPostFile/images_stl/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
                                                      <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                      </a>
                                                      <?php } ?>
                                                   </div>
                                                </div>
                                             </div>
                                             <p class="mb-5p"><b class="neutral-black">IPR Files</b></p>
                                             <div>
                                                <div class="plan-info uk-flex uk-flex-middle" style="background-color:#FFFFFF!important;">
                                                   <div> 
                                                      <a class="pr-10p get-images text-black"  data-id="<?php echo $patientData['pt_id']; ?>" data-type="ipr_file"> <span class="pl-10p ">IPR file(<?= $ipr_count; ?>)</span></a>
                                                   </div>
                                                   <div>
                                                      <?php if($ipr_count == 0){ ?>
                                                      <a  class="uk-flex uk-flex-between pr-10p">
                                                      <span><img src="<?= site_url('assets/images/direct-download.svg') ?>"></span>
                                                      </a>
                                                      <?php }else{ ?>
                                                      <a href="<?= site_url('treatmentplanner/patient/getdownloadPostFile/ipr_files/').$patientData['pt_id']; ?>" class="uk-flex uk-flex-between pr-10p">
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

                           <!-- END Documents Section -->
                           <?php if(!empty($getAcceptedPatientPlan)){ ?>
                           <?php 
                              foreach($getPatientTreatmentPlans as $plans){
                              if($plans['pre_status'] == 1 && $plans['status'] == 1){ 
                              ?>
                           <!-- Aligners -->
                           <div class="payment-sec-l">
                              <div class="ml-12p mr-12p">
                                 <div class="uk-width-medium-1-1">
                                    <div class="sec-two">
                                       <h5>Number Of Alligners</h5>
                                       <h1><?= $plans['upper'].'U '. $plans['lower'].'L' ?></h1>
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
                                       <h1><?= $plans['upper']-$plan_details->upper_aligners.'U '. $plans['lower']-$plan_details->lower_aligners.'L' ?></h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Left Side Treatment Plan -->
                           <?php $dt = new DateTime($plans['created_at']);?>
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
                                       <h3 style="margin:0px;"><b><?= ($plans['title'] != '') ? $plans['title'] : 'Treatment Plan Title';?></b></h3>
                                    </span>
                                 </div>
                                 <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-medium-top">
                                    <a class="" href="<?php echo base_url('treatmentplanner/patient/viewTreatmentPlanDetails/'.$plans['id']); ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>"></a>
                                 </div>
                              </div>
                           </div>
                           <?php  }
                              }
                              ?>
                           <?php }elseif(!empty($getRejectedPatientPlan)){ ?>
                           <?php 
                              foreach($getPatientTreatmentPlans as $plans){
                              if($plans['pre_status'] == 1 && $plans['status'] == 2){ ?>
                           <?php $dt = new DateTime($plans['created_at']);?>
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
                                       <h3 style="margin:0px;"><b><?= ($plans['title'] != '') ? $plans['title'] : 'Treatment Plan Title';?></b></h3>
                                    </span>
                                 </div>
                                 <div class="uk-width-medium-1-2 uk-flex uk-flex-middle uk-flex-right uk-margin-medium-top">
                                    <a class="" href="<?php echo base_url('treatmentplanner/patient/viewTreatmentPlanDetails/'.$plans['id']); ?>"><img src="<?php echo base_url('assets/images/view-plan-details.svg'); ?>"></a>
                                 </div>
                              </div>
                           </div>
                           <?php  }
                              }
                              ?>
                           <?php }?>
                        </div>
                    </div>


                       <!--  <div class="viewButtoMobile uk-flex-s uk-flex-between" style="padding-left: 24px; padding-right:24px;padding-bottom:24px;">
                            <div  class=" mobileDBESetting">
                                <a  class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deletePatientByID('<?= $patientID;  ?>');">Delete</a>
                            </div>
                            <div class="uk-flex-s">
                                <div class="uk-margin-small-right">
                                    <a class="md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('treatmentplanner/patient/patientListing'); ?>">Back</a>
                                </div>
                                <div class="">
                                    <a class="md-btn editbtnBackground btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('treatmentplanner/patient/editPatient/').$patientID; ?>">Edit</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
         <!--Image Preview MODEL-->
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

<!-- <script type="text/javascript" src="https://kenwheeler.github.io/slick/slick/slick.js"></script> -->
<!-- <script type="text/javascript">

    $('.responsive').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      autoSlidesToShow: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
  ]
});

</script> -->
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
        var imageType = $(this).data('type');
        // var imageType = 'Intra Oral Images';
        var img_url = "<?php echo site_url();?>assets/uploads/images/";
        var statis_img_url = "<?php echo site_url();?>assets/images/";

        var img_site_url =  "<?php echo site_url();?>";
        // alert(patientID);
        $.ajax({
            url:"<?php echo base_url();?>treatmentplanner/Patient/getPatientImagetype/",
            type: 'GET',
            data: {'id':patientID, 'imageType':imageType},
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
            url:"<?php echo base_url();?>treatmentplanner/Patient/getPatientImagetype/",
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

<script>
var acc = document.getElementsByClassName("custom-accordion");
var i;
for (i = 0; i < acc.length; i++) {
acc[i].addEventListener("click", function() {
this.classList.toggle("active");
var accordian_panel = this.nextElementSibling;
if (accordian_panel.style.display === "block") {
accordian_panel.style.display = "none";
} else {
accordian_panel.style.display = "block";
}
});
}
$(document).ready(function() {
var fold = $("#accordion-fold");
fold.cliked = 1;
fold.click(function () {
$("#accordion-fold_p").text((fold.cliked++ % 2 == 0) ? "Lorem Ipsum is simply text of the " : "Lorem Ipsum is simply text of the ...");
});
$( ".accordion-toggle" ).click( function() {
$("#accordion-image").toggleClass('accordion-flip');
});
$( ".custom-accordion" ).click( function() {
$(".custom-accordion").toggleClass('custom-accordian-br');
});
});
</script>


<!-- Read More/Less -->
<script>
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