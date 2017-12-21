<?php
session_start();
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
            
           .chat-box-head {
    padding: 10px 15px;
    border-bottom: 2px solid #04519b;
    background-color: #04519b;
    color: #FFF;
    text-align: center;
}
.panel-bboody {
    padding: 15px;
}
.chat-box-main {
    max-height: 500px;
    overflow: auto;
}
.chat-box-right {
    width: 100%;
    height: auto;
    padding: 15px;
    border-radius: 5px;
    position: relative;
    border: 1px solid #C5C5C5;
    font-size: 12px;
}
.chat-box-left {
    width: 100%;
    height: auto;
    padding: 15px;
    border-radius: 5px;
    position: relative;
    border: 1px solid #C5C5C5;
    font-size: 12px;
}
.chat-box-right::after {
    top: 100%;
    right: 10%;
    border-style: solid;
    border-color: #C5C5C5 transparent transparent;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image: none;
    content: " ";
    position: absolute;
    border-width: 15px;
    margin-left: -15px;
}
.chat-box-div {
    border: 2px solid #04519b;
}
.chat-box-left::after {
    top: 100%;
    left: 10%;
    border-style: solid;
    border-color: #C5C5C5 transparent transparent;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image: none;
    content: " ";
    position: absolute;
    border-width: 15px;
    margin-left: -15px;
}
.chat-box-name-right {
    color: #354EA0;
    margin-top: 30px;
    margin-right: 60px;
    text-align: right;
}
.chat-box-name-left {
    margin-top: 30px;
    margin-left: 60px;
    text-align: left;
    color: #049E64;
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
	
	
	
    </head>
    <body>
	   <?php include_once"header.php"; ?>
	    <div class="container">
        <div class="row">
          <div class="col-md-8">
                     <div class="chat-box-div">
                    <div class="chat-box-head">
                       Chat Box
                            <div class="btn-group pull-right" style="margin-top: -5px;">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-comments-o fa-lg"></i>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  
                                    <li><a href="logout.php"><span class="fa fa-circle-o-notch"></span>&nbsp;Logout</a></li>
                                </ul>
                            </div>
                    </div>
					
                    <div class="panel-body panel-bboody chat-box-main">
					<?php
					$email1=$_REQUEST['email1'];
					$query="SELECT * FROM `chat` WHERE (sender='".$email."' and receiver='".$email1."') or (sender='".$email1."' and receiver='".$email."')";
					 $res=$conn->query($query);
					 $query1="SELECT * FROM `register` WHERE email='".$email1."'";
									 $res1=$conn->query($query1);
									$row1=mysqli_fetch_assoc($res1);
                         while($row=mysqli_fetch_assoc($res))
                        {
							 if($row["receiver"]== $email1)
                            {
									
							 echo '<div class="chat-box-right">
                           '.$row["comment"].'
                        </div>
                        <div class="chat-box-name-right">
                            
                            - Me
                        </div><hr class="hr-clas">';
                            }
							 else
                            {
                                 echo '<div class="chat-box-left">
                           '.$row["comment"].'
                        </div>
                        <div class="chat-box-name-left">
                            
                            -   '.$row1['fname'].'
                        </div><hr class="hr-clas">
                      
                        
                        ';
                                  
                            }
						}
					
					?>
                       
                    </div>
                    <div class="chat-box-footer">
						<form action="smessage.php" action="POST">
                        <div class="input-group">
						<input type="hidden" name="sender" value="<?php echo $email;?>">
						<input type="hidden" name="receiver" value="<?php echo $email1;?>">
                            <input class="form-control" placeholder="Enter your Message..." type="text" name="txtcomt" >
                            <span class="input-group-btn">                               
                                 <button type="submit" id="submit" class="btn btn-black" style="border-radius:0px;">
                                    <i class="fa faa fa-paper-plane"></i>
                                    SEND
                                </button>
                            </span>
                        </div>
						</form>
                    </div>
                      
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
			
          
        <footer>
      <div class="footer">
        <p>NITC Social Media  &copy 2017 Mani</p>
      </div>
    </footer>
         
       
    </body>
	
</html>