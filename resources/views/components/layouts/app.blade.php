<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="{{ asset('./assets/img/favicon.png') }}">
	<title>{{ $siteTitle .' -' . $siteDescription ?? '' }}</title>

	<!-- Core CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
		integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Development -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <!-- Production -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" integrity="sha512-w7ozifyaPV5z7iYP1t1QupBme93n54u/vU25d2rP1ne+kxyW/C73JE5s1v8vZldCV7zIAqNF6iG2W/qIhlrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    @vite('resources/css/app.css')
</head>

<body>
	<!-- App Start-->
	<div id="root">
		<!-- App Layout-->
		<div class="app-layout-modern flex flex-auto flex-col">
			<div class="flex flex-auto min-w-0">
				<x-sidebar />

				<!-- Header Nav start-->
				<div
					class="flex flex-col flex-auto min-h-screen min-w-0 relative w-full bg-amber-50 border-l border-gray-200">

					<x-top-bar />
					<div>
						<div class="h-full flex flex-auto flex-col justify-between">
							{{ $slot }}

							<x-footer />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    {{-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> --}}
    {{-- <script src="https://unpkg.com/leaflet/dist/leaflet.js" integrity="sha512-cG6bE0rQhOLgR1i78v5zQkF441ztMy5v5A9HrP080g2l4n3Yd9Y81r6kYv49z0dN7z6awpEn+z6Q2vA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
	<!-- Core Vendors JS -->
	<script src="{{asset('assets/js/vendors.min.js')}}"></script>

	<!-- Other Vendors JS -->
	<script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>

	<!-- Page js -->
	<script src="{{asset('assets/js/pages/project-dashboard.js')}}"></script>

	@stack('datatables-scripts')

	<!-- Core JS -->
	<script src="{{asset('assets/js/app.min.js')}}"></script>





</body>

</html>
