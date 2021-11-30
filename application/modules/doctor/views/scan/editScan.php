<div id="page_content">
    <div id="page_content_inner" class="page_content-p">
        <br>
        <br>
        <h1 class="heading_b headingSize uk-margin-bottom patientMobile"><b>Edit Scan</b></h1>
        <br/>
        <form id="editScanForm" method="POST" action="<?= site_url('doctor/updateScan'); ?>" enctype="multipart/form-data">
            <input type="hidden" id="scan_id" name="scan_id" value="<?= $scan_id; ?>">
            <input type="hidden" id="patient_id" name="patient_id" value="<?= $scanData->patient_id; ?>">
            <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper">
                            <label class="label-p" for="scan_title"><b>Title</b><span class="req">*</span></label>
                            <input type="text" name="scan_title" id="scan_title" class="md-input demoInputBox input-border" value="<?= $scanData->title; ?>" style="border-radius: 0px !important;">
                            <span class="md-input-bar"></span>
                    </div>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row parsley-row scanImpression">
                        <div class="uk-flex">
                            <span class="uk-flex uk-flex-middle">
                                <input style="height: 20px; width:20px;" class="custom-input-radio-btn" type="radio" name="upload_type" value="individual" id="individual" <?php if($scanData->upload_type == 'individual'){ echo "checked"; } ?>>
                                <label for="individual">&nbsp;&nbsp;Individual</label>&nbsp;&nbsp;&nbsp;
                            </span>
                        <span class="uk-flex uk-flex-middle">
                                <input style="height: 20px; width:20px;" class="custom-input-radio-btn"  type="radio" name="upload_type" value="composite" id="composite" <?php if($scanData->upload_type == 'composite'){ echo "checked"; } ?>>
                            <label for="composite">&nbsp;&nbsp;Composite</label>
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Individual section -->
            <div id="show-individual" <?php if($scanData->upload_type == 'composite'){ echo "style='display: none;'"; } ?>>
                
                <!-- Intra Oral Images Drag&Drop -->
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1 uk-margin-medium-bottom">
                        <h3>Images Intra Oral</h3>
                    </div>
                    <div class="uk-width-medium-5-5">
                        <div class="uk-grid individual-intra-image-preview">
                            <?php foreach($oral_photos as $item) { ?>
                                <div class="uk-width-medium-1-5">
                                    <img id="<?= $item['img'] ?>" class="border-radius-15p pb-5p" src="<?php echo base_url('assets/uploads/images/'. $item['img']); ?>" alt="<?= $item['img'] ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <div class="uk-width-medium-2-5">
                                <div class="box-drag-drop-box-bg section-drop-image" data-type="dropintrafile" style="padding: 42px 22px;">
                                    <div class="uk-grid" style="position:relative;">
                                        <div class="uk-width-medium-5-5">
                                            <div>
                                                <input id="drop_intra_file" name="drop_intra_file[]" class="" type="file" multiple="" style="display: none;">
                                                <img src="<?php  echo base_url('assets/images/drag-image-icon.svg'); ?>">
                                                <p>Drag & Drop Your Files Here</p>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <div class="image-upload uk-flex uk-flex-center">
                                                <label for="choose_intra_file" class="uk-flex upload-btn-wrapper">
                                                    <span class="browse browse-file" data-type="dropintrafile" style="margin-top:2px;margin-left:5px;padding: 10px 15px; position: absolute; bottom: 0; right: 0;">Choose File</span>
                                                    <input class="filesUploadBtn" data-type="dropintrafile" type="file" multiple="" >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- OPG Images Drag&Drop -->
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1 uk-margin-medium-bottom">
                        <h3>Images OPG</h3>
                    </div>
                    <div class="uk-width-medium-5-5">
                        <div class="uk-grid individual-opg-image-preview">
                            <?php foreach($opg_photos as $item) { ?>
                                <div class="uk-width-medium-1-5">
                                    <img id="<?= $item['img'] ?>" class="border-radius-15p pb-5p" src="<?php echo base_url('assets/uploads/images/'. $item['img']); ?>" alt="<?= $item['img'] ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <div class="uk-width-medium-2-5">
                                <div class="box-drag-drop-box-bg section-drop-image" data-type="dropopgfile" style="padding: 42px 22px;">
                                    <div class="uk-grid" style="position:relative;">
                                        <div class="uk-width-medium-5-5">
                                            <div>
                                                <input id="drop_opg_file" name="drop_opg_file[]" class="" type="file" multiple="" style="display: none;">
                                                <img src="<?php  echo base_url('assets/images/drag-image-icon.svg'); ?>">
                                                <p>Drag & Drop Your Files Here</p>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <div class="image-upload uk-flex uk-flex-center">
                                                <label for="choose_intra_file" class="uk-flex upload-btn-wrapper">
                                                    <span class="browse browse-file" data-type="dropopgfile" style="margin-top:2px;margin-left:5px;padding: 10px 15px; position: absolute; bottom: 0; right: 0;">Choose File</span>
                                                    <input class="filesUploadBtn" data-type="dropopgfile" type="file" multiple="" >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lateral Ceph. Images Drag&Drop -->
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1 uk-margin-medium-bottom">
                        <h3>Images Lateral Ceph.</h3>
                    </div>
                    <div class="uk-width-medium-5-5">
                        <div class="uk-grid individual-lateral-image-preview">
                            <?php foreach($lateral_photos as $item) { ?>
                                <div class="uk-width-medium-1-5">
                                    <img id="<?= $item['img'] ?>" class="border-radius-15p pb-5p" src="<?php echo base_url('assets/uploads/images/'. $item['img']); ?>" alt="<?= $item['img'] ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <div class="uk-width-medium-2-5">
                                <div class="box-drag-drop-box-bg section-drop-image" data-type="droplateralfile" style="padding: 42px 22px;">
                                    <div class="uk-grid" style="position:relative;">
                                        <div class="uk-width-medium-5-5">
                                            <div>
                                                <input id="drop_lateral_file" name="drop_lateral_file[]" class="" type="file" multiple="" style="display: none;">
                                                <img src="<?php  echo base_url('assets/images/drag-image-icon.svg'); ?>">
                                                <p>Drag & Drop Your Files Here</p>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <div class="image-upload uk-flex uk-flex-center">
                                                <label for="choose_intra_file" class="uk-flex upload-btn-wrapper">
                                                    <span class="browse browse-file" data-type="droplateralfile" style="margin-top:2px;margin-left:5px;padding: 10px 15px; position: absolute; bottom: 0; right: 0;">Choose File</span>
                                                    <input class="filesUploadBtn" data-type="droplateralfile" type="file" multiple="" >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STL Files Drag&Drop -->
                <div class="uk-grid individual-stl-preview">
                    <div class="uk-width-medium-1-1 uk-margin-medium-bottom">
                        <h3>Upload STL/DCM/PLY Files</h3>
                    </div>
                     <div class="uk-width-medium-2-3">
                        <div class="box-drag-drop-box-bg">                                    
                            <div>
                                <h3 class="box-drag-drop-heading text-center">Upload STL File</h3>
                                <?php if(empty($stl_photos)){ ?>
                                    <div class="file_drag_area section-drop-image" data-type="dropstlfile" id="drop-stl-file">
                                        <img src="<?php echo base_url('assets/images/upload-drag-drop-icon.svg'); ?>">
                                    </div>
                                <?php } ?>
                                <div class="drop-files-list p-10p" id="drop-stl-files-list">
                                    <?php foreach($stl_photos as $item) { ?>
                                        <span>
                                            <div class="upload-file-list uk-flex uk-flex-between uk-margin-top">
                                                <p class="m-0p"><?= $item['img'] ?></p>
                                                <a class="deleteImageD">
                                                    <img id="<?= $item['photos_id'] ?>" src="<?php echo base_url('assets/images/delete-icon.svg'); ?>" alt="<?= $item['img'] ?>">
                                                </a>
                                            </div>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="toDeleteImagesList">                                    
                                </div>
                            </div>
                            <?php if(empty($stl_photos)){ ?>
                                <div class="image-upload file_drag_area_bottom uk-flex uk-flex-center" id="stl-choose-file">
                                    <label for="choose_intra_file" class="uk-flex upload-btn-wrapper">
                                        <span class="browse browse-file" data-type="dropstlfile" style="padding: 10px 15px;">Choose File</span>
                                        <input class="filesUploadBtn compositeFilesUploadBtn" data-type="dropstlfile" type="file" multiple="" >
                                    </label>
                                </div>
                            <?php } ?>
                            <div id="stl-drag-drop-bottom" class="file_drag_area_bottom" <?php if(!empty($stl_photos)){ echo "style='display:visible;'"; }else{ echo "style='display:none;'"; } ?>>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-2-4  uk-flex uk-flex-right uk-flex-middle">
                                        <div class="file_drag_area section-drop-image w-100" data-type="dropstlfile" id="drop-bottom-stl-file">
                                            <p class="m-0p">Drag & Drop Here</p>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-2-4 uk-flex uk-flex-center">
                                        <label for="choose_intra_file" class="uk-flex upload-btn-wrapper">
                                            <span class="browse browse-file" data-type="dropstlfile" style="padding: 10px 15px;">Choose File</span>
                                            <input class="filesUploadBtn compositeFilesUploadBtn" data-type="dropstlfile" type="file" multiple="" >
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>

            </div>
            <!-- End Individual section -->

            <!-- Start Composite Section -->
            <div id="show-composite" <?php if($scanData->upload_type == 'composite'){ echo "style='display: block;'"; }else{  echo "style='display: none;'"; } ?>>
                
                <!-- Composite Files Drag&Drop -->
                <div class="uk-grid">
                    <div class="uk-width-medium-2-3">
                        <div class="box-drag-drop-box-bg">                                    
                            <div>
                                <h3 class="box-drag-drop-heading text-center">Upload Composite Images</h3>
                                <?php if(empty($composite_photos)){ ?>
                                <div class="file_drag_area section-drop-image" data-type="dropcompositefile" id="drop-composite-file">
                                    <img src="<?php echo base_url('assets/images/upload-drag-drop-icon.svg'); ?>">
                                </div>
                                <?php } ?>
                                <div class="drop-files-list p-10p" id="drop-composite-files-list">
                                    <?php foreach($composite_photos as $item) { ?>
                                        <span>
                                            <div class="upload-file-list uk-flex uk-flex-between uk-margin-top">
                                                <p class="m-0p"><?= $item['img'] ?></p>
                                                <a class="deleteImageD">
                                                    <img id="<?= $item['photos_id'] ?>" src="<?php echo base_url('assets/images/delete-icon.svg'); ?>" alt="<?= $item['img'] ?>">
                                                </a>
                                            </div>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="toDeleteImagesList">                                    
                                </div>
                            </div>
                            <?php if(empty($composite_photos)){ ?>
                            <div class="image-upload file_drag_area_bottom uk-flex uk-flex-center">
                                <label for="choose_intra_file" class="uk-flex upload-btn-wrapper">
                                    <span class="browse browse-file" data-type="dropcompositefile" style="padding: 10px 15px;">Choose File</span>
                                    <input class="filesUploadBtn compositeFilesUploadBtn" data-type="dropcompositefile" type="file" multiple="" >
                                </label>
                            </div>
                            <?php } ?>
                            <div id="stl-drag-drop-bottom" class="file_drag_area_bottom" <?php if(!empty($composite_photos)){ echo "style='display:visible;'"; }else{ echo "style='display:none;'"; } ?>>
                                <div class="uk-grid">
                                    <div class="uk-width-medium-2-4  uk-flex uk-flex-right uk-flex-middle">
                                        <div class="file_drag_area section-drop-image w-100" data-type="dropcompositefile" id="drop-bottom-composite-file">
                                            <p class="m-0p">Drag & Drop Here</p>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-2-4 uk-flex uk-flex-center">
                                        <label for="choose_intra_file" class="uk-flex upload-btn-wrapper">
                                            <span class="browse browse-file" data-type="dropcompositefile" style="padding: 10px 15px;">Choose File</span>
                                            <input class="filesUploadBtn compositeFilesUploadBtn" data-type="dropcompositefile" type="file" multiple="" >
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Composite Section -->

            <br>
            <br>
            <div class="uk-width-1-1">
                <button type="submit" name="submit" id="update" class="md-btn md-btn-primary btnNext borderSetting">Update</button>
                <a href="<?= base_url('doctor/viewPatient/'.$scanData->patient_id); ?>" class="md-btn md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" id="cancelBtn">Cancel</a>
            </div>
        </form>   
    </div>
</div>
  
<!--Show Success Popup-->
<div class="uk-modal" id="success-model" style="display: none;">
    <div class="uk-modal-dialog" style="width: 350px;">
        <div class="modal-dialog modal-size">
            <div  class="modal-content">
                <div class="modal-header" >
                    <div class="modal-title">
                        <h1>Scan Updated</h1>
                    </div>
                </div>
                   <div class="modal-body">
                        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_kwaiqmk8.json" background="transparent" speed="1" style="width: 300px; height: 300px;" autoplay=""></lottie-player>

                     <div class="viewButtoMobile">
                        <div class="uk-margin-small-left">
                          <a id="model-close w-100" href="<?php echo base_url('doctor/viewPatient/'.$scanData->patient_id); ?>" class="md-btn buttonStyling accept-btn deposit-btn" style="background-color:#56BB6D !important; width: 100%;">
                            Done</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<!--END Success Popup-->