    <div id="page_content">
        <div id="page_content_inner">
            <br>
        <form method="POST" action="<?= site_url('doctor/updateProfile'); ?>">
            <?php foreach($doctor_data as $doctorData): ?>
                <h1 class="patientMobile"><b>Profile for Dr. <?= $doctorData->first_name; ?></b></h1>
                <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                <div class="md-card cardMobile">
                    <div class="md-card-content">
                       
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                 <h3 class="heading_a themeTextColor marginHeadingProfile"><b>User Details and Preferences</b></h3>
                                <div class="uk-form-row">                                    
                                    <label>Login and Primary Email</label>
                                    <input type="text" name="email" class="md-input" value="<?= $doctorData->email; ?>" />
                                </div>
                                <div class="uk-form-row">
                                    <label>Passsword</label>
                                    <input type="password" class="md-input"  value="<?= $doctorData->password; ?>" />
                                </div>
                                <div class="uk-form-row">
                                     <div class="uk-grid">
                                    <div class="uk-width-medium-1-2">
                                         <label for="switch_demo_1" class="inline-label">Notification Alert</label>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                       
                                <right style="float: right;"><input type="checkbox" data-switchery checked id="switch_demo_1" /></right>
                            </div>
                            </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <h3 class=" marginHeadingProfile heading_a themeTextColor"><b>Default Billing Address</b></h3>
                                <div class="uk-form-row">

                                     <div class="uk-grid">
                                    <div class="uk-width-medium-1-10 shippingMobile">
                                        <input type="radio" name="billing_address_radio" id="val_radio_female" data-md-icheck />
                                    </div>
                                    <div class="uk-width-medium-9-10">
                                        <div class="parsley-row">
                                        <label for="exampleFormControlFile1"><b>Billing Address</b></label><br><br>
                                            <textarea class="md-input" name="billing_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $doctorData->billing_address; ?></textarea>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="danger">
                                      <p class="textAlignment"><strong>Note!</strong><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium</p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <div class="md-card cardMobile">
                            <div class="md-card-content">
                                <h3 class="payerAdressSetting themeTextColor heading_a"><b>Default Shipping Address</b></h3>
                                <div class="uk-form-row">

                                     <div class="uk-grid">
                                    <div class="uk-width-medium-1-10 shippingMobile">
                                        <input type="radio" name="shipping_address_radio" id="val_radio_female" data-md-icheck />
                                    </div>
                                    <div class="uk-width-medium-7-10">
                                        <div class="parsley-row">
                                        <label for="exampleFormControlFile1"><b>Shipping Address</b></label><br><br>
                                            <textarea class="md-input" name="shipping_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $doctorData->shipping_address; ?></textarea>
                                        </div>
                                    </div>
                                     <div class="uk-width-medium-2-10">
                                        <div class="uk-form-row">
                                        <span style="color: #6D3745;" class="material-icons">
                                            edit
                                            </span>
                                            <span style="color: red;"class="material-icons">
                                            delete
                                            </span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    <div style="margin-top: 15px;" class="uk-width-medium-5-5">
                                        <div class="uk-width-large-2-10">
                                                <a data-uk-modal="{target:'#modal_header_footer'}" class=" addNewDoctorProfile md-btn borderSetting userDataBackground themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light addnewHover" href="#">AddNew</a>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="md-card cardMobile">
                            <div class="md-card-content">
                                <h3 class=" payerAdressSetting heading_a themeTextColor"><b>Default payer Address</b></h3>
                                    <div class="uk-form-row">

                                     <div class="uk-grid">
                                    <div class="shippingMobile uk-width-medium-1-10">
                                        <input type="radio" name="payer_address_radio" id="val_radio_female" data-md-icheck />
                                    </div>
                                    <div class="uk-width-medium-9-10">
                                        <div class="parsley-row">
                                        <label for="exampleFormControlFile1"><b>Payer Address</b></label><br><br>
                                            <textarea class="md-input" name="payer_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."><?= $doctorData->payer_address; ?></textarea>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    <div style="margin-top: 15px;" class="uk-width-medium-5-5">
                                        <div class="uk-width-large-2-10">
                                            <button type="submit" name="submit" style="color:white;" class=" addNewDoctorProfile md-btn  themeTextColor btnSettings md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="#">Update</button>

                                               
                                            </div>
                                    </div>

                                
                            </div>
                        </div>
                    </div>
                    </form>
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
                                                       
                                                            <form method="POST" action="<?= site_url('doctor/updateAdress'); ?>">  
                                                        <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                                                                
                                                        <div class="uk-grid">
                                                                <div class="uk-width-medium-1-1">
                                                                    <div class="parsley-row">
                                                                    <label for="exampleFormControlFile1"><b>Add New Address</b></label><br><br>
                                                                        <textarea class="md-input" name="new_address" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
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
                </div>
            <?php endforeach; ?>
        </div>
    </div>    