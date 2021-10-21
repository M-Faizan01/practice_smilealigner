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
   
</style>

<div id="page_content">
    <div id="page_content_inner" class="page_content-p">
        <div class="add-doctor-page">
                    <br>
        <h1 class="headingSize patientMobile"><b>Add Doctor</b></h1>
        <div class="md-card">
            <div class="md-card-content">
                <form method="POST" action="<?= site_url('admin/doctor/submitDoctor'); ?>" enctype="multipart/form-data">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>First Name *</b></label>
                                            <input type="text" name="first_name" class="md-input input-border" placeholder="Enter First Name" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Last Name *</b></label>
                                            <input type="text" name="last_name" class="md-input input-border" placeholder="Enter Last Name" required/>
                                        </div>
                                    </div>
                                </div>

                                

                            <div style="margin-bottom: 31px !important;" class="uk-form-row">
                                <div class="uk-width-medium-1-2">
                                    <br>
                                    <label for="lastName" class="form-label"><b>Profile Picture</b></label>
                                    <br>
                                    <br>
                                    <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="<?= base_url(); ?>assets/images/user.svg" style="width: 100% !important;" alt="user avatar"/>
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
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Email ID*</b></label>
                                            <input type="email" placeholder="Enter here" name="email" class="md-input input-border" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Mobile No*</b></label>
                                            <input type="number" placeholder="Enter here" name="phone_number" class="md-input input-border" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Password*</b></label>
                                            <input type="text" name="password" class="md-input input-border" placeholder="Enter here" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>GST no</b></label>
                                            <input type="text" name="shipping_address" class="md-input input-border" placeholder="Enter here" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <h3 class="#" style="color:#6d3745;"><b>Billing Address*</b></h3>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <!-- <div class="billing-address">Billing Address *</div> -->
                                            <label class="label-p"><b>Street Address*</b></label>
                                            <input type="text" name="billing_address" class="md-input input-border" placeholder="Enter here" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
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
                                        <div class="uk-width-medium-1-3">
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
                                        <div class="uk-width-medium-1-3">
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
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Zip Code *</b></label>
                                            <input type="text" name="gst_no" class="md-input input-border" placeholder="Enter Here" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-1">
                                            <h3 class="#" style="color:#6d3745;"><b>Shipping Address*</b></h3>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <!-- <div class="billing-address">Billing Address *</div> -->
                                            <label class="label-p"><b>Street Address*</b></label>
                                            <input type="text" name="billing_address" class="md-input input-border" placeholder="Enter here" required/>
                                        </div>
                                        <div class="uk-width-medium-1-3">
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
                                        <div class="uk-width-medium-1-3">
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
                                        <div class="uk-width-medium-1-3">
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
                                        <div class="uk-width-medium-1-3">
                                            <label class="label-p"><b>Zip Code *</b></label>
                                            <input type="text" name="gst_no" class="md-input input-border" placeholder="Enter Here" required/>
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
                                </div></div>
                            <div class="uk-width-medium-1-1">
                                <br>

                                <button style="" type="submit" name="submit" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">Add</button>
                                <a href="<?= site_url('admin/doctors'); ?>" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#" id="cancelBtn">Cancel</a>
                            </div>
                        </div>
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