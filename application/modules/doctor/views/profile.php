   <style type="text/css">
       .doctor-module-profile .billing_address .md-input-wrapper{
             padding-top: 0px !important;
       }

        .doctor-module-profile .billing_address .md-input-wrapper textarea{
                 height: 100px !important;
       }
       .doctor-module-profile .default-address .iradio_md{
            margin-top: 15px !important;
       }
   </style> 
    <div id="page_content">
        <div id="page_content_inner" class="doctor-module-profile">
            <br>
        <form method="POST" action="<?= site_url('doctor/updateProfile'); ?>">
            <?php foreach($doctor_data as $doctorData): ?>
                <h1 class="patientMobile"><b>Profile for Dr. <?= $doctorData->first_name; ?></b></h1>
                <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                
                       
                        <div class="uk-grid" data-uk-grid-margin>
                           
                            <div class="uk-width-medium-1-2">
                                 <div class="md-card cardMobile">
                    <div class="md-card-content">
                                 <h3 class="heading_a themeTextColor marginHeadingProfile"><b>User Details and Preferences</b></h3>
                                <div class="uk-form-row">                                    
                                    <label><b>Login and Primary Email</b></label>
                                    <br>
                                    <input type="text" name="email" class="md-input input-border" value="<?= $doctorData->email; ?>" />
                                </div>
                                <div class="uk-form-row">
                                    <label><b>Passsword</b></label>
                                    <br>
                                    <input type="password" name="password" class="md-input input-border"  value="<?= $doctorData->password; ?>" />
                                </div>
                                <div class="uk-form-row">
                                     <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                         <label for="switch_demo_1" class="inline-label">Notification Alert</label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                <right>
									<!--<input type="checkbox" data-switchery checked id="switch_demo_1" />-->
									<div class="switch-field">
										<input type="radio" id="radio-one" name="notification_alert" value="on" <?php if($doctorData->notification_alert == 'on'){ echo "checked";} ?>/>
										<label for="radio-one">ON</label>
										<input type="radio" id="radio-two" name="notification_alert" value="off" <?php if($doctorData->notification_alert == 'off'){ echo "checked";} ?>/>
										<label for="radio-two">OFF</label>
									</div>
								</right>
                            </div>
                            </div>
                                </div>
                                  </div>
                </div>
                            </div>

                             

                    <div class="uk-width-medium-1-2 billing_address">
                                 <div class="md-card cardMobile">
                    <div class="md-card-content">
                                <h3 class=" marginHeadingProfile heading_a themeTextColor"><b>Default Billing Address</b></h3>
                                <div class="uk-form-row">

                                     <div class="uk-grid">
                                    <!-- <div class="uk-width-medium-1-10 shippingMobile">
                                        
                                    </div> -->
                                    <div class="uk-width-medium-10-10">
                                        <div class="parsley-row" style="display:flex;">
                                            <input style="margin-top: 5px !important;" type="radio" name="billing_address_radio" id="val_radio_female" data-md-icheck <?php if(!empty($doctorData->billing_address)){ echo 'checked'; } else { echo ' '; } ?>/>
                                        &nbsp;&nbsp;&nbsp;
                                            
                                            <textarea style="height:100px !important; padding-top: 0px !important;margin-top:-1px;" class="md-input" name="billing_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $doctorData->billing_address; ?></textarea>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- <div class="uk-form-row">
                                    <div class="danger" style="background-color: rgba(109, 55, 69, 0.08);">
                                      <p class="textAlignment"><strong style="color: #6D3745;">Note!</strong><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium</p>
                                    </div>
                                </div> -->


                                </div>
                                </div> 
                                <div class="md-card cardMobile">
                            <div class="md-card-content">
                                <h3 class=" payerAdressSetting heading_a themeTextColor"><b>Default payer Address</b></h3>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <!--  <div class="shippingMobile uk-width-medium-1-10">
                                            <input type="radio" name="payer_address_radio" id="val_radio_female" data-md-icheck />
                                        </div> -->
                                        <div class="uk-width-medium-10-10">
                                            <div class="parsley-row" style="display:flex;">
                                                <input style="margin-top: 5px !important;" type="radio" name="payer_address_radio" id="val_radio_female" data-md-icheck <?php if(!empty($doctorData->billing_address)){ echo 'checked'; } else { echo ' '; } ?>/>
                                            &nbsp;&nbsp;&nbsp;
                                                
                                                <textarea style="height:100px !important; padding-top: 0px !important;margin-top:-5px;" class="md-input" name="payer_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $doctorData->billing_address; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                            
                        </div>
                            </div>
                        </div>
                 


                 <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2 default-address">
                        <div class="md-card cardMobile">
                            <div class="md-card-content">
                                <h3 class="payerAdressSetting themeTextColor heading_a"><b>Default Shipping Address</b></h3>
                                <div class="uk-form-row">

									<div class="uk-grid">
										<div class="uk-width-medium-10-10">
											<label for="exampleFormControlFile1"><b>Shipping Address</b></label>
										</div>
									</div>

                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <div class="parsley-row" style="display:flex;">
                                                 <input class="default-address-radio" style="margin-top: 5px !important;" type="radio" name="billing_address_radio" id="" data-md-icheck />
                                        &nbsp;&nbsp;&nbsp;
                                                <input type="text" name="default_shipping_address" class="md-input" value="<?= $doctorData->billing_address; ?>" />
                                            </div>
                                        </div>
                                    </div>

									<!--Multi Shiiping Address-->
									<?php foreach ($shipping_address as $key => $address): ?>

                                     <div class="uk-grid">
