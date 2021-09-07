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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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

        
        
        <!-- Begin page -->
        <div class="accountbg"></div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-body">

                    <div class="text-center">
                        <a href="" class="logo"><img src={{asset('admin/assets/images/logo-dark.png')}} height="22" alt="logo"></a>
                    </div>
                   
                    {{-- message --}}
                    {!! Toastr::message() !!}
                    <center>
                    <br>
                    <form method="POST" action="{{route('user.create')}}" class="md-float-material" >
                        @csrf
                        <div class="col-sm-10">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Entrez un nom et prénom" required autofocus /> 
                            <!--<div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>-->
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Entrez une adresse email" required />
                           <!-- <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>-->
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="tel" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Entrez un numéro de téléphone" required />
                            <!--<div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>-->
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                           
                            <div class="col-sm-12">
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
                                    <option selected disabled>Sélectionnez un rôle</option>
                                    <option value="administrator">Admin</option>
                                    <option value="chefprojet">Chef de projet</option>
                                    <option value="membreprojet">Membre de projet</option>
                                    <option value="client">Client</option>
                                </select>
                               <!-- <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>-->
                            </div>
                            @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    

                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" placeholder="Entrez un mot de passe">
                                <div class="input-group-append">
                                <i class="input-group-text fas fa-eye"  id="eye" onclick="toggle()"></i>
                                 </div>
                                 @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                           
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le mot de passe" required />
                            <div class="input-group-append">
                            <i class="input-group-text fas fa-eye" id="ideye" onclick="myfunction()"></i>
    
                            </div>
                           </div>
                        </div>
                        <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Ajouter Utilisateur</button>  
                        <a href="/utilisateur"> <button type="button" class="btn btn-secondary"  >Retour</button></a>
                        </div>
                    </form>
                    
                    </center>
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