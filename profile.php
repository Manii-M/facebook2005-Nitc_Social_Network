<?php
session_start();
if(!isset($_SESSION['email']))
{
    header('Location:index.html');
}
else
{
 $email = $_SESSION["email"];

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

    <title>NITC Social Network Profile</title>

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
            <div class="profile">
			<?php
									  $query="SELECT * FROM `register` WHERE email='$email'";
									  $res=$conn->query($query);
									  if($res->num_rows > 0)
									  {
										 // echo $res->num_rows;
										  while($row=mysqli_fetch_assoc($res))
									  {
										  $fname=$row["fname"];
										  $lname=$row["lname"];
										  $email=$row["email"];
										  $mob=$row["mobile"];
										  $gen=$row["gender"];
										  $dob=$row["dob"];
										  $img=$row["image"];
									  }
									  }
									?>
				  <h1 class="page-header"><?php echo $fname." ".$lname;?></h1>
              <div class="row">
                <div class="col-md-4">
				<?php
//echo $img;
						   if($img!='img/user.png')
						   {							   
//echo "mani";
 
// set the upload location
$UPLOADDIR = "profilepic/";

// if the form has been submitted then save and display the image(s)
if(isset($_POST['Submit'])){
    // loop through the uploaded files
    foreach ($_FILES as $key => $value){
        $image_tmp = $value['tmp_name'];
        $image = $value['name'];
        $image_file = "{$UPLOADDIR}{$image}";
		//echo $image_file;
	
        // move the file to the permanent location
        if(move_uploaded_file($image_tmp,$image_file)){
          
$im="UPDATE `nitc`.`register` SET `image` = '$image_file' WHERE `register`.`email` = '$email' AND `register`.`mobile` = '$mob'";
	if ($conn->query($im) === TRUE) {
		 echo <<<HEREDOC
<div class="logo" >
    <img style="height:auto; width:100%; padding: 4px;
background-color: rgb(255, 255, 255);
border: 1px solid rgb(221, 221, 221); border-radius:4px;" src="$image_file" alt="file not found" /></br>
</div>
HEREDOC;
    echo "Profile Pic Changed";
	?>
	
		   
<form name='newad' method='post' enctype='multipart/form-data' action=''>
    <table>
    <tr><strong>Change Profile Pic</strong>
        <td><input type='file' name='image' ></td>
    </tr>
    <tr>
        <td><input name='Submit' type='submit' value='Upload image'></td>
    </tr>
</table>
</form>
<?php
} else {
    echo "Error : " . $conn->error;
}
        
		}
	}
}
		else{
			echo <<<HEREDOC
<div class="logo" >
    <img style="height:auto; width:100%; padding: 4px;
background-color: rgb(255, 255, 255);
border: 1px solid rgb(221, 221, 221); border-radius:4px;" src="$img" alt="file not found" /></br>
</div>
HEREDOC;
			?>
			 
<form name='newad' method='post' enctype='multipart/form-data' action=''>
    <table>
    <tr><strong>Change Profile Pic</strong>
        <td><input type='file' name='image' ></td>
    </tr>
    <tr>
        <td><input name='Submit' type='submit' value='Upload image'></td>
    </tr>
</table>
</form>
<?php
							   
}

}

						   
						   else
						   {
							   
					//   echo $img;
// set the upload location
$UPLOADDIR = "profilepic/";
 
// if the form has been submitted then save and display the image(s)
if(isset($_POST['Submit'])){
    // loop through the uploaded files
    foreach ($_FILES as $key => $value){
        $image_tmp = $value['tmp_name'];
        $image = $value['name'];
        $image_file = "{$UPLOADDIR}{$image}";
		//echo $image_file;
	
        // move the file to the permanent location
        if(move_uploaded_file($image_tmp,$image_file)){
          
$im="UPDATE `nitc`.`register` SET `image` = '$image_file' WHERE `register`.`email` = '$email' AND `register`.`mobile` = '$mob'";
	if ($conn->query($im) === TRUE) {
		echo <<<HEREDOC
<div class="logo" >
    <img style="height:auto; width:100%; padding: 4px;
background-color: rgb(255, 255, 255);
border: 1px solid rgb(221, 221, 221); border-radius:4px;" src="$image_file" alt="file not found" /></br>
</div>
HEREDOC;
    echo "Profile Pic Updated";
	?>
		   
<form name='newad' method='post' enctype='multipart/form-data' action=''>
    <table>
    <tr><strong>Change Profile Pic</strong>
        <td><input type='file' name='image' ></td>
    </tr>
    <tr>
        <td><input name='Submit' type='submit' value='Upload image'></td>
    </tr>
</table>
</form>
<?php
	
} else {
    echo "Error updloading Image : " . $conn->error;
}
        
		}
							   
}

}else
{
	echo <<<HEREDOC
<div class="logo" >
    <img style="height:auto; width:100%; padding: 4px;
background-color: rgb(255, 255, 255);
border: 1px solid rgb(221, 221, 221); border-radius:4px;" src="$img" alt="file not found" /></br>
</div>
HEREDOC;


		
    ?>
	   
<form name='newad' method='post' enctype='multipart/form-data' action=''>
    <table>
    <tr><strong>Upload Profile Pic</strong>
        <td><input type='file' name='image' ></td>
    </tr>
    <tr>
        <td><input name='Submit' type='submit' value='Upload image'></td>
    </tr>
</table>
</form>
<?php
}
						   }
	?>
				
			
       
             </div>
                <div class="col-md-8">
				
                  <ul>
                    <li><strong>Name: </strong><?php echo $fname." ". $lname; ?></li>
                    <li><strong>Email: </strong><?php echo $email; ?></li>
                    <li><strong>Mobile: </strong><?php echo $mob; ?></li>
                    
                    <li><strong>Gender: </strong><?php echo $gen; ?></li>
                    <li><strong>DOB: </strong><?php echo $dob; ?></li>
					<li><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Update Profile</button> 
					<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModa">Change Password</button></li>
					<form role="form" method="post" action="updateprofile.php">
									  <div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog modal-md">
										
										  <!-- Modal content-->
										  <div class="modal-content"id="my" >
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <center><h4 class="modal-title">Update Your Profile</h4></center>
											</div>
											<div class="modal-body">
											
											  <div id="contaner">
										
										
										<div class="row">
										  <div  class="col-md-4" style="margin-left:10px; font-size:20; red">
										 
											 </div>
									<div class="col-md-4" width="500px" style="    width: 60.333333%;
										margin-left: 124px;" >


									 
									 
									 <div class="form-group"> 
									 
									
									<label>First Name</label>  <input type="text" name="fname" class="form-control" font face="italic" placeholder="Enter  First Name" value="<?php echo $fname ?>">
									</div>
									<div class="form-group"> 
									<label>Last Name </label><input type="text" name="lname" class="form-control" font face="italic" placeholder="Enter Last Name" value="<?php echo $lname ?>">
									</div>
									<div class="form-group"> 
									<label>Mobile</label><input type="nummber" name="mob" class="form-control" font face="italic" placeholder="Enter Last Name" value="<?php echo $mob ?>">
									</div>
									<div class="form-group"> 
									<label>Date Of Birth </label><input type="date" name="dob" class="form-control" font face="italic" placeholder="Enter Last Name" value="<?php echo $dob ?>">
									</div>

									<div class="form-group"> 

									<br>

									<center><button type="submit" class="btn btn-primary" value="submit">Update</button>
									</form>
									


									 </div>
									</div>     
										</div>	
										
									</div>
											</div>
											<div class="modal-footer">
											  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										  </div>
										  
										</div>
									  </div>
  </form>
  <form role="form" method="post" action="changepass.php">
									  <div class="modal fade" id="myModa" role="dialog">
										<div class="modal-dialog modal-md">
										
										  <!-- Modal content-->
										  <div class="modal-content"id="my" >
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <center><h4 class="modal-title">Update Your Profile</h4></center>
											</div>
											<div class="modal-body">
											
											  <div id="contaner">
										
										
										<div class="row">
										  <div  class="col-md-4" style="margin-left:10px; font-size:20; red">
										 
											 </div>
									<div class="col-md-4" width="500px" style="    width: 60.333333%;
										margin-left: 124px;" >


									 
									 
									 <div class="form-group"> 
									 
									
									<label>Current Password</label><input type="password" name="cpass" class="form-control" font face="italic" placeholder="Current Password" >
									</div>
									<div class="form-group"> 
									<label>New Password</label><input type="password" name="npass" class="form-control" font face="italic" placeholder="New Password" >
									</div>
									<div class="form-group"> 
									<label>Retype New Password</label><input type="password" name="rpass" class="form-control" font face="italic" placeholder="Confirm Password" >
									</div>

									<div class="form-group"> 

									<br>

									<center><button type="submit" class="btn btn-primary" value="submit">Change Password</button>
									</form>
									


									 </div>
									</div>     
										</div>	
										
									</div>
											</div>
											<div class="modal-footer">
											  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										  </div>
										  
										</div>
									  </div>
  </form>
                  </ul>
                </div>
              </div><br><br>
              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>
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
