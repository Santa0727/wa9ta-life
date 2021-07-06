<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  @includeIf('layouts.css')
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @yield('css')

  @livewireStyles

</head>

<body class="app sidebar-mini">
  <div class="page">

    <div class="page-main">


      @includeIf('layouts.sidebar')

      <!-- Mobile Header -->
      @includeIf('layouts.mobile')
      <!-- /Mobile Header -->

      <!--app-content open-->
      <div class="app-content">
        <div class="side-app">

          @includeIf('layouts.breadcrumb')
          @includeIf('layouts.msg')
          <div class="page-content">
            {{ $slot }}
          </div>

          @includeIf('layouts.footer')
        </div>
      </div>


    </div>
  </div>

  @stack('modals')

  @livewireScripts

  @includeIf('layouts.js')

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  @yield('js')

</body>

</html>