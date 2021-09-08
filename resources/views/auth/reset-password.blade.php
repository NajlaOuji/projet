
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
p{
   
    cursor: pointer;

}
*/

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
                <br>
            <h4 class="font-18 m-b-5 text-center">Réinitialiser mot de passe</h4>
                        <br>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />
                <div class="input-group mb-3">
                <x-input id="password" class="form-control" type="password" name="password" required />
                <div class="input-group-append">
                <i class="input-group-text fas fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                </div>
               </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer Mot de passe')" />
                <div class="input-group mb-3">
                    <x-input id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation" required />
                                    <div class="input-group-append">
                                      <p><i class="input-group-text fas fa-eye" aria-hidden="true" id="ideye" onclick="myfunction()"></i></p>
           
                                    </div>
                </div>
            </div>
            <div class="form-group row m-t-20">
            <div class="col-12 text-right">
            <br>
                <x-button class="btn btn-primary w-md waves-effect waves-light">
                    {{ __('Réinitialiser') }}
                </x-button>
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
function myfunction() {
  var y = document.getElementById("password_confirmation");
  if (y.type === "password") {
    y.type = "text";
    document.getElementById("ideye").style.color='#5887ef';
  } else {
    y.type = "password";
    document.getElementById("ideye").style.color='#7a797e';
  }
}
 
</script>       
    </body>
</html> 
