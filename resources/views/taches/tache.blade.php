<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href={{asset('admin/assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/metismenu.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/icons.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <br><br>
                    <a href="index.html" class="logo">
                        <span>
                                <img src={{asset('admin/assets/images/logo-light.png')}} alt="" height="18">
                            </span>
                        <i>
                             <img src={{asset('admin/assets/images/logo-sm.png')}} alt="" height="22">
                            </i>
                    </a>
                </div>

                <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">
                        

                        <!-- language-->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src={{asset('admin/assets/images/flags/french_flag.jpg')}} class="mr-2" height="12" alt=""/> French <span class="mdi mdi-chevron-down"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right language-switch">
                                <a class="dropdown-item" href="#"><img src={{asset('admin/assets/images/flags/germany_flag.jpg')}} alt="" height="16" /><span> German </span></a>
                                <a class="dropdown-item" href="#"><img src={{asset('admin/assets/images/flags/us_flag.jpg')}} alt="" height="16" /><span> English  </span></a>
                                
                            </div>
                        </li>

                        <!-- full screen -->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-fullscreen noti-icon"></i>
                            </a>
                        </li>
                           
                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src={{asset('admin/assets/images/users/user-4.jpg')}} alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>                              
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                      
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <br><br><br><br><br><br>
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            
                            <li>
                                <a href="{{url('accueil')}}" class="waves-effect">
                                    <i class="ti-home"></i> <span> Accueil </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('utilisateur')}}" class="waves-effect"><i class="ti-face-smile"></i><span> Utilisateurs </span></a>
                            </li>
                            <li>
                                <a href="{{url('calendrier')}}" class="waves-effect"><i class="ti-calendar"></i><span> Calendrier </span></a>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-email"></i><span> Email <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                <li><a href="{{url('email-inbox')}}" >Inbox</a></li>
                        <li><a href="{{url('email-read')}}" >Email Read</a></li>
                        <li><a href="{{url('email-compose')}}" >Email Compose</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('projet')}}" class="waves-effect"><i class="ti-receipt"></i><span> Projets </span></a>
                            </li>
                            <li>
                    <a href="{{url('module')}}" class="waves-effect"><i class="ti-view-grid"></i><span> Modules </span></a>
                </li>
                <li>
                    <a href="{{url('tache')}}" class="waves-effect"><i class="ti-bookmark-alt"></i><span> Tâches </span></a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-email"></i><span> Boites messages <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <!--<ul class="submenu">
                        <li><a href="{{url('email-inbox')}}" >Inbox</a></li>
                        <li><a href="{{url('email-read')}}" >Email Read</a></li>
                        <li><a href="{{url('email-compose')}}" >Email Compose</a></li>
                    </ul>-->
                </li>
                            


                           
                       

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    
                                
                             

                </div>
                <!-- content -->

                <footer class="footer">
                   
                </footer>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src={{asset('admin/assets/js/jquery.min.js')}}></script>
        <script src={{asset('admin/assets/js/bootstrap.bundle.min.js')}}></script>
        <script src={{asset('admin/assets/js/metisMenu.min.js')}}></script>
        <script src={{asset('admin/assets/js/jquery.slimscroll.js')}}></script>
        <script src={{asset('admin/assets/js/waves.min.js')}}></script>

        <!-- App js -->
        <script src={{asset('admin/assets/js/app.js')}}></script>

    </body>

</html>