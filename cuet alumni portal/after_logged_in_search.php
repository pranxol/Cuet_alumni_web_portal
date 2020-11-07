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


</head>


<body>


<header class="headlinebackground">

<a href="https://www.cuet.ac.bd/">
<img  src="cuetlogo_1.jpg" alt="logo of cuet" style="float:left;width:80px;height:100px;"></a>


<p class="versityname">Chittagong University of Engineering & Technology</p>

</header>

<div>
<ul class="menu">
  <li class="menuitemleft"><a  href="after_logged_in_home.php">Home</a></li>
  <li class="menuitemleft"><a class="active"  href="after_logged_in_search.php">Search</a></li>
  <li class="menuitemleft"><a href="after_logged_in_contact.php">Contact</a></li>
  <li class="menuitemleft"><a href="after_logged_in_all.php">See Alumni List</a></li>
      <?php  if (isset($_SESSION['username'])) : ?>
    	<li class="menuitemright"><a href="index.php?logout='1'">Logout</a></li>
		<?php
		$a=$_SESSION['username'];
		
		$name= "select name from users where username= '$a' " ;
		$result= mysqli_query($db,$name);
		//echo $name ;
		$r1 = mysqli_fetch_assoc($result);
		if(($r1['name']===NULL)){ ?>
		
			<li class="menuitemright"><a href="info.php">Add your info</a></li>
		<?php } else{ ?>
			
			<li class="menuitemright"><a href="update.php">Update your info</a></li>
		<?php } ?>
		
    <?php endif ?>
  
</ul>
</div>


<div style="padding:40px">
	
	 <form  action="after_logged_in_search.php" method="post">
	  <input type ="text" name="query" >
	  <input type="submit" value="Search" name="search" >
	  </form>
	  
	<p><span style="font-weight:bold;">N.B. </span>Please enter any key word to see the search result.</p>
	</p>
	
	

<?php
	if(isset($_POST['search'])){
		
			$query= mysqli_real_escape_string($db, $_POST['query']);
			/*$show="select *from alumnidata where (name like '%$query%') or ( id like '%$query%') or ( department like '%$query%') or (company like '%$query%') or (country like '%$query%') or ( researcharea like '%$query%')";*/
			$show="select *from alumnidata where (name='$query') or (name like '% $query %') or (name like '% $query') or (name like '$query %') or ( id ='$query') or ( department like '%$query%') or (company like '%$query%') or (company like '% $query %') or (company like '% $query') or (company like '$query %') or ( researcharea like '%$query%') or (jobcountry like '%$query%') or (phduniversity like '%$query%') or ( mscuniversity like '%$query%') or (designation like '%$query%') or (currentcity like '%$query%') or (batch like '%$query%')";
			$showresult= mysqli_query($db,$show);
			if(mysqli_num_rows($showresult) > 0){
				
				?>
				<table style="margin: 50px auto 0px;" border ="1">
				<tr>
					<th>Name</>
					<th>ID</>
					<th>Department</>
					<th>BSc. passing year</>
					<th>Email</>
					<th></>
				</tr>
				<?php
				
				while($rows=mysqli_fetch_assoc($showresult)){
		
					echo "<tr>";
					echo "<td>";
					echo $rows['name'];
					echo "</td>";
					echo "<td>";
					echo $rows['id'];
					echo "</td>";
					echo "<td>";
					echo $rows['department'];
					echo "</td>";
					echo "<td>";
					echo $rows['bscyear'];
					echo "</td>";
					echo "<td>";
					echo $rows['email'];
					echo "</td>";
					echo "<td>";
					echo "<a href='after_logged_in_details.php?details=$rows[username]'>Details</a> ";
					echo "</td>";
					echo "</tr>";
					
				}
			?>
			
			</table>
			
			<?php 
			}
			
			else{
				echo "<p style='text-align:center;'>nothing found.</p>";
			}
	}
?>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
