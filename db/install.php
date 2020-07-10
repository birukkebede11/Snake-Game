<?php 

require '../config.php';
$con = @mysqli_connect($sql_db_host, $sql_db_user, $sql_db_pass, $sql_db_name);
$queryfile = 'query.sql';

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($queryfile);
// Loop through each line
foreach ($lines as $line) {
	// Skip it if it's a comment
	if (substr($line, 0, 2) == '--' || $line == '')
	  continue;
	// Add this line to the current segment
	$templine .= $line;
	$query = false;
	// If it has a semicolon at the end, it's the end of the query
	if (substr(trim($line), -1, 1) == ';') {
	  // Perform the query
	  $query = mysqli_query($con, $templine);
	  // Reset temp variable to empty
	  $templine = ''; 
	}
}

echo "Done!!"; 
