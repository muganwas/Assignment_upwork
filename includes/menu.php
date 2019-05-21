<?php
	if(isset($_SESSION['user_assignment1'])){
		$loggedIn = true;
	}
	if(isset($_GET['logout'])){
		$main->logout();
		header("Location:".$_SERVER['PHP_SELF']);
	}
?>
<div class="topnav">
		<a href="index.php">Home</a>
		<a href="table.php">Books</a>
<?php if(isset($loggedIn)){?><a href="week5.php">Order</a><?php } ?>
		<a href="fdf.php">FAQ</a>
		<a href="Contact.php">Contact</a>
		<a href="Searchhhh.php" style="float:right">Search</a>
		<?php if(!isset($loggedIn)){ echo '<a href="authentication.php" style="float:right">Login</a>';}else{
			 echo '<a href="authentication.php?logout=true" style="float:right">Log Out</a>'; } ?>

</div>