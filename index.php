<?php
	require_once 'php/config.php';
	
	$mysqli = getConnection ();
	echo $mysqli->host_info;
	
	
	for($difficulty= 1; $difficulty<4; $difficulty++){
		if ($stmt = $mysqli->prepare("SELECT * FROM table_question WHERE question_difficulty=? ORDER BY RAND() LIMIT 5")) {
			
			$stmt->bind_param("s", $difficulty);
	
	   		/* execute query */
	   		$stmt->execute();
			
			/* binds result */
			$stmt->bind_result($question_id ,$question_description ,$question_difficulty ,$question_answer1 ,
					$question_answer2 ,$question_answer3 ,$question_answer4);
					
			/*Fetch results*/
			while ($stmt->fetch()) {
			
		        printf ("<br /> %s %s %s\n", $question_id ,$question_description, $question_difficulty);
				
				//Random answers arrangment
				$numbers = range(1, 4);
				shuffle($numbers);
				
				foreach($numbers as $n){
					//echo $numbers[i];
					
					if($n == 1){
						echo '<br /> -'.$question_answer1;
					}else if($n == 2){
						echo '<br /> -'.$question_answer2;
					}else if($n == 3){
						echo '<br /> -'.$question_answer3;
					}else if($n == 4){
						echo '<br /> -'.$question_answer4;
					}
				}
		    }
		}
		
		

	    /* close statement */
	    $stmt->close();
	}
?>