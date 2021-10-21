<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>

<style type="text/css">
.md-card{
    box-shadow: none;
}
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    
.default-address a h5{
    font-family: Lato;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 20px;
/* identical to box height, or 143% */
    letter-spacing: 0.1px;
    color: #000000;
}
.default-address a .mumbai{
    padding-left: 19px;
    margin-top:-15px;
    color: #52575C;
    letter-spacing: 0.1px;
    font-size: 14px;
    line-height: 20px;
    font-family: Lato;
    weight:400;
    style:normal;
}
</style>
<?php //echo site_url(); die(); ?>

<div id="page_content">
    <div id="page_content_inner">
         <br>
        <h1 class="headingSize patientMobile"><b>Edit Doctor</b></h1>
        <div class="md-card">
            <?= $query ?>
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
                <form method="POST" action="<?= site_url('admin/doctor/udpateDoctorData'); ?>" enctype="multipart/form-data">
                    <?php foreach($doctor_data as $doctorData): ?>
                        <input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>First Name *</b></label>
                                            <input type="text" name="first_name" class="md-input input-border" placeholder="Enter First Name" value="<?= $doctorData->first_name; ?>" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3 ">
                                            <label class="label-p"><b>Last Name *</b></label>
                                            <input type="text" name="last_name" class="md-input input-border" placeholder="Enter Last Name" value="<?= $doctorData->last_name; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                 <div style="margin-bottom: 31px !important;" class="uk-form-row">
                                        <div class="uk-width-medium-1-3">
                                            <br>
                                            <label for="lastName" class="form-label"><b>Profile Picture</b></label>
                                            <br>
                                            <br>
                                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail">
                                                        <?php if($doctorData->profile_image!=''){ ?>
                                                            <img src="<?php echo base_url('assets/uploads/images/'. $doctorData->profile_image); ?>" style="width: 100% !important;" alt="user avatar"/>
                                                        <?php } else{ ?>
                                                            <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
                                                        <?php } ?>
                                                    </div>
                                            <div class="fileinput-exists thumbnail">
                                                <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar" id="uploaded_image"/>
                                            </div>
                                            <label for="lastName" class="form-label" style="position: absolute;width:200%;margin-top:25px;margin-left:15px;">
                                                <div class="user_avatar_controls">
                                                    <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput" style="float: left;"><i class="material-icons">&#xE5CD;</i></a>
                                                    <span class="btn-file" style="float: left;left:0px;">
                                                        <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                                        <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                                        <input type="file" name="pt_img" id="upload_image">
                                                        <input type="hidden" name="doctor_img_name" id="pt_img_name" value="">
                                                    </span>
                                                </div>    
                                                <!-- Upload Profile Photo -->
                                            </label>                                
                                        </div>
                                            <br>
                                            
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>

                                    <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Gender *</b></label>
                                            <br><br>
                                            <label class="container">Male
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark" ></span>
                                            </label>
                                            <label class="container">Female
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Age *</b></label>
                                            <input type="text" name="last_name" class="md-input input-border" placeholder="Enter here" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>Email ID*</b></label>
                                            <input type="text" placeholder="Enter Email" name="email" class="md-input input-border" value="<?= $doctorData->email; ?>" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3 editDoctorSetting">
                                            <label class="label-p"><b>Mobile No*</b></label>
                                            <input type="text" placeholder="Enter Mobile No" name="phone_number" class="md-input input-border" value="<?= $doctorData->phone_number; ?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">


										<div class="uk-grid">
											<!--                                    <div class="uk-width-medium-1-10 shippingMobile">-->
											<!--                                        <input type="radio" name="shipping_address_radio" id="val_radio_female" data-md-icheck />-->
											<!--                                    </div>-->
											<div class="uk-width-medium-1-3 editDoctorSetting">
												<label class="label-p"><b>Password*</b></label>
												<input type="text" placeholder="Enter Password" name="password" class="md-input input-border"/>
											</div>


                                            <div class="uk-width-medium-1-3 ">
                                                <label class="label-p"><b>GST no</b></label>
                                                <input type="text" placeholder="Enter GST No" name="gst_no" class="md-input input-border" value="<?= $doctorData->gst_no; ?>" required/>
                                            </div>
										
										</div>
                                </div>
                               <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <h3 class="#" style="color:#6d3745; font-size: 14px;"><b>Default Billing Address</b></h3>
                                        </div>
                                        <div class="uk-width-medium-1-3" >
                                            <!-- <div class="billing-address">Billing Address *</div> -->
                                            <div class="default-address">
                                            <a>
                                                <h5 style="padding-left: 19px;padding-top: 13px;">94, Muthu Mari Chetty St</h5>
                                                </a>
                                                <a><h6 class="mumbai">Mumbai, India</h6></a>

                                                  <a data-uk-modal="{target:'#edit-billing-model'}"><img style="float: right;margin-top: -45px;margin-right: 20px" src="<?php echo site_url('assets/images/edit.svg'); ?>"></a>
                                             

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <h3 class="#" style="color:#6d3745; font-size: 14px;"><b>Default Shipping Address</b></h3>
                                        </div>
                                        <div class="uk-width-medium-1-3" >
                                            <!-- <div class="billing-address">Billing Address *</div> -->
                                            <div class="default-address" >
                                            <a>
                                                <label class="container" style="margin:20px 15px;">
                                                <input type="radio" checked="checked" >
                                                <span class="checkmark"></span>
                                            </label>
                                            </a>
                                            <a>
                                                <h5 style="margin:-30px 47px;">94, Muthu Mari Chetty St</h5>
                                            </a>
                                            <a>
                                                <h6 style=" margin:30px 47px;color: #52575C;letter-spacing: 0.1px;font-size: 14px;line-height: 20px;font-family: Lato;weight:400;style:normal;">Mumbai, India</h6>
                                            </a>
                                            <a data-uk-modal="{target:'#edit-shipping-model'}"><img style="float: right;margin-top: -63px;margin-right: 20px" src="<?php echo site_url('assets/images/edit.svg'); ?>"></a>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-1-6">
                                            <!-- <div class="billing-address">Billing Address *</div> -->
                                            <div class="default-address" style="background: #6D374508;height: 66px;width: 64px;border-radius: 0px;border-radius: 16px;cursor: pointer;margin-top: 5px;margin-left:-15px;">

                                                <a data-uk-modal="{target:'#add-shipping-model'}"><img style="height:18px;width: 18px;margin:24px 23px; " src="<?php echo site_url('assets/images/plus-icon.svg'); ?>"></a>                      </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                                         </div>
                             <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-1">
                                <br>
                                <button type="submit" name="submit" class="md-btn md-btn-primary editDoctorMobile submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">Update</button>
                                <a href="<?= site_url('admin/doctors'); ?>" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#" id="cancelBtn">Cancel</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>

           <div class="modal uk-modal" id="modal" >
   <div id="modal-container" class="uk-modal-container" uk-modal>
      <div class="uk-modal-dialog" style="padding: 14px;">
         <div class="modal-dialog modal-size">
            <div  class="modal-content">
               <div class="modal-header" style="height:26px;
                  margin-bottom: 10px;
                  border-bottom: 1px solid #e5e5e5;
                  ">
                  <div class="modal-title">
                     <div class="" style="display:flex; justify-content: space-between;">
                        Crop Image
                     </div>
                     <br><br>
                  </div>
               </div>
               <div class="modal-body">
                  <div class="uk-grid">
                     <div class="uk-width-2-3">
                        <img src="" id="sample_image" />
                     </div>
                     <div class="uk-width-1-3">
                        <div class="preview"></div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer" style="text-align: right;
                  border-top: 1px solid #e5e5e5;  margin-top: 15px;   padding: 15px 0px 0px;">
                  <button type="button" id="crop" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;">Crop</button>
                  <button type="button" id="cropClose" class="btnBack" style="    background: #805046;
                     color: #fff;
                     border: 2px solid #805046 !important;     padding: 8px 30px;" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<!--ADD SHIPPING ADDRESS MODEL-->
