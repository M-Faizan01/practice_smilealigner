<div id="page_content">
    <div id="page_content_inner">
        <br><br>

        <!-- UIKIT 3.3.6 FILTER CSS -->
        <!-- <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.6/css/uikit-rtl.min.css" as="style" onload="this.rel='stylesheet'"> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/bower_components/uikit/css/uikit.almost-flat.3.3.6.css">


        <!-- <link rel="stylesheet" type="text/css" href=""> -->
        
       <style type="text/css">
           .uk-subnav-pill>.uk-active>a{   
                background: 0 0!important;
                border-bottom-color: #6D3745 !important;
                background: white !important;
                color: #6D3745 !important;
                box-shadow: inset 0 0 0px rgb(0 0 0 / 0%) !important;
                font-weight: 700;
            }
            .uk-subnav-pill>li>a>hr{
                margin: 0px;
                border-top: 0px;
            }
            .uk-subnav-pill>.uk-active>a>hr{
                border: 1px solid #6D3745;
                margin: 5px 0px 0px 0px;
            }

            .uk-subnav-pill>*>:focus, .uk-subnav-pill>*>:hover {
                background: #fafafa00 !important;
                color: #6d3745 !important;
                text-decoration: none !important;
                outline: 0 !important;
                box-shadow: 0 0 0 1px rgb(0 0 0 / 0%) !important;
            }
            @media(max-width: 568px){
                .uk-subnav>*{
                    padding-right: 5px;
                    padding-left: 0px;
                }
                .pd-small{
                    padding-left: 10px;
                }
                .uk-subnav-pill>*>:first-child{
                    font-size: 10px !important;
                    padding: 0px !important;
                }
                #page_content_inner{
                    padding: 24px 25px 90px;
                }
            }

            @media (min-width: 480px) and (max-width: 820px) {
                .uk-subnav>*{
                    padding-right: 10px;
                    padding-left: 10px;
                }
                .pd-small{
                    padding-left: 10px;
                }
                .uk-subnav-pill>*>:first-child{
                    font-size: 16px !important;
                    padding: 0px !important;
                }
            }
       </style>

        <!-- <div class="uk-form-row">
            <div class="uk-grid">
                <div class="uk-width-medium-1-5">
                    <h1 class="heading_a patientMobile headingSize uk-margin-bottom"><b>Patients</b></h1>
                </div>
                <div class="uk-width-medium-2-5">
  
                </div>

                 <div class="uk-width-medium-2-5 uk-flex uk-flex-right uk-flex-middle">
                    <a href="<?php echo base_url('treatmentplanner/Patient/patientGridList'); ?>"><img src="<?php echo base_url('assets/admin/assets/img/grid-icon-active.svg'); ?>"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url('treatmentplanner/Patient/patientListing'); ?>"><img src="<?php echo base_url('assets/admin/assets/img/list-icon.svg'); ?>"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url('treatmentplanner/Patient/createPatientPlan'); ?>" class="md-btn buttonStyling accept-btn deposit-btn" style="background-color:#56BB6D !important;padding: 5px 40px !important;">
                      Create Plan
                    </a>
                </div>
            </div>
        </div> -->

        <div uk-filter="target: .filter" class="uk-width-1-1 filter-main">

            <div class="uk-grid-match uk-grid-small uk-text-center uk-flex uk-flex-center" uk-grid>
                <div class="uk-width-auto@m uk-flex uk-flex-right">
                    <span style="text-align: initial;">
                        <h1 class="heading_a patientMobile headingSize uk-margin-bottom"><b>Patients</b></h1>
                    </span>
                </div>
                <div class="uk-width-1-3@m">

                    <div class="uk-flex uk-flex-right uk-flex-last uk-flex-1 uk-margin-medium filter-search-container">
                        <form onsubmit="return false;" class="uk-subnav uk-subnav-pill uk-search uk-search-default uk-width-medium">
                          <!-- <span class="uk-search-icon-flip" uk-search-icon></span> -->
                          <!-- <img style="height: 20px; margin: 11px;" src="<?php echo base_url('assets/images/sm-search-icon.svg') ?>"> -->
                          <input onkeyup="filterSearch();" uk-filter-control="" class="uk-search-input" type="search" placeholder="Search..." style="border: 1px solid #6d3745; border-radius: 8px;">
                        </form>
                    </div>
                    
                </div>
                <div class="uk-width-expand@m uk-flex uk-flex-left@s">

                    <span class="uk-flex uk-flex-middle" style="display:flex; justify-content: end;">
                                                <a href="<?php echo base_url('treatmentplanner/Patient/patientGridList'); ?>"><img src="<?php echo base_url('assets/admin/assets/img/grid-icon-active.svg'); ?>"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url('treatmentplanner/Patient/patientListing'); ?>"><img src="<?php echo base_url('assets/admin/assets/img/list-icon.svg'); ?>"></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="<?php echo base_url('treatmentplanner/Patient/createPatientPlan'); ?>" class="md-btn buttonStyling accept-btn deposit-btn" style="background-color:#56BB6D !important;padding: 5px 40px !important;">
                      Create Plan
                    </a>

                    </span>
                   
                </div>
            </div>

            

        <div class="uk-flex uk-flex-right uk-flex-column uk-width-1-1 uk-margin-small-bottom filter-options-container ">
         <!--  <div class="uk-flex uk-flex-right uk-flex-last uk-flex-1 uk-margin-medium filter-search-container">
           
          </div> -->

           <!--  <div class="uk-grid-match uk-grid-small uk-text-center" uk-grid>
                <div class="uk-width-1-5@m uk-width-1-3@l filter-search-container">
                    
                </div>
                <div class="uk-width-3-5@m uk-width-2-3@l">
                     <form onsubmit="return false;" class="uk-subnav uk-subnav-pill uk-search uk-search-default uk-width-medium">
              <span class="uk-search-icon-flip" uk-search-icon></span>
              <input onkeyup="filterSearch();" uk-filter-control="" class="uk-search-input" type="search" placeholder="Search...">
            </form>
                </div>
            </div> -->


          <div class="uk-flex uk-flex-center uk-flex-right@s uk-grid-small uk-child-width-auto uk-margin-small uk-margin-medium-top" uk-grid>
           <!--  <div>
              <ul class="uk-flex uk-flex-center uk-flex-left@s uk-subnav uk-subnav-pill" uk-margin>
                
              </ul>
            </div> -->

            <div style="padding-left: 0px;">
              <ul class="uk-flex uk-flex-center uk-flex-left@s uk-subnav uk-subnav-pill">
                <li class="uk-active" uk-filter-control="group: tag"><a class="font-lato fs-24p" href="#">All<hr></a></li>
                <li onclick="resetSearchBar();" uk-filter-control="filter: [tag='f1'];" class="pd-small"><a class="font-lato fs-24p"  href="#">New Patient<hr></a></li>
                <li onclick="resetSearchBar();" uk-filter-control="filter: [tag='f2'];"><a class="font-lato fs-24p"  href="#">Approved<hr></a></li>
                <li onclick="resetSearchBar();" uk-filter-control="filter: [tag='f3'];"><a class="font-lato fs-24p"  href="#">Declined<hr></a></li>
                <li onclick="resetSearchBar();" uk-filter-control="filter: [tag='f4'];"><a class="font-lato fs-24p"  href="#">Pending<hr></a></li>
              </ul>
            </div>
          </div>
        </div>

        <ul class="filter uk-child-width-1-1 uk-child-width-1-3@l uk-text-center uk-dark uk-animation-toggle uk-margin-medium-top" uk-grid tabindex="0" style="padding: 0px 35px 0px 0px;">
          <p class="skills-no-result uk-hidden uk-text-center uk-width-1-1 uk-margin-small-top uk-h4">No results</p>
            

        <!-- NEW PATIENT -->
        <?php foreach($newPatientListPlans as $patientData): ?>
            <?php $dt = new DateTime( $patientData['cur_date']);?>
            <li class="skills-el" tag="f1" data-name="<?= strtolower($patientData['first_name']); ?>" style="padding-left: 10px; padding-right: 10px;">
                <div class="uk-card uk-card-default uk-card-body md-card" style="padding: 40px 0px 40px; border: 1px solid #A0A4A8 !important">
                   <div class="uk-text-center uk-position-relative card-inside-p" style="">
                     <?php if($patientData['pt_img']!=''){ ?>
                     <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>"></a>
                     <?php } else{ ?>
                     <center>
                        <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>">
                           <img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>">
                           <div class="marginprofilepicture" id="patientGripText">
                              <?php
                                 $userName = $patientData['pt_firstname'];
                                 $lastName = $patientData['pt_lastname'];
                                 echo $userName[0].$lastName[0];
                                 ?>
                           </div>
                        </a>
                     </center>
                     <?php } ?>
                     <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                  </div>
                  <div>
                     <h4 class="heading_c">
                        <center class="dark-grey-color"><?= $patientData['pt_firstname']; ?> (<?= $patientData['pt_age']; ?>)</center>

                          <div class="uk-grid uk-flex uk-flex-middle uk-margin-small-top w-100">
                             <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Receiving <br> Date</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color"><?= $dt->format('d F').', '.$dt->format('Y'); ?></p></span>
                             </div>

                              <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Doctor</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color"><?= $patientData['first_name']; ?> (<?= $patientData['last_name']; ?>) </p></span>
                             </div>

                              <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Status</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color fw-b">New Patient</p></span>
                             </div>
                         </div>
                     </h4>
                  </div>
                </div>
            </li>
        <?php endforeach; ?>

         <!-- Approved PATIENT -->
        <?php foreach($acceptedPatientListPlans as $patientData): ?>
            <?php $dt = new DateTime( $patientData['created_at']);?>
            <li class="skills-el" tag="f2" data-name="<?= strtolower($patientData['first_name']); ?>" style="padding-left: 10px; padding-right: 10px;">
                <div class="uk-card uk-card-default uk-card-body  md-card" style="padding: 40px 0px 40px; border: 1px solid #A0A4A8 !important">
                   <div class="uk-text-center uk-position-relative card-inside-p" style="">
                     <?php if($patientData['pt_img']!=''){ ?>
                     <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>"></a>
                     <?php } else{ ?>
                     <center>
                        <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>">
                           <img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>">
                           <div class="marginprofilepicture" id="patientGripText">
                              <?php
                                 $userName = $patientData['pt_firstname'];
                                 $lastName = $patientData['pt_lastname'];
                                 echo $userName[0].$lastName[0];
                                 ?>
                           </div>
                           </img>
                        </a>
                     </center>
                     <?php } ?>
                     <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                  </div>
                   <div>
                     <h4 class="heading_c">
                        <center class="dark-grey-color"><?= $patientData['pt_firstname']; ?> (<?= $patientData['pt_age']; ?>)</center>

                          <div class="uk-grid uk-flex uk-flex-middle uk-margin-small-top w-100">
                             <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Receiving <br> Date</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color"><?= $dt->format('d F').', '.$dt->format('Y'); ?></p></span>
                             </div>

                              <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Doctor</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color"><?= $patientData['first_name']; ?> (<?= $patientData['last_name']; ?>) </p></span>
                             </div>

                              <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Status</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color custom-accept-btn" style="text-transform: capitalize;">Approved</p></span>
                             </div>
                         </div>
                     </h4>
                  </div>
                </div>
            </li>
        <?php endforeach; ?>

         <!-- Declined PATIENT -->
        <?php foreach($rejectedPatientListPlans as $patientData): ?>
            <?php $dt = new DateTime( $patientData['created_at']);?>
            <li class="skills-el" tag="f3" data-name="<?= strtolower($patientData['first_name']); ?>" style="padding-left: 10px; padding-right: 10px;">
                <div class="uk-card uk-card-default uk-card-body  md-card"  style="padding: 40px 0px 40px; border: 1px solid #A0A4A8 !important">
                   <div class="uk-text-center uk-position-relative card-inside-p" style="">
                     <?php if($patientData['pt_img']!=''){ ?>
                     <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>"></a>
                     <?php } else{ ?>
                     <center>
                        <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>">
                           <img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>">
                           <div class="marginprofilepicture" id="patientGripText">
                              <?php
                                 $userName = $patientData['pt_firstname'];
                                 $lastName = $patientData['pt_lastname'];
                                 echo $userName[0].$lastName[0];
                                 ?>
                           </div>
                           </img>
                        </a>
                     </center>
                     <?php } ?>
                     <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                  </div>
                   <div>
                     <h4 class="heading_c">
                        <center class="dark-grey-color"><?= $patientData['pt_firstname']; ?> (<?= $patientData['pt_age']; ?>)</center>

                          <div class="uk-grid uk-flex uk-flex-middle uk-margin-small-top w-100">
                             <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Receiving <br> Date</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color"><?= $dt->format('d F').', '.$dt->format('Y'); ?></p></span>
                             </div>

                              <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Doctor</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color"><?= $patientData['first_name']; ?> (<?= $patientData['last_name']; ?>) </p></span>
                             </div>

                              <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Status</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color custom-decline-btn">Rejected</p></span>
                             </div>
                         </div>
                     </h4>
                  </div>
                </div>
            </li>
        <?php endforeach; ?>

         <!-- Pending PATIENT -->
        <?php foreach($pendingPatientListPlans as $patientData): ?>
            <?php $dt = new DateTime( $patientData['created_at']);?>
            <li class="skills-el" tag="f4" data-name="<?= strtolower($patientData['first_name']); ?>" style="padding-left: 10px; padding-right: 10px;">
                <div class="uk-card uk-card-default uk-card-body  md-card"  style="padding: 40px 0px 40px; border: 1px solid #A0A4A8 !important">
                   <div class="uk-text-center uk-position-relative card-inside-p" style="">
                     <?php if($patientData['pt_img']!=''){ ?>
                     <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>"><img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>"></a>
                     <?php } else{ ?>
                     <center>
                        <a href="<?= site_url('treatmentplanner/patient/viewPatient/').$patientData['pt_id']; ?>">
                           <img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>">
                           <div class="marginprofilepicture" id="patientGripText">
                              <?php
                                 $userName = $patientData['pt_firstname'];
                                 $lastName = $patientData['pt_lastname'];
                                 echo $userName[0].$lastName[0];
                                 ?>
                           </div>
                           </img>
                        </a>
                     </center>
                     <?php } ?>
                     <!-- <img class="md-card-head-img" src="assets/img/ecommerce/s6_edge.jpg" alt=""/> -->
                  </div>
                   <div>
                     <h4 class="heading_c">
                        <center class="dark-grey-color"><?= $patientData['pt_firstname']; ?> (<?= $patientData['pt_age']; ?>)</center>

                          <div class="uk-grid uk-flex uk-flex-middle uk-margin-small-top w-100">
                             <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Receiving <br> Date</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color"><?= $dt->format('d F').', '.$dt->format('Y'); ?></p></span>
                             </div>

                              <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Doctor</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                <span><p class="m-0p dark-grey-color"><?= $patientData['first_name']; ?> (<?= $patientData['last_name']; ?>) </p></span>
                             </div>

                              <div class="uk-width-1-2 uk-width-medium-2-5 uk-width-large-1-2 uk-margin-small-top" style="padding-right: 15px; text-align: end;">
                                 <span class="sub-heading "><b class="fw-b" style="color:#71453C;">Status</b></span>
                             </div>
                             <div class="uk-width-1-2 uk-width-medium-3-5 uk-width-large-1-2 uk-margin-small-top" style="text-align: initial; padding-left: 10px;">
                                 <span><p class="m-0p dark-grey-color custom-pending-btn">Pending</p></span>
                             </div>
                         </div>
                     </h4>
                  </div>
                </div>
            </li>
        <?php endforeach; ?>


         <!--  <li class="skills-el" tag="f1" data-name="div 2">
            <div class="uk-card uk-card-default uk-card-body">
              <h3 class="uk-h3 uk-margin-remove">Div 2</h3>
            </div>
          </li>
          <li class="skills-el" tag="f2" data-name="div 3">
            <div class="uk-card uk-card-default uk-card-body">
              <h3 class="uk-h3 uk-margin-remove">Div 3</h3>
            </div>
          </li>
          <li class="skills-el" tag="f3" data-name="div 4">
            <div class="uk-card uk-card-default uk-card-body">
              <h3 class="uk-h3 uk-margin-remove">Div 4</h3>
            </div>
          </li>
          <li class="skills-el" tag="f4" data-name="div 5">
            <div class="uk-card uk-card-default uk-card-body">
              <h3 class="uk-h3 uk-margin-remove">Div 5</h3>
            </div>
          </li>
          <li class="skills-el" tag="f5" data-name="div 6">
            <div class="uk-card uk-card-default uk-card-body">
              <h3 class="uk-h3 uk-margin-remove">Div 6</h3>
            </div>
          </li>
          <li class="skills-el" tag="f5" data-name="div 7">
            <div class="uk-card uk-card-default uk-card-body">
              <h3 class="uk-h3 uk-margin-remove">Div 7</h3>
            </div>
          </li> -->
        </ul>

      </div>

          
    </div>
