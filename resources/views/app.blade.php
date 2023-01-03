<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport"
	      content="width=device-width, initial-scale=1"
	>

	<title inertia>{{ config('app.name', 'Wonderland Picnics') }}</title>

	<!-- Fonts -->
	<link
		rel="preconnect"
		href="https://fonts.googleapis.com"
	/>
	<link
		rel="preconnect"
		href="https://fonts.gstatic.com"
		crossorigin
	/>
	<link
		href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;700&display=swap"
		rel="stylesheet"
	/>

	<!-- Scripts -->
	@routes
	@vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
	@inertiaHead
</head>

<body>
	@inertia
</body>

</html>