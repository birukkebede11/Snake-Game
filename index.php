<?php 
	
	require_once('includes/connect.php');

	// Get the top scores 
    $query_text   = "SELECT * FROM Games ORDER BY score DESC LIMIT 10";
    $query        = mysqli_query($sqlConnect, $query_text);
    $fetched_data = array();
    while($row = mysqli_fetch_assoc($query)){
      $fetched_data[] = $row;
    } 

// print "<pre>";
// print_r($fetched_data); 

?>


<!DOCTYPE html>
<html>
<head>
	<title>Snake Game</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
	<!-- We need an HTML canvas element to be able to draw on our browser -->
	<!-- The HTML <canvas> element is used to draw graphics, on the fly, via JavaScript. -->

	<!-- Player Name -->
	<h2>Have FUN!!</h2>
	<div class="form-wrapper">
		<form id="player-name-form" method="POST">
			<p>Please enter your Name to start</p>
			<input type="text" name="first_name" class="first_name" placeholder="* First name">
			<button id="enterName" type="submit">Start Game</button>
		</form>
	</div>

	<div class="game-info-wrapper">

		<h3>Top Scores</h3>
		<?php 
			foreach ($fetched_data as $key => $value) {
				$name = $value['name'];
				$score = $value['score'];
				$play_date = $value['play_date'];               
				print $score.' - '.$name.'<br>';
			}
		?>
		<div class="players-name">
			<div class="pname-lable">Current Player</div>
			<div class="pname-name"></div>
		</div>
		<div class="players-score">
			<div class="pscore-lable">Score</div>
			<div class="pscore-score"></div>			
		</div>
	</div>

	<!-- Our Canvas -->
	<canvas class="canvas" width="500" height="500"></canvas>

	<iframe name="ajaxsubstitute" id="ajaxsubstitute" style="display: none;"></iframe>
	<!-- Hidden For, -->
	<div class="hidden-score-wrapper">
		<form id="game-score" method="POST" action="includes/update_score.php" target="ajaxsubstitute">
			<input type="hidden" name="name" class="player_name">
			<input type="hidden" name="score" class="player_score">
			<button type="submit">Result</button>
		</form>
	</div>


	<!-- Our Script -->
	<script src="assets/js/scripts.js"></script>
</body>
</html>