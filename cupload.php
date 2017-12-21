
  <html>
<head>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<?php
 include_once "dataservice.php";
$error = '';
$img = '';
$copy_link = ''; 
//$pageId=$_POST['pageId'];
        
if(isset($_POST['Submit'])) {

   /* if($pageId=="notif")
        $address = dataservice::upload_Image('upload',250,"../uploads/notifications");
    else if($pageId=="reitem")
        $address = dataservice::upload_Image('upload',250,"../uploads/reitems");
    else
    $address = dataservice::upload_Image('upload',250,"../uploads");   
        
   $copy_link = '<a id="closelink" href="#">'.$address.'</a>';
   echo "File Uploded." . $copy_link;
     */
     //$address = dataservice::upload_Resize_Image('upload',"../uploads/reitems/");
     //image upload code start
    // $files = array();
     
                       
            $max_file_size = 1024*2000; // 1024kb (2000 for 2 mb)  (10000 for 10 mb)
           // echo $max_file_size;
            $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
            // thumbnail sizes
            $randNum = rand(1234,6543);
            $unique = uniqid();
            $sizes = array(960 => 720, 640 => 480, 470 => 320);

            if (isset($_FILES['upload']['name']))
            {
                
                //echo $_FILES['upload']['size'];
                if($_FILES['upload']['size'] < $max_file_size ){
                    // get file extension
                    $ext = strtolower(pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION));
                    if (in_array($ext, $valid_exts)) {
                        /* resize image */
                        foreach ($sizes as $w => $h) {
                            //echo $w."-".$h;
                            $imgPth = "";
                           if($w == 470)
                            {
                                 $imgPth = "post/s_".$randNum."".$unique."";     
                                  								 
                            }                            
                            $files[] = dataservice::upload_Resize_Image('upload',$imgPth,$w, $h);
                            
                        }
                   //     echo "images.....";
                        print_r($files);
                        echo "g";

                    } else {
                        $msg = 'Unsupported file';
                    }
                    
                }
                
                 else{
                    $msg = 'Please upload image smaller than 1MB';
                }
            }
            
           // exit(); 
           //image upload code end
     }
     
    
?>
<script>
$(document).ready(function() { 
    
      $("#closelink").click(function() {
        
        
        self.close();
    });
    
   // $("#closelink").click(function() {
        $("#imgLarge", window.opener.document).val('<?php echo $files[0]; ?>');
        $("#imgMedium", window.opener.document).val('<?php echo $files[1]; ?>');
        $("#imgSmall", window.opener.document).val('<?php echo $files[2]; ?>');
        $("#preview", window.opener.document).html('<img src="<?php echo $files[2]; ?>" id="img_notImage" style="height:150px;float:left;vertical-align:text-bottom;"><span style="float:left;margin-left:20px;margin-top:10px;margin-bottom:5px;">  <input type="button" class="btn btn-primary btn-large" id="btnUploadFile" name="btnUploadFile" onclick="ShowUploadDialog();" value="upload"/>  </span>');
        self.close();
   // });
   
});  
</script>
</html>

