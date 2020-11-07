<?php 

  // initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');



?>


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
  <li class="menuitemleft"><a href="home.html">Home</a></li>
  <li class="menuitemleft"><a class="active" href="search.php">Search</a></li>
  <li class="menuitemleft"><a href="contact.html">Contact</a></li>
  <li class="menuitemleft"><a href="all.php">See Alumni List</a></li>
  <li class="menuitemright"><a href="login.php">Login/Signup</a></li>
</ul>
</div>



<div style="padding:40px">
	
	 <form  action="search.php" method="post">
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
					echo "<a href='details.php?details=$rows[username]'>Details</a> ";
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





<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div>
<footer>
  <p>Made by 1404050 and 1404076 @dept. of CSE, CUET</p>
</footer>
</div>


</body>
</html>
