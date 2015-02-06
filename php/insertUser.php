<?php

require_once 'init.php';

$mysqli = getConnection();
checkSession(false,"token");

// get Post values
if (isset($user_obj) || isset($_POST["token"])) {

  if (isset($user_obj)) {
    // called directly from result.php
    game_log('Called from result.php');
    $user_name = clean($user_obj->user_name, $mysqli);
    $user_email = clean($user_obj->user_email, $mysqli);
    $user_phone = clean($user_obj->user_phone, $mysqli);
    $user_fb = clean($user_obj->user_fb, $mysqli);
    $token = clean($_SESSION['token'], $mysqli);
  } else {
    //die('POST');
    game_log('Called from AJAX request');
    $id = null;
    $user_name = clean($_POST["inputName"], $mysqli);
    $user_email = clean($_POST["inputEmail"], $mysqli);
    $user_phone = clean($_POST["inputPhone"], $mysqli);
    $user_fb = clean($_POST["inputFbuserid"], $mysqli);
    $token = clean($_POST["token"], $mysqli);
    $isOffline = clean($_POST['isOffline'], $mysqli);
    $user_contact = "1";
  }


  if ($token == $_SESSION["token"]) {
    //die('tokens match');
    $user_score = clean($_SESSION["score"], $mysqli);
    $user_time = clean($_SESSION["timeTaken"], $mysqli);

    game_log('Incoming values:');
    game_log('user_name: ' . $user_name);
    game_log('user_email: ' . $user_email);
    game_log('user_phone: ' . $user_phone);
    game_log('user_fb: ' . $user_fb);
    game_log('token: ' . $token);
    if ( !isset($user_obj) ) {
      game_log('user_contact: ' . $user_contact);
    }
    game_log('user_score: ' . $user_score);
    game_log('user_time: ' . $user_time);

    // dummy values for testing. Uncomment to try it
    /*
    $id = null;
    $user_name = "TestName";
    $user_email = "TestEmail";
    $user_phone = "0134335434";
    $user_fb = "FBID";
    $user_score = "26";
    $user_time = 12.52;*/

    if(isset($user_obj)) {

      //update user ONLY if it is an improvement
      if ($user_score > $user_obj->user_score
      || ($user_score == $user_obj->user_score && $user_time < $user_obj->user_time)) {

        game_log('New best score, updating...');

        $beat_highscore = true;
        $stmt = $mysqli->prepare("UPDATE table_user SET user_score=?, user_time=? where user_fb = ?");
        $stmt->bind_param('ids',$user_score, $user_time, $user_fb);
        $stmt->execute();
        error_log('insertUser: updated user row, user_fb = ' . $user_fb);
        error_log(sprintf("%d Row inserted.\n", $stmt->affected_rows));

        game_log('UPDATE query executed, rows affected: ' . $stmt->affected_rows);

        if($stmt->affected_rows < 1){
            error_log("SQL error: ".$stmt->error);
            game_log('mysql error: ' . $stmt->error);
        }

        $stmt -> close();
      } else {
        error_log('insertUser: not updating user row');

        game_log('No update - user did not break best score');
      }

    } else {
      // Insert
      game_log('Inserting new user...');

      $stmt = $mysqli -> prepare("INSERT INTO table_user VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt -> bind_param('isssssd', $id, $user_name, $user_email, $user_phone, $user_fb, $user_score, $user_time);

      $stmt -> execute();

      game_log('INSERT query executed, rows affected: ' . $stmt->affected_rows);
      if($stmt->affected_rows < 1){
        game_log('mysql error: ' . $stmt->error);
      }

      //echo 'Your score is: ' . $user_score;
      //echo '<br /> Your time taken was: ' . $user_time;
      //Get inserted id
      //$id = $mysqli->insert_id;

      /* close statement*/
      $stmt -> close();
    }

    /* close connection*/
    $mysqli -> close();

    $_SESSION["score"] = null;
    $_SESSION["timeTaken"] = null;
    $_SESSION['submitted'] = null;
    $_SESSION["token"] = null;
    $_SESSION["played"] = null;

    game_log('Removed score, timeTaken etc from PHP SESSION');

    if (!isset($user_obj)) {
      if ( isset($require_from_root) && $require_from_root ) {
        header("Location: scoreBoard.php?played=true");
      } elseif($isOffline=="true"){
        header("Location: ../index.php?played=true");
      } else {
        header("Location: ../scoreBoard.php?played=true");
      }
    }

  } else {
    game_log('Submitted token does not match token in session, invalid call');
    die('tokens dont match');
  }
}
?>
