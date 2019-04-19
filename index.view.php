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
			<th>Model</th>
			<th>Amount sold</th>
			<th>Price</th>
			<th>Total</th>
		</tr>
		<?php require 'csvManipulation.php'; ?>

	</table>

	<br>

	<?php
		$hideIf = (count(scandir('downloads')) ==3) ? 'hidden' : '';//if the downloads folder is not empty, then...	echo hidden for some chosen html tags
		$showIf = (count(scandir('downloads')) !==3) ? 'hidden' : '';//if the dowload folder is empty
	?>
	<div class="card p-2 border-success">
		<div>
			
		</div>
		<form action="upload.php" method="post" enctype="multipart/form-data">
		    
		    	<div class="form-group" <?php echo $hideIf; ?> >
			    	<label>Select a .csv file to upload. The .csv file must have three columns (item, amount, price). This app will create a downloadable report that will have the total cost for every item (amount * price = total).</label>
			    	<input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file">
			    </div>
			    <div class="form-group" <?php echo $hideIf; ?> >
			    	<input class="btn btn-outline-success" type="submit" value="Submit!" name="submit" >
			    </div>		    
		</form>
	
		<div <?php echo $showIf; ?> >
			<button><a href="downloads/report.csv">Download your report here</a></button>
			
	    	<form method="POST" action="index.php">
		    	<button class="mt-2" name="delete" value="delete">Upload another .csv document</button>
		    </form>
	    </div>
	</div>     
</div>


<?php  ?>





</body>
</html>