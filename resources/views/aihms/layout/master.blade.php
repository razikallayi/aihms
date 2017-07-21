<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="manifest" href="{{ url('manifest.json')}}">
<!-- Add to home screen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="AIHMS Homoeopathy">
<link rel="apple-touch-icon" href="{{ url('images/icons/icon-152x152.png')}}">
<meta name="msapplication-TileImage" content="{{ url('images/icons/icon-144x144.png')}}">
<meta name="msapplication-TileColor" content="#0275d8">

<title>AIHMS Homoeopathy Multispeciality Clinics</title>
@section('styles')
<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ url('aihms/bootstrap/bootstrap.min.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ url('aihms/css/stylesheet.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ url('aihms/css/font-awesome.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ url('aihms/css/bootsnav.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ url('aihms/css/settings.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ url('aihms/css/aos.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ url('aihms/css/main.css')}}" media="all">
<!-- Favicon-->
  <link rel="icon" href="{{url('md/favicon.ico')}}" type="image/x-icon">

<link rel="stylesheet" href="{{ url('aihms/css/jquery.fancybox.css?v=2.1.5')}}"  media="all" />

<script src="{{('aihms/js/jquery-2.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{('aihms/js/bootstrap.min.js')}}" type="text/javascript"></script>
@show
</head>

<body>

@include('google-analytics')

  <!-- <div id="preloader">
    <div id="status">&nbsp;</div>
  </div> -->
<div id="search">
  <form>
  <input class="search_field" type="text" name="Search" placeholder="search" autofocus><br>
</form>
</div>

<header>
   <div class="page-header">
      <div class="container">
         <div class="col-md-12 no-padding ">
            <div class="social-top col-centered-xs">
               <ul class="list-unstyled">

                  <li><a target="_blank" href="https://www.facebook.com/AIHMSHomeopathymultispecialityclinics/"><i class="fa fa-facebook"></i></a></li>
                  <li><a target="_blank"  href="https://twitter.com/AihmsHomeopathy"><i class="fa fa-twitter"></i></a></li>
                  <li><a target="_blank"  href="#"><i class="fa fa-linkedin"></i></a></li>
               </ul>
            </div>

            <div class="top-rgt col-centered-xs">
               <ul>
                  <li><a href="mailto:aihhms@gmail.com"> <i class="fa fa-envelope-open-o"></i>aihhms@gmail.com</a></li>
                  <li> <i class="fa fa-clock-o"></i> Working Hours: 9.00 am to 7.00 pm  </li>
               </ul>
            </div>

         </div>
      </div>
   </div>

</header>

<div class="top-sec">
  <div class="container">
     <div class="col-md-12 no-padding">
        <nav class="navbar bootsnav">


        <div class="attr-nav">
            <ul>
                <li id="search_icon"><a href="#" class="search"  value="Dropdown" data-jq-dropdown="#jq-dropdown-2"><img src="{{url('aihms/images/search.png')}}"></a></li>
                <li id="contact_icon"><a href="#" class="call"  value="Dropdown" data-jq-dropdown="#jq-dropdown-1"><img src="{{url('aihms/images/call.png')}}"></a>
                </li>
            </ul>
        </div>


        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('aihms/images/aihms-logo.png')}}" class="logo" alt=""></a>
        </div>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('about')}}" data-hover="ABOUT US">ABOUT US</a></li>
                    <li><a href="{{url('clinics')}}" data-hover="CLINICS"> CLINICS</a></li>
                    <li><a href="{{url('gallery')}}" data-hover="GALLERY">GALLERY </a></li>
                    <li><a href="{{url('doctors')}}" data-hover="DOCTORS">DOCTORS </a></li>
                    <li><a href="{{url('career')}}" data-hover="CAREER">CAREER </a></li>
                    <li><a href="{{url('contact')}}" data-hover="CONTACT US">CONTACT US </a></li>
                </ul>
          </div>
</nav>
</div>


@yield('content')


@include('aihms.layout.partials.footer')

@section('scripts')

<script src="{{ url('aihms/js/bootsnav.js')}}"></script>
<script src="{{ url('aihms/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ url('aihms/js/jquery.themepunch.revolution.min.js')}}"></script>
<script>
	var revapi;
	jQuery(document).ready(function() {
		   revapi = jQuery('.tp-banner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:509,
				hideThumbs:10
			});
	});
</script>

<script type="text/javascript" src="{{url('aihms/js/jquery.fancybox.pack.js?v=2.1.5')}}"></script>
<script>
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

<script>
$( ".search" ).click(function() {
  $( "#search" ).slideToggle( "fast" );
});
</script>
<script>
wrapper = $('.tabs');
tabs = wrapper.find('.tab');
tabToggle = wrapper.find('.tab-toggle');
function openTab() {
    var content = $(this).parent().next('.content'), activeItems = wrapper.find('.active');
    if (!$(this).hasClass('active')) {
        $(this).add(content).add(activeItems).toggleClass('active');
        wrapper.css('min-height', content.outerHeight());
    }
}
;
tabToggle.on('click', openTab);
$(window).load(function () {
    tabToggle.first().trigger('click');
});
</script>

<script src="{{url('aihms/js/jquery.nice-select.min.js')}}"></script>
<script>
$(document).ready(function() {
  $('select:not(.ignore)').niceSelect();
});
</script>
<script src="{{url('aihms/js/aos.js')}}"></script>
<script>
  AOS.init({
	easing: 'ease-in-out-sine'
  });
</script>


<script>
$(function() {
     var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
     $("#navbar-menu ul li a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $($(this)).addClass("active");
     })

});
</script>

<script type="text/javascript">

(function() {
  'use strict';

    // TODO add service worker code here
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker
             .register('{{url("service-worker.js")}}')
             .then(function(registration) { console.log('Service Worker Registered'); });
  }
})();

</script>
@show
</body>
</html>
