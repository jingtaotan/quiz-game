<?php

    require_once 'php/init.php';

    $mysqli = getConnection();
    $questions = array();
for ($difficulty = 1; $difficulty <= 4; $difficulty++) {
    if ($stmt = $mysqli -> prepare("SELECT * FROM table_question WHERE question_difficulty=? ORDER BY RAND() LIMIT ".LIMIT)) {

        $stmt -> bind_param("s", $difficulty);

        /* execute query */
        $stmt -> execute();

        /* binds result */
        $stmt -> bind_result($question_id, $question_description, $question_difficulty, $question_answer[1], $question_answer[2], $question_answer[3], $question_answer[4]);

        /*Fetch results*/
        while ($stmt -> fetch()) {
            $question = array('question_id' => $question_id, 'question_description' => $question_description);

            //Random answers arrangment
            $numbers = range(1, 4);
            shuffle($numbers);

            $answers = array();
            foreach ($numbers as $n) {
                // number is the original number of the answer (answer1, answer2, etc)
                $answer = array('number' => $n, 'text' => $question_answer[$n]);
                array_push($answers, $answer);
            }
            $question["answers"] = $answers;
            array_push($questions, $question);
        }
    }
    /* close statement */
    $stmt -> close();
}
$mysqli -> close();
shuffle($questions);
var_dump($questions);
 ?>