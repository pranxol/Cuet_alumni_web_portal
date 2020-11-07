<?php 

  
    // initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');
  session_start(); 

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


<!DOCTYPE HTML>  
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="home.css">

<style>
.error {color: #FF0000;}
</style>
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
  <li class="menuitemleft"><a  href="after_logged_in_search.php">Search</a></li>
  <li class="menuitemleft"><a  href="after_logged_in_contact.php">Contact</a></li>
  <li class="menuitemleft"><a href="after_logged_in_all.php">See Alumni List</a></li>
      <?php  if (isset($_SESSION['username'])) : ?>
    	<li class="menuitemright"><a href="index.php?logout='1'">Logout</a></li>
		
    <?php endif ?>
  
</ul>
</div>

<?php
// define variables and set to empty values
$nameErr= $idErr= $departmentErr= $batchErr= $mobileErr = $emailErr = $genderErr = $websiteErr = "";

$username=$_SESSION['username'];

 /*
 $name ="select name from alumnidata where username='$username' ";
 $id= $department = $batch = $mobile=""; 
 $email ="select email from alumnidata where username='$username' ";
 $gender = $website =$hometown=$currentcity=$company=$designation=$jobcountry=$bscuniversity=$bscsubject=$bscyear=$mscuniversity=$mscsubject=$mscyear=$phduniversity=$phdsubject=$phdyear=$researcharea=$researchgate="";
 */
 
 $sqlshow="select *from alumnidata where username='$username' ";
 $resultshow= mysqli_query($db,$sqlshow);
 $rowshow= mysqli_fetch_assoc($resultshow);
 
 $name =$rowshow['name'];
 $id=$rowshow['id'];
 $department =$rowshow['department'];
 $batch = $rowshow['batch'];
 $mobile=$rowshow['mobile'];
 $email =$rowshow['email'];
 $gender =$rowshow['gender'];
 $website ="";
 $hometown=$rowshow['hometown'];
 $currentcity=$rowshow['currentcity'];
 $company=$rowshow['company'];
 $designation=$rowshow['designation'];
 $jobcountry=$rowshow['jobcountry'];
 $bscuniversity=$rowshow['bscuniversity'];
 $bscsubject=$rowshow['bscsubject'];
 $bscyear=$rowshow['bscyear'];
 $mscuniversity=$rowshow['mscuniversity'];
 $mscsubject=$rowshow['mscsubject'];
 $mscyear=$rowshow['mscyear'];
 $phduniversity=$rowshow['phduniversity'];
 $phdsubject=$rowshow['phdsubject'];
 $phdyear=$rowshow['phdyear'];
 $researcharea=$rowshow['researcharea'];
 $researchgate=$rowshow['researchgate'];
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$status = "OK";
	
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$status = "NOTOK";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
		$status = "NOTOK";
    }
  }
  
  if (empty($_POST["id"])) {
    $idErr = "ID is required";
	$status = "NOTOK";
  } else {
    $id = test_input($_POST["id"]);
  }
  
  if (empty($_POST["department"])) {
    $departmentErr = "Department is required";
	$status = "NOTOK";
  } else {
    $department = test_input($_POST["department"]);
  }
  
  if (empty($_POST["batch"])) {
    $batchErr = "Batch is required";
	$status = "NOTOK";
  } else {
    $batch = test_input($_POST["batch"]);
  }
  
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
	$status = "NOTOK";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$status = "NOTOK";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
		$status = "NOTOK";
    }
  }
  
