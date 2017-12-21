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
		$semail=$_REQUEST['semail'];//r
		$remail=$_REQUEST['remail'];//d
		$query="UPDATE `friends` SET `r_status`='ACCEPTED',`friends`='YES' WHERE receiver= '".$semail."'AND sender = '".$remail."'";
		$result=$conn->query($query);
		$query1="UPDATE `friend_list` SET `status`='YES' WHERE `user1`='".$remail."' AND `user2`='".$semail."'";
		$result1=$conn->query($query1);
		$query2="INSERT INTO `friend_list`(`user1`, `user2`, `status`) VALUES ('".$semail."','".$remail."','YES')";
		$result2=$conn->query($query2);
		echo "<script type='text/javascript'>alert('ACCEPTED');
         window.location.replace('friend-request.php');		
		</script>";
		
 }
?>