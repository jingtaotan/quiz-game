<?php
    /*Number of question Per difficulty*/
    define("LIMIT", 5);
    
    /* obtain connection
     ============================================= */
    function getConnection() {
    
        /* connect to database
         * Params: ip, username, password, dbName*/
        return $mysqli = new mysqli('localhost', 'root', '', 'db_quiz');
    }
    
    /* Prevents SQL injection but does not prevents XSS
     ============================================= */
    function clean($str, $mysqli) {
        $str = strip_tags($mysqli -> real_escape_string(trim($str)));
        return $str;
    }
    
    /* Check if session exists, else redirect
     ============================================= */
    function checkSession($root, $session) {
        if ($_SESSION[$session] == null) {
            if ($root) {
                header("Location: quiz.php");
            } else {
                header("Location: ../quiz.php");
            }
            die();
        }
    }
    
    /* Get scoreBoard
     ============================================= */
    function getScoreBoard() {
        $mysqli = getConnection();
        $count = 0;
        if ($stmt = $mysqli -> prepare("SELECT user_name, user_score, user_time FROM table_user ORDER BY user_score DESC, user_time asc LIMIT 10")) {
    
            $stmt -> execute();
            $stmt -> bind_result($user_name, $user_score, $user_time);
            
            //Create table
            echo '<h2>Scoreboard</h2>
                <table class="table table-condensed">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Score</th>
                    <th>Time</th>
                </tr>';
                
            while ($stmt -> fetch()) {
                $count++;
                echo '<tr>
                    <td>' . $count . '</td>
                    <td>' . $user_name . '</td>
                    <td>' . $user_score . '</td>
                    <td>' . round($user_time, 2) . '</td>
                </tr>';
            }
            
            //Close table
            echo '</table>';
        }
        /* close statement */
        $stmt -> close();
    
        /* close connection*/
        $mysqli -> close();
    }
    
    /* Include Facebook SDK for PHP
     ============================================= */
    define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Facebook' . DIRECTORY_SEPARATOR);
    require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Facebook' . DIRECTORY_SEPARATOR . 'autoload.php';
    
    use Facebook\FacebookSession;
    use Facebook\FacebookRequest;
    use Facebook\GraphUser;
    use Facebook\FacebookRequestException;
    
    FacebookSession::setDefaultApplication('1575617865987702', '5c05ca25c9942706958b507656f3e2fd');
?>
