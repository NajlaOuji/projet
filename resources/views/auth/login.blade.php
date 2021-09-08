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

        <style>

i{
       
cursor: pointer; 
   }
   
   .fas{
font-size: 20px;
color: #7a797e;
   }

       </style>
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
             <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />
            {{-- message --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <br><br>
            
            <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Entrer Email" type="email" name="email" :value="old('email')" required autofocus />
                  @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
             <br>

            <!-- Password -->
            
            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Entrer un mot de passe">
                                <div class="input-group-append">
                                <i class="input-group-text fas fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                 </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
            <!-- Remember Me -->
             <br>
            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                    <div class="custom-control custom-checkbox">
                                          <label for="remember_me" class="inline-flex items-center">
                                          <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                          <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                          </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                   <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Connecter</button></a>
                                </div>
            </div>

            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i> Mot de passe oublié?</a>
                                @endif
                                </div>
                            </div>

            
        </form>
        </div>

</div>
</div>

</div>
<!-- jQuery  -->
        <script src={{asset('admin/assets/js/jquery.min.js')}}></script>
        <script src={{asset('admin/assets/js/bootstrap.bundle.min.js')}}></script>
        <script src={{asset('admin/assets/js/metisMenu.min.js')}}></script>
        <script src={{asset('admin/assets/js/jquery.slimscroll.js')}}></script>
        <script src={{asset('admin/assets/js/waves.min.js')}}></script>

        <!-- App js -->
        <script src={{asset('admin/assets/js/app.js')}}></script>
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
