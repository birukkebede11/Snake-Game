<?php
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);  
	require_once('connect.php');
	// print "<pre>";
	// print_r($_POST); 
	$name = $_POST['name'];
	$score = $_POST['score'];
	
	// Insert score to DB  
	insertScore($name, $score); 

	// Insert the latest score 
	function insertScore($name, $score){
		global $sqlConnect;
		$play_date = date("Y-m-d H:i:s");
		$query_text   = "INSERT INTO Games (name, score, play_date) VALUES ('$name', $score, '$play_date')";
		$query  =  mysqli_query($sqlConnect,$query_text);
	}


?>