<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<style>
	 h1 { font-size: 50px; display:inline-block;}
	 body { font: 20px Helvetica, sans-serif; color: #333; }
	 p { font-size:14px;}
	 ul { display:inline-block;}
	 li { list-style-type:none;display:inline-block; padding:10px;}
	 a { text-decoration:none; color:#ff0000;}
	 article { margin-right:10%};
	</style>
</head>
<body>
	<?php
		include('C:\xampp\htdocs_resources\manage_site.php');
		if($underMaintenance){
			header('Location: http://localhost/undermaintenance');
		}
	?>

	<header>
		<h1>Online Blog</h1>
		<ul class="sample-nav">
			<li><a href="#">Home</a></li>
			<li><a href="#">Articles</a></li>
			<li><a href="#">Videos</a></li>
			<li><a href="contact">Contact</a></li>
		</ul>
	</header>

	<div class="main-body">
		<article>
			<h3>New Youtube Channel!</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent magna tellus, tincidunt fermentum velit ut, ultrices varius velit. Integer eu turpis id purus malesuada feugiat. Nullam tincidunt finibus gravida. Etiam non dui pretium, auctor nunc at, venenatis sem. Aliquam pharetra risus sed nisi eleifend, at ultrices augue mollis. In enim nunc, rutrum volutpat gravida in, imperdiet ut ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum erat, egestas ac euismod a, mattis ut nisi. Curabitur eleifend at leo sed maximus.</p>
		</article>
	</div>
</body>
</html>
