<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nitc";



   $conn = new mysqli( $servername, $username, $password, $dbname);
   

           if($conn -> connect_error)
           	   die("connection failed" . $conn-> connect_error);
           	else
           	{
           			$fname=$_POST['fname'];
           			$lname=$_POST['lname'];
           			$email=$_POST['email'];
           			$dob=$_POST['dob'];
           			$gen=$_POST['gender'];
           			$mob=$_POST['mobile'];
           			$pwd=rand(999,9999);
           		 $query1 ="SELECT fname,lname,email,mobile FROM register WHERE email='$email' OR mobile='$mob' ";
           		 //echo $query1;
           		
           		 $result = $conn->query($query1);

                  
				


                    if($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                           
                              include 'alreadyregistered.html';
							 
                      }
                   }

				else{     
				 $sql = "INSERT INTO `register`(`fname`, `lname`, `email`, `password`, `mobile`, `dob`, `gender`, `image`) VALUES ('".$fname."','".$lname."','".$email."','".$pwd."','".$mob."','".$dob."','".$gen."','img/user.png')";
     					    	


							if ($conn->query($sql) === TRUE)
							 {
							  
							  $to = $email;
								$subject = "www.maninitc.online";

								$message = "
								<html>
								<head>
								<title>www.maninitc.online</title>
								</head>
								<body>
								<strong>Thanks For Registering With Us
								Here is your Password  echo  </p></strong>
								<table>
							
								</table>
								</body>
								</html>
								";

								// Always set content-type when sending HTML email
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

								// More headers
								$headers .= 'From: <admin@maninitc.online>' . "\r\n";
								$headers .= 'Cc: manish_m160081ca@nitc.ac.in' . "\r\n";

								mail($to,$subject,$message,$headers);
							  include 'registered.html';
							        }
							 else {
							    echo "Error: " . $sql . "<br>" . $conn->error;
							      }
							  }
}


$conn->close();

?>