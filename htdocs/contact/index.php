<!DOCTYPE html>
<html>
<head>
	<title>Contact Page</title>
	<style>
	 h1 { font-size: 50px; display:inline-block;}
	 body { font: 20px Helvetica, sans-serif; color: #333; }
	 p { font-size:14px;}
	 ul { display:inline-block;}
	 li { list-style-type:none;display:inline-block; padding:10px;}
	 a { text-decoration:none; color:#ff0000;}
	 article { margin-right:10%;}
	 form {margin-left:40px; margin-top:20px;}
	 input {display:block; margin:10px;}
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
			<li><a href="../">Home</a></li>
			<li><a href="#">Articles</a></li>
			<li><a href="#">Videos</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</header>
	<div class="main-body">
		<form class="sample-form" method="POST" action="#">
			<p>Name</p>
			<input type="text" class="textinput name">
			<p>Email</p>
			<input type="text" class="textinput email">
			<p>Message</p>
			<textarea class="areainput" cols=20 rows=5></textarea>
			<input type="submit" class="submitform button">
		</form>
	</div>
</body>
</html>
