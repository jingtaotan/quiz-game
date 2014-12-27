<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Quiz Engine View</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/quiz.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="container">

		<div class="header">
			<div class="timer">
				<span id="timer-display">01:00</span>
				<a href="#" id="quit-btn" class="btn btn-danger">Quit Game</a>
			</div>
		</div>
		<?php
			require_once 'php/config.php';
			
			$mysqli = getConnection ();
			
			//Question no
			$count = 1;
			//$questions = array();
			for($difficulty = 1; $difficulty <= 3; $difficulty++){
				if ($stmt = $mysqli->prepare("SELECT * FROM table_question WHERE question_difficulty=? ORDER BY RAND() LIMIT 5")) {
			
					$stmt->bind_param("s", $difficulty);
			
					/* execute query */
					$stmt->execute();
			
					/* binds result */
					$stmt->bind_result($question_id, $question_description, $question_difficulty,
						$question_answer[1], $question_answer[2] ,$question_answer[3] ,$question_answer[4]);
			
					/*Fetch results*/
					while ($stmt->fetch()) {
						//$question = array('question_id' => $question_id,'question_description'=>$question_description);
						
						echo '
						<div class="question">
							'.$count.') '.$question_description.'
						</div>
						<div class="answers">';
						
						//Random answers arrangment
						$numbers = range(1, 4);
						shuffle($numbers);
			
						$answers = array();
						foreach($numbers as $n){
							// number is the original number of the answer (answer1, answer2, etc)
							//$answer = array('number' => $n, 'text' => $question_answer[$n]);
							//array_push($answers, $answer);
							echo 
							'<a class="answer">
								'.$question_answer[$n].'
							</a>';
						}
						
						echo '</div><hr />';
						
						//increase question no
						$count++;
						
						//$question["answers"] = $answers;
						//array_push($questions, $question);
					}
					
				}
				/* close statement */
				$stmt->close();
			}
			$mysqli->close();
			
		?>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script>
		var questions = <?php echo json_encode($questions); ?>
	</script>
</body>
</html>