<div class="uk-modal" id="modal_header_footer">
	<div class="uk-modal-dialog">

		<div class="modal-dialog modal-size">
			<div  class="modal-content">
				<div class="modal-header" >
					<div class="modal-title">
						<h2 class="text-center"><b>Add New Address</b></h2>
					</div>
				</div>
				<div class="modal-body">

					<form method="POST" action="<?= site_url('admin/Doctor/addNewAddress'); ?>">
						<input type="hidden" name="doctorID" value="<?= $doctorData->id; ?>">

						<div class="uk-grid">
							<div class="uk-width-medium-1-1">
								<div class="parsley-row">
									<label class="label-p"><b>Add New Address</b></label>
									<input type="text" name="new_address" placeholder="Enter Address" class="md-input input-border" value="" />
								</div>

							</div>
						</div>
						<br>
						<br>
						<div class="uk-grid">
							<div class="uk-width-1-2">
								<input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Close">
							</div>
							<div class="uk-width-1-2 pr-0">
								<button class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit" name="next" id="next">Done</button>
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
<!-- <div class="uk-modal" id="edit-shipping-model" style="display: none;">
	<div class="uk-modal-dialog">
		<div class="modal-dialog modal-size">
			<div  class="modal-content">
				<div class="modal-header" >
					<div class="modal-title">
						<h2 class="text-center"><b>Add New Address</b></h2>
					</div>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= site_url('admin/Doctor/updateAddress'); ?>">
						<input type="hidden" id="doctorID" name="doctorID" value="">
						<input type="hidden" id="shippingID" name="shippingID" value="">
						<div class="uk-grid">
							<div class="uk-width-medium-1-1">
								<div class="parsley-row">
									<label class="label-p"><b>Add New Address</b></label>
									<input type="text" id="shipping_address" name="new_address" class="md-input input-border" value="" />
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="uk-grid">
							<div class="uk-width-medium-1-2">
								<input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Cancel">
							</div>
							<div class="uk-width-medium-1-2 pr-0">
								<button class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit" name="next" id="next">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--END EDIT SHIPPING ADDRESS MODEL-->

