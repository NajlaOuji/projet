<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title></title>
        <script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
       <script src="http://www.chartjs.org/samples/latest/utils.js"></script>
       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href={{asset('admin/assets/images/favicon.ico')}}>

        <!--Chartist Chart CSS -->
        <link rel="stylesheet" href={{asset('admin/plugins/chartist/css/chartist.min.css')}}>

        <link href={{asset('admin/assets/css/bootstrap.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/metismenu.min.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/icons.css')}} rel="stylesheet" type="text/css">
        <link href={{asset('admin/assets/css/style.css')}} rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        
        <style>
        .font-500.client
        {
            margin-left:200px;
        }
        
        .col-xl-6.col-md-6{
            margin-left:250px;
        }
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
       h4{
        margin-left:130px;
        font-size: 18px;
       }
       h3{
        font-size: 16px;
       }
       .badge.badge-success.bn
       {
        margin-left:220px;
       }
       .badge.badge-info.bn
       {
        margin-left:250px;
       }
       .card-body
       {
           background-color: #4fAECO;
       }
       .job-list {
	background-color: #fff;
	border: 1px solid #ededed;
	border-radius: 4px;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
	display: block;
	margin-bottom: 5px;
	position: relative;
	transition: all 0.3s ease 0s;
}
.job-list-det {
	align-items: flex-start;
	display: flex;
	align-items: center;
	padding: 10px 10px 10px 10px;
}
.job-list .job-list-desc {
	flex: 1 1 0;
}
.job-list h4.job-department {
	color: #777;
	font-size: 14px;
	margin-bottom: 0;
}
.job-list h3.job-list-title {
	color: #333;
	font-size: 15px;
	font-weight: 600;
	line-height: 18px;
}
.job-list .job-list-footer {
	background-color: #f9f9f9;
	border-radius: 0 0 4px 4px;
	position: relative;
	padding: 20px;
}
.job-list .job-list-footer ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
.job-list .job-list-footer ul li {
	color: #777;
	display: inline-block;
	margin-right: 14px;
}
.job-list .job-list-footer ul li i {
	color: #777;
	margin-right: 3px;
	position: relative;
}
.job-list .job-list-footer ul li:last-child {
	margin-right: 0;
}
.page-wrapper.job-wrapper {
	margin-left: 0;
}
.job-types {
	background-color: transparent;
	border: 1px solid #f43b48;
	color: #f43b48;
	border-radius: 4px;
	display: inline-block;
	padding: 6px 12px;
	text-align: center;
}
.tab{
    "display: none;
}

