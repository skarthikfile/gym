<?php

require("config.php");
$dbhost= "localhost";
$dbuser= "root";
$dbpass= "root";
$db_name= "dbgym";

/* Try to connect to database */
	mysqli_connect( "$dbhost", "$dbuser", "$dbpass") or
		die ( "Unable to connect to database server...");

/* Select database */
	mysqli_select_db( "$db_name" ) or
		die ( "Unable to select database...");

/* Set Email address to proper address if there is no hostname
   and it is not blank */

        if ( ( !(ereg("@",$email))) && ( $email != '' )){
	$email=$email.$hostmask;
        }
?>