<!-- -------------default billing address modal------------- -->
<div class="uk-modal" id="edit-billing-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h2 class="text-center"><b>Edit Billing Address</b></h2>
                    </div>

                    <div class="modal-body">
                    <form>
                         <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <h3 class="" style="color:#6d3745;"><b>Billing Address*</b></h3>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Street Address*</b></label>
                                    <input type="text" id="billing_streetaddress" name="billing_streetaddress" value="" class="md-input input-border" placeholder="Enter Street Address" required/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>Country *</b></label><br>
                                            <div class="select-box">
                                                <select name="cars" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>State *</b></label><br>
                                            <div class="select-box">
                                                <select name="cars" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>City *</b></label><br>
                                            <div class="select-box">
                                                <select name="cars" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Zip Code*</b></label>
                                    <input type="text" name="billing_zipcode" value="<?= $doctorData->zip_code; ?>" class="md-input input-border" placeholder="Enter Zip Code" required/>
                                </div>
                            </div>
                        </div>



                        <br>
                        <br>

                        <div class="viewButtoMobile">
                            <div class="uk-flex-s" style="justify-content: end;">
                                <div class="uk-margin-small-right">
                                   <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                                </div>
                                <div class="">
                                     <button style="padding-left: 22px !important; padding-right: 22px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit" name="next" id="next">Update</button>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ---------------default shipping address modal----------------- -->
<div class="uk-modal" id="edit-shipping-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h2 class="text-center"><b>Edit Shipping Address</b></h2>
                    </div>

                    <div class="modal-body">
                    <form>
                         <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <h3 class="" style="color:#6d3745;"><b>Shipping Address*</b></h3>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Street Address*</b></label>
                                    <input type="text" id="billing_streetaddress" name="billing_streetaddress" value="" class="md-input input-border" placeholder="Enter Street Address" required/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>Country *</b></label><br>
                                            <div class="select-box">
                                                <select name="cars" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>State *</b></label><br>
                                            <div class="select-box">
                                                <select name="cars" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>City *</b></label><br>
                                            <div class="select-box">
                                                <select name="cars" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Zip Code*</b></label>
                                    <input type="text" name="billing_zipcode" value="<?= $doctorData->zip_code; ?>" class="md-input input-border" placeholder="Enter Zip Code" required/>
                                </div>
                            </div>
                        </div>



                        <br>
                        <br>

                        <div class="viewButtoMobile">
                            <div class="uk-flex-s" style="justify-content: end;">
                                <div class="uk-margin-small-right">
                                   <input class="btnBack md-btn uk-modal-close" type="button" name="back" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                                </div>
                                <div class="">
                                     <button style="padding-left: 22px !important; padding-right: 22px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit" name="next" id="next">Update</button>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- -------------------Add Shipping Address--------------- -->