<!--                                    <div class="uk-width-medium-1-10 shippingMobile">-->
<!--                                        <input type="radio" name="shipping_address_radio" id="val_radio_female" data-md-icheck />-->
<!--                                    </div>-->
										<div class="uk-width-medium-7-10">
											<div class="parsley-row" style="display:flex;">
                                                 <input class="default-address-radio" style="margin-top: 5px !important;" type="radio" name="billing_address_radio" id="" data-md-icheck />
                                        &nbsp;&nbsp;&nbsp;
												<input type="text" name="shipping_address" class="md-input" value="<?= $address['shipping_address']; ?>" />
											</div>
										</div>
										 <div class="uk-width-medium-3-10">
											<div class="uk-form-row">
												<span id="<?= $address['id']; ?>" onclick="editAddress(this)" data-id="<?= $address['id']; ?>" style="color: #6D3745; padding: 12px 4px;" class="material-icons editShippingAddress">edit</span>
												<span id="<?= $address['id']; ?>" onclick="deleteAddress(this)" style="color: red; padding: 12px 4px;" class="material-icons">delete</span>
											</div>
										</div>
                                    </div>

									<?php endforeach; ?>
									<!--END Multi Shiiping Address-->

                                </div>
                                    <div style="margin-top: 15px;" class="uk-width-medium-5-5">
                                        <div class="uk-width-large-1-1">
											<a data-uk-modal="{target:'#modal_header_footer'}" style="width: 100%; color:#56BB6D;     border-color: #56BB6D !important;" class=" addNewDoctorProfile md-btn borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light addnewHover" href="#">Add New</a>
										</div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div style="margin-top: 15px;" class="uk-width-medium-5-5">
                            <div class="uk-width-large-1-1">
                                <button type="submit" name="submit" style="color:white; width: 100%;" class=" addNewDoctorProfile md-btn  themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="#">Update</button>
							</div>
                        </div>
                    </div>
                    </form>
					<!--ADD SHIPPING ADDRESS MODEL-->
                     <div class="uk-modal" id="modal_header_footer">
                                            <div class="uk-modal-dialog">
                                                
                                            <div class="modal-dialog modal-size"> 
                                                <div  class="modal-content">
                                                    <div class="modal-header" >
                                                        <div class="modal-title">
                                                            <h2><b>Add New Address</b></h2>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                       
                                                            <form method="POST" action="<?= site_url('doctor/addNewAddress'); ?>">
                                                        <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                                                                
                                                        <div class="uk-grid">
                                                                <div class="uk-width-medium-1-1">
                                                                    <div class="parsley-row">
                                                                    <label for="exampleFormControlFile1"><b>Add New Address</b></label>
																		<input type="text" name="new_address" class="md-input" value="" />
<!--																		<textarea class="md-input" name="new_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>-->
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                             <br>
                                                              <br>
                                                            <div class="uk-grid">
                                                                <div class="uk-width-1-2">
                                                                    <button class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor uk-modal-close" type="button" name="back" id="cancelBtn" value="Close" style="float:left !important;">Cancel</button>
                                                                </div>
                                                                <div class="uk-width-1-2">
                                                                    <button class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" type="submit" name="next" id="next" value="Done" >Add</button>
                                                                </div>
                                                            </div>
                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
					<!--END ADD SHIPPING ADDRESS MODEL-->

					<!--EDIT SHIPPING ADDRESS MODEL-->
					<div class="uk-modal" id="edit-shipping-model" style="display: none;">
						<div class="uk-modal-dialog">
							<div class="modal-dialog modal-size">
								<div  class="modal-content">
									<div class="modal-header" >
										<div class="modal-title">
											<h2><b>Add New Address</b></h2>
										</div>
									</div>
									<div class="modal-body">
										<form method="POST" action="<?= site_url('doctor/updateAddress'); ?>">
											<input type="hidden" id="doctorID" name="doctorID" value="">
											<input type="hidden" id="shippingID" name="shippingID" value="">
											<div class="uk-grid">
												<div class="uk-width-medium-1-1">
													<div class="parsley-row">
														<label for="exampleFormControlFile1"><b>Add New Address</b></label>
														<input type="text" id="shipping_address" name="new_address" class="md-input" value="" />
														<!--																		<textarea class="md-input" name="new_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>-->
													</div>
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
					<!--END EDIT SHIPPING ADDRESS MODEL-->
                </div>
            <?php endforeach; ?>
        </div>
    </div>    
