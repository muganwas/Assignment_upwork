<?php
require('includes/functions.php');
$main = new assignment_19;

if(isset($_POST['name']) && isset($_POST['state']) && isset($_POST['message'])){
	$name = $_POST['name'];
	$state = $_POST['state'];
	$message = $_POST['message'];
	if($name == null || $state == null || $message == null){
		$feedback = '<div class="feedback">Please fill all fields.</div>'; 
	}else{
		$feedback1 = $main->submitContactForm($name, $state, $message);
	}
}
?>
<!DOCTYPE HTML>

<head>
	<html>
	<link rel="stylesheet" type="text/css" href="./css/style1.css">
</head>

<body>
	<div class="header">
		<h1>JACK AND JESS</h1>

	</div>

	<?php include('includes/menu.php') ?>
	
	<?php if(!isset($feedback1)) { ?>
	<div class="tableContainer">
		<h3> Contact Us </h3>
		<?php if(isset($feedback)){ echo $feedback;} ?>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="row">
				<div class="card1">

					<label for="Name">Full Name</label>
					<input type="text" id="name" name="name" placeholder="Full Name">
					<label for="country">Country</label>
					<select id="state" name="state">
						<option value="AUS">AUS</option>
						<option value="US">US</option>
						<option value="NZ">NZ</option>
						<option value="NP">NP</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="card2">
					<label for="message">Send Us feedback:</label>
					<textarea id="message" name="message" placeholder="Send us feedback.." style="height:300px"></textarea>

					<input type="submit" value="Submit">

					<h3> WHERE ARE WE </h3>
					Address:465 Mount Cooper Drive, VIC <br>
					Phone Number: +61452241699 <br>
					E-mail: thisshitfuckedup@gmail.com
				</div>
			</div>
		</form>
	</div>
	<?php }else{ echo $feedback1; } ?>

	<div class="footer">
		<h2> © Copyright 2019 KESHAB CHALISE | All Rights Reserved</h2>
	</div>
</body>

</html>