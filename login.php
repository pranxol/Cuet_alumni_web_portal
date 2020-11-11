<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>CUET ALUMNI</title>
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
  <li class="menuitemleft"><a href="home.html">Home</a></li>
  <li class="menuitemleft"><a href="search.php">Search</a></li>
  <li class="menuitemleft"><a href="contact.html">Contact</a></li>
  <li class="menuitemleft"><a href="all.php">See Alumni List</a></li>
</ul>
</div>



  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
  
  
  
  <div><br><br>
<footer>
  <p>Made by 1404050 and 1404076 @dept. of CSE, CUET</p>
</footer>
</div>
</body>
</html>