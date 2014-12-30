<?php

	require_once 'config.php';
	
	$mysqli = getConnection();
	
	//Post values
	$answers = $_POST["answers"];
	$timeTaken = clean($_POST["timeTaken"], $mysqli);
	
	$count = 0;
	
	if ($answers != null) {
		foreach ($answers as $a) {
			if (clean($a, $mysqli) == 1)
				$count++;
		}

		session_start();
		$_SESSION["score"] = round(($count/ (sizeof($answers)+1))*100);
		$_SESSION["timeTaken"] = round($timeTaken,2); 
		echo "Success";
		session_commit();
	}
	
?>