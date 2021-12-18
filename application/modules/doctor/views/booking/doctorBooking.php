<div id="page_content">
    <div id="page_content_inner">
        <br>
        <br>
        <div class="" style="display:flex;flex-direction: column;align-items: center;">
            <span class="mt-25p">
                <a href="<?php echo base_url('treatmentplanner/patient/patientListing/') ?>">
                    <img src="<?php echo base_url('assets/images/booking-correct-arrow.svg') ?>">                   
                </a>
            </span>
            <div style="text-align:center;">
                <h1 class="heading_a headingSize patientMobile uk-margin-bottom mt-5p" style="line-height:2.5rem;font-size:26px;">
                 The Kit for Pt. Nitesh Kumar Has <br>Been Dispatched.
                </h1>
            </div>
             
        </div>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content" style="margin-top:33px;">
                <form method="" action="" enctype="">
                        <div class="uk-grid">
                            <div class="uk-width-medium-2-10">
                                <span class="">
                                    <a href="">
                                        <img src="<?php echo base_url('assets/images/patient-chair.svg') ?>">                   
                                    </a>&nbsp;
                                    <b>Patient Name: </b>
                                </span>
                            </div>
                            <div class="pl-0p booking-name">
                                <span class="booking-color">Nitesh Kumar </span>
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-medium-2-10">
                                <span class="">
                                    <a href="">
                                        <img src="<?php echo base_url('assets/images/tracking-id-img.svg') ?>">                   
                                    </a>&nbsp;
                                    <b>Tracking ID: </b>
                                </span>
                            </div>
                            <div class="pl-0p booking-name">
                                <span class="booking-color">20286414186</span>
                            </div>
                            <div class="uk-width-medium-5-10">
                                    <span id="tooltip-title" data-uk-tooltip="{pos:'bottom-left'}" title="">
                                        <a href="" class="copyboard">
                                            <img src="<?php echo base_url('assets/images/copy-tracking-id.svg') ?>">                   
                                        </a>
                                    <span class="copy-text fs-10p booking-color">Copy Tracking ID</span>
                                </span>
                            </div>
                        </div>
                        <div class="uk-width-1-1 mt-20p br-8p" style="margin: 0px 3px;">
                            <span class="">
                                <a href="">
                                    <img src="<?php echo base_url('assets/images/track-order-btn.svg') ?>">                   
                                </a>&nbsp;
                            </span>
                            <p style="margin-top:7px!important;" class="fs-10p booking-color">You can track the delivery by clicking on this button.</p>
                        </div>
                        <div class="uk-width-1-1 mt-20p br-8p" style="margin: 0px 3px;">
                            <span class="fw-b">Hi, Doctor Subhash</span>
                            <p>We are pleased to inform you that we have dispatched the SmileAligners kit for your patient Nitesh Kumar. The kit should reach you in 3-4 business days. Do let us know if you need any further assistance from our end.</p>
                        </div>
                        <br>
                        <br>
                        <div class="uk-width-1-1 mt-20p br-8p" style="margin: 0px 3px;">
                            <span>In case of any queries connect with us</span>
                        </div>

                        <div class="uk-width-1-1 mt-20p br-8p uk-flex" style="margin: 0px 3px;">
                            <div>
                                <a href="">
                                    <img src="<?php echo base_url('assets/images/booking-contact.svg') ?>">                   
                                </a>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div>
                                <a href="">
                                        <img src="<?php echo base_url('assets/images/booking-contact2.svg') ?>">                   
                                </a>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
   $('.copyboard').on('click', function(e) {
      e.preventDefault();

      var copyText = $('.copy-text').text();

      var textarea = document.createElement("textarea");
      textarea.textContent = copyText;
      textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in MS Edge.
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand("copy"); 

      document.body.removeChild(textarea);

      $("#tooltip-title").attr('title', "Copied!");
      $("#tooltip-title").attr('data-cached-title', "Copied!");

    });
</script>