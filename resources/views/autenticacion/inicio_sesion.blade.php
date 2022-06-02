<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<meta name="author" content="">
	<!--
	<link rel="icon" href="{{asset('template/images/favicon.ico')}}">
	-->

    <title>App tareas - Login</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('template/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('template/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('template/css/skin_color.css')}}">	

</head>
	
<body class="hold-transition theme-primary bg-img">
	
	<div class="container h-p100" id="app-login">
		<app-login></app-login>
	</div>


	<!-- Vendor JS -->
	<script src="{{asset('template/js/vendors.min.js')}}"></script>
	<script src="{{asset('template/js/pages/chat-popup.js')}}"></script>
	<script src="{{asset('template/assets/vendor_components/apexcharts-bundle/dist/apexcharts.min.js')}}"></script>
	<script src="{{asset('template/assets/icons/feather-icons/feather.min.js	')}}"></script>	
	
	<!-- Vue App Login -->
	<script src="{{mix('js/app-login.js')}}"></script>

</body>
</html>
