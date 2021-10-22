<div id="page_content">
    <div id="page_content_inner">
        <h1 class="heading_a headingSize patientMobile uk-margin-bottom mt-15p"><b>Create New Treatment Plan</b></h1>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content" style="margin-top:33px; height: 675px;">
                <div class="dt_colVis_buttons pritingButtonsSetting buttonAlignment searchSetting"></div>
                <div class="uk-width-1-1" style="margin: 10px 3px;">
                    <div class="">
                        <label class="label-p" for="exampleFormControlFile1"><b>Treatment Plan*</b></label><br><br>
                        <!-- <label for="message">Message (20 chars min, 100 max)</label> -->
                        <textarea placeholder="Enter here" class="md-input input-border" name="pt_treatment_plan" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
                    </div>
                </div>
                <div class="uk-width-1-1" style="margin: 20px 3px;">
                    <div>
                        <label class="label-p" for="exampleFormControlFile1"><b>Link*</b></label><br>
                        <div class="uk-margin create-link">
                            <input class="uk-input input-border" type="text" placeholder="https//www.hyperlink.com/js">
                            <div class="bg-icon">
                                    <img src="<?php echo site_url('assets/images/bg.svg'); ?>">
                            </div>
                            <div class="global-icon">
                                    <a> <img src="<?php echo site_url('assets/images/global.svg'); ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 file-upload">
                    <div>
                        <label class="label-p" for="exampleFormControlFile1">Treatment plan file upload</label><br>
                        <div class="file-upload-icon">
                            <a><img src="<?php echo site_url('assets/images/Vector.svg'); ?>">
                                <span class="text-black ml-10p ">Upload PDF File</span></a>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 file-upload">
                    <div style="margin-top:70px;" >
                        <label class="label-p" for="exampleFormControlFile1">Mp4 File</label><br>
                        <div class="file-upload-icon">
                            <a><img src="<?php echo site_url('assets/images/Subtract.svg'); ?>">
                                <span class="text-black ml-10p">Upload Mp4 File</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1" style="margin: 100px 3px;">
                        <input style="float: left;" class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Back">
                        <input style="float: right;margin-right: 10px;height:40px;" class="md-btn md-btn-primary btnNext" type="button" name="next" id="next" value="Create">
                    </div>
                </div>
            </div>
        </div>
    </div> 