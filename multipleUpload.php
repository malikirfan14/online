<html>
<head>
    <title>Create Zip File of Multiple Uploaded Files using PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<style type="text/css">
    body {
        background:#f2f2f2;
    }
    .page-container {
        width: 50%;
        margin: 5% auto 0 auto;
    }
    .form-container {
        padding: 30px;
        border: 1px solid #cccc;
        background: #FEFEFE;
    }
    .error,.success  {
        font-size: 18px;
    }
    .error {
        color: #b30000;
    }
    .success {
        color: #155724;
    }
    .download-zip {
        color: #000000;
    }
</style>
</head>
<body>
    <?php include 'upload.php'; 
  error_reporting(0);
    ?>
    <div class="row">
    	<div class="page-container row-12">
    	     <div class="col-12 text-center mb-5">
                        <h4><b>Upload Result file here</b></h4>
                        <br/>
                        <span class="help-block">Step 1: <b>Upload documents here </b></span>
                        <br/>
                        <span class="help-block">Step 2: Select all documents in one go (HINT : Ctrl + click) </span>
                           <br/>
                        <span class="help-block">Step 3: Selected documents should be <b> FSc Result</b> & <b>MDCAT Result</b>. </span>
                           <br/>
                      
                        <!--<span class="help-block">Your phone number won't be disclosed anywhere </span>-->
                     </div>
    		<!--<h4 class="col-12 text-center mb-5">Create Zip File of Multiple Uploaded Files </h4>-->
    		<div class="row-8 form-container">
            <?php 
            if(!empty($error)) { 
            ?>
    			<p class="error text-center"><?php echo $error; ?></p>
            <?php 
            }
            ?>
            <?php 
            if(!empty($success)) { 
            ?>
    			<p class="success text-center">
            <!--Files uploaded successfully and compressed into a zip format-->
            </p>
            <p class="success text-center">
			Files Uploaded Successfully
            </p>
	    	    <?php 
	    	      echo "<script>alert('File Uploaded successfully');
        window.location.href='profile.php';</script>";
            }
            ?>
		    	<form action="" method="post" enctype="multipart/form-data">
				    <div class="input-group">
						<div class="input-group-prepend">
						    <input type="submit" class="btn btn-primary" value="Upload">
						</div>
						<div class="custom-file">
						    <input type="file" class="custom-file-input" name="img[]" multiple required>
						    <label class="custom-file-label" >Choose File</label>
						</div>
					</div>
				</form>
				
    		</div>
		</div>
	</div>
</body>
</html>