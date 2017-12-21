<?php
session_start();
if(!isset($_SESSION['email']))
{
    header('Location:index.html');
}
else
{
 $email = $_SESSION["email"];
 		$status='N';
		$check='PENDING';
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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NITC Social Network: Members Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
  </head>

  <body>
 
  

      <?php include_once"header.php"; ?>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="members">
              <h1 class="page-header">Members</h1>
			  
			  
			  
			  
			<?php  
               $rowcount=0;
			  $query="SELECT * FROM `register` where email <> '".$email."' ";
									  $res=$conn->query($query);
									  if($res->num_rows > 0)
									  {
										 // echo $res->num_rows;
										  while($row=mysqli_fetch_assoc($res))
									  {
										  $fname=$row["fname"];
										  $lname=$row["lname"];
										  $name=$fname.' '.$lname;
										  $img=$row["image"];
										  $uemail=$row['email'];										  
										$query1="SELECT * FROM `friends` WHERE sender='".$email."' AND receiver ='".$uemail."' AND friends = 'NO'";											
                                        $res1=$conn->query($query1);
					                 while($row1=mysqli_fetch_assoc($res1))
									  {
										  $status=$row1['r_status'];
									  }
									  $query3="SELECT * FROM `friend_list` where user1='".$email."' AND user2='".$uemail."' AND status='YES'";
									  $res3=$conn->query($query3);
					                   if($res3->num_rows > 0)
									  {
									    $rowcount=1;
									  }
                                       //echo $rowcount; 								 
										  if($rowcount == 0)
										  {
											  echo'<div class="row member-row">
                <div class="col-md-3">
                  <img src="'.$img.'" class="img-thumbnail" alt="">
                  <div class="text-center">
                    '.$name.'
                  </div>
                </div>';
				
					if($status == $check)
				{
                    echo' <div class="col-md-3">
                  <p><a href="canclefriend.php?semail='.$email.'&remail='.$uemail.'"" class="btn btn-success btn-block"><i class="fa fa-users"></i> Cancle Request</a></p>
                </div>
                <div class="col-md-3">
                  <p><a href="message.php?mail='.$uemail.'" class="btn btn-default btn-block"><i class="fa fa-envelope"></i>  Send Message</a></p>
                </div>
                <div class="col-md-3">
                  <p><a href="seeprofile.php?mail='.$uemail.'"  class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>
                </div>
              </div>';
				}			
              else
				{
                    echo' <div class="col-md-3">
                  <p><a href="addfriend.php?semail='.$email.'&remail='.$uemail.'"" class="btn btn-success btn-block"><i class="fa fa-users"></i> ADD FRIEND</a></p>
                </div>
                <div class="col-md-3">
                  <p><a href="message.php?mail='.$uemail.'" class="btn btn-default btn-block"><i class="fa fa-envelope"></i>  Send Message</a></p>
                </div>
                <div class="col-md-3">
                  <p><a href="seeprofile.php?mail='.$uemail.'"  class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>
                </div>
              </div>';
				}	
										  }
				
				
$status='N';
$rowcount=0;				
									 }
									 }
			
			
			
			  
              
          
  ?>
  </div>
          </div>
          <div class="col-md-4">
           <?php include_once"my-friend.php"; ?>
           <?php include_once"allmember.php"; ?>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer">
        <p>NITC Social Media  &copy 2017 Mani</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