/*	
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
		$status = "NOTOK";
    }
  }
  
*/
	if (empty($_POST["mobile"])) {
		$mobile= "";
	}
	else {
		$mobile= test_input($_POST["mobile"]);
	}
	
	if (empty($_POST["hometown"])) {
		$hometown= "";
	}
	else {
		$hometown= test_input($_POST["hometown"]);
	}
	
	if (empty($_POST["currentcity"])) {
		$currentcity= "";
	}
	else {
		$currentcity= test_input($_POST["currentcity"]);
	}
	
	if (empty($_POST["company"])) {
		$company= "";
	}
	else {
		$company= test_input($_POST["company"]);
	}
	
	if (empty($_POST["designation"])) {
		$designation= "";
	}
	else {
		$designation= test_input($_POST["designation"]);
	}
	
	
	if (empty($_POST["jobcountry"])) {
		$jobcountry= "";
	}
	else {
		$jobcountry= test_input($_POST["jobcountry"]);
	}
	
	if (empty($_POST["bscuniversity"])) {
		$bscuniversity= "";
	}
	else {
		$bscuniversity= test_input($_POST["bscuniversity"]);
	}
	
	if (empty($_POST["bscsubject"])) {
		$bscsubject= "";
	}
	else {
		$bscsubject= test_input($_POST["bscsubject"]);
	}
	
	if (empty($_POST["bscyear"])) {
		$bscyear= "";
	}
	else {
		$bscyear= test_input($_POST["bscyear"]);
	}
	
	
	if (empty($_POST["mscuniversity"])) {
		$mscuniversity= "";
	}
	else {
		$mscuniversity= test_input($_POST["mscuniversity"]);
	}
	
	if (empty($_POST["mscsubject"])) {
		$mscsubject= "";
	}
	else {
		$mscsubject= test_input($_POST["mscsubject"]);
	}
	
	if (empty($_POST["mscyear"])) {
		$mscyear= "";
	}
	else {
		$mscyear= test_input($_POST["mscyear"]);
	}
	
	
	if (empty($_POST["phduniversity"])) {
		$phduniversity= "";
	}
	else {
		$phduniversity= test_input($_POST["phduniversity"]);
	}
	
	if (empty($_POST["phdsubject"])) {
		$phdsubject= "";
	}
	else {
		$phdsubject= test_input($_POST["phdsubject"]);
	}
	
	if (empty($_POST["phdyear"])) {
		$phdyear= "";
	}
	else {
		$phdyear= test_input($_POST["phdyear"]);
	}
	
	if (empty($_POST["researcharea"])) {
		$researcharea= "";
	}
	else {
		$researcharea= test_input($_POST["researcharea"]);
	}
	
	if (empty($_POST["researchgate"])) {
		$researchgate= "";
	}
	else {
		$researchgate= test_input($_POST["researchgate"]);
	}
  
  
  if($status == "OK")
  {
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'registration');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($db === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	
	
	/*
	$query = "INSERT INTO alumnidata (name,id,department,batch,gender, email, mobile, hometown, currentcity, company, designation, jobcountry,bscuniversity,bscsubject,bscyear,mscuniversity,mscsubject,mscyear,phduniversity,phdsubject,phdyear,researcharea,researchgate,username) VALUES('$name','$id','$department','$batch','$gender','$email',     '$mobile','$hometown', '$currentcity', '$company', '$designation',  '$jobcountry','$bscuniversity','$bscsubject','$bscyear', '$mscuniversity' , '$mscsubject' , '$mscyear' , '$phduniversity' , '$phdsubject' , '$phdyear' , '$researcharea' , '$researchgate' , '$username' )";
  	mysqli_query($db, $query);
	
	*/
	
	$query="update alumnidata set name='$name' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set id='$id' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set department='$department' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set batch='$batch' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set gender='$gender' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set email='$email' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set hometown='$hometown' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set currentcity='$currentcity' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set company='$company' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set designation='$designation' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set jobcountry='$jobcountry' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set bscuniversity='$bscuniversity' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set bscsubject='$bscsubject' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set bscyear='$bscyear' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set mscuniversity='$mscuniversity' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set mscsubject='$mscsubject' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set mscyear='$mscyear' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set phduniversity='$phduniversity' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set phdsubject='$phdsubject' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set phdyear='$phdyear' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set researcharea='$researcharea' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	$query="update alumnidata set researchgate='$researchgate' where username='$username' ";
	$res=mysqli_query($db,$query);
	
	
	/*.....*/
	
	$a=$_SESSION['username'];
	$query="update users set name='$name' where username='$a' ";
	$res=mysqli_query($db,$query);
	
	
	
	$_SESSION['success'] = "Your data has been updated";
	header('location: index.php');
	  
	  
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

 <br><br>

<form style="margin:auto;width:50%;border:5px solid MediumSeaGreen;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

	<div class="style1" style="text-align:center;background-color:#ccc;font-size:30px;">Your Information</div>
	<p><span class="error" style ="padding :50px">* required field</span></p>
	 
	<div style="padding-left:120px;padding-bottom:50px;">
	
	
	<?php /*
	echo $_SESSION['username'];
	*/
	?>
	
	<br>
	
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  
  ID: <input type="text" name="id" value="<?php echo $id;?>">
  <span class="error">* <?php echo $idErr;?></span>
  <br><br>
  
  Department: <input type="text" name="department" value="<?php echo $department;?>">
  <span class="error">* <?php echo $departmentErr;?></span>
  <br><br>
  
  Batch: <input type="text" name="batch" value="<?php echo $batch;?>">
  <span class="error">* <?php echo $batchErr;?></span>
  <br><br>
  
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
   Mobile: <input type="text" name="mobile" value="<?php echo $mobile;?>">
  <br><br>
  
  <!--
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  -->
  
  Hometown: <input type="text" name="hometown" value="<?php echo $hometown;?>">
  <br><br>
  
  Current city: <input type="text" name="currentcity" value="<?php echo $currentcity;?>">
  <br><br>
  
  
  <h3 style="background-color: lightgrey;width:200px">Job info:</h3>
  <p style="margin:20px;">
  Company: <input type="text" name= "company" value="<?php echo $company;?>">
  <br><br>
  
  Designation: <input type="text" name= "designation" value="<?php echo $designation ;?>">
  <br><br>
  
  Country: <input type="text" name= "jobcountry" value="<?php echo $jobcountry ;?>">
  <br><br>
  </p>
  
  <h3 style="background-color: lightgrey;width:200px">Academic info:</h3>
  <br>
  <b style="background-color: powderblue;width:50px">BSc:</b><br>
  <p style="margin:20px;">
  University: <input type="text" name= "bscuniversity" value="<?php echo $bscuniversity ;?>">
  <br><br>
  
  Subject: <input type="text" name= "bscsubject" value="<?php echo $bscsubject ;?>">
  <br><br>
  
  Passing Year: <input type="text" name= "bscyear" value="<?php echo $bscyear ;?>">
  <br><br>
  </p>
  
  
  <b style="background-color: powderblue;width:50px">MSc:</b><br>
  <p style="margin:20px;">
  University: <input type="text" name= "mscuniversity" value="<?php echo $mscuniversity ;?>">
  <br><br>
  
  Subject: <input type="text" name= "mscsubject" value="<?php echo $mscsubject ;?>">
  <br><br>
  
  Passing Year: <input type="text" name= "mscyear" value="<?php echo $mscyear ;?>">
  <br><br>
  </p>
  
  
  <b style="background-color: powderblue;width:50px">PHD:</b><br>
  <p style="margin:20px;">
  University: <input type="text" name= "phduniversity" value="<?php echo $phduniversity ;?>">
  <br><br>
  
  Subject: <input type="text" name= "phdsubject" value="<?php echo $phdsubject ;?>">
  <br><br>
  
  Passing Year: <input type="text" name= "phdyear" value="<?php echo $phdyear ;?>">
  <br><br>
  </p>
  
  
  <b style="background-color: powderblue;width:50px">Research work:</b><br>
  <p style="margin:20px;">
  Research area: <input type="text" name= "researcharea" value="<?php echo $researcharea ;?>">
  <br><br>
  
  Research-gate link: <input type="text" name= "researchgate" value="<?php echo $researchgate ;?>">
  <br><br>
  </p>
  
  <input type="submit" name="submit" value="Submit">  
  
  </div>
</form>



</body>
</html>