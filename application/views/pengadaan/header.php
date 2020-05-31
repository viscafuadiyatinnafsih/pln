<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PLN PUSHARLIS</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url();?>/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url();?>/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url();?>/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Pusat Pemeliharaan Ketenagalistrikan</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">PLN PUSHARLIS</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 13px;"> Welcome, Bagian Pengadaan !&nbsp; <a href="<?php echo site_url()?>/login" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="http://localhost/PLN/assets/img/Logo_PLN.png" class="user-image img-responsive"/>
                    </li>
                
                    
                    <li  >
                        <a href="<?php echo site_url()?>/pengadaan/pengadaan"><i class="fa fa-desktop fa-2x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a   href="<?php echo site_url()?>/pengadaan/datapenugasan"><i class="fa fa-edit fa-2x"></i> Data Penugasan</a>
                    </li>  
                                   
                        <ul class="nav nav-second-level">
                            <li>
                                <a>Dana Pengadaan</a>
                            </li>
                        </ul>
                      </li>  
                    <li  >
                        <a  href="<?php echo site_url()?>/pengadaan/laporan/viewreport"><i class="fa fa-bar-chart-o fa-2x"></i> Dana Penugasan </a>
                    </li>
               
            </div>
            
        </nav> 