<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'db_quiz');
	
	/* obtain connection
	============================================= */
	function getConnection () {
		
		// connect to database
		return $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
	}
	
	/* Prevents SQL injection but does not prevents XSS
	============================================= */
	function clean($str, $mysqli) {
		$str = strip_tags($mysqli->real_escape_string(trim($str)));
		return $str;
	}
?>