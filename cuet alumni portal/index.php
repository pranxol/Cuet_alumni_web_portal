<?php 
  session_start(); 

  // initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="home.css">
	
</head>
<body>

<header class="headlinebackground">

<a href="https://www.cuet.ac.bd/">
<img  src="cuetlogo_1.jpg" alt="logo of cuet" style="float:left;width:80px;height:100px;"></a>


<p class="versityname">Chittagong University of Engineering & Technology</p>

</header>

<div>
<ul class="menu">
  <li class="menuitemleft"><a href="after_logged_in_home.php">Home</a></li>
  <li class="menuitemleft"><a href="after_logged_in_search.php">Search</a></li>
  <li class="menuitemleft"><a href="after_logged_in_contact.php">Contact</a></li>
  <li class="menuitemleft"><a href="after_logged_in_all.php">See Alumni List</a></li>
      <?php  if (isset($_SESSION['username'])) : ?>
    	<li class="menuitemright"><a href="index.php?logout='1'">Logout</a></li>
		<?php
		$a=$_SESSION['username'];
		
		$name= "select name from users where username= '$a' " ;
		$result= mysqli_query($db,$name);
		//echo $name ;
		$row = mysqli_fetch_assoc($result);
		if(($row['name']===NULL)){ ?>
		
			<li class="menuitemright"><a href="info.php">Add your info</a></li>
		<?php } else{ ?>
			
			<li class="menuitemright"><a href="update.php">Update your info</a></li>
		<?php } ?>
		
    <?php endif ?>
  
</ul>
</div>


<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
		    //echo $_SESSION['username'], $_SESSION['success']; 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
       
	
</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div>
<footer>
  <p>Made by 1404050 and 1404076 @dept. of CSE, CUET</p>
</footer>
</div>

		
</body>
</html>