<?php
	session_start();
	require 'server.php';

	if (!(isset($_SESSION['uname']))){
    header("location:login.php");
	}
	$query="SELECT * FROM `package`";
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
			<th>ID</th>
			<th>Package Name</th>
			<th>Number of Photographers</th>
			<th>Total Photo</th>
			<th>Printed Photo</th>
			<th>duration</th>
			<th>Price</th>
		</tr>
		
			<?php
			while($list=mysqli_fetch_array($result1)) {	
                echo "<tr>";
                echo "<td>".$list['pid']."</td>";
				echo "<td>".$list['p_name']."</td>";
				echo "<td>".$list['t_photoman']."</td>";
				echo "<td>".$list['e_photo']."</td>";
				echo "<td>".$list['p_photo']."</td>";
                echo "<td>".$list['duration']."</td>";
                echo "<td>".$list['price']."</td>";
                echo "</tr>";
                }			
            ?>
		
		

	</table>
	
</body>
</html>