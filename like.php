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
		$like=$_REQUEST['id'];
		$query1="SELECT  `like` FROM `post` WHERE id = $like ";
		 $result1=$conn->query($query1); 
			   while($row=mysqli_fetch_assoc($result1))
			   {
				   $count=$row['like'];
			   }
            $count++;
		$query="UPDATE `post` SET `like`=$count WHERE id = $like ";
		 $result=$conn->query($query); 
		   header('Location: wall.php');
		
 }
?>