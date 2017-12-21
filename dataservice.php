<?php

class dataservice
{
    private
       $db_connect;
    private
       $db_query;
       
    
   function __construct()
    {
        global $DEBUGMODE;
        global $PROJECTTYPE;
        try
        {
			//$this->db_connect=mysqli_connect('magichobdb.db.10873218.hostedresource.com','magichobdb','MHdb@123','magichobdb');
             //$this->db_connect=mysqli_connect('server name','db user name','db password','database name');    			
			$this->db_connect=mysqli_connect('localhost','root','','nitc');
		 	//mysqli_select_db($this->db_connect, "test");
            //----------Start code to remove sql injection--------------//
            $this->secureSuperGlobalGET($this->db_connect);
            $this->secureSuperGlobalPOST($this->db_connect);
            $this->secureSuperGlobalREQUEST($this->db_connect);

             //----------End code to remove sql injection--------------//
         	if(mysqli_connect_error()) 
         		throw new ErrorException("Hey Connection cannot be Made Verify the parameter specified by YOU! Database!",1);
        	}
        catch( exception $ex)
        {
            if ($PROJECTTYPE == "app")
            {
                echo "hjjkkk";  
            throw new logicalexceptionInApp($ex);
            }
            else
            $this->db_exception($ex->getMessage()); 
        }
    }
    
    function changedate($dt)
    {
    $nDt="0000/00/00";
    if(strlen($dt)==0)
    $dt=$nDt;
    list($month, $day, $year) = split('[/.-]', $dt);
    $nDt=$year."-".$month."-".$day;
    return $nDt;
}
function changedatetoindian($dt)
    {
    $nDt="0000/00/00";
    if(strlen($dt)==0)
    $dt=$nDt;
    list($year,$month,$day) = split('[/.-]', $dt);
    $nDt=$day."-".$month."-".$year;
    return $nDt;
}


    function find_table_name($q) 
    {
     $c=4;$tblName="";
     $i=strpos($q,'into');
     $i+=4;
     while(substr($q,$i,1)==' ')
     {
         $c++;
         $i++;
     }
      $i=strpos($q,'into');
      $i+=$c;
      while(substr($q,$i,1)!=' ')
      {
          $tblName.=substr($q,$i,1);
          $i++;
      }
      return $tblName;
}

   /* function to display the message after an exception encountered
   -----------------------------------------------------------------*/
   function db_exception($dbError) 
   {
       
       echo $dbError;
   }

                 
  /* function performs insertion in the database and returns primary key of that record
   -------------------------------------------------------------------------------------*/
 static  function getExtension($str) 
    {         
     $i = strrpos($str,".");
     
     if (!$i) 
         { 
             return ""; 
         }         
     $l = strlen($str) - $i;         
     $ext = substr($str,$i+1,$l);
    return $ext; 
    }

 static function upload_Image($fileTBName,$fileLimitSize,$destFolderName,$uid=null) //this uploads images to the server
   {
    $msg="";
    $add="";

    $filename = stripslashes($_FILES[$fileTBName]['name']);     //get the extension of the file in a lower case format          
    $extension = dataservice::getExtension($filename);         
    $extension = strtolower($extension);

    if (($extension == "jpg") || ($extension == "jpeg") || ($extension == "png") || ($extension == "gif"))
    {
      //  if ($_FILES[$fileTBName]["size"] < $fileLimitSize)
       // {
          $add=$destFolderName."/". $_FILES[$fileTBName]["name"];     
          echo $add."<br>";
         // if (!file_exists($add))
         // {
              if(!empty($_FILES[$fileTBName]['name']))
              {
              move_uploaded_file($_FILES[$fileTBName]["tmp_name"], $add);
              return $add;
              }                                                                                                      
          //}
        //}
      /*
      else
      {
          $msg="Your uploaded file size is more than 250KB so please reduce the file size and then upload. Visit the FAQs page to know how to reduce the file size.<BR>";
          return $add;
      }
      */
    }

    else
    {
         $msg="Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>".$msg;
         return $add;
    }
    
    }
	
