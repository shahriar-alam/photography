<?php
session_start();

if ((isset($_SESSION['uname']))){
    header("location:dashboard.php");
    }
    
$uname='';
$pass='';
$error = 0;
$errormsg = '';

include 'server.php';

    if(isset($_POST['uname'])){
        $uname=$_POST['uname'];
        $pass=$_POST['pass'];
        $sql="SELECT `uid`, `uname`, `upass` FROM `credentials` WHERE uname = '$uname' AND upass = '$pass'";
        $result = mysqli_query($db,$sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['uname']=$uname;
            $result1 = mysqli_fetch_array($result);
            $_SESSION['uid'] = $result1['uid'];
            header('location:dashboard.php');
        }
        else{
            $errormsg = "Username or password mismatch";
            $error = 1;
            ob_end_flush();
        }

}

?>

<!DOCTYPE html>
<html>
    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>

        <header class="w3-container w3-teal">
            <h1>Admin Login</h1>
            <button class="w3-button w3-section w3-blue w3-ripple"><a href="index.php">Home</a></button>
            <button class="w3-button w3-section w3-blue w3-ripple"><a href="coming.php">Sign Up</a></button>
        </header>

        <div class="w3-container w3-half w3-margin-top">

            <form class="w3-container w3-card-4" action="login.php" method='POST'>

                <p>
                    <input class="w3-input" type="text" style="width:90%" name="uname" required>
                    <label>Name</label>
                </p>
                <p>
                    <input class="w3-input" type="password" style="width:90%" name="pass" required>
                    <label>Password</label>
                </p>


                <p>
                    <input type='submit' class="w3-button w3-section w3-teal w3-ripple" value='Login'>
                </p>
                <p>
                    <?php if($error == 1){echo $errormsg;} ?>
                </p>

            </form>

        </div>

    </body>
</html> 
