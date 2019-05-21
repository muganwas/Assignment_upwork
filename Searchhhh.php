<?php
require('includes/functions.php');
$main = new assignment_19;

if(isset($_POST['serial']) || isset($_POST['title'])){
	$serial = $_POST['serial'];
	$title = $_POST['title'];
	if($serial != null && $title != null){
		//echo $serial;
		//echo $title;
	}elseif($serial != null || $title != null){
		if($serial != null){

		}else{

		}
	}else{
		$feedback = "Please fill in one of the fields";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="./css/style1.css">
</head>
<title> Asignment </title>

<body>
	<div class="header">
		<h1>JJ BOOKS</h1>
	</div>

	<?php include('includes/menu.php') ?>
	
	<fieldset>
		<legend> Search here</legend>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<?php if(isset($feedback)){ echo '<div class="feedback">'.$feedback.'</div>'; } ?>
			<div class="row">
				<div class="card1">
					<label for="serial">Serial Number</label>
					<input type="text" id="serial" name="serial" value="<?php if(isset($_POST['serial']))echo $_POST['serial']; ?>" placeholder="Serial Number..">
					<label for="title">Title</label>
					<input type="text" id="title" name="title" value="<?php if(isset($_POST['serial']))echo $_POST['title']; ?>" placeholder="Title of the book">
				</div>
			</div>
				<div class="card2">
					<input type="submit" value="Search">
				</div>
		</form>
	</fieldset>
	<div class = "results">
		<?php 
			if(isset($serial) || isset($title)){
				if($serial != null){
					$main->search_books($serial);
				}else{
					$main->search_books($title);
				}
			}
		?>
	</div>
	<div class="footer">
		<h2> © Copyright 2019 KESHAB CHALISE | All Rights Reserved</h2>
	</div>
</body>
</html>