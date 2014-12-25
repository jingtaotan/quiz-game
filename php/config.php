<?php

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
?>