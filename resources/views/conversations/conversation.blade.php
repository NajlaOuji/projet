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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <style>
       .avatar.avatar-xl .avatar-content,.avatar.avatar-xl img{width:60px;height:60px;font-size:1.4rem}

       .modal-title.pr
       {
           margin-left:200px;
           
           font-weight:bold;
       }
       .fa.fa-circle.text-success.online-icon{
       
        margin-left:30px;
         }
       .enligne
       {
        
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
               
            <li class="dropdown notification-list list-inline-item">
            
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <div class="avatar avatar-xl">
                                <img src="{{ URL::to('/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" class="rounded-circle">
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
<br><br>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        
    <div class="container-fluid">
                        
    <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                               
                                    <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Vos conversations</h4>
                                    <br>
 {{-- message --}}
{!! Toastr::message() !!}

<table id="datatable" class="table table-hover">
<thead>
<tr>
<th><center>Nom</center></th>
<th>Message</th>
<th><center>Date</center></th>
<th><center> Action </center></th>
</tr>
</thead>
<tbody>
@foreach($conversations as $conversation)
<tr>

@foreach ($users as $user)
@if(Auth::user()->id !== $user->id)
@if($user->id === $conversation->from)
<div>
<td><img src="{{ URL::to('/images/'. $user->avatar) }}" alt="{{ $user->avatar }}" class="thumb-md rounded-circle mr-2">{{$user->name}}</a></td>
</div>
@endif
@endif
@if(Auth::user()->id !== $user->id)
@if($user->id === $conversation->to)
<div>
<td><img src="{{ URL::to('/images/'. $user->avatar) }}" alt="{{ $user->avatar }}" class="thumb-md rounded-circle mr-2">{{$user->name}}</td>
</div>
@endif
@endif
@endforeach
<td><a href="{{ route('conversation.show', $conversation->id) }}" class="focus:outline-none">{{ Illuminate\Support\Str::limit($conversation->messages->last()->content, 50) }}</a></td>
<td>envoyé par <strong>{{ auth()->user()->id === $conversation->messages->last()->user->id ? 'vous' : $conversation->messages->last()->user->name }}</strong> {{ $conversation->messages->last()->created_at->diffForHumans() }}</td>
<td><a class="btn btn-danger" href="{{ url('delete_conversation/'.$conversation->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="fa fa-trash"></span></a> </td>
</tr>
@endforeach
</tbody>
</table>
<hr>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body bn">
                                        <h4 class="mt-0 header-title mb-4">Membres</h4>
                                        <div class="chat-conversation">
                                            <ul class="conversation-list slimscroll" style="max-height: 400px;">
                                            <div class="submenu">
                        
                        @foreach ($users as $user)
                        @if ($user->hasRole('membreprojet'))
                        @if(Auth::user()->id !== $user->id)
                         @if(Cache::has('user-is-online-' . $user->id))
                         <li class="enligne"><a href="{{ route('confirm.user', [$user->id])}}" > <img src="{{ URL::to('/images/'. $user->avatar) }}" alt="{{ $user->avatar }}" class="thumb-md rounded-circle mr-2"> {{$user->name}}<i class="fa fa-circle text-success online-icon"></i>
                         </a></li>
                        @else
                        <li><a href="{{ route('confirm.user', [$user->id])}}" > <img src="{{ URL::to('/images/'. $user->avatar) }}" alt="{{ $user->avatar }}" class="thumb-md rounded-circle mr-2"> {{$user->name}}
                         </a></li>
                        @endif
                         @endif
                         @endif
                         @endforeach
                           </div>
                                            </ul>
                                           
                                        </div>
                                    </div>
                                </div>
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
                                <div class="sidenav-header-inner"><img src="{{ URL::to('/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" class="img-fluid rounded-circle" width="30%"></div>
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

        <!-- App js -->
        <script src={{asset('admin/assets/js/app.js')}}></script>
    
    </body>

</html>