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
        <!-- DataTables -->
        <link href={{asset('admin/plugins/datatables/dataTables.bootstrap4.min.css')}} rel="stylesheet" type="text/css" />
        <link href={{asset('admin/plugins/datatables/buttons.bootstrap4.min.css')}} rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href={{asset('admin/plugins/datatables/responsive.bootstrap4.min.css')}} rel="stylesheet" type="text/css" />
        <link href={{asset('admin/assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/metismenu.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/icons.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <style>
       .avatar.avatar-xl .avatar-content,.avatar.avatar-xl img{width:60px;height:60px;font-size:1.4rem}
       .modal-title.pr
       {
           margin-left:200px;
           
           font-weight:bold;
       }
       .modal-title.mod
       {
           margin-left:130px;
           
           font-weight:bold;
       }
       .form-group.row
       {
        margin-left:20px;
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
                    <a href="" class="waves-effect"><i class="ti-view-grid"></i><span> Modules </span></a>
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
                    <a href="{{url('tachemembre')}}" class="waves-effect"><i class="ti-bookmark-alt"></i><span> Tâches </span></a>
                </li>
                <li>
                    <a href="{{url('conversation')}}" class="waves-effect"><i class="ti-email"></i><span> Mes conversations </span></a>
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
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    
                                
                <div class="container-fluid">
                        <div class="page-title-box">
                        <br><br>
                            <div class="row align-items-center">
                                
                                <div class="col-sm-6">
                                    <h4 class="page-title">Tâches</h4>
                                    

                                </div>
                                <div class="col-sm-6">
                                
                                    <div class="float-right d-none d-md-block">
                                        <div class="dropdown">
                                        
                                       
                                        <a href="javascript:history.back(1)"> <button type="button" class="btn btn-secondary"  >Retour</button></a>
                                    
                                       
                                         
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-header">
                              
</div>
{{-- message --}}
{!! Toastr::message() !!}

<table id="datatable" class="table table-striped">
<thead>
<tr>
<th>Id </th>
<th>Titre Tâche</th>
<th>Module</th>
<th>Membre de projet</th>
<th>Date Début Tâche</th>
<th>Date fin Tâche</th>
<th>Taux avancement</th>
<th>Etat Tâche</th>
<th><center> Action </center></th>
</tr>
</thead>
<tbody>
@foreach ($taches as $tache)
<tr>
<td class="idtache">{{$tache->id}}</td>
<td class="titre">{{$tache->titre_tache}}</td>
@foreach ($modules as $module)
@if($module->id === $tache->id_module)
<td class="client">{{$module->titre_module}}</td>
@endif
@endforeach
@foreach ($users as $user)
@if($user->id === $tache->id_membre)
<td class="membre">{{$user->name}}</td>
@endif
@endforeach
<td class="date_debut">{{$tache->date_debut}}</td>
<td class="date_fin">{{$tache->date_fin}}</td>
<td class="taux"><center>{{$tache->taux_avancement}}</center></td>
<td class="etat">{{$tache->etat}}</td>
<td class="text-center">
@if(Auth::user()->hasRole('chefprojet'))
<a class="btn btn-success tacheUpdate" href="#" data-toggle="modal" data-id="'.$tache->id.'" data-target="#updateTache"><span class="fa fa-pencil"></span></a> 
<a class="btn btn-danger" href="{{ url('delete_tache/'.$tache->id) }}" onclick="return confirm('Are you sure  want to delete it?')"><span class="fa fa-trash"></span></a>
@endif
@if(Auth::user()->hasRole('membreprojet'))
<a class="btn btn-success tacheUpdate" href="#" data-toggle="modal" data-id="'.$tache->id.'" data-target="#updateTaux"><span class="fa fa-pencil"></span></a>
@endif
</td>
</tr>
@endforeach

</tbody>
</table>


                                    </div>
                                </div>
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
<!-- Modal Ajout tache-->
<div class="modal" id="updateTaux">
  <div class="modal-dialog">
    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mod">Modifier Taux De Tâche</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
  
                    <form action="{{ route('updateTaux') }}" method = "post">
                    {{ csrf_field() }}
                    <input type="hidden" name="idt" id="idt" value="" />
  
                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 bn col-form-label">Taux d'avancement</label>
                                        <div class="col-sm-8">
                                        <input id="demo1" type="text" value="00" name="demo1">
                                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        
                        <button type="submit" id=""name="" class="btn btn-primary  waves-light"><i class="icofont icofont-check-circled"></i>Modifier Taux</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icofont icofont-eye-alt"></i>Fermer</button>
                    </div>

                </form><!-- form delete end -->

    
    </div>
  </div>
</div>
 <!-- End Modal tache-->
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

         <!-- Required datatable js -->
       <script src={{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}></script>
        <script src={{asset('admin/plugins/datatables/dataTables.bootstrap4.min.js')}}></script>
        <!-- Buttons examples -->
        <script src={{asset('admin/plugins/datatables/dataTables.buttons.min.js')}}></script>
        <script src={{asset('admin/plugins/datatables/buttons.bootstrap4.min.js')}}></script>
        <script src={{asset('admin/plugins/datatables/jszip.min.js')}}></script>
        <script src={{asset('admin/plugins/datatables/pdfmake.min.js')}}></script>
        <script src={{asset('admin/plugins/datatables/vfs_fonts.js')}}></script>
        <script src={{asset('admin/plugins/datatables/buttons.html5.min.js')}}></script>
        <script src={{asset('admin/plugins/datatables/buttons.print.min.js')}}></script>
        <script src={{asset('admin/plugins/datatables/buttons.colVis.min.js')}}></script>
        <!-- Responsive examples -->
        <script src={{asset('admin/plugins/datatables/dataTables.responsive.min.js')}}></script>
        <script src={{asset('admin/plugins/datatables/responsive.bootstrap4.min.js')}}></script>

        <!-- Datatable init js -->  
        <script src={{asset('admin/assets/pages/datatables.init.js')}}></script>    
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

        <script>
  $(document).on('click','.tacheUpdate',function()
        {
            var _this = $(this).parents('tr');

            $('#idt').val(_this.find('.idtache').text());
            $('#titre').val(_this.find('.titre').text());
            $('#idm').val(_this.find('.module').text());
            $('#membre').val(_this.find('.membre').text());
            $('#date1').val(_this.find('.date_debut').text());
            $('#date2').val(_this.find('.date_fin').text());
            $('#etat').val(_this.find('.etat').text());
            $('#demo1').val(_this.find('.taux').text());
        
            

            
        });
        </script>

    </body>

</html>