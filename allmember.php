 <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">All Members</h3>
              </div>
              <div class="panel-body">
                <ul>
				<?php
				
                
				  
									 
				       	$query1="SELECT  * FROM `register`";	
                                        $res1=$conn->query($query1);
										if($res1->num_rows > 0)
										{
					                 while($row1=mysqli_fetch_assoc($res1))
									  {
											$email=$row1["email"];
										$fname=$row1["fname"];
										  $lname=$row1["lname"];
										  $name=$fname.' '.$lname;
										  $image=$row1['image'];
									  			
					 echo'<li><a href="seeprofile.php?mail='.$email.'" class="thumbnail"><img src='.$image.' alt="pimage"> '.$name.'</a></li>';
					
									  }
				  
										}
				 ?>
                </ul>
                <div class="clearfix"></div>
                <a class="btn btn-primary" href="members1.php">View All Friends</a>
              </div>
            </div>