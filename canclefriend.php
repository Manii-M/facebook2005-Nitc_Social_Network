<?php
$conn=new mysqli('localhost','root');
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else 
 {
	 $db1=mysqli_select_db($conn,'nitc');
	if(!$db1)
			{echo "error in connection with database";} 
		$semail=$_REQUEST['semail'];
		$remail=$_REQUEST['remail'];
		$query="DELETE FROM `friends` WHERE sender = '".$semail."' AND receiver='".$remail."'";
		$result=$conn->query($query);
		echo "<script type='text/javascript'>alert('Friend Request Cancelled');
         window.location.replace('members.php');		
		</script>";
		
 }
?>