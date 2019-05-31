<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DevConnect</title>
    <!-- core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.transitions.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->

</head><!--/head-->

<body id="home" class="homepage">

<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top top-nav-collapse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll active"><a href="#home">Home </a></li>
                    <li class="scroll">
                        <a href="#services">Services
                        </a>
                    </li>
                    <li class="scroll"><a href="#get-in-touch">Contact</a></li>
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{route('home')}}">Dashboard</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    @endguest
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->

<section id="main-slider">
    <div class="owl-carousel">
        <div class="item" style="background-image: url({{asset('assets/images/bg1.jpg')}});">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="carousel-content">
                                <h2>DevConnect</h2>
                                <p>We Connect<br>
                                    We develop Together
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url({{asset('assets/images/bg2.jpg')}});">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="carousel-content">
                                <h2>Find and share what you Need</h2>
                                <p>Find and share videos, documents<br>
                                   and book hostels</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
    </div><!--/.owl-carousel-->
</section><!--/#main-slider-->


<section id="services">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Our Services</h2>
        </div>

        <div class="row">
            <div class="features">
                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <img src="{{asset('admin/images.jpg')}}" class="img img-circle" style="width:250px;height:250px;" alt="img">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Videos</h4>
                            <p>Share Videos and tutorials with others.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->

                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <img src="{{asset('admin/hostel.jpg')}}" class="img img-circle" style="width:250px;height:250px;" alt="img">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Hostels</h4>
                            <p>Let students find and book your hostels easily with integrations to google maps.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->

                <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                    <div class="media service-box">
                        <div class="pull-left">
                            <img src="{{asset('admin/doc.jpg')}}" class="img img-circle" style="width:250px;height:250px;" alt="img">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Documents</h4>
                            <p>Whether it's notes, ebooks, novels or any document, share to the world of students and improve your knowledge.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#services-->

<section id="animated-number">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown"></h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row text-center">
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                    <div class="animated-number" data-digit="{{DB::table('videos')->count()}}" data-duration="1000"></div>
                    <strong>Videos</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                    <div class="animated-number" data-digit="{{DB::table('notes')->count()}}" data-duration="1000"></div>
                    <strong>Documents and notes</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                    <div class="animated-number" data-digit="{{DB::table('hostels')->count()}}" data-duration="1000"></div>
                    <strong>Hostels</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                    <div class="animated-number" data-digit="{{DB::table('users')->count()}}" data-duration="1000"></div>
                    <strong>Users</strong>
                </div>
            </div>
        </div>
    </div>
</section><!--/#animated-number-->

<!--/#blog-->

<section id="get-in-touch">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">CONTACT US</h2>
            <p class="text-center wow fadeInDown">Leave a message and we'll get back to you<br></p>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="address">
                    <h4>Address</h4>
                    <p>5023-30100<br>
                        Eldoret, Kenya</p>
                </div>

                <div class="address">
                    <h4>Phone </h4>
                    <p><a href="tel:+254706928631">+254 706 928 631</a></p>
                </div>

                <div class="address">
                    <h4>Email</h4>
                    <p><a href="mailto:devconnect@safemoon.com">devconnect@safemoon.com </a></p>
                </div>

                <div class="address">
                    <h4>Follow Us</h4>
                    <p><a href="#"><i class="fa fa-facebook"></i></a> &nbsp; <a href="#"><i
                                    class="fa fa-twitter"></i></a> &nbsp; <a href="#"><i class="fa fa-google-plus"></i></a>
                    </p>
                </div>
            </div>

            <div class="col-sm-6">

                <form action="{{url('contact/message')}}" method="post" name="contact-form" id="main-contact-form">
                    <input type="text" value="{{csrf_token()}}" name="_token" id="_token" hidden>
                    <div class="form-group">
                        <input type="text" required placeholder="Name" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <input type="email" required placeholder="Email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <input type="text" required placeholder="Subject" class="form-control" name="subject" id="subject">
                    </div>
                    <div class="form-group">
                        <textarea required placeholder="Message" rows="8" class="form-control" name="message" id="message"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</section><!--/#get-in-touch-->


<footer id="footer">
    <div class="container text-center">
        All rights reserved © 2017 | <a href="https://www.safemoon.com">DevConnect</a>
    </div>
</footer><!--/#footer-->

<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/mousescroll.js')}}"></script>
<script src="{{asset('assets/js/smoothscroll.js')}}"></script>
<script src="{{asset('assets/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('assets/js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.inview.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/scrolling-nav.js')}}"></script>
<!-- Start of Async Drift Code -->
<script>
    !function () {
        var t;
        if (t = window.driftt = window.drift = window.driftt || [], !t.init) return t.invoked ? void (window.console && console.error && console.error("Drift snippet included twice.")) : (t.invoked = !0,
            t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on"],
            t.factory = function (e) {
                return function () {
                    var n;
                    return n = Array.prototype.slice.call(arguments), n.unshift(e), t.push(n), t;
                };
            }, t.methods.forEach(function (e) {
            t[e] = t.factory(e);
        }), t.load = function (t) {
            var e, n, o, i;
            e = 3e5, i = Math.ceil(new Date() / e) * e, o = document.createElement("script"),
                o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + i + "/" + t + ".js",
                n = document.getElementsByTagName("script")[0], n.parentNode.insertBefore(o, n);
        });
    }();
    drift.SNIPPET_VERSION = '0.3.1';
    drift.load('dbzs4kxxra8p');
</script>
</body>
</html>