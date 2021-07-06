<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- External CSS libraries -->
  <link type="text/css" rel="stylesheet" href="{{ asset('plugin/css/bootstrap.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('plugin/fonts/font-awesome/css/font-awesome.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('plugin/fonts/flaticon/font/flaticon.css') }}">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">

</head>

<body>
  <div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
  </div>


  <!-- External JS libraries -->
  <script src="{{ asset('plugin/js/jquery-2.2.0.min.js') }}"></script>
  <script src="{{ asset('plugin/js/popper.min.js') }}"></script>
  <script src="{{ asset('plugin/js/bootstrap.min.js') }}"></script>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>