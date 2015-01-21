<?php

    require_once 'config.php';

    $mysqli = getConnection();
    
    checkSession(false, "token");

    if (isset($_POST["token"]) && ($_SESSION['submitted'] == null && isset($_POST["answers"])) ) {
        //Post values
        $answers = $_POST["answers"];
        $questionIds = $_POST["questionIds"];
        $timeTaken = clean($_POST["timeTaken"], $mysqli);
        $token = clean($_POST["token"], $mysqli);

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
                //echo $_SESSION["score"];
                echo "Success";
                session_commit();
            }
        }else{
            echo 'false';
        }
    }
?>
