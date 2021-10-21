
<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>
        <h1 class="patientMobile"><b>Single Patient</b></h1>
        <?php foreach($singlePatient as $patientData): ?>
            <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                            <div class="uk-width-large-4-10">
                                <div class="user_heading userDataBackground border-top-left-10p">
                                    <div class="user_heading_avatar doctorViewImageSetting">
                                        <div class="thumbnail">
                                        <?php if($patientData['pt_img']!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>" alt="user avatar" class="">
                                        <?php } else{ ?>

                                            <img src="<?php echo base_url('assets/uploads/images/round-bg.png'); ?>" alt="user avatar" class="">
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
                                    <div class="user_heading_content doctorViewNameSetting">
                                        <h2 style="color:#6D3745 !important;" class="heading_b uk-margin-bottom">
                                            <span class="uk-text-truncate">
                                                <?= $patientData['pt_firstname']?><br><?= $patientData['pt_lastname'] ?>
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="user_content">
                                    <ul id="" class="uk-margin">
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
                                                <span class="themeTextColor">Doctor</span>
                                            </div>   
                                            <div class="uk-width-large-6-10">
                                                <span>
                                                    <?= $patientData['first_name']; ?>
                                                    <?= $patientData['last_name']; ?>
                                                </span>
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
                                                <span><?= $patientData['type_of_treatment']; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Status</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_custom_status']; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Type of Case</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['type_of_case']; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Arches Treated</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['arc_treated']; ?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">IPR to be Performed</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span>
                                                   <?php if($patientData['ipr_performed']==1) { echo 'Yes'; } else{ echo "No"; } ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Attachement to be Placed</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span>
                                                    <?php if($patientData['attachment_placed']==1) { echo 'Yes'; } else{ echo "No"; } ?>
                                                </span>
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
                                                <span><?= $patientData['pt_aligners_dispatch']?></span>
                                            </div>
                                        </div>
                                        
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Cost of Plan</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_cost_plan']?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Total Amount Paid</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_amount_paid']?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Balance Amount</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_cost_plan'] - $patientData['pt_amount_paid']?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Shipping Address</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_shipping_details']?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Billing Address</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_billing_address']?></span>
                                            </div>
                                        </div>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-4-10">
                                                <span class="themeTextColor">Dispatch Date</span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $patientData['pt_dispatch_date']; ?></span>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="uk-width-large-6-10 fileSetting" style="margin-top: 20px;">
                                <div class="md-card filesCardSetting border-radius-15p">
                                    <div class="md-card-content cardViewSeting">
                                        <div class="uk-margin-medium-bottom">
                                            <div class="md-list-content">
                                                <span style="color:#6D3745 !important;" class="md-list-heading"><b>Files</b></span>
                                            </div>
                                            <div class="uk-grid marginTop">
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">Intra Oral/OPG/Lateral C</b>
                                                            </label>
                                                            <br>

                                                            <?php 
                                                                $patientID = $patientData['pt_id'];
                                                                $patientData = $patientData['patient_photos'];

                                                                $intra = array_search('Intra Oral Images', array_column($patientData, 'key'));
                                                                $opg = array_search('OPG Images', array_column($patientData, 'key'));
                                                                $lateral = array_search('Lateral C Images', array_column($patientData, 'key'));
                                                                $stl_file = array_search('STL File(3D File)', array_column($patientData, 'key'));
                                                                 $scan = array_search('Scans', array_column($patientData, 'key'));
                                                                $treatment_plan = array_search('Treatment Plan', array_column($patientData, 'key'));
                                                                $ipr = array_search('IPR', array_column($patientData, 'key'));
                                                                 $invoice = array_search('Invoice', array_column($patientData, 'key'));
                                                            ?>
                                                            
                                                            <?php
                                                            if($intra != null || $intra === 0 || $opg != null || $opg === 0 || $lateral != null || $lateral === 0){
                                                            ?>

                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/oral_opg_lateral/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/file-icon.png') ?>"></span>
                                                                    <span class="text-black">Files.jpg</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php }else{ ?>
                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/oral_opg_lateral/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/file-icon-grey.png') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">STL file of Pt.</b>
                                                            </label>
                                                            <br>
                                                             <?php 
                                                                if($stl_file != null || $stl_file === 0){
                                                            ?>
                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/images_stl/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/stl-icon.png') ?>"></span>
                                                                    <span class="text-black">File.stl</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                             <?php }else{ ?>
                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/images_stl/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/stl-icon-grey.png') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">Treatment Plan Doc</b>
                                                            </label>
                                                            <br>
                                                             <?php 
                                                                if($treatment_plan != null || $treatment_plan === 0){
                                                            ?>
                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/images_treatment_plan/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon.png') ?>"></span>
                                                                    <span class="text-black">Files.pdf</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php }else{ ?>

                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/images_treatment_plan/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon-grey.png') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-grid marginTop">
                                                
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">IPR</b>
                                                            </label>
                                                            <br>
                                                            <?php 

                                                                if($ipr != null || $ipr === 0){
                                                                    
                                                            ?>
                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/ipr_files/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon.png') ?>"></span>
                                                                    <span class="text-black">Files.pdf</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php }else{ ?>

                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/ipr_files/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon-grey.png') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-medium-1-3 ">
                                                    <div class="form-group form-float">
                                                        <div class="form-line focused">
                                                            <label for="wizard_fullname">
                                                                <b class="viewPatientFileFont">Invoice</b>
                                                            </label>
                                                            <br>
                                                            <?php 
                                                                if($invoice != null || $invoice === 0){
                                                            ?>
                                                            <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/invoice_files/').$patientID; ?>" class="uk-flex uk-flex-between">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon.png') ?>"></span>
                                                                    <span class="text-black">Files.pdf</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow.png') ?>"></span>
                                                                </a>
                                                            </div>
                                                             <?php }else{ ?>

                                                           <div class="filesBackground">
                                                                <a href="<?= site_url('admin/patient/getdownloadPostFile/invoice_files/').$patientID; ?>" class="uk-flex uk-flex-between disabled">
                                                                    <span><img src="<?= site_url('assets/images/pdf-icon-grey.png') ?>"></span>
                                                                    <span class="text-grey">Empty</span>
                                                                    <span><img src="<?= site_url('assets/images/down-arrow-grey.png') ?>"></span>
                                                                </a>
                                                            </div>
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

                        <div class="viewButtoMobile uk-flex-s uk-flex-between" style="padding-left: 24px; padding-right:24px;padding-bottom:24px;">
                            <div  class=" mobileDBESetting">
                                <a  class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deletePatientByID('<?= $patientID;  ?>');">Delete</a>
                            </div>
                            <div class="uk-flex-s">
                                <div class="uk-margin-small-right">
                                    <a class="md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('admin/patient/patientListing'); ?>">Back</a>
                                </div>
                                <div class="">
                                    <a class="md-btn editbtnBackground btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('admin/patient/editPatient/').$patientID; ?>">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
