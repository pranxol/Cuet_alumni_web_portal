<html>


<head>
<style>
table{
    border-style: inset;	
	border-width: 0px 3px 3px 03px;
	margin:50px auto 0px;
	
}

table, th, td {
	
	 padding :5px;
	
}
td{
	
	border-style: solid;
    border-width: 0px 0px 2px 0px;
	border-color: green;
	
}
</style>
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
  <li class="menuitemleft"><a  href="home.html">Home</a></li>
  <li class="menuitemleft"><a class="active" href="search.php">Search</a></li>
  <li class="menuitemleft"><a href="contact.html">Contact</a></li>
  <li class="menuitemleft"><a href="all.php">See Alumni List</a></li>
  <li class="menuitemright"><a href="login.php">Login/Signup</a></li>
</ul>
</div>

<div style="padding:40px">
	
	 <form  action="search.php" method="post">
	  <input type ="text" name="query" >
	  <input type="submit" value="Submit" name="search" >
	  </form>
	  
	<p><span style="font-weight:bold;">N.B. </span>Please enter any key word to see the search result.</p>
	</p>
	
	


<?php 

    // initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');


if(isset($_GET['details']) ){
	$uname=$_GET['details'];
	$sql="select *from alumnidata where username='$uname' ";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_assoc($result);
?>

	<table >
		<caption style="border-style: solid;
    border-width: 3px;border-color:green;padding:10px;background-color:#ccc;">Alumni information</caption>
		<tr>
		<td>
		<label>Name:</label>
		</td>
		<td><?php echo $row['name']; ?>
		</tr>
		
		<tr>
		<td>
		<label>ID:</label>
		</td>
		<td><?php echo $row['id']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Department:</label>
		</td>
		<td><?php echo $row['department']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Batch:</label>
		</td>
		<td><?php echo $row['batch']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Gender:</label>
		</td>
		<td><?php echo $row['gender']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Email:</label>
		</td>
		<td><?php echo $row['email']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Mobile:</label>
		</td>
		<td><?php echo $row['mobile']; ?>
		</tr>
				
		<tr>
		<td>
		<label>Hometown:</label>
		</td>
		<td><?php echo $row['hometown']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Present address:</label>
		</td>
		<td><?php echo $row['currentcity']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Job company:</label>
		</td>
		<td><?php echo $row['company']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Designation:</label>
		</td>
		<td><?php echo $row['designation']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Job country:</label>
		</td>
		<td><?php echo $row['jobcountry']; ?>
		</tr>
		
		
		<tr>
		<td>
		<label>Msc. from:</label>
		</td>
		<td><?php echo $row['mscuniversity']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Msc. subject:</label>
		</td>
		<td><?php echo $row['mscsubject']; ?>
		</tr>
		
		<tr>
		<td>
		<label>phd from:</label>
		</td>
		<td><?php echo $row['phduniversity']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Phd-subject:</label>
		</td>
		<td><?php echo $row['phdsubject']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Research area:</label>
		</td>
		<td><?php echo $row['researcharea']; ?>
		</tr>
		
		<tr>
		<td>
		<label>Research-gate link:</label>
		</td>
		<td><?php echo $row['researchgate']; ?>
		</tr>
	</table>

<?php	
}
?>

<br><br>
<div>
<footer>
  <p>Made by 1404050 and 1404076 @dept. of CSE, CUET</p>
</footer>
</div>

</body>

</html>