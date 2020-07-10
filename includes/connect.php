<?php  
	// Needs the values from the config file
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once($root.'/config.php');

	// Connect to SQL Server
	$sqlConnect   = mysqli_connect($sql_db_host, $sql_db_user, $sql_db_pass, $sql_db_name);
	// Handling Server Errors
	$ServerErrors = array();
	if (mysqli_connect_errno()) {
	    $ServerErrors[] = "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (!function_exists('curl_init')) {
	    $ServerErrors[] = "PHP CURL is NOT installed on your web server !";
	}
	if (!extension_loaded('gd') && !function_exists('gd_info')) {
	    $ServerErrors[] = "PHP GD library is NOT installed on your web server !";
	}
	if (!version_compare(PHP_VERSION, '5.4.0', '>=')) {
	    $ServerErrors[] = "Required PHP_VERSION >= 5.4.0 , Your PHP_VERSION is : " . PHP_VERSION . "\n";
	}
	if (isset($ServerErrors) && !empty($ServerErrors)) {
	    foreach ($ServerErrors as $Error) {
	        echo "<h3>" . $Error . "</h3>";
	    }
	    die();
	}
?>