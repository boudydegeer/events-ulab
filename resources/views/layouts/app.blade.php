<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Ulab • @yield('title') </title>

	<!-- Fonts -->
	<link
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"
		rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"
	      rel='stylesheet' type='text/css'>

	<!-- Styles -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	      rel="stylesheet">
	<link href="{{ elixir('css/app.css') }}" rel="stylesheet">

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
		// This identifies your website in the createToken call below
		Stripe.setPublishableKey('{{ env('STRIPE_PUBLIC') }}');
	</script>
</head>
<body id="app-layout">

@section('navbar')
	@include('layouts.components.navbar')
@show

@yield('content')

	<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
