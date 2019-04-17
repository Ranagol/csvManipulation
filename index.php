<?php

function __autoload($className) {
 	$className = str_replace('..', '', $className);
 	require_once("classes/$className.php");
 	echo "Autoload activated just now.<br>";
}




$object = new Test();




require 'index.view.php';
//require 'upload.php';
?>