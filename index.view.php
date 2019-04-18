<!DOCTYPE html>
<html>
<head>
	<title>cswManipulation</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<div class="container">
	<h3 class="mt-3">cswManipulation</h3>
	<br>
	<table class="table" id="tablewidth">
		<tr class="thead-dark">
			<th>Cost category</th>
			<th>Total cost</th>
		</tr>
		<?php require 'csvManipulation.php'; ?>

	</table>

	<br>

	<form action="upload.php" method="post" enctype="multipart/form-data">
	    <div class="card p-2">
	    	<div class="form-group">
		    	
		    	<label>Select a .csv file to upload:</label>
		    	<input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file">
		    </div>
		    <div class="form-group">
		    	<input type="submit" value="Upload csv" name="submit" >
		    </div>
		    <?php
		    	if (count(scandir('downloads')) ==3){
					echo "<a href=" . 'downloads/new.csv' . ">Download your report here</a>";					
				} else {
					echo "dir is empty. You can not dowload a file, if you did not upload one file first.";
				}

		    ?>
	    </div>
	    
	</form>
</div>








</body>
</html>