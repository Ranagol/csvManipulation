<?php


if ($_POST['delete'] = 'delete' && (count(scandir('downloads')) ==3)) {//if there is a delete request AND the uploads and downloads actually have some documents, then...
	var_dump($_POST);
	unlink('downloads/report.csv');
	unlink('uploads/aRandomCsvFile.csv');
	echo "All files are deleted.";
} 

require 'index.view.php';


?>