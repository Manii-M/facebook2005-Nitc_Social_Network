<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <fieldset>
    <legend>Image Upload</legend>
     <form action="cupload.php" method="post" enctype="multipart/form-data" >
          <div class="row">
            <div class="col-md-12">
            <label for="upload" class="control-label">Select file</label>
            <input name="upload" class="multi"  type="file" size="15"  displayfieldname="Image" required/>
            <input type="hidden" value="<?php echo $_GET['pageId']?>" name="pageId"/>
            </div>
          </div>
            <div class="row" align="center">
            <br />
            <br /><br/>
            <input type="submit" name="Submit" value="Upload" class="btn btn-primary btn-large"/>
            <a href="#" onclick="self.close();"class="btn btn-danger btn-large">Cancel</a>
            </div>
          
    </form>
 </fieldset>
<p>


