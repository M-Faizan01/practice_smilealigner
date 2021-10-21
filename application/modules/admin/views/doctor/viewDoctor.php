    <div id="page_content">
        <div id="page_content_inner">
            <br>
            <br>
            <h1 class="patientMobile"><b>Single Doctor</b></h1>
            <?php foreach($doctor_data as $doctorData): ?>
                <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="" data-uk-grid-margin>
                            <div class="uk-width-large-10-10">

                            <div class="user_heading userDataBackground">
                                <div class="user_heading_avatar doctorViewImageSetting">
                                    <div class="thumbnail">
                                        <?php if($doctorData->profile_image!=''){ ?>
                                            <img src="<?php echo base_url('assets/uploads/images/'. $doctorData->profile_image); ?>" alt="user avatar"/><?= $doctorData->first_name; ?>
                                        <?php } else{ ?>
                                              <img src="<?php echo base_url('assets/uploads/images/round-bg.png'); ?>" alt="user avatar" class="">
                                            <div class="marginprofilepicture" id="viewProfileText" style="margin-right:auto;margin-left: auto;margin-top: 15px;">
                                            <?php 
                                            $userName = $doctorData->first_name;
                                            $lastName = $doctorData->last_name;
                                            echo $userName[0].$lastName[0]; 
                                        ?></div>
                                        <?php } ?>
                                    </div>
                                </div><br><br><br><br>

                                <div class="user_heading_content doctorViewNameSetting">
                                    <h2 style="color:#6D3745 !important;" class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?= $doctorData->first_name; ?><br><?= $doctorData->last_name; ?></span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <ul id="" class="uk-margin">
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Doctor ID</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $doctorData->id; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Email ID</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $doctorData->email; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Mobile No</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $doctorData->phone_number; ?></span>
                                        </div>
                                    </div>
                                    <div id="Div1" class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Password</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span>****************</span>
                                            <a id="Button1" type="button"> <span style="color: #6D3745 !important" class="material-icons" onclick="switchVisible();">visibility</span></a>
                                        </div>
                                    </div>
                                    <div id="Div2" class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Password</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $doctorData->password; ?></span>
                                            <a id="Button1" type="button"> <span class="material-icons" onclick="switchVisible();">visibility</span></a>
                                            <!-- <input id="Button1" type="button" value="Click" onclick="switchVisible();"/> -->
                                        </div>
                                    </div>
                                    
                                

                                   
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Default Shipping Address</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $doctorData->shipping_address; ?></span>
                                        </div>
                                    </div>


                                    <?php foreach ($shipping_address as $key => $address): ?>
                                        <?php $key += 2; ?>
                                        <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                            <div class="uk-width-large-2-10">
                                                <span class="themeTextColor"><b>Shipping Address-<?= $key;?></b></span>
                                            </div>
                                            <div class="uk-width-large-6-10">
                                                <span><?= $address['shipping_address']; ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Billing Address</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $doctorData->billing_address; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>GST no</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $doctorData->gst_no; ?></span>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-margin-medium-top" data-uk-grid-margin>
                                        <div class="uk-width-large-2-10">
                                            <span class="themeTextColor"><b>Reference</b></span>
                                        </div>
                                        <div class="uk-width-large-6-10">
                                            <span><?= $doctorData->refer_by; ?></span>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="viewButtoMobile uk-flex-s uk-flex-between" style="padding-right:35px;">
                                        <div  class=" mobileDBESetting">
                                            <a  class="md-btn deleteBorder userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light btnDelete" href="#" onclick="deleteDoctorByID('<?= $doctorData->id;  ?>');">Delete</a>
                                        </div>
                                        <div class="uk-flex-s">
                                            <div class="uk-margin-small-right">
                                                <a class="md-btn backViewSetting backbtnSetting borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('admin/doctors'); ?>">Back</a>
                                            </div>
                                            <div class="">
                                                <a class="md-btn editbtnBackground btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="<?= site_url('admin/doctor/editDoctor/').$doctorData->id; ?>">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                       
                       <!--  <div class="uk-width-large-1-10" style="min-height: 1622px;">
                        </div> -->
                    </div>
                    </div>

                    </div>
                </div>
            <?php endforeach; ?>
      
        </div>
    </div>
    <script>
        function switchVisible() {
            if (document.getElementById('Div1')) {
                if (document.getElementById('Div1').style.display == 'none') {
                    document.getElementById('Div1').style.display = 'block';
                    document.getElementById('Div2').style.display = 'none';
                }
                else {
                    document.getElementById('Div1').style.display = 'none';
                    document.getElementById('Div2').style.display = 'block';
                }
            }
        }
    </script>