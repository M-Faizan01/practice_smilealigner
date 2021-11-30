<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>
        <div class="uk-form-row">
            <div class="uk-grid">
                <div class="uk-width-medium-1-5">
                    <h1 class="heading_a patientMobile headingSize uk-margin-bottom"><b>Patients</b></h1>
                </div>

                <!-- Start Patient Name Search Field -->
                <div class="uk-width-medium-2-5">
                    <form method="POST" id="patient-search" action="" enctype="multipart/form-data">
                        <div class="" data-uk-grid-margin>
                            <div class="uk-form-row">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-5-6 uk-margin-medium-bottom">
                                        <div class="" style="border-radius: 8px;align-items: center;display: -webkit-inline-box;border: 1px solid #6D3745;">
                                            <input type="hidden" name="patientID" value="<?= $singlePatient['pt_id'] ?>">
                                            <img style="height: 20px;/* padding: 0px; */margin: 11px;" src="<?php echo base_url('assets/images/sm-search-icon.svg') ?>">
                                            <div class="uk-inline">
                                                <input style="border-bottom: 0px solid #000000;" type="text" id="search_patient_name" name="patient_name" class="md-input filter" placeholder="Search Patient Name Here" />                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Patient Name Search Field -->

                <!-- Start Grid & list Toggle Buttons -->
                <div class="uk-width-medium-2-5">
                    <a class=" gridAddDoctor md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light buttonStyling" href="<?= site_url('doctor/addPatient') ?>">Add</a>
                    <a class="buttonAlignment btn-list" href="<?= site_url('doctor/patientList'); ?>"> 
                        <img src="<?php echo base_url('assets/admin/assets/img/list-icon.svg') ?>">
                    </a>
                    <a class="buttonAlignment btn-grid" href="<?= site_url('doctor/patientGridList'); ?>"> 
                        <img src="<?php echo base_url('assets/admin/assets/img/grid-icon-active.svg') ?>">
                    </a>
                </div>
                <!-- End Grid & list Toggle Buttons -->

            </div>
        </div>

        <!-- Start Patient Cards List -->
        <div id="patient-grid-list" class="uk-grid uk-margin-medium-top">
            <?php foreach($patient_data as $patientData): ?>
            <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3 card" data-string="<?= $patientData['pt_firstname']; ?>">
                <div class="md-card md-card-hover-img">
                    <div class="uk-text-center uk-position-relative card-inside-p">
                        <?php if($patientData['pt_img']!=''){ ?>
                        <a href="<?= site_url('doctor/viewPatient/').$patientData->pt_id; ?>">
                            <img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/uploads/images/'. $patientData['pt_img']); ?>">
                        </a>
                        <?php } else{ ?>
                        <center>
                            <a href="<?= site_url('doctor/viewPatient/').$patientData->pt_id; ?>">
                                <img class="md-user-image doctorGridImg" src="<?php echo base_url('assets/images/round-bg.png'); ?>">
                                    <div class="marginprofilepicture" id="doctorGripText">
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
                    </div>
                    <div>
                        <h4 class="heading_c">
                            <center><?= $patientData['pt_firstname']; ?></center>
                            <center class="card-b-txt"><span class="sub-heading" ><b style="color:#71453C;">Email:</b> <?php  if(!empty($patientData['pt_email'])){ echo $patientData['pt_email']; }else{ echo 'N/A'; } ?></span></center>
                            <center class="card-b-txt"><span class="sub-heading"><b style="color:#71453C;">Type of Treatment: </b><?php if(!empty($patientData['type_of_treatment'])){echo $patientData['type_of_treatment'];}else{echo 'N/A';} ?></span></center>
                            <center class="card-b-txt">
                                <span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;">Status:</b>
                                    <?php if($patientData['pt_status'] == 'Accepted'){ ?>
                                    <span class="pl-10p"><p class="m-0p dark-grey-color custom-accept-btn" style="text-transform: capitalize;">Approved</p></span>
                                    <?php }elseif($patientData['pt_status'] == 'Rejected'){ ?>
                                    <span class="pl-10p"><p class="m-0p dark-grey-color custom-decline-btn">Rejected</p></span>
                                    <?php }elseif($patientData['pt_status'] == 'Modify'){ ?>
                                    <span class="pl-10p"><p class="m-0p dark-grey-color custom-modify-btn">Modify</p></span>
                                    <?php }elseif($patientData['pt_status'] == 'Pending'){ ?>
                                    <span class="pl-10p"><p class="m-0p dark-grey-color custom-pending-btn">Pending</p></span>
                                    <?php }else{ ?>
                                    <span class="dark-grey-color pl-10p fw-b">New Patient</span>
                                    <?php } ?>
                                </span>
                            </center>
                        </h4>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Start Patient Cards List -->
        
    </div>
</div>

<script type="text/javascript">

    //script to filter patient cards
    $(".filter").on("keyup", function() {
        var input = $(this).val().toUpperCase();
        $(".card").each(function() {
            if ($(this).data("string").toUpperCase().indexOf(input) < 0) {
                $(this).hide();
            } else {
                $(this).show();
            }
        })
    });

          var url = "<?php echo base_url('admin/patient/viewPatient/'); ?>";
           var img_url = "<?php echo base_url('assets/uploads/images/'); ?>";
           var img_url_static = "<?php echo base_url('assets/images/'); ?>";
            $("#patient-search").submit(function (event) {


                // alert($("#search_patient_name").serialize());
                var patientName = $("#search_patient_name").serialize();
                event.preventDefault();

                // alert(patientName);
                if(patientName != ''){
                    $.ajax({
                        url: "<?php echo base_url('Doctor/searchPatient'); ?>", //backend url
                        data: $("#patient-search").serialize(), //sending form data in a serialize way
                        type: "post",
                        async: false, //hold the next execution until the previous execution complete
                        dataType: 'json',
                        success: function (response) {

                            console.log(response);
                           // $('#dt_tableExport').find('tbody').empty();

                           // location.reload(true);
                           $('#patient-grid-list').html('');

                           // $("#doctor-grid").css({"position": "relative", "margin-left": "-20px", "height": "573.264px"});
                           $.each(response, function(key, value){
                                console.log(value.pt_img); 

                                var str = value.pt_firstname + value.pt_lastname;
                                var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
                                var acronym = matches.join(''); // JSON

                                if(value.pt_img != ''){
                                    if(value.pt_status == 'Accepted'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b><span class="pl-10p"><p class="m-0p dark-grey-color custom-accept-btn" style="text-transform: capitalize;">Approved</p></span></span></center></h4></div></div></div>');
                                    }else if(value.pt_status == 'Rejected'){
                                         $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b><span class="pl-10p"><p class="m-0p dark-grey-color custom-decline-btn">Rejected</p></span></span></center></h4></div></div></div>');

                                    }else if(value.pt_status == 'Modify'){
                                         $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b> <span class="pl-10p"><p class="m-0p dark-grey-color custom-modify-btn">Modify</p></span></span></center></h4></div></div></div>');

                                    }else if(value.pt_status == 'Pending'){
                                         $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b> <span class="pl-10p"><p class="m-0p dark-grey-color custom-pending-btn">Pending</p></span></span></center></h4></div></div></div>');

                                    }else{
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>  <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center> </h4> </div></div></div>');
                                    }
                                    
                                }else{

                                    if(value.pt_status == 'Accepted'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b><span class="pl-10p"><p class="m-0p dark-grey-color custom-accept-btn" style="text-transform: capitalize;">Approved</p></span></span></center></h4> </div></div></div>');

                                    }else if(value.pt_status == 'Rejected'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b><span class="pl-10p"><p class="m-0p dark-grey-color custom-decline-btn">Rejected</p></span></span></center> </h4> </div></div></div>');

                                    }else if(value.pt_status == 'Modify'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b> <span class="pl-10p"><p class="m-0p dark-grey-color custom-modify-btn">Modify</p></span></span></center></h4> </div></div></div>');

                                    }else if(value.pt_status == 'Pending'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b> <span class="pl-10p"><p class="m-0p dark-grey-color custom-pending-btn">Pending</p></span></span></center></h4> </div></div></div>');

                                    }else{
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>  <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center> </h4> </div></div></div>');
                                    }
                                    
                                }



                            });
                        },
                        error: function ()
                        {   
                            
                           $('#patient-grid-list').html('');

                            $("#patient-grid-list").append('<div style="height:30px !important;" class="uk-width-small-1-1"><div class="md-card-hover-img"> <div class="uk-text-center uk-position-relative"> No Record Found </div></div></div>');

                            // alert("error"); //error occurs
                        }
                    });
                }else{
                   $.ajax({
                        url: "<?php echo base_url('Doctor/getAllPatient'); ?>", //backend url
                        data: $("#patient-search").serialize(), //sending form data in a serialize way
                        type: "post",
                        async: false, //hold the next execution until the previous execution complete
                        dataType: 'json',
                        success: function (response) {

                            console.log(response);
                           // $('#dt_tableExport').find('tbody').empty();

                           // location.reload(true);
                           $('#patient-grid-list').html('');

                           // $("#doctor-grid").css({"position": "relative", "margin-left": "-20px", "height": "573.264px"});
                           $.each(response, function(key, value){
                            console.log(value.pt_img); 

                            var str = value.pt_firstname + value.pt_lastname;
                            var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
                            var acronym = matches.join(''); // JSON


                                if(value.pt_img != ''){
                                    if(value.pt_status == 'Accepted'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b><span class="pl-10p"><p class="m-0p dark-grey-color custom-accept-btn" style="text-transform: capitalize;">Approved</p></span></span></center></h4></div></div></div>');
                                    }else if(value.pt_status == 'Rejected'){
                                         $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b><span class="pl-10p"><p class="m-0p dark-grey-color custom-decline-btn">Rejected</p></span></span></center></h4></div></div></div>');

                                    }else if(value.pt_status == 'Modify'){
                                         $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b> <span class="pl-10p"><p class="m-0p dark-grey-color custom-modify-btn">Modify</p></span></span></center></h4></div></div></div>');

                                    }else if(value.pt_status == 'Pending'){
                                         $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b> <span class="pl-10p"><p class="m-0p dark-grey-color custom-pending-btn">Pending</p></span></span></center></h4></div></div></div>');

                                    }else{
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url+value.pt_img+'"></a> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>  <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center> </h4> </div></div></div>');
                                    }
                                    
                                }else{

                                    if(value.pt_status == 'Accepted'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b><span class="pl-10p"><p class="m-0p dark-grey-color custom-accept-btn" style="text-transform: capitalize;">Approved</p></span></span></center></h4> </div></div></div>');

                                    }else if(value.pt_status == 'Rejected'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b><span class="pl-10p"><p class="m-0p dark-grey-color custom-decline-btn">Rejected</p></span></span></center> </h4> </div></div></div>');

                                    }else if(value.pt_status == 'Modify'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b> <span class="pl-10p"><p class="m-0p dark-grey-color custom-modify-btn">Modify</p></span></span></center></h4> </div></div></div>');

                                    }else if(value.pt_status == 'Pending'){
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>   <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center><center class="card-b-txt" style=""><span class="sub-heading uk-flex uk-flex-center"><b style="color:#71453C;font-weight: normal;">Status: </b> <span class="pl-10p"><p class="m-0p dark-grey-color custom-pending-btn">Pending</p></span></span></center></h4> </div></div></div>');

                                    }else{
                                        $("#patient-grid-list").append('<div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-large-1-3"><div class="md-card md-card-hover-img" style=""><div class="uk-text-center uk-position-relative card-inside-p" style=""><center><a href="'+url+value.id+'"><img class="md-user-image doctorGridImg" src="'+img_url_static+'round-bg.png"><div class="marginprofilepicture" id="doctorGripText">'+acronym+'</div></img></a></center> </div><div> <h4 class="heading_c"> <center>'+value.pt_firstname+'</center> <center class="card-b-txt" style=""><span class="sub-heading" ><b style="color:#71453C;font-weight: normal;">Email: </b>'+value.pt_email+'</span></center>  <center class="card-b-txt" style=""><span class="sub-heading"><b style="color:#71453C;font-weight: normal;">Type of Treatment: </b>'+value.type_of_treatment+'</span></center> </h4> </div></div></div>');
                                    }
                                    
                                }




                            });
                        },
                        error: function ()
                        {   

                           $('#patient-grid-list').html('');

                            $("#patient-grid-list").append('<div style="height:30px !important;" class="uk-width-small-1-1"><div class="md-card-hover-img"> <div class="uk-text-center uk-position-relative"> No Record Found </div></div></div>');

                            // alert("error"); //error occurs
                        }
                    }); 
                }
                
            });
</script>