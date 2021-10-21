<div id="page_content">
        <div id="page_content_inner">
            <br>
            <br>
            <h1 class="heading_a headingSize uk-margin-bottom patientMobile"><b>Patients</b></h1>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="uk-alert uk-alert-danger" data-uk-alert="">
                            <a href="#" class="uk-alert-close uk-close"></a>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } if ($this->session->flashdata('success')) { ?>
                    <script>jQuery(document).ready(function(){ w3_alert("<?php echo $this->session->flashdata('success'); ?>", "tick-green", "type"); });</script>
                        <!--<div class="uk-alert uk-alert-success" data-uk-alert="">
                            <a href="#" class="uk-alert-close uk-close"></a>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>-->
                    <?php } ?>

                    <div class="uk-width-medium-1-5 addPatientButton regularButtonAlignment">
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('doctor/addPatient') ?>">Add Patient</a>
                        </div>
                        <!-- <a class="buttonAlignment " href="#"> 
                            <span class="material-icons filterIcon">
                                filter_alt
                                </span>
                        </a> -->
                         <a class="buttonAlignment ListMobileSetting " href="<?= site_url('doctor/patientList'); ?>"> 
                            <span class="material-icons iconSizeSetting">
                            menu
                            </span>
                        </a>
                        <a class="buttonAlignment gridMobileSetting " href="<?= site_url('doctor/patientGridList'); ?>"> 
                            <span class="material-icons gridIconSetting">
                                grid_view
                            </span>
                        </a>

                    <div class="dt_colVis_buttons buttonAlignment pritingButtonsSetting"></div>

                    
                    <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                        <thead class="tableHeadingBorder">
                        <tr>
                            <th class="tblHeading">Patient ID</th>
                            <th class="tblHeading">Patient</th>
                            <th class="tblHeading">Doctor</th>
                            <th class="tblHeading">Treatment Objectives</th>
                            <th class="tblHeading">Referral Name</th>
                            <th class="tblHeading">Treatment Plan</th>
                            <th class="tblHeading">Approval Date</th>
                            <th class="tblHeading">Type of Treatment</th>
                            <th class="tblHeading">Status</th>
                            <th class="tblHeading">Cost of Plan</th>
                            <th class="tblHeading">Total Amount Paid</th>
                            <th class="tblHeading">Shipping Details</th>
                            <th class="tblHeading">Billing Address</th>
                            <th class="tblHeading">Dispatch Details</th>
                            <th class="tblHeading">Invoice</th>
                            <th class="tblHeading">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($patient_data as $patientData): ?>
                            <tr>
                                <td class="tblRow"><?= $i; ?></td>
                                <td class="tblRow">
                                    <?php if($patientData->pt_img!=''){ ?>
                                        <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $patientData->pt_img); ?>"> <?= $patientData->pt_firstname; ?>
                                    <?php } else{ ?>
                                        <div class="" style="display:flex">
                                            <div class="marginprofilepicture" id="profileImageUser"><?php 
                                            $userName = $patientData->pt_firstname;
                                            $lastName = $patientData->pt_lastname;
                                            echo $userName[0].$lastName[0]; 
                                            ?></div>
                                            <div style="padding:12px 3px;">
                                                <?= $patientData->pt_firstname; ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </td>

                                <td class="tblRow"><span style="margin-left: 15px;"><?php if(!empty($userdata['first_name'])){echo $userdata['first_name'];}else{echo '- - -';} ?></span></td>
                               
                                <td class="tblRow"><?php if(!empty($patientData->pt_objective)){echo $patientData->pt_objective;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_referal)){echo $patientData->pt_referal;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_treatment_plan)){echo $patientData->pt_treatment_plan;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_approval_date)){echo $patientData->pt_approval_date;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->type_of_treatment)){echo $patientData->type_of_treatment;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_status)){echo $patientData->pt_status;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_cost_plan)){echo $patientData->pt_cost_plan;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_amount_paid)){echo $patientData->pt_amount_paid;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_shipping_details)){echo $patientData->pt_shipping_details;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_billing_address)){echo $patientData->pt_billing_address;}else{echo '- - -';} ?></td>

                                <td class="tblRow"><?php if(!empty($patientData->pt_dispatch_date)){echo $patientData->pt_dispatch_date;}else{echo '- - -';} ?></td>
<!--                                 <td class="tblRow"><?= $patientData->pt_referal; ?></td>
                                <td class="tblRow"><?= $patientData->pt_treatment_plan; ?></td>
                                <td class="tblRow"><?= $patientData->pt_approval_date; ?></td>
                                <td class="tblRow"><?= $patientData->pt_case_type; ?></td>
                                <td class="tblRow"><?= $patientData->pt_email; ?></td>
                                <td class="tblRow"><?= $patientData->pt_email; ?></td>
                                <td class="tblRow"><?= $patientData->pt_objective; ?></td>
                                <td class="tblRow"><?= $patientData->pt_treatment_plan; ?></td> -->
                                <td class="tblRow">--</td>
                                <td class="tblRow">
                                     <a href="<?= site_url('doctor/editPatient/').$patientData->pt_id; ?>" title="Edit"> 
                                        <span class="infoIconSetting">
                                         <i style=" color: #7c4c42;font-size: 18px;" class="fa fa-edit" aria-hidden="true"></i>
                                         <span style="color: #7c4c42;">&nbspEdit</span></span>
                                    </a>
                                     <a  href="<?= site_url('doctor/viewPatient/').$patientData->pt_id; ?>">
                                        <span class="infoIconSetting">
                                           <i style=" color: #7c4c42;font-size: 20px;" class="material-icons btnDelete">visibility</i>
                                         <span style="color: #7c4c42;">&nbspView</span></span>
                                    </a>
                                </td>
                            </tr>
                        <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    