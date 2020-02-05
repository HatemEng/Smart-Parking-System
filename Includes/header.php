<?php error_reporting(0); session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Smart Parking System">
	  <meta name="keywords" content="web design, affordable web design, professional web design">
	<title>Smart Parking System</title>
	<link rel="stylesheet" type="text/css" href="includes/css/style_2.css?4">
	<link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="includes/css/drawingStyle.css">
</head>
<body>
<header>
  <div class="container">
	<div id="branding">Smart <span class="highlight-style">Parking System</span></div>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="services.php">Services</a></li>
			<?php if ($_SESSION['Username']) {
					echo "<li><a href='includes/logout.php'>Log Out</a></li>";
				} ?>

		</ul>	
	</nav>
  </div>	
</header>