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
<!doctype html>
<html>
    <head>
        <title>NITC</title>
        <style>
            @media only screen and (max-width : 540px) 
            {
                .chat-sidebar
                {
                    display: none !important;
                }
                
                .chat-popup
                {
                    display: none !important;
                }
            }
            
            body
            {
                background-color: #e9eaed;
            }
            
            .chat-sidebar
            {
                width: 200px;
                position: fixed;
                height: 100%;
                right: 0px;
                top: 159px;
                padding-top: 10px;
                padding-bottom: 10px;
                border: 1px solid rgba(29, 49, 91, .3);
            }
            
            .sidebar-name 
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }
            
            .sidebar-name span
            {
                padding-left: 5px;
            }
            
            .sidebar-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }
            
            .sidebar-name:hover
            {
                background-color:#e1e2e5;
            }
            
            .sidebar-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }
            
           
        </style>
       
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NITC Social Network Registration</title>
 
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	  
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script>
	
        function ShowUploadDialog()
        {
            var win = window.open("uploadform.php?pageId=reItems","_blank","toolbar=no, scrollbars=no, resizable=no, top=300, left=500, width=300, height=300");
            
        }
		
		
		
		function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    </script>
	
	
    </head>
    <body>
	   <?php include_once"header.php"; ?>
	    <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Wall</h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Write on the wall" id="txta"></textarea>
                  </div>
                  <button type="submit" class="btn btn-default" id="submit">Submit</button>
                  <div class="pull-right">
                    <div class="btn-toolbar">
                     <input type="button" class="btn btn-primary btn-large" id="btnUploadFile" name="btnUploadFile" onclick="ShowUploadDialog();" value="upload"/>
					  <input type="hidden" id="imgSmall" name="imgSmall" class="CssTextBox form-control" maxlength="250" displayfieldname="Image" placeholder="Image" />
                        <div id="msg" style="text-align: center;"> </div>
						<input type="hidden" id="email" value="<?php echo $email?>" />
                    </div>
                  </div>
              </div>
            </div>
            <div class="panel panel-default post">
			<?php
			  $query="SELECT * FROM `post` WHERE status ='TRUE' ORDER BY `id` DESC ";
			  $result=$conn->query($query);   
         while($row=mysqli_fetch_assoc($result))
            {
				$query1="SELECT `fname`,`image` FROM `register` WHERE email ='". $row['email']."'";
			  $result1=$conn->query($query1); 
			   while($row1=mysqli_fetch_assoc($result1))
			   {
				   $profile=$row1['image'];
				   $name=$row1['fname'];
			   }
			   $id=$row['id'];
			 echo'<div class="panel-body">
                 <div class="row">
                   <div class="col-sm-2">
                     <a href="#" class="post-avatar thumbnail"><img src="'.$profile.'" alt=""><div class="text-center">'.$name.'</div></a>
                     <div class="likes text-center"> '.$row['like'].' Like</div>
                   </div>
				   
                   <div class="col-sm-10">
				    <div class="bubble"style="margin-bottom: 7px;">
                       <div class="pointer">
                         <p>'.$row['text'].'</p>
                       </div>
                       <div class="pointer-border"></div>
                     </div>
				   <div class="cms">
                <div class="cms-photo" >
                    <img src="'.$row['image'].'" class="img-responsive" style="width:100%;height:30%">
                </div>
            </div>
                    
                     <p class="post-actions">  <a href="like.php?id='.$row['id'].'">Like</a>  <a href="#"></a></p>
                     <div class="comment-form">
                       <form action="comment.php" method="post" class="form-inline">
					   <input type="hidden" name="id" value="'.$row['id'].'">
					   <input type="hidden" name="image" value="'.$email.'">
                        <div class="form-group">
                          <input type="text" name="comment" class="form-control" placeholder="enter comment">
                        </div>
                        <button type="submit" class="btn btn-default">Comment</button>
                      </form>
                     </div>
                     <div class="clearfix"></div>
					  <div class="comments">';
					  
					$query2="SELECT * FROM `comment` as c,`register` as r WHERE c.id= $id and c.email = r.email ORDER BY `count` DESC ";
				   $result2=$conn->query($query2);   
         while($row2=mysqli_fetch_assoc($result2))
            { 
					 
                    
                       echo'<div class="comment">
                         <a href="#" class="comment-avatar pull-left"><img src="'.$row2['image'].'" alt=""></a>
                         <div class="comment-text">
                           <p>'.$row2['comment'].'.</p>
                         </div>
                       </div>
                       <div class="clearfix"></div>
                 ';
                    
			}
			echo' </div>
                   </div>
                 </div>
              </div>';
			}
			?>
              
            </div>
			</div>
			 <div class="col-md-4">
			
			 
			  
			 
			   <div class="panel panel-default friends">
			  <div class="panel-heading">
                <h3 class="panel-title">Chat Here</h3>
              </div>
			  <div class="panel-body">
			  <?php
				 $query="SELECT  `user2`  FROM `friend_list` WHERE user1='".$email."' AND status='YES' ";
                 $res=$conn->query($query);
				  while($row=mysqli_fetch_assoc($res))
	              {
					 $sender=$row["user2"];					 
					$query1="SELECT  * FROM `register` WHERE  email = '".$sender."'";	
                                        $res1=$conn->query($query1);
					                 while($row1=mysqli_fetch_assoc($res1))
									  {
										  $fname=$row1["fname"];
										  $lname=$row1["lname"];
										  $name=$fname.' '.$lname;
										  $image=$row1['image'];
										  $lower=lcfirst($name);
										  $email1=$row1["email"];
									  }			
                                   $lower1 = "'$lower'";
                                   $name1="'$name'";								   
					 echo' <div class="sidebar-name">
                <a href="savemessage.php?email1='.$email1.'">
                    <img width="30" height="30" src="'.$image.'"/>
                    <span>'.$name.'</span>
                </a>
            </div>';
					 
				  }
				
				 ?>
        </div>
        
		  </div>
		 
		  </div>
			</div>
			</div>
          
        
         
       
    </body>
	 <script type="text/javascript">

  $(document).ready(function(){
      $("#submit").click(function(){
	  var txt=$("#txta").val();
      var img=$("#imgSmall").val();
	  var email=$("#email").val();
	   var dataString="img="+img+"&txt="+txt+"&email="+email;
	   if(txt=="")
          alert("Please Fill All the Fields");
else{	  
		$.ajax({
                          type:"POST",
                           url:"postupload.php",
                           data:dataString,
                            cache:false,
                             success:function(result){
                                $("#msg").html(result).css("color","green");
                                 $("#txta").val(" ");
                                      
                                 },
                                  error:function(xhr,status)
                                   {
                                    alert("error");
                                     }
                                 });
}
      });
      
  });
  
  </script>
   <footer>
      <div class="footer">
        <p>NITC Social Media  &copy 2017 Mani</p>
      </div>
    </footer>
</html>