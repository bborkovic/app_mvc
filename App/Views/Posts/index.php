<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<h1>Welcome</h1>
	<p>Hello from View!</p>

	<ul>
		<?php foreach ($posts as $post) : ?>
			<li><?php echo $post->details; ?></li>
		<?php endforeach; ?>
	</ul>

</body>
</html>