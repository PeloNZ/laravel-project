<!doctype html>
<html>
<head>
<title>About</title>
</head>
<body>
	<h1>>The about page</h1>
	<p>Hi <?php echo $name ?></p>
	<ul>
		@foreach ($tasks as $task)
		<li>{{ $task->body }}</li> @endforeach
	</ul>
</body>
</html>