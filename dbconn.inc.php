<?php
############################################################################
# Please 
# (1) change the file name from dbconn.inc.example.php to dbconn.inc.php.
# (2) edit the code below to provide your user name, password, and database name
############################################################################

function dbConnect(){
	$host = "localhost"; // for uta.cloud server, "localhost" is the host name.  Do not edit.
	$user = "tkn7277_ex1"; // put your own user name here.
	$pwd = "#Titi0903824030"; // put your own database password here
	$database = "tkn7277_4321"; // put your database name here
	$port = "3306"; // server-specific.  For uta.cloud, the port number is 3306 (the default port)
 
	// initiate a new mysqli object to connect to the Database.  Store the mysqli object in a variable $conn.
	$conn = new mysqli($host, $user, $pwd, $database, $port) or die("could not connect to server");

	// return $conn to the fucntion call
	return $conn;}
?>