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

        <!--Chartist Chart CSS -->
        <link rel="stylesheet" href={{asset('admin/plugins/chartist/css/chartist.min.css')}}>

        <link href={{asset('admin/assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/metismenu.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/icons.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <style>
       .avatar.avatar-xl .avatar-content,.avatar.avatar-xl img{width:60px;height:60px;font-size:1.4rem}

       .modal-title.pr
       {
           margin-left:200px;
           
           font-weight:bold;
       }
       .container-fluid{
            margin-left: 150px;
        }
        .col-sm-4.control-label
        {
            margin-left: 130px;
        }
        .card-body
        {
            background-color: #ececf1;
        }
        .form-group.bn{
        margin-left: 550px;
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
                                        <p class="notify-details">Un nouveau projet est affecté <br> a vous :<span class="text-muted">
                                         
                                           
                                           {{$notification->markAsRead()}} 
                                           {{$notification->data['titre']}}
                                             
                                        </span></p>
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
                                        <p class="notify-details">Un projet est Terminé <br> <span class="text-muted">
                                         
                                           
                                           {{$notification->markAsRead()}} 
                                           {{$notification->data['titre']}}
                                             
                                        </span></p>
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
                                        <p class="notify-details">Une nouvelle Tâche est affecté <br> a vous :<span class="text-muted">
                                         
                                           
                                           {{$notification->markAsRead()}} 
                                           {{$notification->data['titre']}}
                                             
                                        </span></p>
                                    </a>
                                    @endif
                                    @endforeach
                                    <!-- item-->
                                    @foreach (auth()->user()->notifications as $notification)
                                    @if($notification->type === 'App\Notifications\ConverNotification' )
                                    <a href="javascript:void(0);" class="dropdown-item notify-item ">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-message-text-outline"></i></div>
                                        <p class="notify-details">Vous avez un nouveau message <br>  <span class="text-muted">
                                         
                                           envoyé par :
                                           {{$notification->markAsRead()}} 
                                           {{$notification->data['titre']}}
                                             
                                        </span></p>
                                    </a>
                                    @endif
                                    @endforeach
                                    <!-- item-->
                                    @foreach (auth()->user()->notifications as $notification)
                                    @if($notification->type === 'App\Notifications\MessageNotification' )
                                    <a href="javascript:void(0);" class="dropdown-item notify-item ">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-message-text-outline"></i></div>
                                        <p class="notify-details">Vous avez un nouveau message <br>  <span class="text-muted">
                                         
                                           envoyé par :
                                           {{$notification->markAsRead()}} 
                                           {{$notification->data['titre']}}
                                             
                                        </span></p>
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
                    <a href="{{url('utilisateur')}}" class="waves-effect"><i class="ti-face-smile"></i><span> Utilisateurs </span></a>
                </li>
                <li>
                    <a href="{{url('calendrier')}}" class="waves-effect"><i class="ti-calendar"></i><span> Calendrier </span></a>
                </li>

               
                <li>
                    <a href="{{url('projet')}}" class="waves-effect"><i class="ti-receipt"></i><span> Projets </span></a>
                </li>
                @endif
                @if(Auth::user()->hasRole('chefprojet'))
                <li>
                    <a href="{{url('accueil')}}" class="waves-effect">
                        <i class="ti-home"></i> <span> Accueil </span>
                    </a>
                </li>
                <li>
                    <a href="{{url('projetchef')}}" class="waves-effect"><i class="ti-receipt"></i><span> Projets </span></a>
                </li>
                <li>
                    <a href="{{url('module')}}" class="waves-effect"><i class="ti-view-grid"></i><span> Modules </span></a>
                </li>
                <li>
                    <a href="{{url('tache')}}" class="waves-effect"><i class="ti-bookmark-alt"></i><span> Tâches </span></a>
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
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<br><br> <br>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        
            <div class="container-fluid">
                        

                        <div class="row">
                            <div class="col-8">
                                
                        
                                <div class="card">
                                
                                    <div class="card-body">
                                    
                                    <div class="form-group col">
                                
                                <br>
                                

                                <div class="row">
                                    <label for="phone" class="col-sm-4 control-label">Titre de Tâche : </label>
                                    <span class="font-weight-bolder">{{$tache->titre_tache}}</span>
                                </div>
                                  <br>
                                <div class="row">
                                    <label for="Email" class="col-sm-4 control-label">Module : </label>
                                    @foreach ($modules as $module)
                                     @if($module->id === $tache->id_module)
                                    <span>{{$module->titre_module}}</span>
                                    @endif
                                    @endforeach
                                </div><br>
                                
                                <div class="row">
                                    <label for="phone" class="col-sm-4 control-label">Description : </label>
                                    <span>{{$tache->description}}</span>
                                </div><br>
                                <div class="row">
                                    <label for="phone" class="col-sm-4 control-label">Date début de Tâche : </label>
                                    <span>{{$tache->date_debut}}</span>
                                </div><br>
                                <div class="row">
                                    <label for="phone" class="col-sm-4 control-label">Date fin de Tâche : </label>
                                    <span>{{$tache->date_fin}}</span>
                                </div><br>
                                <div class="row">
                                    <label for="phone" class="col-sm-4 control-label">Taux d'Avancement de Tâche </label>
                                    <span>{{$tache->taux_avancement}}</span>
                                </div><br>
                                <div class="row">
                                    <label for="phone" class="col-sm-4 control-label">Etat de Tâche : </label>
                                    <span>{{$tache->etat}}</span>
                                </div>
                                <br>
                                <div class="form-group bn">
                                         <a href="javascript:history.back(1)">   <button type="button" class="btn btn-secondary">Retour</button></a>
                                           
                                        </div>
                        
                               
                              
                            </div>                        
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


        <!--Chartist Chart-->
        <script src={{asset('admin/plugins/chartist/js/chartist.min.js')}}></script>
        <script src={{asset('admin/plugins/chartist/js/chartist-plugin-tooltip.min.js')}}></script>

        <!-- peity JS -->
        <script src={{asset('admin/plugins/peity-chart/jquery.peity.min.js')}}></script>

        <script src={{asset('admin/assets/pages/dashboard.js')}}></script>

        <!-- App js -->
        <script src={{asset('admin/assets/js/app.js')}}></script>
        
    </body>

</html>