<?php
	require('includes/functions.php');
	$main = new assignment_19;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="./css/style1.css">
	<style>
		table {
			width: 100;
			padding-left: 300px;
		}
	</style>
</head>

<body>

	<div class="header">
		<h1>JACK AND JESS</h1>

	</div>

	<?php include('includes/menu.php') ?>

	<?php $main->fetch_books(); ?>

	<div class="footer">
		<h2> © Copyright 2019 KESHAB CHALISE | All Rights Reserved</h2>
	</div>
</body>

</html>