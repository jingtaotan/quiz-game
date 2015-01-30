<?php

    require_once 'init.php';

    $mysqli = getConnection();

    checkSession(false, "token");

    if (isset($_POST["token"]) && ($_SESSION['submitted'] == null && isset($_POST["answers"])) ) {

        game_log('Checking answers now...');

        //Post values
        $answers = $_POST["answers"];
        $questionIds = $_POST["questionIds"];
        $timeTaken = clean($_POST["timeTaken"], $mysqli);
        $token = clean($_POST["token"], $mysqli);

        game_log('Questions answered: ' . implode(',', $questionIds));
        game_log('Answers submitted: ' . implode(',', $answers));
        game_log('Time taken: ' . $timeTaken);

        if ($token == $_SESSION["token"]) {
            $count = 0;
            $marks = 0;

            $totalMarks = LIMIT + (LIMIT * 2) + (LIMIT * 3);

            $arrayIds = array();

            if ($answers != null) {
                foreach ($answers as $a) {
                    if (clean($a, $mysqli) == 1) {

                        if ($stmt = $mysqli -> prepare("SELECT question_difficulty FROM table_question WHERE question_id=?")) {

                            $id = clean($questionIds[$count], $mysqli);
                            $stmt -> bind_param("i", $id);

                            $stmt -> execute();
                            $stmt -> bind_result($question_difficulty);
                            while ($stmt -> fetch()) {
                                $marks = $marks + $question_difficulty;
                            }
			                /* close statement */
			                $stmt -> close();

                        }

                    }
                    $count++;
                }

                /* close connection*/
                $mysqli -> close();

                $_SESSION["score"] = round(($marks / $totalMarks) * 100);
                $_SESSION["timeTaken"] = round($timeTaken, 2);
                $_SESSION['submitted'] = true;

                game_log('Score (rounded): ' . $_SESSION['score']);
                game_log('Time taken (rounded): ' . $_SESSION['timeTaken']);

                //echo $_SESSION["score"];
                echo "Success";
                session_commit();
                game_log('Finished checking answers');
            }
        }else{
            game_log('Invalid token');
            echo 'false';
        }
    }
?>