.card-body.c1
{
    background-color:#626ed4;

}
.card-body.c2
{
    background-color:#626ed4;

}
.card-body.c3
{
    background-color:#626ed4;

}
.card-body.c4
{
    background-color:#626ed4; 
}
.mini-stat-label.bg-white
{
    color:#333547;
    
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
                        
               @if(Auth::user()->hasRole('client'))
                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link waves-effect" href="{{url('email')}}" >
                        <i class="ti-email"></i>
                    </a>
                </li>       
                @endif
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
                    <a href="{{url('projetchef')}}" class="waves-effect"><i class="ti-receipt"></i><span> Projets </span></a>
                </li>
                
                <li>
                    <a href="{{url('calendrier')}}" class="waves-effect"><i class="ti-calendar"></i><span> Calendrier </span></a>
                </li>
                <li>
                    <a href="{{url('email')}}" class="waves-effect"><i class="ti-email"></i><span> Envoyer mail </span></a>
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
                    <a href="{{url('chatify')}}" class="waves-effect"><i class="fab fa-facebook-messenger"></i><span> Conversations </span></a>
                </li>
                <li>
                    <a href="{{url('email')}}" class="waves-effect"><i class="ti-email"></i><span> Envoyer mail </span></a>
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
        <br><br>
        @if(Auth::user()->hasRole('membreprojet'))    
           <div class="row">
                            
                            <div class="col-xl-4 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <img src={{asset('admin/assets/images/services-icon/02.png')}} alt="" >
                                            </div>
                                           <br>
                                            <h4 class="font-500">A Faire <i class="mdi  text-danger ml-2"></i></h4>
                                            <div class="mini-stat-label bg-danger">
                                                <p class="mb-0">{{$ct1}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        @foreach ($taches as $tache)
                                        @if($tache->etat === 'En attente')
                                        <div class="job-list">
                                        <div class="job-list-det">
                                              <div class="job-list-desc">
                                               <h3 class="job-list-title">{{$tache->titre_tache}}</h3>
                                          </div>
                                         <div class="job-type-info">
                                        <a href="{{ url('start_tache/'.$tache->id) }}" onclick="return confirm('Are you sure want to start it?')" class="badge badge-danger"><span >Start</span></a>
                                          </div>
                                       </div>
                                        <div class="job-list-footer">
                                       <ul>
                                       <li><i class="fa fa-calendar"></i> {{$tache->date_debut}} </li>
                                       <li><i class="fa fa-calendar"></i>{{$tache->date_fin}} </li>
                                       <a href="{{ url('show-tache/'.$tache->id) }}" class="badge badge-info bn"><span class="fa fa-eye"></span></a>
                                       </ul>
                                      </div>

                                        </div>
                                        @endif
                                        @endforeach
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            {{-- message --}}
                            {!! Toastr::message() !!}
                            <div class="col-xl-4 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                            <img src={{asset('admin/assets/images/services-icon/01.png')}} alt="" >
                                                
                                            </div>
                                            <br>
                                            <h4 class="font-500">En Cours <i class="mdi  text-success ml-2"></i></h4>
                                            <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">{{$ct2}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        
                                        @foreach ($taches as $tache)
                                        @if($tache->etat === 'En cours')                                     
                                       <div class="job-list">
                                        <div class="job-list-det">
                                              <div class="job-list-desc">
                                               <h3 class="job-list-title">{{$tache->titre_tache}}</h3>
                                          </div>
                                         <div class="job-type-info">
                                         <a href="{{ url('finish_tache/'.$tache->id) }}" onclick="return confirm('Are you sure want to finish it?')" class="badge badge-success"><span >Finish</span></a>
                                          </div>
                                       </div>
                                        <div class="job-list-footer">
                                       <ul>
                                       <li><i class="fa fa-calendar"></i> {{$tache->date_debut}} </li>
                                       <li><i class="fa fa-calendar"></i>{{$tache->date_fin}} </li>
                                       <li><i class="taux fa fa-archive"></i><span>Taux_avancement: </span>{{$tache->taux_avancement}}<span>%</span></li>
                                      <table>
                                      <tbody>
                                      <tr><td class="idtache">{{$tache->id}}</td>
                                      <td class="taux">{{$tache->taux_avancement}}</td>
                                      <td> <a href="" class="badge badge-success bn updateTaux" data-toggle="modal" data-id="'.$tache->id.'" data-target="#updateT"><span class="fa fa-pencil"></span></a></td>
                                      </tr>
                                      </tbody>
                                     
                                      </table>
                                       
                                        
                                      
                                       
                                       </ul>
                                      </div>

                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                            <img src={{asset('admin/assets/images/services-icon/04.png')}} alt="" >
                                            </div>
                                            <br>
                                            <h4 class="font-500">Terminé <i class="mdi  text-success ml-2"></i></h4>
                                            <div class="mini-stat-label bg-success">
                                                <p class="mb-0">{{$ct3}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        @foreach ($tachesD as $tache)
                                        @if($tache->etat === 'Terminé')
                                        <div class="job-list">
                                        <div class="job-list-det">
                                              <div class="job-list-desc">
                                               <h3 class="job-list-title">{{$tache->titre_tache}}</h3>
                                          </div>
                                        
                                       </div>
                                        <div class="job-list-footer">
                                       <ul>
                                       <li><i class="fa fa-calendar"></i> {{$tache->date_debut}} </li>
                                       <li><i class="fa fa-calendar"></i>{{$tache->date_fin}} </li>
                                       
                                       </ul>
                                      </div>

                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
        </div>
                        <!-- end row -->  
    @endif
    @if(Auth::user()->hasRole('administrator'))
    <div class="row">
                            
                            <div class="col-xl-3 col-md-4 c1">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body c1">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <img src={{asset('admin/assets/images/services-icon/03.png')}} alt="" >
                                            </div>
                                           <br><br>
                                            <h3 class="font-500">NB De Projet <i class="mdi  text-danger ml-2"></i></h4>
                                            <div class="mini-stat-label bg-white">
                                              
                                                <p class="mb-0 c1">{{$Count1}}</p>
                                    
                                            </div>
                                        </div>
                                        <br>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body c2">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                            <img src={{asset('admin/assets/images/services-icon/03.png')}} alt="" >
                                                
                                            </div>
                                            <br><br>
                                            <h3 class="font-500">NB De Client <i class="mdi  text-success ml-2"></i></h4>
                                            <div class="mini-stat-label bg-white">
                                                <p class="mb-0">{{$Count2}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body c3">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                            <img src={{asset('admin/assets/images/services-icon/03.png')}} alt="" >
                                            </div>
                                            <br><br>
                                            <h3 class="font-500">NB De Chef  <i class="mdi  text-success ml-2"></i></h4>
                                            <div class="mini-stat-label bg-white">
                                                <p class="mb-0">{{$Count3}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body c4">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                            <img src={{asset('admin/assets/images/services-icon/03.png')}} alt="" >
                                            </div>
                                            <br><br>
                                            <h3 class="font-500">NB De Membre <i class="mdi  text-success ml-2"></i></h4>
                                            <div class="mini-stat-label bg-white">
                                                <p class="mb-0">{{$Count4}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                          <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-5">Taux d'avancement de chaque projet</h4>
                                        <div class="row">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mt-0 header-title mb-4">Les états de projet</h4>
                                        </div>
                                        
                                        
                                        <div id="piechart" style="width: 400px; height: 360px;"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        @endif
@if(Auth::user()->hasRole('chefprojet'))
    <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-5">Taux d'avancement de chaque projet</h4>
                                        <div class="row">
                                            <canvas id="canvas"></canvas>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h4 class="mt-0 header-title mb-4">Les états de projet</h4>
                                        </div>
                                        
                                        
                                        <div id="piechart2" style="width: 400px; height: 360px;"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                         
                        @endif   

@if(Auth::user()->hasRole('client')) 
<div class="row">
                            
                            <div class="col-xl-6 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left mini-stat-img mr-4">
                                                <img src={{asset('admin/assets/images/services-icon/02.png')}} alt="" >
                                            </div>
                                           <br>
                                            <h4 class="font-500 client">Votre projet <i class="mdi  text-danger ml-2"></i></h4>
                                            <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">{{$countcl}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        @foreach ($projets as $projet)
                                        
                                        <div class="job-list">
                                        <div class="job-list-det">
                                              <div class="job-list-desc">
                                               <center><h3 class="job-list-title">{{$projet->titre_projet}}</h3></center>
                                          </div>
                                         
                                       </div>
                                        <div class="job-list-footer">
                                       <ul>
                                      <center> <li><i class="fa fa-ban"></i> {{$projet->etat}} </li> 
                                       <li><i class="fa fa-percent"></i>{{$projet->taux_avancement}} </li></center>
                                       
                                       </ul>
                                      </div>

                                        </div>
                                        
                                        @endforeach
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                            
        </div>

@endif  

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
<div class="modal" id="updateT">
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
                                        <input id="demo1" type="text" value="" name="demo1">
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
        <!-- Plugins js -->
        <script src={{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}></script>
        <script src={{asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}></script>
        <script src={{asset('admin/plugins/select2/js/select2.min.js')}}></script>
        <script src={{asset('admin/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}></script>
        <script src={{asset('admin/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}></script>
        <script src={{asset('admin/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}></script>  
        <!--Chartist Chart-->
        <script src={{asset('admin/plugins/chartist/js/chartist.min.js')}}></script>
        <script src={{asset('admin/plugins/chartist/js/chartist-plugin-tooltip.min.js')}}></script>

        <!-- peity JS -->
        <script src={{asset('admin/plugins/peity-chart/jquery.peity.min.js')}}></script>

        <script src={{asset('admin/assets/pages/dashboard.js')}}></script>
        <!-- Plugins Init js -->
        <script src={{asset('admin/assets/pages/form-advanced.js')}}></script>

        <!-- App js -->
        <script src={{asset('admin/assets/js/app.js')}}></script>
        <script>
       $(document).on('click','.updateTaux',function()
        {
            var _this = $(this).parents('tr');

            $('#idt').val(_this.find('.idtache').text());
            $('#demo1').val(_this.find('.taux').text());
            
        });



        var chartdatas = {
    type: 'bar',
    data: {
    labels: <?php echo json_encode($Months); ?>,
    // labels: month,
    datasets: [
    {
    label: 'Taux',
    backgroundColor: '#52BE80',
    borderWidth: 1,
    data: <?php echo json_encode($Data); ?>
    }
    ]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero:true
    }
    }]
    }
    }
    }
    var ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, chartdatas);
        </script>
        <script>
 var chartdata = {
    type: 'bar',
    data: {
    labels: <?php echo json_encode($Titre); ?>,
    // labels: month,
    datasets: [
    {
    label: 'Taux',
    backgroundColor: '#4F63DE',
    borderWidth: 1,
    data: <?php echo json_encode($Tau); ?>
    }
    ]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero:true
    }
    }]
    }
    }
    }
    var ctx = document.getElementById('canvas').getContext('2d');
    new Chart(ctx, chartdata);
        </script>
<script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php echo $Datas; ?>
        ]);

        var options = {
          title: 'Les états de projet',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php echo $Datas2; ?>
        ]);

        var options = {
          title: 'Les états de projet',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
        
    </body>

</html>