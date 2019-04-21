<?php
if (count(scandir('uploads')) ==3) {//if the downloads folder is not empty, then...
	$a = (scandir('uploads'));
	//var_dump($a);
	//echo $a[2];
}

$filename = 'uploads/' . $a[2];



// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (count(scandir('uploads')) ==3){//IF THERE IS AN UPLOADED FILE IN UPLOADS, THEN OPEN IT, AND WORK WITH IT
	if (($h = fopen("{$filename}", "r")) !== FALSE) {
	  // Each line in the file is converted into an individual array that we call $data
	  // The items of the array are comma separated
		while (($data = fgetcsv($h, 1000, ",")) !== FALSE){
		    // Each individual array is being pushed into the nested array
		    $the_big_array[] = $data;		
	  	}
	// Close the file
	fclose($h);

	$report = [];//this will be our newly created array that contains the total too. Total was not in the initially uploaded file, but it will be on the 
	$report = $the_big_array;//but, we need to add the total column...

	for ($i=0; $i < count($the_big_array) ; $i++) {//HERE WE ARE DISPLAYING THE .CSV CONTENT TO OUR WEBPAGE
		echo "<tr>";
			echo '<td>' . $the_big_array[$i][0] . '</td>';//model
			echo '<td>' . $the_big_array[$i][1] . '</td>';//amount
			echo '<td>' . $the_big_array[$i][2] . '</td>';//cost
			echo '<td>' . $the_big_array[$i][1] * $the_big_array[$i][2] . '</td>';//total
			$report[$i][3] = $the_big_array[$i][1] * $the_big_array[$i][2];//here we are adding the total column to our report
		echo "</tr>";
	}

	

	//HERE WE ARE CREATING OUR FINAL csv REPORT, THAT WILL BE DOWNLOADED
	// open the file for writing
	$file = fopen('downloads/report.csv', 'w');

	// save each row of the data
	foreach ($report as $row)
	{
	fputcsv($file, $row);
	}
	 
	// Close the file
	fclose($file);
	}
	
} else {
	echo "<strong>Please upload your .csv report. Right now, without your file there is nothing to show.</strong>";
}



















?>