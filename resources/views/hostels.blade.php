@extends('layouts.dash')

@section('sidebar')
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3>
                    <span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span>
                </h3>
            </div>
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{route('home')}}" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i><span class="hide-menu">Home</span></a>
                </li>
                <li>
                    <a href="{{route('home.videos')}}" class="waves-effect"><i class="mdi mdi-video fa-fw"></i><span class="hide-menu">Videos</span></a>
                </li>
                <li>
                    <a href="{{route('home.notes')}}" class="waves-effect"><i class="mdi mdi-file-multiple fa-fw"></i><span class="hide-menu">Notes</span></a>
                </li>
                <li>
                    <a href="#" class="waves-effect active"><i class="mdi mdi-home-modern fa-fw"></i><span class="hide-menu">Hostels</span></a>
                </li>
                <li><a href="{{route('home.bookings')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-ticket-account fa-fw"></i><span class="hide-menu">Hostel Bookings</span></a></li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
@endsection

@section('content')
    <div class="white-box">
        <div class="container-fluid">
            @foreach($hostels as $hostel)
                <a href="{{url('home/hostel/'.$hostel->id)}}" class="col-md-3 col-xs-6 col-sm-3 col-lg-3 m-b-0">
                    <div class="panel panel-default" style="height:12em;background-image:url('{{url('storage/'.$hostel->path)}}');
                            background-size:     cover;                      /* <------ */
                            background-repeat:   no-repeat;
                            background-position: center center; ">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <h3 style="color:#fff;">{{$hostel->name}}</h3>
                            </div>
                            <div class="panel-footer" style="background: transparent;height:1em;padding:1em;margin:1em;border:none;bottom:2.5em;right:0;position:absolute;">
                                <p style="color:#ffffff;background: rgba(170,170,170,0.42);">{{$hostel->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection