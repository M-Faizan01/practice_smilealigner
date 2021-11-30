   
   <style>
       body::-webkit-scrollbar {
    width: 1em;
}

body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
   </style>
    <div id="page_content">
        <div id="page_content_inner" style="margin-top: 30px;">
            <div class="row block-stats">
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/doctors">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><g fill="none"><path d="M30.028 15.992S29 19 31.5 21c1.408 1.126 2.334-3.598 2.334-7.19c0-6.746-8.539-8.27-11.492-8.664c-4.842-.646-4.532 3.8-4.91 3.926C11.282 14.057 17 21 17 21s.472-.065 1-2c.416-1.527-.333-6.098 1-7.5c5.989 3.989 11.028 4.492 11.028 4.492z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.035 18a8 8 0 1 0 15.93 0c-.608.135-1.27.255-1.978.357a6 6 0 1 1-11.974 0A26.866 26.866 0 0 1 16.035 18z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M14.433 33.442a3 3 0 1 0 1.96-.416a8.972 8.972 0 0 1-.103-.405a19.627 19.627 0 0 1-.32-1.87a17.026 17.026 0 0 1-.14-1.914a6.55 6.55 0 0 1 .015-.527c.384-.11.77-.21 1.155-.297c.441-.1.703.42.914.842l.086.169h11.749c.229-.434.748-1.126 1.251-1.011c.536.122 1.075.267 1.609.433l-.003.001c-.002-.002-.002-.002 0 .002c.004.014.026.08.048.22c.025.162.042.372.05.625c.014.504-.015 1.117-.074 1.735c-.06.617-.149 1.214-.249 1.685c-.022.105-.044.2-.066.286H31a1 1 0 0 0-.894.553l-1 2A.999.999 0 0 0 29 36v2a1 1 0 0 0 1 1h2v-2h-1v-.764L31.618 35h2.764L35 36.236V37h-1v2h2a1 1 0 0 0 1-1v-2a.999.999 0 0 0-.106-.447l-1-2A1 1 0 0 0 35 33h-.636c.107-.533.196-1.155.256-1.779c.066-.674.1-1.373.083-1.983l-.001-.028C38.69 30.895 42 33.666 42 36.57V42H6v-5.43c0-3.032 3.61-5.92 7.831-7.577c.011.622.07 1.325.155 2.006c.092.735.217 1.466.355 2.068c.03.129.06.254.092.375zM16 37.015c.538 0 1-.44 1-1.015c0-.574-.462-1.015-1-1.015s-1 .44-1 1.015c0 .574.462 1.015 1 1.015z" fill="currentColor"/></g></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $doctors = $this->db->where(['user_type_id'=>'2', 'is_active'=>'1'])->from("users")->count_all_results();
                                        echo $doctors;
                                    ?>
                                    </h3>
                                    <p>Doctors</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/treatment_planners">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M9 7h6v2h-2v8h-2V9H9V7M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m0 2v14h14V5H5z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $planners = $this->db->where(['user_type_id'=>'4', 'is_active'=>'1'])->from("users")->count_all_results();
                                        echo $planners;
                                    ?>
                                    </h3>
                                    <p>Treatment Planners</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/business_developers">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 100 100"><path d="M80.161 60.441l-15.66-7.47l-6.622-3.159c2.892-1.822 5.241-4.634 6.778-8.021a21.743 21.743 0 0 0 1.945-8.99c0-1.827-.29-3.562-.694-5.236c-1.97-8.112-8.305-14.088-15.91-14.088c-7.461 0-13.7 5.763-15.792 13.644c-.483 1.808-.815 3.688-.815 5.68c0 3.459.808 6.684 2.181 9.489c1.587 3.254 3.94 5.937 6.804 7.662l-6.342 2.953l-16.168 7.53c-1.404.658-2.327 2.242-2.327 4.011v17.765c0 2.381 1.659 4.311 3.707 4.311h24.013V72.92a.78.78 0 0 1 .119-.396l-.01-.006l3.933-6.812l.01.006c.14-.24.389-.41.687-.41c.298 0 .547.169.687.41l.004-.003l.036.063c.005.01.012.018.016.028l3.881 6.721l-.005.003a.783.783 0 0 1 .119.397v13.602h24.013c2.048 0 3.708-1.93 3.708-4.311V64.446c.003-1.763-.905-3.332-2.296-4.005zM54.62 55.886l.01.006l-3.934 6.812l-.01-.006a.796.796 0 0 1-.687.409a.796.796 0 0 1-.687-.409l-.005.003l-.04-.069c-.003-.007-.009-.013-.012-.02l-3.881-6.723l.004-.003a.783.783 0 0 1-.119-.397c0-.445.361-.806.806-.806h7.866c.445 0 .806.361.806.806a.762.762 0 0 1-.117.397z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $developers = $this->db->where(['user_type_id'=>'5', 'is_active'=>'1'])->from("users")->count_all_results();
                                        echo $developers;
                                    ?>
                                    </h3>
                                    <p>Business Developers</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/patient/patientListing">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M17.75 2A2.25 2.25 0 0 1 20 4.25v15.505a2.25 2.25 0 0 1-2.25 2.25H6.25A2.25 2.25 0 0 1 4 19.755V4.25a2.25 2.25 0 0 1 2.096-2.245L6.25 2h11.5zm.75 14h-13v3.755c0 .414.336.75.75.75h11.5a.75.75 0 0 0 .75-.75V16zM7.751 17.5h8.499a.75.75 0 0 1 .102 1.493L16.25 19H7.751a.75.75 0 0 1-.101-1.493l.101-.007h8.499h-8.499zm9.999-14H6.25l-.102.007a.75.75 0 0 0-.648.743V14.5H8v-2.255c0-.647.492-1.179 1.122-1.243l.128-.007h5.5c.647 0 1.18.492 1.243 1.123l.007.127V14.5h2.5V4.25a.75.75 0 0 0-.75-.75zm-3.25 8.995h-5V14.5h5v-2.005zm-2.5-7.5a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5zm0 1.5a1 1 0 1 0 0 2a1 1 0 0 0 0-2z" fill="currentColor"/></g></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $patients = $this->db->from("patients")->count_all_results();
                                        echo $patients;
                                    ?>
                                    </h3>
                                    <p>Patients</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/document/documentList/?image_type=intra_oral_images">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M23.56 11.126c.199-.157 8.52-6.63 14.02-.253c3.02 3.5 2.764 7.133 1.644 10.69l-3.942 11.293c-1.153 3.927-1.975 5.14-3.995 6.845c-1.198 1.013-2.55-.736-3.973-2.577c-1.233-1.595-2.519-3.258-3.804-3.254c-1.307.004-2.614 1.67-3.864 3.264c-1.441 1.838-2.808 3.581-4.013 2.567c-2.433-2.048-3.5-4.877-4.616-9.418c-.215-.874-.541-1.923-.902-3.08c-1.51-4.849-3.612-11.595-.53-15.337c3.807-4.622 8.535-5.366 13.924-.777l.05.037zm-2.66.474c-1.864-1.28-3.45-1.688-4.77-1.584c-1.621.127-3.306 1.063-5 3.121c-1.276 1.548-1.405 4.162-.718 7.578c.327 1.627.805 3.274 1.286 4.839c.103.338.209.676.313 1.011c.365 1.17.717 2.301.948 3.24c1.021 4.158 1.91 6.392 3.521 7.966c.333-.31.753-.806 1.31-1.511l.27-.344c.57-.727 1.245-1.59 1.934-2.28c.732-.731 1.941-1.762 3.51-1.766c1.576-.005 2.782 1.042 3.499 1.769c.679.689 1.345 1.551 1.907 2.279l.267.345c.545.7.958 1.196 1.285 1.505c.647-.586 1.067-1.075 1.43-1.683c.47-.785.907-1.873 1.47-3.792l.031-.096l3.932-11.263c.514-1.64.775-3.137.64-4.544c-.134-1.37-.653-2.767-1.899-4.211c-2.064-2.394-4.6-2.43-6.994-1.689c-1.205.374-2.286.93-3.078 1.406c-.298.178-.548.341-.742.474l3.84 2.824a1 1 0 0 1-1.184 1.612l-5.425-3.99a2.005 2.005 0 0 1-.217-.159l-1.158-.851a.997.997 0 0 1-.208-.206zm-4.77 26.445l.003-.002l-.004.002z" fill="currentColor"/></g></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $intra_oral = $this->db->where(['key'=>'Intra Oral Images'])->from("photos")->count_all_results();
                                        echo $intra_oral;
                                           
                                    ?>
                                    </h3>
                                    <p>Intra Oral Images</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/document/documentList/?image_type=opg_images">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><g fill="none"><path d="M10 5.5a.5.5 0 0 0-1 0V6H7.5a.5.5 0 0 0 0 1H9v1H6.5a.5.5 0 0 0 0 1H9v1H6.5a.5.5 0 0 0 0 1H9v1H7.5a1.5 1.5 0 1 0 1.415 1h1.17a1.5 1.5 0 1 0 1.415-1H10v-1h2.5a.5.5 0 0 0 0-1H10V9h2.5a.5.5 0 0 0 0-1H10V7h1.5a.5.5 0 0 0 0-1H10v-.5zm1.5 7.5a.5.5 0 1 1 0 1a.5.5 0 0 1 0-1zm-4.5.5a.5.5 0 1 1 1 0a.5.5 0 0 1-1 0zM5.5 2A2.5 2.5 0 0 0 3 4.5v11A2.5 2.5 0 0 0 5.5 18h8a2.5 2.5 0 0 0 2.5-2.5v-11A2.5 2.5 0 0 0 13.5 2h-8zM4 4.5A1.5 1.5 0 0 1 5.5 3h8A1.5 1.5 0 0 1 15 4.5v11a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 15.5v-11z" fill="currentColor"/></g></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $opg_images = $this->db->where(['key'=>'OPG Images'])->from("photos")->count_all_results();
                                        echo $opg_images;                                        
                                    ?>
                                    </h3>
                                    <p>OPG Images</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/document/documentList/?image_type=lateral_c_images">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M9 7h2v8h4v2H9V7M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2m0 2v14h14V5H5z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $lateral_c_images = $this->db->where(['key'=>'Lateral C Images'])->from("photos")->count_all_results();
                                        echo $lateral_c_images;
                                    ?>
                                    </h3>
                                    <p>Lateral Ceph. Images</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/document/documentList/?image_type=stl_file">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M13 4H4v9.01h2V6h7V4z" fill="currentColor"/><path d="M29.49 13.12l-9-5a1 1 0 0 0-1 0l-9 5A1 1 0 0 0 10 14v10a1 1 0 0 0 .52.87l9 5A1 1 0 0 0 20 30a1.05 1.05 0 0 0 .49-.13l9-5A1 1 0 0 0 30 24V14a1 1 0 0 0-.51-.88zM19 27.3l-7-3.89v-7.72l7 3.89zm1-9.45L13.06 14L20 10.14L26.94 14zm8 5.56l-7 3.89v-7.72l7-3.89z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $stl_file = $this->db->where(['key'=>'STL File(3D File)'])->from("photos")->count_all_results();
                                        echo $stl_file;
                                    ?>
                                    </h3>
                                    <p> STL File</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/document/documentList/?image_type=treatment_plan_images">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><g fill="currentColor"><path d="M1.5 2.5A1.5 1.5 0 0 1 3 1h10a1.5 1.5 0 0 1 1.5 1.5v3.563a2 2 0 0 1 0 3.874V13.5A1.5 1.5 0 0 1 13 15H3a1.5 1.5 0 0 1-1.5-1.5V9.937a2 2 0 0 1 0-3.874V2.5zm1 3.563a2 2 0 0 1 0 3.874V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V9.937a2 2 0 0 1 0-3.874V2.5A.5.5 0 0 0 13 2H3a.5.5 0 0 0-.5.5v3.563zM2 7a1 1 0 1 0 0 2a1 1 0 0 0 0-2zm12 0a1 1 0 1 0 0 2a1 1 0 0 0 0-2z"/><path d="M11.434 4H4.566L4.5 5.994h.386c.21-1.252.612-1.446 2.173-1.495l.343-.011v6.343c0 .537-.116.665-1.049.748V12h3.294v-.421c-.938-.083-1.054-.21-1.054-.748V4.488l.348.01c1.56.05 1.963.244 2.173 1.496h.386L11.434 4z"/></g></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $treatment_plan = $this->db->where(['key'=>'Treatment Plan'])->from("photos")->count_all_results();
                                        echo $treatment_plan;
                                    ?>
                                    </h3>
                                    <p>Treatment plan File</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?php echo base_url()?>admin/document/documentList/?image_type=ipr_file">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M14 7h-4v2h1v6h-1v2h4v-2h-1V9h1V7M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $ipr = $this->db->where(['key'=>'IPR'])->from("photos")->count_all_results();
                                        echo $ipr;
                                    ?>
                                    </h3>
                                    <p>IPR</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 py-10p">
                    <a href="<?= base_url('admin/document/documentList/?image_type=invoice_file'); ?>">
                        <section class="panel home_sec_green p-0">
                            <div class="symbol light-cream">
                                <svg style="height:45px !important;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="0.75em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 384 512"><path d="M288 256H96v64h192v-64zm89-151L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm256 304c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-200v96c0 8.84-7.16 16-16 16H80c-8.84 0-16-7.16-16-16v-96c0-8.84 7.16-16 16-16h224c8.84 0 16 7.16 16 16z" fill="currentColor"/></svg>
                            </div>
                            <div class="value"> 
                                <div class="value-contain">
                                    <h3 class="">
                                    <?php
                                        $invoice = $this->db->where(['key'=>'Invoice'])->from("photos")->count_all_results();
                                        echo $invoice;
                                    ?>
                                    </h3>
                                    <p>Invoice File</p>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
            </div>
            <br> <br>

            <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                     <h1 class="heading_a headingSize uk-margin-bottom patientMobile"><b>Recent Activity</b></h1>  
                    
                </div>
                <div class="uk-width-medium-1-2">
                     <a class='dismissAll infoIconSetting uk-align-right' href="<?php echo base_url(); ?>admin/dismiss_all" style="border-radius: 10px; font-weight: 500; color: #6d3745; padding: 7px 20px; margin-left:12px !important;" >  Dismiss All</a>
                    
                </div>
            </div>

            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content" style="overflow:hidden;overflow-y:scroll; height: 150px;">
                    <table id="dt_tableExport" class="uk-table dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="dt_tableExport_info" style="width: 100%;">
                        <thead class="tableHeadingBorder">
                        <tr role="row">
                            <th class="tblHeading sorting" tabindex="0" aria-controls="dt_tableExport" rowspan="1" colspan="1" aria-label="Patient ID: activate to sort column ascending" style="width: 65px;"><b>Patient</b></th>
                            <th class="tblHeading sorting" tabindex="0" aria-controls="dt_tableExport" rowspan="1" colspan="1" aria-label="Doctor: activate to sort column ascending" style="width: 70px;"><b>Document</b></th>
                            <th class="tblHeading sorting" tabindex="0" aria-controls="dt_tableExport" rowspan="1" colspan="1" aria-label="Patient: activate to sort column ascending" style="width: 82px;"><b>Link</b></th>
                           </tr>
                        </thead>
                        <tbody>
                            
                        <?php if(!empty($all_documents)){
                            foreach($all_documents as $document){
                                
                                $patient_id = $document['patient_id'];
                                $documentId = $document['doc_id'];
                                $doc_photos = $this->db->query("Select * from photos where post_id= '$documentId' order by created_at DESC")->result();
                                $patient_details = $this->db->query("Select * from patients where pt_id= '$patient_id'")->row_array();
                                // echo "<pre>";
                                // print_r($patient_details);
                                // die();                       
                                if(isset($doc_photos)){
                                        $status= 'bgcolor=#eff0f1';
                                }
                                ?>
                                        
                                <?php if(!empty($doc_photos)){ ?>
                            
                                     
                                    <?php  foreach($doc_photos as $photo){ ?>
                                        <?php if($photo->status != 'Dismiss') {?>
                                            <tr <?php if($photo->status == 'Pending'){ echo $status; }?> >

                                            <td>
                                                <?php if($patient_details['pt_img'] !=''){ ?>
                                                    <img class="md-user-image" src="<?php echo base_url('assets/uploads/images/'. $patient_details['pt_img']); ?>"> <?= $patient_details['pt_firstname']; ?>
                                                <?php } else{ ?>
                                                <div class="" style="display:flex;align-items:center;">
                                                    <div id="profileImageUser"><?php
                                                        $userName = $patient_details['pt_firstname'];
                                                        $lastName = $patient_details['pt_lastname'];
                                                        echo $userName[0].$lastName[0];
                                                    ?></div>
                                                    <div style="padding:12px 3px;">
                                                        <?= $patient_details['pt_firstname']; ?>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </td>

    										 <td><?= $document['file_type'];?></td>
    										 <td>
    											<div style="display: flex;">
    												<a class='clickme buttonStyling' style="color: white;" data-id=<?php echo $photo->photos_id ;?>
    												href="<?php echo base_url();?>assets/uploads/images/<?= $photo->img ;?>">
    													View
    												</a>

    												<a class='clickmeToRead infoIconSetting' style="border-radius: 10px; font-weight: 500; color: #6d3745; padding: 7px 20px; margin-left:12px !important;" data-id=<?php echo $photo->photos_id ;?>>
    													Dismiss
    												</a>

    											</div>
    										 </td>
                                            </tr>
                                        <?php } ?>
                                    <?php
                                    }
                                }
                            
                            } 
                        }?>
                        
                       
                            <tr style="padding-right: 15px !important;" role="row" class="odd">
                            </tr></tbody>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            $('.clickme').on('click',function(){

                $id = $(this).attr('data-id');
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/update_status',
                    method: 'POST',
                    data: {
                        'document_id': $id
                    },
                    success: function(remote_response) {
                        // alert('yes');
                        console.log(remote_response);
                    }
                    
                });
               
            });
        });
         $(document).ready(function(){
            $('.clickmeToRead').on('click',function(){
                // alert('yes');
                $id = $(this).attr('data-id');
                $.ajax({
                    url: '<?php echo base_url(); ?>admin/update_status',
                    method: 'POST',
                    data: {
                        'document_id': $id
                    },
                    success: function(remote_response) {
                        // alert('yes');
                        console.log(remote_response);
                        location.reload();
                    }
                    
                });
               
            });
        });

        //   $(document).ready(function(){
        //     $('.dismissAll').on('click',function(){
        //         alert('yes');
        //         // $id = $(this).attr('data-id');
        //         $.ajax({
        //             url: '<?php echo base_url(); ?>admin/update_status',
        //             method: 'POST',
        //             data: {
        //                 'document_id': $id
        //             },
        //             success: function(remote_response) {
        //                 // alert('yes');
        //                 console.log(remote_response);
        //                 location.reload();
        //             }
                    
        //         });
               
        //     });
        // });
    </script>
