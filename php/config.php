<?php
    /*Number of question Per difficulty*/
    define("LIMIT", 5);
    
	/* obtain connection
	============================================= */
	function getConnection () {

		/* connect to database
		 * Params: ip, username, password, dbName*/
		return $mysqli = new mysqli('localhost', 'root', '','db_quiz');
	}

	/* Prevents SQL injection but does not prevents XSS
	============================================= */
	function clean($str, $mysqli) {
		$str = strip_tags($mysqli->real_escape_string(trim($str)));
		return $str;
	}
    
    function checkSession($root){
        if($_SESSION["token"]==null){
            if($root){
                header("Location: quiz.php");
            }
            else {
                header("Location: ../quiz.php");
            }
            die();
        }
    }

	/* Include Facebook SDK for PHP
	============================================= */
	define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . DIRECTORY_SEPARATOR  . '..' . DIRECTORY_SEPARATOR  . 'lib' . DIRECTORY_SEPARATOR  . 'Facebook' . DIRECTORY_SEPARATOR);
	require __DIR__ . DIRECTORY_SEPARATOR  . '..' . DIRECTORY_SEPARATOR  . 'lib' . DIRECTORY_SEPARATOR  . 'Facebook' . DIRECTORY_SEPARATOR  . 'autoload.php';

	use Facebook\FacebookSession;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
	use Facebook\FacebookRequestException;

	FacebookSession::setDefaultApplication('1575617865987702','5c05ca25c9942706958b507656f3e2fd');
?>
