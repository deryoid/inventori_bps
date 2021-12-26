<!DOCTYPE html>
<?php  

require "_config/config.php";
require "assets/libs/vendor/autoload.php";

           
if(!isset($_SESSION['nama'])){     
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";     
    echo "<meta http-equiv='refresh' content='0; url=".base_url()."/index.php'>";   
    }else{ 
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/images/bps.png">
        <title>Selamat Datang BPS Marabahan</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?=base_url()?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- chartist CSS -->
        <link href="<?=base_url()?>/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
        <link href="<?=base_url()?>/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
        <link href="<?=base_url()?>/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
        <!--This page css - Morris CSS -->
        <link href="<?=base_url()?>/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?=base_url()?>/assets/css/style.css" rel="stylesheet">
        <!-- You can change the theme colors from here -->
        <link href="<?=base_url()?>/assets/css/colors/blue.css" id="theme" rel="stylesheet"> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
        
    </head>

    <body class="fix-header fix-sidebar card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?=base_url()?>/home.php">
                            <!-- Logo icon --><b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="<?=base_url()?>/assets/images/bps.png" alt="homepage" class="dark-logo" width="50"/>
                                <!-- Light Logo icon -->
                                <img src="<?=base_url()?>/assets/images/bps.png" alt="homepage" class="light-logo" width="50"/>
                            </b>
                            <!--End Logo icon -->
                            <span>
                            <!-- Logo text -->
                                <!-- dark Logo text -->
                                <img src="<?=base_url()?>/assets/images/logo.png" alt="homepage" class="dark-logo" width="50"/>
                                <!-- Light Logo text -->    
                                <img src="<?=base_url()?>/assets/images/logo.png" class="light-logo" alt="homepage" width="50"/></span> </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">

                            <!-- ============================================================== -->
                            <!-- Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown" title="User">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url()?>/assets/images/icon-user.png" alt="user" class="profile-pic" /></a>
                                <div class="dropdown-menu dropdown-menu-right scale-up">
                                    <ul class="dropdown-user">
                                        <li>
                                            <div class="dw-user-box">
                                                <div class="u-img"><img src="<?=base_url()?>/assets/images/icon-user.png" alt="user"></div>
                                                <div class="u-text">
                                                    <?php
                                                        $nama = $_SESSION['nm_user'];
                                                      ?>
                                                    <h4><?php echo $nama; ?></h4>
                                            </div>
                                        </li>
                                        <li><a href="<?=base_url()?>/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- Language -->
                            <!-- ============================================================== -->

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li> 
                                <a class="" href="<?=  base_url('page/karyawan/data.php')?>" aria-expanded="false">
                                <i class="mdi mdi-account-box"></i><span class="hide-menu">Data Karyawan</span>
                                </a>
                            </li>
                            <li> 
                                <a class="" href="<?=  base_url('page/suplier/data.php')?>" aria-expanded="false">
                                <i class="mdi mdi-account-multiple"></i><span class="hide-menu">Suplier</span>
                                </a>
                            </li>
                            <li> 
                                <a class="" href="<?=  base_url('page/gudang/data.php')?>" aria-expanded="false">
                                <i class="mdi mdi-home-modern"></i><span class="hide-menu">Data Gudang</span>
                                </a>
                            </li>
                            <li> 
                                <a class="" href="<?=  base_url('page/stok/data.php')?>" aria-expanded="false">
                                <i class="mdi mdi-factory"></i><span class="hide-menu">Stok Barang</span>
                                </a>
                            </li>
                            <li> 
                                <a class="" href="<?=  base_url('page/barangmasuk/data.php')?>" aria-expanded="false">
                                <i class="mdi mdi-package-variant-closed "></i><span class="hide-menu">Barang Masuk</span>
                                </a>
                            </li>
                                <li> 
                                <a class="" href="<?=  base_url('page/barangkeluar/data.php')?>" aria-expanded="false">
                                <i class="mdi mdi-package-variant"></i><span class="hide-menu">Barang Keluar</span>
                                </a>
                            </li>
                               
                            </li>
                                <li> 
                                <a class="" href="<?=  base_url('page/inventaris/data.php')?>" aria-expanded="false">
                                <i class="mdi mdi-checkerboard"></i><span class="hide-menu">Inventaris</span>
                                </a>
                            </li>                           
                            </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
                <!-- Bottom points-->
            </aside>
<?php } ?>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
     