	/* upload resize image */
	static function upload_Resize_Image($fileTBName,$destFolderName,$width,$height,$uid=null) //this uploads images to the server
   {
    $msg="";
    $add="";
    $filename = stripslashes($_FILES[$fileTBName]['name']);     //get the extension of the file in a lower case format         
     
    $extension = dataservice::getExtension($filename);         
    $extension = strtolower($extension);

        list($w, $h) = getimagesize($_FILES[$fileTBName]['tmp_name']);
        /* calculate new image size with ratio */
        $ratio = max($width/$w, $height/$h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* new file name */
         //$path=  $destFolderName.$_FILES[$fileTBName]['name'];
         $path=  $destFolderName.'.'.$extension;
       // $path1 ="../".$destFolderName.$_FILES[$fileTBName]['name'];
       
        /* read binary data from image file */
        $imgString = file_get_contents($_FILES[$fileTBName]['tmp_name']);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $image,
          0, 0,
          $x, 0,
          $width, $height,
          $w, $h);
        /* Save image */
        switch ($_FILES[$fileTBName]['type']) {
            case 'image/jpeg':
                imagejpeg($tmp, $path, 100);
                
                break;
            case 'image/png':
                imagepng($tmp, $path, 0);
                
                break;
            case 'image/gif':
                imagegif($tmp, $path);
                
                break;
            default:
                exit;
                break;
        }
        return $path;
        /* cleanup memory */
        imagedestroy($image);
        imagedestroy($tmp);
        }
    
    
   
    
   function insertdata_with_pkreturn($query)
    {
      try
          {
           $insert_result=mysqli_query($this->db_connect,$query);  
           if($insert_result!=1)
		   {
              throw new ErrorException("Insertion Can't be Completed! Please verify the query");
			}
           else
              {
			  $tblName=$this->find_table_name($query);
                $query_result=mysqli_query($this->db_connect,"select * from ".$tblName);
                while($row = mysqli_fetch_row($query_result))
                  {
                    $last_rec=$row[0] ;
				  }
               return($last_rec);
               } 
          }
		   
          catch(exception $ex)
          {
              $this->db_exception($ex);
          }                                                              
          
    }   
     function insertdata_with_pkreturns($query)
    {
        $id = 0;
      try
          {
              $Insert_result=mysqli_query($this->db_connect,$query); 
              $id=mysqli_insert_id( $this->db_connect);  
              
            //  if($Insert_result != 1)
              //  throw new ErrorException("Insertion Can't be Completed! Please verify the query");
              // else
               //{
                  // $this->db_query="select * from cutomer";
                   //$query_result=mysqli_query($this->db_connect,$this->db_query);
                      
                     //  while($row = $query_result->fetch_row())
                      // {
                      //  $last_rec=$row[0] ;
                      // }
                  // print($last_rec."<br>");
               return($id);
               //} 
          }                                     
          catch(exception $ex)
          {
            echo $ex->getMessage();
              //$this->db_exception($ex);
          }                                                              
          
    }                   
                  
	function insert_data($query)
    {
       // echo $query;
          try
          {
	          $query_result=mysqli_query($this->db_connect,$query);  
              if($query_result!=1)
              {
	             throw new ErrorException("Insertion Can't be Completed! Please verify the query");
		      }
              else
		      {
		  	    return($query_result);
		      }
          }                                     
         catch(exception $ex)
         {
               $this->db_exception($ex);
         }
    }       
	   
    function update_data($query)
    {
		//echo $query;
        $update_result=mysqli_query($this->db_connect,$query);
        if($update_result!=1)
         throw new ErrorException("Updation can't be completed!");
         else
         {
           mysqli_commit($this->db_connect);
            return($update_result);             
         }
        
    }
    function delete_data($query)
    {
       try
          {
          $query_result=mysqli_query($this->db_connect,$query);  
          if($query_result!=1)
            throw new ErrorException("Deletion Can't be Completed! Please verify the query");
          else{return($query_result);}
          }                                     
          catch(exception $ex)
          {
            $this->db_exception($ex);
          }
    }     
        
    function does_exist($query)
    {
      $query_result = mysqli_query($this->db_connect,$query);
      if($query_result->num_rows > 0) { return true;} 
      else{ return false; }
      
    }  
      function fetch_query_without_exception($query)
    {
          $query_result=mysqli_query($this->db_connect,$query);
          return $query_result;
        
    }
    
    function fetch_query($query) //for multiple rows
    {
       //$query_result=mysqli_query($query,MYSQLI_ASSOC);
       global $PROJECTTYPE;
       global $DEBUGMODE;
           try
           {
           $query_result=mysqli_query($this->db_connect,$query);
           
              if (!$query_result) {
                  $err = mysqli_error($this->db_connect);
                   throw new ErrorException($err);
              } 
               return $query_result;
          }                                             
          catch(exception $ex)
          {
              if ($PROJECTTYPE == "app")
                throw new logicalexceptionInApp($query."<br><br>".$ex);
                else
                $this->db_exception($ex);
              
          }
   }
	
	function fetch_data($query)  //for single  row
    {
       $query_result=mysqli_query($this->db_connect,$query);
      //  echo $query;
	   $row = mysqli_fetch_array($query_result, MYSQLI_BOTH);
       return($row);
    }
   