</div>


<!-- UIKIT 3.3.6 FILTER JS -->
<script src="<?php echo base_url(); ?>assets/admin/bower_components/uikit/js/uikit.3.3.6.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/uikit/js/uikit.3.3.6.filter.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.6/js/uikit.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.3.6/js/components/filter.min.js"></script> -->

<script type="text/javascript">
    function filterSearch(){
  var search = $(".uk-search-input").eq(0).val().toLowerCase();
  if(!search){
    $(".uk-search-input").eq(0).attr("uk-filter-control", "");
  }else{
    $(".uk-search-input").eq(0).attr("uk-filter-control", "filter: [data-name*='" + search + "']");
  }
  $(".uk-search-input").eq(0).click();
}

$(".filter-main").on("beforeFilter", function(){
  $(".skills-no-result").removeClass('visible uk-animation-shake');
});

$(".filter-main").on("afterFilter", function(){
  var isElementVisible = false;
  var i = 0;

  while(!isElementVisible && i < $(".skills-el").length)
  {
    if($(".skills-el").eq(i).is(":visible")){
      isElementVisible = true;
    }

    i++;
  }

  if(isElementVisible === false){
    $(".skills-no-result").addClass('visible uk-animation-shake');
  }
});

function resetSearchBar(){
  $(".uk-search-input").eq(0).val('');
  $(".uk-search-input").eq(0).val('').attr("uk-filter-control", "");
}

</script>
