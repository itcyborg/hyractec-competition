@extends('layouts.dash')

@section('sidebar')
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3>
                    <span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span>
                    <span class="hide-menu">Navigation</span>
                </h3>
            </div>
            <ul class="nav" id="side-menu">
                <li><a href="{{route('home')}}" class="waves-effect"><i data-icon="7"
                                                                        class="mdi mdi-apps fa-fw"></i><span
                                class="hide-menu">Home</span></a></li>
                <li><a href="{{route('home.videos')}}" class="waves-effect"><i data-icon="7"
                                                                               class="mdi mdi-video fa-fw"></i><span
                                class="hide-menu">Videos</span></a></li>
                <li><a href="{{route('home.notes')}}" class="waves-effect"><i data-icon="7"
                                                                              class="mdi mdi-file-multiple fa-fw"></i><span
                                class="hide-menu">Notes</span></a></li>
                <li><a href="{{route('home.hostels')}}" class="waves-effect"><i data-icon="7"
                                                                                class="mdi mdi-home-modern fa-fw"></i><span
                                class="hide-menu">Hostels</span></a></li>
                <li><a href="{{route('home.bookings')}}" class="waves-effect active"><i data-icon="7"
                                                                                        class="mdi mdi-ticket-account fa-fw"></i><span
                                class="hide-menu">Hostel Bookings</span></a></li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
@endsection

@section('content')
    <div class="white-box">
        <div class="container-fluid">
            <div class="table-responsive manage-table">
                <table class="table" cellspacing="14">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th width="150">NAME</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Hostel ID</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bookings as $booking)
                        <tr class="advance-table-row">
                            <td>{{$booking->id}}</td>
                            <td>{{$booking->name}}</td>
                            <td>{{$booking->email}}</td>
                            <td>{{$booking->contact}}</td>
                            <td>{{$booking->hostel_id}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i
                                            class="ti-comment"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i
                                            class="ti-email"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
