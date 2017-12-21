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
		$sender=$_REQUEST['sender'];
		$receiver=$_REQUEST['receiver'];
		$commt=$_REQUEST['txtcomt'];
		$query="INSERT INTO `chat`(`sender`, `receiver`, `comment`) VALUES ('".$sender."','".$receiver."','".$commt."')";
		$result=$conn->query($query);
		header('Location: savemessage.php?email1='.$receiver);
		
 }
?>
