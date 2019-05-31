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
                <li><a href="{{route('home')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-apps fa-fw"></i><span class="hide-menu">Home</span></a></li>
                <li><a href="{{route('home.videos')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-video fa-fw"></i><span class="hide-menu">Videos</span></a></li>
                <li><a href="{{route('home.notes')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-file-multiple fa-fw"></i><span class="hide-menu">Notes</span></a></li>
                <li><a href="{{route('home.hostels')}}" class="waves-effect active"><i data-icon="7" class="mdi mdi-home-modern fa-fw"></i><span class="hide-menu">Hostels</span></a></li>
                <li><a href="{{route('home.bookings')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-ticket-account fa-fw"></i><span class="hide-menu">Hostel Bookings</span></a></li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
@endsection

@section('content')
    <div class="panel" style="background: rgba(40,31,36,0.69);">
        <div class="panel-heading" style="padding:0.5em;background: #fff;">
            <h2><span style="color: darkred;">{{$notes->name}}</span></h2>
        </div>
        <div class="panel-body" style="margin:0;padding:0;">
            <div class="col-md-8" style="margin:0;padding:0;">
                <img src="{{asset('admin/doc.jpg')}}" alt="{{$notes->id}}" class="img img-thumbnail" style="max-height:600px;min-width:80%;">
            </div>
            <div class="col-md-4" style="padding-left:2em;margin:0;">
                <h3 style="background: #fff;padding:0.2em;border-radius:5px;">More Documents</h3>
                <div class="row" style="padding-top:0;margin:0.5em; padding-left: 0;padding-right:0;max-height:700px; overflow-y:auto;overflow-x: hidden">
                    @foreach($playlist as $play)
                        @if($play->id!==$notes->id)
                            <div class="row" style="margin-top:0.21em;background: #fff;border:transparent;">
                                <a href="{{url('home/hostel/'.$play->id)}}">
                                    <blockquote style="border:none;margin:0;padding-left:0;padding-top:0;">
                                        <img src="{{asset('admin/doc.jpg')}}" class="img pull-left" width="200px" height="100px" style="margin:0;padding:0 10px 0 0;" alt="{{$play->id}}">
                                        <p>{{$play->name}}</p>
                                    </blockquote>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="white-box">
        <div class="container">
            <div class="row"><h3 class="box-title pull-left">{{$notes->name}}</h3><a href="{{url('home/notes/download/'.$notes->id)}}" class="fcbtn btn btn-outline btn-info btn-2 btn-lg pull-right"><i class="mdi mdi-download"></i> Download</a> </div>

            <p class="text-muted"><span class="mdi mdi-eye"></span> {{$notes->views}} views</p><p class="text-muted"> <span class="mdi mdi-calendar"></span> {{$notes->created_at}}</p>
            <hr>
            <blockquote>{{$notes->description}}</blockquote>
        </div>
    </div>
@endsection
