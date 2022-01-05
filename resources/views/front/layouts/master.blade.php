<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/images/favicon.ico')}}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/color-01.css')}}">
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	@yield('stylesheet')
</head>
<body class="home-page home-01 ">
	
	@include('front.layouts.header')

	@yield('main')

	@include('front.layouts.footer')

	<script src="{{asset('front/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('front/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('front/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('front/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('front/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('front/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('front/js/functions.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	@yield('script')
</body>
</html>