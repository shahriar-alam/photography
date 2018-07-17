<?php
	session_start();
	require 'server.php';

	if (!(isset($_SESSION['uname']))){
    header("location:login.php");
	}
	$query="SELECT * FROM `contact`";
    $result1=mysqli_query($db,$query);

?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="style/bootstrap.min.css">
<meta charset="utf-8">
<title>Dash Board</title>
</head>

<body>
	
	<nav class="navbar navbar-expand-sm bg-light">
		
	  <ul class="navbar-nav">
		<li class="nav-item">
		  <a class="nav-link" href="dashboard.php">DashBoard</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" href="package_info.php">Packages</a>
        </li>
        <li class="nav-item">
		  <a class="nav-link" href="coming.php">Add admin</a>
        </li>
        <li class="nav-item">
		  <a class="nav-link" href="coming.php">Add package</a>
        </li>
        <li class="nav-item">
		  <a class="nav-link" href="logout.php">Log out</a>
		</li>
	  </ul>

	</nav>
	
	
	<table class="table table-striped table-bordered table-condensed">
		<tr>
			<th>CID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Package</th>
			<th>Confirmed</th>
		</tr>
		
			<?php
			while($list=mysqli_fetch_array($result1)) {	
                echo "<tr>";
                echo "<td>".$list['cid']."</td>";
				echo "<td>".$list['firstname']."</td>";
				echo "<td>".$list['lastname']."</td>";
				echo "<td>".$list['email']."</td>";
				echo "<td>".$list['phone']."</td>";
                echo "<td>".$list['package']."</td>";
                echo "<td>".$list['confirmed']."</td>";
                echo "</tr>";
                }			
            ?>
		
		

	</table>
	
</body>
</html>