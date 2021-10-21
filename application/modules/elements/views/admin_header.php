<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">
    <title>SmileAligners</title>
    <link rel="stylesheet" type="text/css" href="https://getuikit.com/css/theme.css?1455">
    <!-- <link href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/weather-icons/css/weather-icons.min.css" media="all">
    <!-- metrics graphics (charts) -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/metrics-graphics/dist/metricsgraphics.css">
    <!-- chartist -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/chartist/dist/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/icons/flags/flags.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/css/main.min.css" media="all">
    <link rel="shortcut icon" type="image/svg" href="<?= base_url(); ?>assets/images/icon.svg">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/css/custom.css" media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/assets/skins/dropify/css/dropify.css">
    <link type="text/css" href="<?php echo base_url('assets/admin/assets/js/custom_file/fileinput.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/jquery.min.js"></script>
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- <script src="<?= base_url(); ?>assets/admin/assets/js/common.min.js"></script> -->
    <script type="text/javascript">
      var base_url        = "<?= base_url() ?>";
      var site_url        = "<?= site_url() ?>";
    </script>
</head>
<!-- <body class=" sidebar_main_open sidebar_main_swipe"> -->
    <body class="sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header style="background-color: #f0e0c9; padding-top:12px; padding-bottom: 17px;  margin-left: 0 !important;" id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                <a style=" padding-left: 6px !important;padding-right: 6px !important;padding-top: 12px !important;border-radius: 4px !important;background-color: #7c4c42;" href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left"> <span class="sSwitchIcon"></span>
                </a>
                <a  href="#"  class="sSwitc">
                    <img style="max-width: 150px;margin: 1px auto;" class="headerlogo" src="<?= base_url(); ?>assets/images/logo.svg">
                </a>
              <a href="#" id="" class="user_action_icon uk-visible-large">
                <input class="inputSetting" type="text" placeholder="Search..">
              </a>
            <style>
                @media screen and (max-width: 600px) {
                .inputSetting{
                        float: none;
                        display: block;
                        text-align: left;
                        width: 100%;
                        margin: 0;
                        padding: 14px;
                }
                .inputSetting{
                      border: 1px solid #ccc; 
                }
            }
            .inputSetting{
              margin-left: 42px;
              width: 410px;
              padding: 6px;
              margin-top: 8px;
              margin-right: 16px;
              border: none;
              font-size: 17px;
              border-radius: 16px;
            }
            </style>