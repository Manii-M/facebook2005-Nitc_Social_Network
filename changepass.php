<?php

session_start();
if(!isset($_SESSION['email']))
{
    header('Location:index.html');
}
else
{
 $email = $_SESSION["email"];

 $conn=new mysqli('localhost','root');
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else 
 {
	 $db1=mysqli_select_db($conn,'nitc');
	if(!$db1)
			{echo "error in connection with database";} 
 }
}
$cpass=$_POST['cpass'];
$npass=$_POST['npass'];
$rpass=$_POST['rpass'];
if($npass == $rpass)
{
	

$query="SELECT * FROM `register` WHERE email='$email'";
									  $res=$conn->query($query);
									  if($res->num_rows > 0)
									  {
										 // echo $res->num_rows;
										  while($row=mysqli_fetch_assoc($res))
									  {
										 $opass=$row['password'];
									  }
									  if($opass == $cpass)
									  {
										$query = "UPDATE `register` SET `password`='$npass' WHERE email='$email'";
  if ($conn->query($query) === TRUE) {
   
   echo '<script type="text/javascript">
alert("Password Changed Succesfully");
location="profile.php";
</script>';
}
										  
									  }
									  else{
										  echo '<script type="text/javascript">
alert("Current Password Wrong !! Try Again !!");
location="profile.php";
</script>';
									  }
									  }


}
 else {

   echo '<script type="text/javascript">
alert("New Password Mismatch");
location="profile.php";
</script>';
}

$conn->close();



?>