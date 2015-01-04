<?php

	require_once 'config.php';
	
	$mysqli = getConnection();
	
	//Post values
	$answers = $_POST["answers"];
	$questionIds = $_POST["questionIds"];
	$timeTaken = clean($_POST["timeTaken"], $mysqli);
	
	$count = 0;
	$marks = 0;
	
	//Number of questions per difficulty
	$limit = 5;
	$totalMarks = $limit+($limit*2)+($limit*3);
	
	if ($answers != null) {
		foreach ($answers as $a) {
			if (clean($a, $mysqli) == 1) {
				if ($stmt = $mysqli -> prepare("SELECT question_difficulty FROM table_question WHERE question_id=?")) {
						
					$id = clean($questionIds[$count], $mysqli);
					$stmt -> bind_param("i", $id);
					
					/* execute query */
					$stmt -> execute();
					$stmt -> bind_result($question_difficulty);
					while ($stmt -> fetch()) {
						$marks  = $marks + $question_difficulty;
					}
					
				}
				
			}
			$count++;
		}
	
		session_start();
		$_SESSION["score"] = round(($marks/ $totalMarks) * 100);
		$_SESSION["timeTaken"] = round($timeTaken, 2);
		//echo $_SESSION["score"];
		echo "Success";
		session_commit();
	}
?>