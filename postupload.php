<?php

 include_once "dataservice.php";
  $ds= new dataservice();
  $txt=$_REQUEST['txt'];
   $img=$_REQUEST['img'];
   $email=$_REQUEST['email'];
   $query="INSERT INTO `post`(`email`, `image`, `text`,`status`) VALUES ('".$email."','".$img."','".$txt."','TRUE')";
   $res=$ds->insert_data($query);
   if($res == 1)
	   echo"Refresh To See Your Post";
   else
	   echo"Error Posting";
?>