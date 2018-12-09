<!DOCTYPE html>
<html lang="en">
	@include('backend.masterpage.head')
<body>
	@include('backend.masterpage.header')

	<!-- BEGIN CONTENT -->
	@yield('content')
	<!-- END CONTENT -->

	@include('backend.masterpage.footer')
</body>
</html>
