<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
</head>
<body>
	<div class="container">
		<h1>Home page</h1>
		<ul>
		<?php foreach ($records as $row) : ?>
			<li><?php echo $row->title; ?></li>
		<?php endforeach; ?>
		</ul>
	</div>

</body>
</html>