<div class="uk-modal" id="add-shipping-model" style="display: none;">
    <div class="uk-modal-dialog">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h2 class="text-center"><b>Add Shipping Address</b></h2>
                    </div>

                    <div class="modal-body">
                    <form method="POST" action="<?= site_url('admin/Doctor/addShippingAddress'); ?>">
                        <input type="hidden" id="add_doctorID" name="doctorID" value="<?= $doctorData->id; ?>">
                         <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <h3 class="" style="color:#6d3745;"><b>Shipping Address*</b></h3>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Street Address*</b></label>
                                    <input type="text" id="shipping_streetaddress" name="shipping_streetaddress" value="" class="md-input input-border" placeholder="Enter Street Address" required/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>Country *</b></label><br>
                                            <div class="select-box">
                                                <select name="shipping_country" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>State *</b></label><br>
                                            <div class="select-box">
                                                <select name="cars" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                           <label class="label-p country"><b>City *</b></label><br>
                                            <div class="select-box">
                                                <select name="shipping_city" id="cars">
                                                    <option value="volvo">Volvo</option>
                                                    <option value="saab">Saab</option>
                                                    <option value="opel">Opel</option>
                                                    <option value="audi">Audi</option>
                                                </select>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-2">
                                    <label class="label-p"><b>Zip Code*</b></label>
                                    <input type="text" name="shipping_zipcode" value="<?= $doctorData->zip_code; ?>" class="md-input input-border" placeholder="Enter Zip Code" required/>
                                </div>
                            </div>
                        </div>



                        <br>
                        <br>

                        <div class="viewButtoMobile">
                            <div class="uk-flex-s" style="justify-content: end;">
                                <div class="uk-margin-small-right">
                                   <input class="btnBack md-btn uk-modal-close" type="button" id="back" value="Back" style="box-shadow: 0px 4px 10px 3px rgb(109 55 69 / 30%) !important;">
                                </div>
                                <div class="">
                                     <button style="padding-left: 22px !important; padding-right: 22px !important; border-radius: 8px;" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor borderSetting" type="submit"  id="next">Add</button>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- OLD CROP MODEL -->
<!--             <div class="modal uk-modal" id="modal">
                <div class="uk-modal-dialog">
                    
                <div class="modal-dialog modal-size"> 
                    <div  class="modal-content">
                        <div class="modal-header" >
                            <div class="modal-title">
                                Crop Image
                                <br><br>
                            </div>
                        </div>
                        <div class="modal-body">
                            <img src="" id="sample_image" />
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div> 
                        </div>
                        <div class="modal-footer">
                                        <button type="button" id="crop" class="btnBack">Crop</button>
                                        <button type="button" class="btnBack" data-dismiss="modal">Cancel</button>
                                    </div>
                    </div>
                </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script>       

$(document).ready(function(){

      var modal = UIkit.modal("#modal");
    var image = document.getElementById('sample_image');

    var cropper;
    $('#cropClose').on('click',function(){
      modal.hide();
    });

    $('#upload_image').on('change',function(event){
        var files = event.target.files;

        var done = function(url){
            image.src = url;
            modal.show(); 
          
        };

        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

modal.on({
    'show.uk.modal': function(){ 
        //alert('pp');
        cropper = new Cropper(document.getElementById('sample_image'), {
            aspectRatio: 1,
            viewMode: 3,
            preview:'.preview'
        });
    },
    'hide.uk.modal': function(){
        cropper.destroy();
        cropper = null;
    }
});

    $('#crop').click(function(){
        canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
        });

        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result;
                $.ajax({
                    url: site_url + "admin/doctor/doctorimgCrop",
                    method:'POST',
                    data:{image:base64data},
                    success:function(data)
                    {
                        modal.hide();
                        var url = base_url+'assets/uploads/images/'+data;
                        $('#uploaded_image').attr('src', url);
                        $('#pt_img_name').val(data);
                    }
                });
            };
        });
    });
    
});
</script>
