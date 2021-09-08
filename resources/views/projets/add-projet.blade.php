<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title></title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href={{asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}} rel="stylesheet">
        <link href={{asset('admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}} rel="stylesheet">
        <link href={{asset('admin/plugins/select2/css/select2.min.css')}} rel="stylesheet" type="text/css" />
        <link href={{asset('admin/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}} rel="stylesheet" /> 
        <link href={{asset('admin/assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/metismenu.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/icons.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <style>
        .container-fluid{
            margin-left: 150px;
        }
       .form-group.bn{
        margin-left: 300px;
       }
       .avatar.avatar-xl .avatar-content,.avatar.avatar-xl img{width:60px;height:60px;font-size:1.4rem}
       .modal-title.pr
       {
           margin-left:200px;
           
           font-weight:bold;
       }
       </style>
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
                        

                       

                        <!-- full screen -->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-fullscreen noti-icon"></i>
                            </a>
                        </li>
                           
                        @if(Auth::user()->hasRole('chefprojet'))
             <!-- notification -->
                       <li class="dropdown notification-list list-inline-item">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-pill badge-danger noti-icon-badge">{{auth()->user()->unreadNotifications->count()}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                <!-- item-->
                                <h6 class="dropdown-item-text">
                                        Notifications 
                                    </h6>
                                <div class="slimscroll notification-item-list">
                                    <!-- item-->
                                    @foreach (auth()->user()->notifications as $notification)
                                    <a href="javascript:void(0);" class="dropdown-item notify-item ">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-folder"></i></div>
                                        <p class="notify-details">Un nouveau projet <span class="text-muted">
                                         
                                           
                                         {{$notification->markAsRead()}} 
                                         {{$notification->data['titre']}}
                                           
                                      </span> est affecté a vous.</p>
                                    </a>
                                    @endforeach
                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                        all <i class="fi-arrow-right"></i>
                                    </a>
                            </div>
                        </li>
            @endif       
            @if(Auth::user()->hasRole('administrator'))
             <!-- notification -->
                       <li class="dropdown notification-list list-inline-item">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-pill badge-danger noti-icon-badge">{{auth()->user()->unreadNotifications->count()}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                <!-- item-->
                                <h6 class="dropdown-item-text">
                                        Notifications 
                                    </h6>
                                <div class="slimscroll notification-item-list">
                                    <!-- item-->
                                    @foreach (auth()->user()->notifications as $notification)
                                    <a href="javascript:void(0);" class="dropdown-item notify-item ">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-folder"></i></div>
                                        <p class="notify-details">le projet <span class="text-muted">
                                         
                                           
                                         {{$notification->markAsRead()}} 
                                         {{$notification->data['titre']}}
                                           
                                      </span> est Terminé</p>
                                    </a>
                                    @endforeach
                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                        all <i class="fi-arrow-right"></i>
                                    </a>
                            </div>
                        </li>
            @endif  
            @if(Auth::user()->hasRole('membreprojet'))
             <!-- notification -->
                       <li class="dropdown notification-list list-inline-item">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-pill badge-danger noti-icon-badge">{{auth()->user()->unreadNotifications->count()}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                <!-- item-->
                                <h6 class="dropdown-item-text">
                                        Notifications 
                                    </h6>
                                <div class="slimscroll notification-item-list">
                                    <!-- item-->
                                    @foreach (auth()->user()->notifications as $notification)
                                    @if($notification->type === 'App\Notifications\TacheNotification' )
                                    <a href="javascript:void(0);" class="dropdown-item notify-item ">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-folder"></i></div>
                                        <p class="notify-details">Une nouvelle Tâche <span class="text-muted">
                                         
                                           
                                         {{$notification->markAsRead()}} 
                                         {{$notification->data['titre']}}
                                           
                                      </span>est affecté a vous.</p>
                                    </a>
                                    @endif
                                    @endforeach
                                   
                                    
                                    
                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                        All <i class="fi-arrow-right"></i>
                                    </a>
                            </div>
                        </li>
            @endif  
            @if(Auth::user()->hasRole('client'))
             <!-- notification -->
             <li class="dropdown notification-list list-inline-item">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-pill badge-danger noti-icon-badge">{{auth()->user()->unreadNotifications->count()}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                <!-- item-->
                                <h6 class="dropdown-item-text">
                                        Notifications 
                                    </h6>
                                <div class="slimscroll notification-item-list">
                                    <!-- item-->
                                    @foreach (auth()->user()->notifications as $notification)
                                    @if($notification->type === 'App\Notifications\ClientNotification' )
                                    <a href="javascript:void(0);" class="dropdown-item notify-item ">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-folder"></i></div>
                                        <p class="notify-details">Votre projet <span class="text-muted">
                                         
                                           
                                         {{$notification->markAsRead()}} 
                                         {{$notification->data['titre']}}
                                           
                                      </span>  est terminé </p>
                                    </a>
                                    @endif
                                    @endforeach
                                   
                                    
                                    
                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                        All <i class="fi-arrow-right"></i>
                                    </a>
                            </div>
                        </li>
            @endif

                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <div class="avatar avatar-xl">
                                <img src="{{ URL::to('/storage/users-avatar/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" class="rounded-circle">
                            </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profile"><i class="mdi mdi-account-circle m-r-5"></i> Profil</a>                              
                        <a class="dropdown-item" href="{{ route('lock_screen') }}"><i class="mdi mdi-lock-open-outline m-r-5"></i> Verrouillage</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item text-danger" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="mdi mdi-power text-danger"></i> Se déconnecter</a>
                        </form>
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
            @if (Auth::user()->hasRole('administrator'))
                <li>
                    <a href="{{url('accueil')}}" class="waves-effect">
                        <i class="ti-home"></i> <span> Accueil </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('utilisateur')}}" class="waves-effect"><i class="ti-user"></i><span> Utilisateurs </span></a>
                </li>
                <li>
                    <a href="{{url('full-calender')}}" class="waves-effect"><i class="ti-calendar"></i><span> Calendrier </span></a>
                </li>

               
                <li>
                    <a href="{{url('projet')}}" class="waves-effect"><i class="ti-receipt"></i><span> Projets </span></a>
                </li>
                <li>
                    <a href="{{url('email')}}" class="waves-effect"><i class="ti-email"></i><span> Envoyer mail </span></a>
                </li>
                @endif
                @if(Auth::user()->hasRole('chefprojet'))
                <li>
                    <a href="{{url('accueil')}}" class="waves-effect">
                        <i class="ti-home"></i> <span> Accueil </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('projet')}}" class="waves-effect"><i class="ti-receipt"></i><span> Projets </span></a>
                </li>
                
                <li>
                    <a href="{{url('calendrier')}}" class="waves-effect"><i class="ti-calendar"></i><span> Calendrier </span></a>
                </li>
                @endif
                @if(Auth::user()->hasRole('membreprojet'))
                <li>
                    <a href="{{url('accueil')}}" class="waves-effect">
                        <i class="ti-home"></i> <span> Accueil </span>
                    </a>
                </li>
        
                <li>
                    <a href="{{url('tache')}}" class="waves-effect"><i class="ti-bookmark-alt"></i><span> Tâches </span></a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-email"></i><span> Boites messages <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                   <!-- <ul class="submenu">
                        <li><a href="{{url('email-inbox')}}" >Inbox</a></li>
                        <li><a href="{{url('email-read')}}" >Email Read</a></li>
                        <li><a href="{{url('email-compose')}}" >Email Compose</a></li>
                    </ul> -->
                </li>
                @endif

            </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
           <br><br>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    
                                
                             
                    <div class="container-fluid">
                        

                        <div class="row">
                            <div class="col-8">
                                
                        
                                <div class="card">
                                    <div class="card-body">
        
                                    {{-- message --}}
                                    {!! Toastr::message() !!}
                                        
                                    <form method="POST" action="{{route('projet.create')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Titre Projet</label>
                                            <div class="col-sm-9">
                                                <input class="form-control @error('titre') is-invalid @enderror" type="text" name="titre" value="{{ old('titre') }}" placeholder="Entrer un titre de projet" required />
                                                @error('titre')
                                            <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                           
                                        </div>
                                        
                                        <div class="form-group row">
                                             <label for="example-text-input" class="col-sm-3 col-form-label">Client</label>
                                             <div class="col-sm-9">
                                       
                                                   <select class="form-control @error('client') is-invalid @enderror" id="client" name="client" value="{{ old('client') }}">
                                                          <option selected disabled>Sélectionnez un Client</option>
                                                           @foreach ($users as $user)
                                                           @if ($user->hasRole('client'))
                                                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                           @endif 
                                                           @endforeach 
                                                    </select>
                                                @error('client')
                                                  <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror 
                                                 </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                             
                                               
                                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" value="{{ old('description') }}" required></textarea>
                                                    @error('description')
                                                   <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                     </span>
                                                     @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="example-text-input" class="col-sm-3 col-form-label">Document</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="file" class="filestyle @error('file') is-invalid @enderror" data-buttonname="btn-secondary" value="{{ old('file') }}" required />
                                                @error('document')
                                              <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                             @enderror
                                            </div>
                                               
                                        </div>

                                        <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Etat Projet</label>
                                        <div class="col-sm-9">
                                        <select class="form-control @error('etat') is-invalid @enderror" id="etat" name="etat" value="{{ old('etat') }}">
                                                    <option>En attente</option>
                                                    <option>En cours</option>
                                                    <option>Terminé</option> 
                                                    <option>Fermé</option>             
                                        </select>
                                        @error('etat')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Chef de Projet</label>
                                        <div class="col-sm-9">
                                        <select class="form-control @error('chef') is-invalid @enderror" id="chef" name="chef">
                                        <option selected disabled>Sélectionnez un chef de projet</option>
                                        @foreach ($users as $user)
                                                   @if ($user->hasRole('chefprojet'))
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endif 
                                        @endforeach
                                                        
                                        </select>
                                        </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                             <label for="example-text-input" class="col-sm-3 col-form-label">Date Début De Projet</label>
                                             <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="datedeb" class="form-control @error('datedeb') is-invalid @enderror" value="{{ old('datedeb') }}" placeholder="yyyy/mm/dd" id="">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                        @error('datedeb')
                                                     <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    </div>
                                                 
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="example-text-input" class="col-sm-3 col-form-label">Date Fin De Projet</label>
                                             <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="text" name="datefin" class="form-control @error('datefin') is-invalid @enderror" value="{{ old('datefin') }}" placeholder="yyyy/mm/dd" id="">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                        @error('datefin')
                                                      <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                      </span>
                                                     @enderror
                                                    </div>
                                            
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                           <label for="example-text-input" class="col-sm-3 col-form-label">Taux avancement</label>
                                           <div class="col-sm-9">
                                                    <input id="demo1" type="text" value="00" name="demo1">
                                           
                                            </div>
                                         
                                        <div>
                                        <br>
                                       
                                        <div class="form-group bn">
                                            <button type="submit" class="btn btn-primary">Créer Projet</button>
                                         <a href="/projet">   <button type="button" class="btn btn-secondary">Retour</button></a>
                                           
                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
    

                    </div>

                </div>
                <!-- content -->

                <footer class="footer">
                   
                </footer>
        <!-- Modal Profile-->
        <div class="modal" id="profile">
  <div class="modal-dialog">
    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pr">Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('updateProfile') }}" method = "post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group col">
                            <input type="hidden" name="idp" id="idp" value="{{ Auth::user()->id }}" />
                                <div class="sidenav-header-inner"><img src="{{ URL::to('/storage/users-avatar/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" class="img-fluid rounded-circle" width="30%"></div>
                                <br>
                                <div class="row">
                                    <label for="Name" class="col-sm-4 control-label">Nom et prénom: </label>
                                    <span class="font-weight-bolder">{{ ucfirst(Auth()->user()->name) }}</span>
                                    
                                    
                                </div>
                        
                                <div class="row">
                                    <label for="Email" class="col-sm-4 control-label">Adresse Email : </label>
                                    <span>{{ ucfirst(Auth()->user()->email) }}</span>
                                </div>
                                <div class="row">
                                    <label for="phone" class="col-sm-4 control-label">Numéro de téléphone : </label>
                                    <span>{{ ucfirst(Auth()->user()->phone_number) }}</span>
                                </div>
                        
                                <div class="row">
                                    <label for="Name" class="col-sm-4 control-label">Rôle : </label>
                                    @if (Auth::user()->hasRole('administrator'))
                                        <span>Admin</span>
                                        @elseif(Auth::user()->hasRole('chefprojet'))
                                        <span>Chef de projet</span>
                                        @elseif(Auth::user()->hasRole('membreprojet'))
                                        <span>Membre de projet</span>
                                        @elseif(Auth::user()->hasRole('client'))
                                        <span>Client</span>
                                    @endif
                                </div>
                                <div class="row">
                                    <label for="Email" class="col-sm-4 control-label">Date d'adhésion : </label>
                                    <span>{{ ucfirst(Auth()->user()->created_at) }}</span>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 control-label">Changer la photo</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="picture" name="picture" class="form-control bl" value="" />
                                    </div>
                                    <input type="hidden" name="hidden_image" value="{{ Auth::user()->avatar }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id=""name="" class="btn btn-success  waves-light"><i class="icofont icofont-check-circled"></i>Modifier</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Fermer</button>
                    </div>

                </form>

    
    </div>
  </div>
</div>
<!-- End Modal Profile-->
            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <!-- jQuery  -->
        <script src={{asset('admin/assets/js/jquery.min.js')}}></script>
        <script src={{asset('admin/assets/js/bootstrap.bundle.min.js')}}></script>
        <script src={{asset('admin/assets/js/metisMenu.min.js')}}></script>
        <script src={{asset('admin/assets/js/jquery.slimscroll.js')}}></script>
        <script src={{asset('admin/assets/js/waves.min.js')}}></script>
         <!-- Plugins js -->
         <script src={{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}></script>
        <script src={{asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}></script>
        <script src={{asset('admin/plugins/select2/js/select2.min.js')}}></script>
        <script src={{asset('admin/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}></script>
        <script src={{asset('admin/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}></script>
        <script src={{asset('admin/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}></script>

        <!-- Plugins Init js -->
        <script src={{asset('admin/assets/pages/form-advanced.js')}}></script>


        <!-- App js -->
        <script src={{asset('admin/assets/js/app.js')}}></script>

    </body>

</html>