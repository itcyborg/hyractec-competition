@extends('layouts.dash')

@section('sidebar')

    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="mdi mdi-menu visible-xs"></i><i class="mdi mdi-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
            <ul class="nav" id="side-menu">
                <li><a href="{{route('home')}}" class="waves-effect active"><i data-icon="7" class="mdi mdi-apps fa-fw"></i><span class="hide-menu">Home</span></a></li>
                <li><a href="{{route('home.videos')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-video fa-fw"></i><span class="hide-menu">Videos</span></a></li>
                <li><a href="{{route('home.notes')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-file-multiple fa-fw"></i><span class="hide-menu">Notes</span></a></li>
                <li><a href="{{route('home.hostels')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-home-modern fa-fw"></i><span class="hide-menu">Hostels</span></a></li>
                <li><a href="{{route('home.bookings')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-ticket-account fa-fw"></i><span class="hide-menu">Hostel Bookings</span></a></li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="panel panel-default">
        <div class="collapse in">
            <div class="panel-heading">Videos</div>
            <div class="panel-body">
                <div class="row">
                    @foreach($videos as $video)
                        <a href="{{url('home/videos/'.$video->id)}}" class="col-md-3 col-xs-6 col-sm-3 col-lg-2 m-b-0">
                            <div class="panel panel-default" style="height:12em;background:url('{{asset("admin/images.jpg")}}') no-repeat center center;">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <h3 style="color:#fff;">{{$video->name}}</h3>
                                    </div>
                                    <div class="panel-footer" style="background: transparent;height:1em;padding:1em;margin:1em;border:none;bottom:2.5em;right:0;position:absolute;color:#fff;">
                                        {{$video->created_at}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="pull-left">
                        <a class="fcbtn btn btn-outline btn-success btn-2c popup-with-form" href="#addvideosfrm">
                            <i class="mdi mdi-plus"></i>
                            Add
                        </a>
                    </div>
                    <div class="pull-right">
                        <a class="fcbtn btn btn-outline btn-primary btn-1c" href="{{route('home.videos')}}">More
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form itself -->
    <form id="addvideosfrm" class="mfp-hide white-popup-block" method="post" action="{{route('videos/add')}}" enctype="multipart/form-data">
        <h1>Add videos</h1>
        <div id="video_status"></div>
        <fieldset style="border:0;">
            {{csrf_field()}}
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control" name="category">
                  @foreach($videocategories as $cat)
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="visibility">Visibility</label>
              <select class="form-control" name="visibility">
                <option value="1">Public</option>
                <option value="2">Private</option>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
            </div>
            <div class="form-group">
                <label for="input-file-now">Attach Video file</label>
                <input type="file" id="video" name="video" accept="video/*" data-allowed-file-extensions="mp4 ogg webm" class="dropify"/>
            </div>
            <div id="video_progress" class="hidden">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
            </div>
            <button class="fcbtn btn btn-outline btn-success btn-1c pull-right">Submit</button>
        </fieldset>
    </form>

    <!-- Notes -->
    <div class="panel panel-default">
        <div class="collapse in">
            <div class="panel-heading">Notes</div>
            <div class="panel-body">
                <div class="row">
                    @foreach($notes as $note)
                        <a href="{{url('home/notes/'.$note->id)}}" class="col-md-3 col-xs-6 col-sm-3 col-lg-2 m-b-0">
                            <div class="panel panel-default" style="height:12em;background:url('{{asset("admin/doc.jpg")}}') no-repeat center center;">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <h3 style="color:#000;">{{$note->name}}</h3>
                                    </div>
                                    <div class="panel-footer" style="background: transparent;height:1em;padding:1em;margin:1em;border:none;bottom:2.5em;right:0;position:absolute;">
                                        {{$note->created_at}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="pull-left">
                        <a class="fcbtn btn btn-outline btn-success btn-2c popup-with-form" href="#addnotesfrm">
                            <i class="mdi mdi-plus"></i>
                            Add
                        </a>
                    </div>
                    <div class="pull-right">
                        <a class="fcbtn btn btn-outline btn-primary btn-1c" href="{{route('home.notes.more')}}">More
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form itself -->
    <form id="addnotesfrm" class="mfp-hide white-popup-block" method="post" action="{{route('videos/add')}}" enctype="multipart/form-data">
        <h1>Add Notes</h1>
        <div id="notes_status"></div>
        <fieldset style="border:0;">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category">
                    @foreach($notescat as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="visibility">Visibility</label>
                <select class="form-control" name="visibility">
                    <option value="1">Public</option>
                    <option value="2">Private</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
            </div>
            <div class="form-group">
                <label for="input-file-now">Attach Document</label>
                <input type="file" id="notes" name="notes" accept="text/*" data-allowed-file-extensions="pdf doc docx" class="dropify"/>
            </div>
            <div id="notes_progress" class="hidden">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
            </div>
            <button class="btn btn-primary">Submit</button>
        </fieldset>
    </form>

    <!-- Hostels -->
    <div class="panel panel-default">
        <div class="collapse in">
            <div class="panel-heading">Hostels</div>
            <div class="panel-body">
                <div class="row">
                    @foreach($hostels as $hostel)
                        <a href="{{url('home/hostel/'.$hostel->id)}}" class="col-md-3 col-xs-6 col-sm-3 col-lg-2 m-b-0">
                            <div class="panel panel-default" style="height:12em;background-image:url('{{'storage/'.$hostel->path}}');
                                    background-size:     cover;                      /* <------ */
                                    background-repeat:   no-repeat;
                                    background-position: center center; ">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <h3 style="color:#fff;">{{$hostel->name}}</h3>
                                    </div>
                                    <div class="panel-footer" style="background: transparent;height:1em;padding:1em;margin:1em;border:none;bottom:2.5em;right:0;position:absolute;color:#fff;">
                                        {{$hostel->created_at}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="pull-left">
                        <a class="fcbtn btn btn-outline btn-success btn-2c popup-with-form" href="#addhostelfrm">
                            <i class="mdi mdi-plus"></i>
                            Add
                        </a>
                    </div>
                    <div class="pull-right">
                        <a class="fcbtn btn btn-outline btn-primary btn-1c" href="{{route('home.hostels.more')}}">More
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- form itself -->
    <form id="addhostelfrm" class="mfp-hide white-popup-block" method="post" action="{{route('hostel/add')}}" enctype="multipart/form-data">
        <h1>Add hostel</h1>
        <div id="hostel_status"></div>
        <fieldset style="border:0;">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="Location">
            </div>
            <div class="form-group row">
                <label for="exactlocation">Exact Location</label>
                <hr>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="latitude" id="lat" placeholder="Latitude">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="longitude" id="long" placeholder="Longitude">
                </div>
                <div class="col-md-2">
                    <div data-toggle="modal" data-target="#map" class="btn btn-primary">Select from map</div>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="5" cols="50"></textarea>
            </div>
            <div class="form-group">
                <label for="input-file-now">Attach image</label>
                <input type="file" id="hostel" name="hostel" data-allowed-file-extensions="jpg png" class="dropify"/>
            </div>
            <div id="hostel_progress" class="hidden">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
            </div>
            <button class="fcbtn btn btn-outline btn-success btn-1c pull-right">Submit</button>
        </fieldset>
    </form>
    <div id="map" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Pick a location from map</h4> </div>
                <div class="modal-body">
                    <div id="map-container"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <!-- jQuery file upload -->
    <script src="{{asset('admin/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
    <script src="{{asset('admin/js/jquery.geocomplete.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKK9KxtPZOqdHSLjDQS69gk4jFe7zqxu4&libraries=places&language=en"></script>
    <script type="text/javascript">
        var map;
        var marker;
        var lat;
        var lon;
        var pos;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map-container'), {
                center: {lat: 6.397, lng: 30.644},
                zoom: 7
            });

            google.maps.event.addListener(map, 'click', function(event) {
                marker = new google.maps.Marker({
                    position: event.latLng,
                    map: map
                });

                google.maps.event.addListener(marker, 'click', function(event) {
                    pos=marker.getPosition();
                    lat=pos.lat();
                    lon=pos.lng();
                    $('#lat').val(lat);
                    $('#long').val(lon);
                });
            });
        }

        $('document').ready(function(){
            //initialise the map
            initMap();
            // Basic file upload
            $('.dropify').dropify();
            $('#addvideosfrm').submit(function(e){
                e.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url : 'videos/add',
                    type : 'POST',
                    dataType:'json',
                    data : formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    beforeSend:function(){
                        $('#video_progress').removeClass('hidden');
                        $('#video_status').html('<div class="alert alert-info text-center">Uploading ...</div>');
                    },
                    success : function(data) {
                        $('#video_progress').addClass('hidden');
                        if(data.status){
                            $('#video_status').html('<div class="alert alert-success text-center">Success</div>');
                        }else {
                            $('#video_status').html('<div class="alert alert-danger text-center">Failed</div>');
                        }
                    }
                });
            });
            $('#addnotesfrm').submit(function(e){
                e.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url : 'notes/add',
                    type : 'POST',
                    data : formData,
                    dataType:'json',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    beforeSend:function(){
                        $('#notes_progress').removeClass('hidden');
                        $('#notes_status').html('<div class="alert alert-info text-center">Uploading ...</div>');
                    },
                    success : function(data) {
                        $('#notes_progress').addClass('hidden');
                        if(data.status){
                            $('#notes_status').html('<div class="alert alert-success text-center">Success</div>');
                        }else {
                            $('#notes_status').html('<div class="alert alert-danger text-center">Failed</div>');
                        }
                    }
                });
            });
            $('#addhostelfrm').submit(function(e){
                e.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url : 'hostel/add',
                    type : 'POST',
                    data : formData,
                    dataType:'json',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    beforeSend:function(){
                        $('#hostel_progress').removeClass('hidden');
                        $('#hostel_status').html('<div class="alert alert-info text-center">Uploading ...</div>');
                    },
                    success : function(data) {
                        $('#hostel_progress').addClass('hidden');
                        if(data.status){
                            $('#hostel_status').html('<div class="alert alert-success text-center">Success</div>');
                        }else {
                            $('#hostel_status').html('<div class="alert alert-danger text-center">Failed</div>');
                        }
                    }
                });
            });
        });
    </script>
@endsection

@section('styles')

    <link rel="stylesheet" href="{{asset('admin/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
    <!-- Popup CSS -->
    <link href="{{asset('admin/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">
    <style>
        #map-container{
            height:400px;
        }
    </style>
@endsection
