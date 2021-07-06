<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

@php
$selctor = 'ltr';
if (app()->getLocale() == 'ar') {
$selctor = 'rtl';
}
@endphp

<!-- JQUERY JS -->
<script src="{{ asset("plugin/dashboard/". $selctor ."/js/jquery-3.4.1.min.js") }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/bootstrap/js/popper.min.js") }}"></script>

<!-- CUSTOM SCROLLBAR -->
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js") }}">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.25.1/moment.min.js"></script>

<!-- SIDE-MENU -->
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/sidemenu/sidemenu.js") }}"></script>

<!-- SIDEBAR JS -->
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/sidebar/sidebar.js") }}"></script>

<!-- DATA TABLE JS-->
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/datatable/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/datatable/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/datatable/datatable.js") }}"></script>
<script src="{{ asset("plugin/dashboard/". $selctor ."/plugins/datatable/dataTables.responsive.min.js") }}"></script>
<!--  -->

<!--CUSTOM JS -->
<script src="{{ asset("plugin/dashboard/". $selctor ."/js/custom.js") }}"></script>


<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script> -->
<script src="{{ asset("plugin/js/toastr.min.js") }}"></script>

<script src="{{ asset("plugin/nprogress-master/nprogress.js") }}"></script>
<script src="{{ asset("plugin/js/jquery.form.min.js") }}"></script>
<script src="{{ asset("plugin/js/intro.js") }}"></script>
<script src="{{ asset("plugin/js/master.js") }}"></script>