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

  
 <?php include_once"header.php"; ?>


   

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="members">
              <h1 class="page-header">Members</h1>
              
               
				<?php
				  $query="SELECT * FROM `register`";
									  $res=$conn->query($query);
									  if($res->num_rows > 0)
									  {
										 // echo $res->num_rows;
										  while($row=mysqli_fetch_assoc($res))
									  {
										  $email=$row['email'];
										  $fname=$row["fname"];
										  $lname=$row["lname"];
										  $name=$fname.' '.$lname;
										  $img=$row["image"];
										  echo'<div class="row member-row">
                <div class="col-md-3">
                  <img src="'.$img.'" class="img-thumbnail" alt="">
                  <div class="text-center">
                    '.$name.'
                  </div>
                </div>';
				  		  echo' <div class="col-md-3"></div>
                  
                <div class="col-md-3">
                  <p><a href="seeprofile.php?mail='.$email.'"  class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>
                </div>
              ';
?>
                  
                </div>
              
				
              
           
             
       
		

    <?php
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
