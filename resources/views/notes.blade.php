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
                <li><a href="#" class="waves-effect active"><i data-icon="7" class="mdi mdi-file-multiple fa-fw"></i><span class="hide-menu">Notes</span></a></li>
                <li><a href="{{route('home.hostels')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-home-modern fa-fw"></i><span class="hide-menu">Hostels</span></a></li>
                <li><a href="{{route('home.bookings')}}" class="waves-effect"><i data-icon="7" class="mdi mdi-ticket-account fa-fw"></i><span class="hide-menu">Hostel Bookings</span></a></li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
@endsection

@section('content')
    <div class="white-box">
        <div class="container-fluid">
            <div class="row">
                <h2 class="title pull-left">Notes</h2>
                <span class="pull-right"><a href="#addnotesfrm" class="fcbtn btn btn-outline btn-success btn-2c popup-with-form"><i class="mdi mdi-plus-circle-outline"></i> Add</a></span>
            </div>
            <hr>
            @foreach($notes as $note)
                <a href="{{url('home/notes/'.$note->id)}}" class="col-md-3 col-xs-6 col-sm-3 col-lg-3 m-b-0">
                    <div class="panel panel-default" style="height:12em;background:url('{{asset("admin/doc.jpg")}}') no-repeat center center;">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <h3 style="color:#000;">{{$note->name}}</h3>
                            </div>
                            <div class="panel-footer" style="background: transparent;height:1em;padding:1em;margin:1em;border:none;bottom:2.5em;right:0;position:absolute;color:#000;">
                                {{$note->created_at}}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <form id="addnotesfrm" class="mfp-hide white-popup-block" method="post" action="{{route('notes/add')}}" enctype="multipart/form-data">
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
@endsection


@section('styles')

    <link rel="stylesheet" href="{{asset('admin/plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
    <!-- Popup CSS -->
    <link href="{{asset('admin/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">
@endsection


@section('scripts')

    <!-- jQuery file upload -->
    <script src="{{asset('admin/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
    <script type="text/javascript">
        $('document').ready(function(){
            // Basic file upload
            $('.dropify').dropify();
            $('#addnotesfrm').submit(function(e){
                e.preventDefault();
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url : '{{url("notes/add")}}',
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
        });
    </script>
@endsection
