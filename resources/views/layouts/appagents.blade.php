<?php
session_start();
$username = session()->get('username');
$password = session()->get('password');
$nickname = session()->get('nickname');
$role = session()->get('role');
if (!isset($username)) {
	echo '<script>window.location.replace("/")</script>;';
}
if ($role == 'admin' || $role == 'acount') {
	echo '<script>window.location.replace("admin")</script>;';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>mwproperties</title>
    <!-- Fontfaces CSS-->
    <link href=" {{ asset('template/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href=" {{ asset('template/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href=" {{ asset('template/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href=" {{ asset('template/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- Main CSS-->
    <link href=" {{ asset('template/css/theme.css') }}" rel="stylesheet" media="all">


</head>

<body>
    <div>
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <H4>MW PROPERTIES</H4>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('agentdashboard') }}">Rental & Subsale</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentprojectdashboard') }}">Projects</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-home"></i>Rental & Subsale</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('agentlistrental') }}">List</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistmonth') }}">Month</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-building"></i>Projects</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('agentlistproject') }}">List</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistmonthproject') }}">Month</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-file"></i>Option Form</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('agentlistpayment') }}">Confirmation On Payment</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistletter') }}">Letter Offer Exclusive Real Estate Agency</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistotp') }}">OTP</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistotl') }}">OTL</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                    
                    <H4>MW PROPERTIES</H4>
            
            </div>
            <div class="menu-sidebar__content js-scrollbar1" style="background-color:#1f1d1d">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="#" style="color:white">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('agentdashboard') }}" style="color:white">Rental & Subsale</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentprojectdashboard') }}" style="color:white">Projects</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#" style="color:white" style="color:white">
                                <i class="fas fa-home"></i>Rental & Subsale</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('agentlistrental') }}" style="color:white">List</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistmonth') }}" style="color:white">Month</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#" style="color:white">
                                <i class="fas fa-building"></i>Projects</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('agentlistproject') }}" style="color:white">List</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistmonthproject') }}" style="color:white">Month</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#" style="color:white">
                                <i class="fas fa-file"></i>Option Form</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('agentlistpayment') }}" style="color:white">Confirmation On Payment</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistletter') }}" style="color:white">Letter Offer Exclusive Real Estate Agency</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistotp') }}" style="color:white">OTP</a>
                                </li>
                                <li>
                                    <a href="{{ route('agentlistotl') }}" style="color:white">OTL</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="height:80px;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{$nickname}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('profile') }}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <div class="page-content--bgf7">
                <div class="main-content" style="background-color:#302d2d">
                    @yield('content') 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Multilevel Marketing Software @ 2024 .</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="{{ asset('template/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('template/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('template/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

    <!-- Vendor JS       -->
    <script src="{{ asset('template/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('template/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('template/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('template/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('template/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('template/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('template/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/select2/select2.min.js') }}">

    </script>

    <!-- Main JS-->
    <script src="{{ asset('template/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"/>

    <?php
    // check to load which javascript file, depend of which page is loaded.
    $path = $_SERVER['REQUEST_URI'];
    ?>

    <?php if (strpos($path, '/agentrental') !== false) {?>
        <script src="{{ asset('template/js/agentdashboard.js') }}"></script>  
    <?php  }?>

    <?php if (strpos($path, '/agentproject') !== false) {?>
        <script src="{{ asset('template/js/agentprojectdashboard.js') }}"></script>  
    <?php } ?>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#example3').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#example4').DataTable();
        } );
    </script>
    <script>
    $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy'
       });
    </script>
    <script>
        $('#thedate').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
    <script>
        $(".myField").keyup(function() {
            $(".myField").val(this.value.match(/[0-9.0-9]*/));
            
        });
    </script>
    <script>
       $("#fee").on('keyup',function(){
            $fee = ($(this).val());
            $tempsst = $fee*0.06;
            $sst = $tempsst.toFixed(2);
   
            $("#sst").val($sst);
       });
    </script>

    
</body>


</html>
<!-- end document-->
