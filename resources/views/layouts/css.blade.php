<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="Latest updates and statistic charts">
<link rel="shortcut icon" href="">
<title>
  @yield('title')</title>
<!-- BOOTSTRAP CSS -->

@php
$selctor = 'ltr';
if (app()->getLocale() == 'ar') {
$selctor = 'rtl';
}
@endphp

<!-- STYLE CSS -->
<link href="{{ asset("plugin/dashboard/". $selctor ."/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css
">
<!-- STYLE CSS -->
<link href="{{ asset("plugin/dashboard/". $selctor ."/css/style.css") }}" rel="stylesheet" />
<link href="{{ asset("plugin/dashboard/". $selctor ."/css/skin-modes.css") }}" rel="stylesheet" />

<!-- SIDE-MENU CSS -->
<link href="{{ asset("plugin/dashboard/". $selctor ."/plugins/sidemenu/sidemenu.css") }}" rel="stylesheet">

<!-- CUSTOM SCROLL BAR CSS-->
<link href="{{ asset("plugin/dashboard/". $selctor ."/plugins/scroll-bar/jquery.mCustomScrollbar.css") }}"
  rel="stylesheet" />

<!--SWEET ALERT CSS-->
<link href="{{ asset("plugin/dashboard/". $selctor ."/plugins/sweet-alert/sweetalert.css") }}" rel="stylesheet" />

<!--- FONT-ICONS CSS -->
<link href="{{ asset("plugin/dashboard/". $selctor ."/css/icons.css") }}" rel="stylesheet" />

<!-- SIDEBAR CSS -->
<link href="{{ asset("plugin/dashboard/". $selctor ."/plugins/sidebar/sidebar.css") }}" rel="stylesheet">

<!-- COLOR SKIN CSS -->
<link id="theme" rel="stylesheet" type="text/css" media="all"
  href="{{ asset("plugin/dashboard/". $selctor ."/colors/color1.css") }}" />


<link rel="stylesheet" href="{{ asset('plugin/css/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/nprogress-master/nprogress.css') }}" />
<link rel="stylesheet" href="{{ asset('plugin/css/introjs.css') }}" />