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
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" type="text/css" href="style.css">

      <title>Welcome </title>

</head>


<body>


<header class="headlinebackground">

<a href="https://www.cuet.ac.bd/">
<img  src="cuetlogo_1.jpg" alt="logo of cuet" style="float:left;width:80px;height:100px;"></a>


<p class="versityname">Chittagong University of Engineering & Technology</p>

</header>

<div>
<ul class="menu">
  <li class="menuitemleft"><a class="active"  href="after_logged_in_home.php">Home</a></li>
  <li class="menuitemleft"><a  href="after_logged_in_search.php">Search</a></li>
  <li class="menuitemleft"><a  href="after_logged_in_contact.php">Contact</a></li>
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

<div class="welcome">Welcome to the alumni portal</div>


<div>
<section>
  <nav>
	<h1>Notice Board</h1>
    <ul>
      <li><a href="#">Launch of alumni portal</a></li>
	</ul>
	  <br>
	<ul>
      <li><a href="#">Get together of Canada alumni association</a></li>
    </ul>
  </nav>
  
    <article >
    <h1>About CUET alumni association</h1>
    <p>CUET is a very reputed university. So it has very big alumni association.</p>
	<p>By this portal we are going to make a connection among those alumni of CUET</p>

  </article>
</section>
</div>

<br><br><br><br>

<div>
<footer>
  <p>Made by 1404050 and 1404076 @dept. of CSE, CUET</p>
</footer>
</div>

<div>
</div>

<!-- This is a comment  -->
</body>
</html>
