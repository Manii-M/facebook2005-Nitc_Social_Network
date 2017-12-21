 <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">My Friends</h3>
              </div>
              <div class="panel-body">
                <ul>
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
									  }				
					 echo'<li><a href="seeprofile.php?mail='.$sender.'" class="thumbnail"><img src='.$image.' alt="">'.$name.'</a></li>';
					 
				  }
				
				 ?>
                </ul>
                <div class="clearfix"></div>
                <a class="btn btn-primary" href="members1.php">View All</a>
              </div>
            </div>