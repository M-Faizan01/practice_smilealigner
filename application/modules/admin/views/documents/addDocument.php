<div id="page_content">
    <div id="page_content_inner">
        <br>
        <h1 class="headingSize patientMobile"><b>New Document</b></h1>
        <div class="md-card">
            <div class="md-card-content">
                <form method="POST" action="<?= site_url('admin/document/submitDocument'); ?>" enctype="multipart/form-data">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3 uk-width-large-1-2">
                                        <select id="select_demo_1" name="patientID" data-md-selectize>
                                            <option value=""><b>Select Patient</b></option>
                                                <?php foreach($patient_data as $patientData){ ?>
                                                 <option value="<?= $patientData->pt_id; ?>"><?= $patientData->pt_firstname; ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-3 uk-width-large-1-2">
                                        <select id="select_demo_2" name="fileType" data-md-selectize>
                                            <option value=""><b>File Type</b></option>
                                            <option value="Intra Oral Images">Intra Oral Images</option>
                                            <option value="OPG Images">OPG Images</option>
                                            <option value="Lateral C Images">Lateral C Images</option>
                                            <option value="STL File(3D File)">STL File(3D File)</option>
                                            <option value="Scans">Scans Images</option>
                                            <option value="Treatment Plan">Treatment Plan</option>
                                            <option value="IPR">IPR</option>
                                            <!-- <option value="Invoice">Invoice</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="parsley-row">
                                        <label for="exampleFormControlFile1"><b>Description</b></label><br><br>
                                            <textarea placeholder="lorem ipsum" class="md-input" name="des" cols="10" rows="8" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" data-parsley-minlength-message = "Come on! You need to enter at least a 20 caracters long comment.."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group alert-up-pd">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><b>Upload File</b></div>
                                                <div class="panel-body">
                                                    <input id="input-fa-1" name="document_img[]" class="user_files_images" type="file" multiple="" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="documentAdd uk-width-medium-1-1">
                                <button type="submit" name="submit" class="md-btn addDoctorMobile md-btn-primary submitAlignment md-btn-wave-light waves-effect waves-button waves-light themeColor" href="#">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

