<?php
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nitc";



   $conn = new mysqli( $servername, $username, $password, $dbname);
   

           if($conn -> connect_error)
           	   die("connection failed" . $conn-> connect_error);
           	else
           	{
           			
           			$email=$_POST['email'];
           			
           			$pass=$_POST['password'];
           			
           		 $query1 ="SELECT * FROM register WHERE email='$email' AND password='$pass' ";
				  $result = $conn->query($query1);

                  
				


                    if($result->num_rows > 0) 
                                 {
									$_SESSION["email"]=$email;
									
									echo"<script>";
									echo"location.href='wall.php'";
									echo"</script>";
								 }
							 else
							 {

					                echo"<script>";
									echo"location.href='wrongindex.html'";
									echo"</script>";
						/*	echo '<script language="javascript">';
							echo 'alert("invalid login id or password!")';
							echo '</script>';

							header( "refresh:0;url=index.html" );
                         */
											   }
			}
			
			
		
		
?>