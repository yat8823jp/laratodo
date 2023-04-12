<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ToDo App</title>
	@yield('styles')
	@vite( [ 'resources/scss/app.scss', 'resources/js/app.js' ] )
</head>
<body>
	<header>
		<nav class="my-navbar">
			<a class="my-navbar-brand" href="/">ToDo App</a>
		</nav>
	</header>
	<main>
		@yield('content')
	</main>
	@yield('scripts')
</body>
</html>
