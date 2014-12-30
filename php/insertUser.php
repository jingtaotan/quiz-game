<?php
	
	require_once 'config.php';
	
	$mysqli = getConnection ();
	session_start();
	
	// get Post values
	$id =  null;
	$user_name = clean($_POST["inputName"], $mysqli);
	$user_email = clean($_POST["inputEmail"], $mysqli);
	$user_phone = clean($_POST["inputPhone"], $mysqli);
	//$user_fb = clean($_POST["user_fb"], $mysqli);
	$user_fb = "FBID";
	$user_score = clean($_SESSION["score"], $mysqli);
	$user_time = clean($_SESSION["timeTaken"], $mysqli);
	$_SESSION["score"] = null;
	$_SESSION["timeTaken"]= null;
	
	session_destroy();
	// dummy values for testing. Uncomment to try it
	/*
	$id = null;
	$user_name = "TestName";
	$user_email = "TestEmail";
	$user_phone = "0134335434";
	$user_fb = "FBID";
	$user_score = "26";
	$user_time = 12.52;*/
	
	// Insert
	$stmt = $mysqli->prepare("INSERT INTO table_user VALUES (?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param('isssssd',$id ,$user_name, $user_email, $user_phone, $user_fb, $user_score, $user_time);
	
	$stmt->execute();
	
	printf("%d Row inserted.\n", $stmt->affected_rows);
	
	//Get inserted id
	//$id = $mysqli->insert_id;
	
	$stmt->close();
	
	//update user
	/*$user_score = "20";
	$user_time= 10.5;
	$stmt = $mysqli->prepare("UPDATE table_user SET user_score=?, user_time=? where user_id = ?");
	$stmt->bind_param('sdi',$user_score, $user_time, $id);
	
	$stmt->execute();
	
	printf("%d Row inserted.\n", $stmt->affected_rows);*/
	
	$mysqli->close();
	
?>