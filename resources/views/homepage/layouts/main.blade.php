<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Landing Page - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('homepage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('homepage/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('homepage/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('homepage/css/landing-page.min.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  @include('homepage.includes.navbar')

  @yield('content')

  <!-- Footer -->
  @include('homepage.includes.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('homepage/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
