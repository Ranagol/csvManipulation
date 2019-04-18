<?php

$filename = 'uploads/aRandomCsvFile.csv';

// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_big_array[] = $data;		
  }

  // Close the file
  fclose($h);
}

// Displaying the $the_big_array...
/*echo "<pre>";
var_dump($the_big_array);
echo "</pre>";
*/

for ($i=0; $i < count($the_big_array) ; $i++) { 
	echo "<tr>";
	echo '<td>' . $the_big_array[$i][0] . '</td>';//key
	echo '<td>' . $the_big_array[$i][1] * $the_big_array[$i][2] . '</td>';//value
	echo "</tr>";
}


/* THIS IS HOW I TRIED TO SOLVE THE DUPLICATE VALUE/KEY ISSUE - UNSUCCESFULLY. 
$new_array = [];

for ($i=0; $i < count($the_big_array) ; $i++) {//here iterating through the big array
	if (array_key_exists($the_big_array[$i][0], $new_array)) {
		echo $the_big_array[$i][0] . ' this is the problematic spot found by the IF conditional' . '<br>';//ok, with this it can find the problematic spots. The hotel and the fuel.

		//HERE WE TRY JUST TO ADD TO THE ALREADY EXISTANT VALUES
			echo  $new_array[$the_big_array[$i][0]] += $the_big_array[1][1] * $the_big_array[1][2]  ;
			"Adding needs to happen for this key: ";
	}
	
	$new_array[$the_big_array[$i][0]] = $the_big_array[$i][1] * $the_big_array[$i][2];//this is the initial creation
	echo "Initial creation from the sub-array : " . $i . '. The key is ' . $the_big_array[$i][0] . '. Value is ' . $the_big_array[$i][1] . ' * ' . $the_big_array[$i][2] . '.<br>';

}
var_dump($new_array);
*/


// open the file for writing
$file = fopen('downloads/new.csv', 'w');

// save each row of the data
foreach ($the_big_array as $row)
{
fputcsv($file, $row);
}
 
// Close the file
fclose($file);






?>