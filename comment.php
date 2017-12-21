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
		$id=$_REQUEST['id'];
		$comment=$_REQUEST['comment'];
		$image=$_REQUEST['image'];
		$query="INSERT INTO `comment`(`id`, `comment`,`email`) VALUES (".$id.",'".$comment."','".$image."')";
		$result=$conn->query($query);
		 header('Location: wall.php');
 }
?>