<?php

	$first_name='';
	$last_name='';
	$email='';
	$mobile='';
    $package='';
    $error=0;
	$errmsg=array();

	include 'server.php';

	    if(isset($_POST['first'])){
            $first_name=$_POST['first'];
            $last_name=$_POST['last'];
            $email=$_POST['email'];
            $mobile=$_POST['phone'];
            $package=$_POST['package'];
	

        if(empty($first_name)){
           array_push($errmsg,"* First name  is required");
            $error++;
				}
		if(empty($last_name)){
			array_push($errmsg,"* Last name is required");
			$error++;
			}
        if(empty($email)){
            array_push($errmsg,"* Email is required");
            $error++;
        }
		
		if(empty($mobile)){
            array_push($errmsg,"* Mobile number is required");
            $error++;
        }
        if(empty($package)){
            array_push($errmsg,"* Package name is required");
            $error++;
        }


        if($error==0){
            $sql="INSERT INTO `contact`(`firstname`, `lastname`, `email`, `phone`, `package`) 
                    VALUES ('$first_name','$last_name','$email',$mobile,'$package')";
            mysqli_query($db,$sql);
			header('location:index.php');
            }
    }

?>



<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img class="w3-image" src="photos/img1.jpg" alt="Me" width="1500" height="600">
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
    <h1 class="w3-hide-medium w3-hide-small w3-xxxlarge">PhotoSplash</h1>
    <h5 class="w3-hide-large" style="white-space:nowrap">PhotoSplash</h5>
    <h3 class="w3-hide-medium w3-hide-small">PhotographySolution</h3>
  </div>
  
  <!-- Navbar (placed at the bottom of the header image) -->
  <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="index.php#portfolio" class="w3-bar-item w3-button">Portfolio</a>
    <a href="package.php" class="w3-bar-item w3-button">Package</a>
    <!--<a href="#contact" class="w3-bar-item w3-button">Contact</a>-->
    <a href="login.php" class="w3-bar-item w3-button">Login</a>
  </div>
</header>

<!-- Navbar on small screens -->
<div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
<div class="w3-bar w3-light-grey">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="index.php#portfolio" class="w3-bar-item w3-button">Portfolio</a>
    <a href="package.php" class="w3-bar-item w3-button">Package</a>
    <!--<a href="#contact" class="w3-bar-item w3-button">Contact</a>-->
    <a href="login.php" class="w3-bar-item w3-button">Login</a>
</div>
</div>

<form action="contact.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">
<h2 class="w3-center">Contact Us</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="first" type="text" placeholder="First Name">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="last" type="text" placeholder="Last Name">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="email" type="text" placeholder="Email">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-phone"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="phone" type="text" placeholder="Phone">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-pencil"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="package" type="text" placeholder="Package Name">
    </div>
</div>

<p class="w3-center">
<input type="submit" name="ssubmit" class="w3-button w3-section w3-blue w3-ripple" value="Submit">
<button class="w3-button w3-section w3-blue w3-ripple"><a href="package.php">Back</a></button>
<button class="w3-button w3-section w3-blue w3-ripple"><a href="index.php">Home</a></button>
</p>
</form>
<div> <?php if($error>0){print_r($errmsg);} ; ?></div>

</body>
</html> 
