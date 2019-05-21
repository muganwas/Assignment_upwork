<?php
	require('includes/functions.php');
    $main = new assignment_19;
    if(isset($_GET['noneUser']) && $_GET['noneUser'] == true){
		$noneUser = true;
	}else{
        $noneUser = false;
    }
    if(isset($_POST['signup'])){
        if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['cPassword']) ){
            $name = $_POST['name'];
            $password= $_POST['password'];
            $cPassword=$_POST['cPassword'];
            //check if variables are not null
            if($name != null && $password != null && $cPassword != null){
                $feedback1 = $main->signupUser($name, $password, $cPassword);
            }else{
                $feedback = '<div class="feedback">Please fill in all fields.</div>';
            }
        }
    }elseif(isset($_POST['login'])){
        if(isset($_POST['name']) && isset($_POST['password']) ){
            $name = $_POST['name'];
            $password= $_POST['password'];
            if($name != null && $password != null){
                $fb = $main->loginUser($name, $password);
                if($fb == "good"){
                    $_SESSION['user_assignment1'] = $name;
                    $feedback1 = '<div class="feedback">You logged in successfully.</div>';
                }
            }else{
                $feedback = '<div class="feedback">Please fill in all fields.</div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Authentication</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" type="text/css" href="./css/style1.css">
</head>

<body>

	<div class="header">
		<h1>JACK AND JESS</h1>

	</div>

    <?php include('includes/menu.php') ?>
    
	<div class="row tableContainer">
        <div class="card1">
            <?php if(isset($feedback)){ echo $feedback; } ?>
            <?php if(isset($feedback1)){ echo $feedback1; } ?>
            <?php 
            if(!isset($feedback1)){
            //show different forms for logins and signup 
            if(isset($noneUser) && $noneUser == true){?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?noneUser=true'; ?>">
            <div class="col-50">
                
                <h3>Sign up</h3>
                
                <label for="name">Name</label>
                <input type="hidden" name="signup" value="signup">
                <input type="text" id="name" name="name" placeholder="Name">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="*****">
                <label for="cPassword">Confirm Password</label>
                <input type="password" id="cPassword" name="cPassword" placeholder="*****">
                <input type="submit" value="Sign up" />
            </div>
            </form>
            <div class="linkContainer"><a href='<?php echo $_SERVER["PHP_SELF"]; ?>'>Log in</a></div>
            <?php }else{?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="col-50">
                        
                        <h3>Login</h3>
                        
                        <label for="name">Name</label>
                        <input type="hidden" name="login" value="login">
                        <input type="text" id="bId" name="name" value="<?php if(isset($_POST['bId']))echo $_POST['bId'] ?>" placeholder="Name">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="*****">
                        <input type="submit" value="Log in" />
                    </div>
                </form>
                <div class="linkContainer"><a href='<?php echo $_SERVER["PHP_SELF"].'?noneUser=true'; ?>'>Sign up</a></div>

            <?php }}?>

        </div>
	</div>

</body>

</html>