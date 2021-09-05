<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href={{asset('admin/assets/images/favicon.ico')}}>

        <link href={{asset('admin/assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/metismenu.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/icons.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        
        <style>

i{
       
       cursor: pointer; 
          }
   .fas{
font-size: 20px;
color: #7a797e;
   }
   
 
}

       </style> 
    </head>

    <body>

        
        
        <!-- Begin page -->
        <div class="accountbg"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-body">

                    <div class="text-center">
                        <a href="" class="logo"><img src={{asset('admin/assets/images/logo-dark.png')}} height="22" alt="logo"></a>
                    </div>

                    <div class="p-3">
                    {{-- message --}}
                    {!! Toastr::message() !!}
                        <h4 class="font-18 m-b-5 text-center">Vérrouillage</h4>
                        <br>
                        <p class="text-muted text-center">Salut <span class="font-weight-bolder">{{ Auth::user()->name }}</span>, Entrez votre mot de passe pour déverrouiller l'écran!</p>
                       
                        <form method="POST" action="{{ route('unlock') }}" class="form-horizontal m-t-30">
                        @csrf
                            <div class="user-thumb text-center m-b-30">
                                <img src="{{ URL::to('/images/'. Auth::user()->avatar) }}" class="rounded-circle img-thumbnail" alt="{{ Auth::user()->avatar }}">
                                <h6>{{ Auth::user()->name }}</h6>
                            </div>
                            @if(session()->has('error'))
                        <div class="text-danger text-center text-bold">
                            {{ session()->get('error') }}
                        </div>
                            @endif
                              <br>
                            <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Entrez un mot de passe">
                                <div class="input-group-append">
                                <i class="input-group-text fas fa-eye" id="eye" onclick="toggle()"></i>
                               
                                 </div>
                                </div>  
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
    
  
                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Déverrouiller</button>
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
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script>
            function toggle() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("eye").style.color='#5887ef';
  } else {
    x.type = "password";
    document.getElementById("eye").style.color='#7a797e';
  }
}

 
</script>
    </body>

</html>