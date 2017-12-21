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
		$query="INSERT INTO `friends`(`sender`, `receiver`, `s_status`, `r_status`,`friends`) VALUES ('".$semail."','".$remail."','SEND','PENDING','NO')";
		$result=$conn->query($query);
		$query1="INSERT INTO `friend_list`(`user1`, `user2`, `status`) VALUES ('".$semail."','".$remail."','NO')";
		$result1=$conn->query($query1);
		echo "<script type='text/javascript'>alert('Friend Request Send');
         window.location.replace('members.php');		
		</script>";
		
 }
?>