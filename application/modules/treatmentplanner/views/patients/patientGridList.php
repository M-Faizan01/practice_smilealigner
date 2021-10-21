    <div id="page_content">
        <div id="page_content_inner">
            <br><br>
            
            <div class="uk-form-row">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <h1 class="heading_a patientMobile headingSize uk-margin-bottom"><b>Patients</b></h1>
                    </div>
                    <div class="uk-width-medium-1-2">
                         <a class=" gridAddDoctor md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('doctor/addPatient') ?>">Add Patient</a>
                         <a class="buttonAlignment " href="<?= site_url('doctor/patientList'); ?>"> 
                            <span class="material-icons iconSizeSetting">
                            menu
                            </span>
                        </a>
                        <a class="buttonAlignment " href="<?= site_url('doctor/patientGridList'); ?>">
                            <span class="material-icons gridIconSetting">
                                grid_view
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
                <?php foreach($patient_data as $patientData): ?>
                    <div data-product-name="Et quis.">
                        <div class="md-card md-card-hover-img">
                            <div class="md-card-head uk-text-center uk-position-relative">
                                <?php if($patientData->pt_img!=''){ ?>
                                    <a href="<?= site_url('doctor/editPatient/').$patientData->pt_id; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $patientData->pt_img); ?>"></a>
                                <?php } else{ ?>
                                    <center><a href="<?= site_url('doctor/viewPatient/').$patientData->pt_id; ?>"><img><div class="marginprofilepicture" id="profileImageUser" style="margin-top: 60px !important;">
                                            <?php 
                                            $userName = $patientData->pt_firstname;
                                            $lastName = $patientData->pt_lastname;
                                            echo $userName[0].$lastName[0]; 
                                        ?></div></img></a></center>

                                <?php } ?>
                                <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                            </div>
                            <div class="md-card-content">
                                <h4 class="heading_c uk-margin-bottom">
                                    <center><?= $patientData->pt_firstname; ?></center>
                                    <center><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email</b> <?= $patientData->pt_email; ?></span></center>
                                    <center><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Treatment Plan </b><?= $patientData->pt_treatment_plan; ?></span></center>
                                    <center><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment </b><?= $patientData->MBBS; ?></span></center>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>