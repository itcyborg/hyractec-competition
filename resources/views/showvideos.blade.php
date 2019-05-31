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
                <li><a href="{{route('home.videos')}}" class="waves-effect active"><i data-icon="7" class="mdi mdi-video fa-fw"></i><span class="hide-menu">Videos</span></a></li>
                <li><a href="{{route('home.notes')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-file-multiple fa-fw"></i><span class="hide-menu">Notes</span></a></li>
                <li><a href="{{route('home.hostels')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-home-modern fa-fw"></i><span class="hide-menu">Hostels</span></a></li>
                <li><a href="{{route('home.bookings')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-ticket-account fa-fw"></i><span class="hide-menu">Hostel Bookings</span></a></li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
@endsection

@section('content')
    <div class="panel" style="background: rgba(40,31,36,0.69);">
        <div class="panel-heading" style="padding:0.5em;background: #fff;">
            <h2>Now Playing: <span style="color: darkred;">{{$video->name}}</span></h2>
        </div>
        <div class="panel-body" style="margin:0;padding:0;">
            <div class="col-md-8" style="margin:0;padding:0;">
                <video id="my-player" class="video-js" controls preload="auto" data-setup='{}'>
                    <source src="{{asset($link)}}">
                </video>
            </div>
            <div class="col-md-4" style="padding-left:2em;margin:0;">
                <div class="row" style="padding-top:0;margin:0.5em; padding-left: 0;padding-right:0;max-height:700px; overflow-y:auto;overflow-x: hidden">
                    @foreach($playlist as $play)
                        @if($play->id!==$video->id)
                            <div class="row" style="margin-top:1em;background: #fff;border:none;">
                                <a href="{{url('home/videos/'.$play->id)}}">
                                    <blockquote style="border:none;margin:0;padding-left:0;padding-top:0;">
                                        <img src="{{asset('admin/images.jpg')}}" class="img pull-left" width="200px" height="100px" style="margin:0;padding:0 10px 0 0;" alt="{{$play->id}}">
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
            <h3 class="box-title">{{$video->name}}</h3>
            <p class="text-muted"><span class="mdi mdi-eye"></span> {{$video->views}} views</p><p class="text-muted"> <span class="mdi mdi-calendar"></span> {{$video->created_at}}</p>
            <hr>
            <blockquote>{{$video->description}}</blockquote>
        </div>
    </div>
@endsection

@section('styles')
    <link href="//vjs.zencdn.net/5.19/video-js.min.css" rel="stylesheet">
@endsection
@section('scripts')
    <script src="//vjs.zencdn.net/5.19/video.min.js"></script>
    <script>
        var options={
            'autoplay':false,
            'aspectRatio':'16:9'
        };
        var player = videojs('my-player', options, function onPlayerReady() {
            videojs.log('Your player is ready!');

            // How about an event listener?
            this.on('ended', function() {
                videojs.log('Awww...over so soon?!');
            });
        });
    </script>
@endsection