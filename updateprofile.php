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
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mob=$_POST['mob'];
$dob=$_POST['dob'];
$query = "UPDATE `register` SET `fname`='$fname',`lname`='$lname',`mobile`='$mob',`dob`='$dob' WHERE email='$email'";


if ($conn->query($query) === TRUE) {
   
   echo '<script type="text/javascript">
alert("Profile Updated Succesfully");
location="profile.php";
</script>';
} else {

   echo '<script type="text/javascript">
alert("Error Updating Profile");
location="profile.php";
</script>';
}

$conn->close();



?>