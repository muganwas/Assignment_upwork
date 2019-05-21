<?php
require('includes/functions.php');
$main = new assignment_19;

if(
  isset($_POST['bId']) && 
  isset($_POST['name']) && 
  isset($_POST['email']) && 
  isset($_POST['address']) && 
  isset($_POST['state']) && 
  isset($_POST['city']) && 
  isset($_POST['zip']) && 
  isset($_POST['number']) 
  ){
	$bookId = $_POST['bId'];
	$name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
	$state = $_POST['state'];
  $city = $_POST['city'];
  $postalCode = $_POST['zip'];
  $contact = $_POST['number'];
	if($bookId == null || $name == null || $contact == null || $email == null || $address == null || $city == null || $state == null ||  $postalCode == null){
		$feedback = '<div class="feedback">Please fill all fields.</div>'; 
	}else{
		$feedback1 = $main->submitBookOrder($bookId, $name, $contact, $email, $address, $city, $state, $postalCode);
	}
}
?>
<!DOCTYPE HTML>

<head>
  <html>
  <link rel="stylesheet" type="text/css" href="./css/style1.css">
</head>

<body>

<script src='./javascript/validate.js'></script>
  <div class="header">
    <h1>JACK AND JESS</h1>

  </div>

  <?php include('includes/menu.php') ?>

  <div class="row tableContainer">
    <div class="card1">
      <?php if(isset($feedback)){ echo $feedback; } ?>
      <?php if(!isset($feedback1)){?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="col-50">
        
        <h3>Order Detials</h3>
        
        <label for="bId">Book Id</label>
        <input type="text" id="bId" name="bId" value="<?php if(isset($_POST['bId']))echo $_POST['bId'] ?>" placeholder="ID">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Keshab Chalise">
        <label for="Contact number">Contact number<label>
            <input type="text" id="number" name="number" placeholder="0456656521">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="kesh@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="24 Boadle road">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Kathmandu">

            <div class="row">

              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Bagmati">
              </div>
              <div class="col-50">
                <label for="zip">Postal Code</label>
                <input type="text" id="zip" name="zip" placeholder="2056">
              </div>
            </div>
      </div>

      <div class="col-50">
        <div class="card2">
          <h3>Payment</h3>
          <label for="cname">Name on Card</label>
          <input type="text" id="cname" name="cardname" placeholder="Keshab">
          <label for="ccnum">Credit card number</label>
          <input type="text" id="ccnum" name="cardnumber" placeholder="5555-6666-7777-8888">
          <label for="expmonth">Exp Month</label>
          <input type="text" id="expmonth" name="expmonth" placeholder="November">
          <div class="row">
            <div class="col-50">
              <label for="expyear">Exp Year</label>
              <input type="text" id="expyear" name="expyear" placeholder="2021">
            </div>
            <div class="col-50">
              <label for="cvv">CVV</label>
              <input type="number" id="cvv" name="cvv" placeholder="252">
            </div>
            
          </div>
          <input type="submit" id="submit" value="Submit">
        </div>
        
      </div>
      <div id="feedback" class="feedback" style="text-align:center"></div>
      </form>
      <?php }else{
        echo $feedback1.' <div class="linkContainer"><a href="'.$_SERVER['PHP_SELF'].'">Order another Book</a><div>';
      } ?>
      <div class="footer">
        <h2> © Copyright 2019 KESHAB CHALISE | All Rights Reserved</h2>
      </div>
    </div>
      
  </div>
</body>

</html>