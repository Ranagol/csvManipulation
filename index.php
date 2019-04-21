<?php
//THIS BELOW IS NECCESARY TO HAVE GET A DYNAMIC UPLOADED FILE NAME (TO BE ABLE TO WORK WITH FILE THAT HAS RANDOM NAME)
if (count(scandir('uploads')) ==3) {//if the downloads folder is not empty, then...
	$a = (scandir('uploads'));
	//var_dump($a);
	//echo $a[2];
} else {
	$a = 0;
}



$filename = 'uploads/' . $a[2];

if ($_POST['delete'] = 'delete' && (count(scandir('downloads')) ==3)) {//if there is a delete request AND the uploads and downloads actually have some documents, then... Delete the files in the uploads and downloads dir.
	unlink('downloads/report.csv');
	unlink($filename);
} 

require 'index.view.php';


?>