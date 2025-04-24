<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- ================== BEGIN core-css ================== -->
	<link href="{{URL::to('/') }}/src/css/vendor.min.css" rel="stylesheet">
	<link href="{{URL::to('/') }}/src/css/app.min.css" rel="stylesheet">
	<!-- ================== END core-css ================== -->
	
	<!-- ================== Begin page-css ================== -->
	<link href="{{URL::to('/') }}/src/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">
	<link href="{{URL::to('/') }}/src/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<link href="{{URL::to('/') }}/src/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet">
	<link href="{{URL::to('/') }}/src/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet">
	<!-- ================== END page-css ================== -->
</head>
<body>
	<div id="app" class="app">
        @include('layouts.main.navigation')
        @yield('content')
	</div>
	<!-- ================== Begin core-js ================== -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>	
	<script src="{{URL::to('/') }}/src/js/vendor.min.js"></script>
	<script src="{{URL::to('/') }}/src/js/app.min.js"></script>
	<!-- ================== END core-js ================== -->
	
	<!-- ================== BEGIN page-js ================== -->
	<script src="{{URL::to('/') }}/src/plugins/apexcharts/dist/apexcharts.min.js"></script>
	<script src="{{URL::to('/') }}/src/js/demo/dashboard.demo.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/summernote/dist/summernote-lite.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net/js/dataTables.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
	<script src="{{URL::to('/') }}/src/plugins/bootstrap-table/dist/bootstrap-table.min.js"></script>
	<script src="{{URL::to('/') }}/src/js/demo/table-plugins.demo.js"></script>
	<script>
		$(document).ready(function () {
			$('#summernote').summernote({
				height: 300
			});
		});
	</script>
	<!-- ================== END page-js ================== -->
</body>
</html>