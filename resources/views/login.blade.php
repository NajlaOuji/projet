<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href={{asset('admin/assets/images/favicon.ico')}}>

        <link href={{asset('admin/assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/metismenu.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/icons.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet" type="text/css">
    </head>

    <body>

    
    
        <div class="accountbg"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-body">

                    <div class="text-center">
                        <a href="" class="logo"><img src={{asset('admin/assets/images/logo-dark.png')}} height="22" alt="logo"></a>
                    </div>

                    <div class="p-3">
                        

                        <form class="form-horizontal m-t-30" action="{{url('accueil')}}">
<br><br>
                            <div class="form-group">
                                <label for="username">Login</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter login">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                            </div>
<br>
                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="{{url('accueil')}}" ><button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button></a>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="{{url('recover')}}"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

          

        </div>
        <!-- end wrapper-page -->

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