   function returnPK($query)
   {   
   		$tblName=find_table_name($query);
        //$this->db_query="select * from companyname";
        $query_result=mysqli_query($this->db_connect,"select * from ".$tblName);
        while($row = $query_result->fetch_row())
        {
          $last_rec=$row[0] ;
        }
        //print("Last Inserted Id=".$last_rec);
		return $last_rec;
        
   }
   
   function display_record_tableFormat($query)
     {
     
         try
         {
             $query_result=mysqli_query($this->db_connect,$query,MYSQLI_ASSOC);
             if(mysqli_connect_error())
             throw new ErrorException("Please Check the query!");
             else
             {
                $row = $query_result->fetch_row();
                print("<table>");
                 while($row = $query_result->fetch_row())
                 {
                  $c=0;
                  print("<tr>");
                  while($c<count($row))
                   { 
                     print("<td>".$row[$c]."</td>");
                     $c++;
                    }            
                    print("</tr>");
                   }           
                   print("</table>");
             }
         }
         catch(Exception $ex)
         {
            $this->db_exception($ex); 
         }
         
      }
	
	function begin()
	{
		mysqli_autocommit($this->db_connect, FALSE);

	//@mysql_query("BEGIN");
	}
	
	function commit()
	{
	//@mysql_query("COMMIT");
	mysqli_commit($this->db_connect);
	}
	
	function rollback()
	{
	//@mysql_query("ROLLBACK");
	mysqli_rollback($this->db_connect);
	}
		
   function __destruct()
    {
      mysqli_close($this->db_connect);
    }
    function secureSuperGlobalGET($db_connect)
    {
         foreach($_POST as $var => $val)
            {
                $val = htmlspecialchars(stripslashes($val));
                $val = str_ireplace("script", "blocked", $val);
               $_POST[$var] = mysqli_real_escape_string($db_connect, $val);
            }
           
           
    }
    
    function secureSuperGlobalPOST($db_connect)
    {
        foreach($_GET as $var => $val)
            {
                $val = htmlspecialchars(stripslashes($val));
                $val = str_ireplace("script", "blocked", $val);
               $_GET[$var] = mysqli_real_escape_string($db_connect, $val);
            }
    }
     function secureSuperGlobalREQUEST($db_connect)
    {
         foreach($_REQUEST as $var => $val)
            {
                $val = htmlspecialchars(stripslashes($val));
                $val = str_ireplace("script", "blocked", $val);
               $_REQUEST[$var] = mysqli_real_escape_string($db_connect, $val);
            }
    }  
	

 }
 
 class RequestCleaner
{
 function secureSuperGlobalGET(&$value, $key)
    {
        $_GET[$key] = htmlspecialchars(stripslashes($_GET[$key]));
        $_GET[$key] = str_ireplace("script", "blocked", $_GET[$key]);
       // $_GET[$key] = mysql_escape_string($_GET[$key]);
	    $_GET[$key] = mysqli_real_escape_string($_GET[$key]);
        return $_GET[$key];
    }
    
    function secureSuperGlobalPOST(&$value, $key)
    {
        $_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));
        $_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);
        $_POST[$key] = mysql_real_escape_string($_POST[$key]);
        return $_POST[$key];
    }
     function secureSuperGlobalREQUEST(&$value, $key)
    {
        $_REQUEST[$key] = htmlspecialchars(stripslashes($_REQUEST[$key]));
        $_REQUEST[$key] = str_ireplace("script", "blocked", $_REQUEST[$key]);
        $_REQUEST[$key] = mysql_real_escape_string($_REQUEST[$key]);
        return $_REQUEST[$key];
    }   
    function secureGlobals()
    {
        array_walk($_GET, array($this, 'secureSuperGlobalGET'));
        array_walk($_POST, array($this, 'secureSuperGlobalPOST'));
        array_walk($_REQUEST, array($this, 'secureSuperGlobalREQUEST'));
    }
}
/*
$rc = new RequestCleaner();
 $rc->secureGlobals();
 */
//$dt=new dataservice();
//$dt->insert_data("insert into emp(empName) values('Rathor')");
//echo "Inerted successfully!";
 //$dt->delete_data("delete from companyname where cnId=196");
 //$dt->does_exist("select * from companyname where cnName='Siyaram'");
 //$dt->get_data("select * from finalcompanyvehiclelist");
 //$pk=$dt->insertdata_with_pkreturn("insert into companyname(cnName) values('Sarika Singh Rathor')");
 //print($pk);
 //$dt->update_data("update companyname set cnname='Sumit Singh Somvanshi' where cnName='Sumit Narayan'");
 
 
 ?>