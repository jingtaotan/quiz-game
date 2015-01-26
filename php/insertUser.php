<?php

require_once 'init.php';

$mysqli = getConnection();
checkSession(false,"token");

// get Post values
if (isset($user_obj) || isset($_POST["token"])) {

  if (isset($user_obj)) {
    // called directly from result.php
    $user_name = clean($user_obj->user_name, $mysqli);
    $user_email = clean($user_obj->user_email, $mysqli);
    $user_phone = clean($user_obj->user_phone, $mysqli);
    $user_fb = clean($user_obj->user_fb, $mysqli);
    $token = clean($_SESSION['token'], $mysqli);
  } else {
    //die('POST');
    $id = null;
    $user_name = clean($_POST["inputName"], $mysqli);
    $user_email = clean($_POST["inputEmail"], $mysqli);
    $user_phone = clean($_POST["inputPhone"], $mysqli);
    $user_fb = clean($_POST["inputFbuserid"], $mysqli);
    $token = clean($_POST["token"], $mysqli);
  }

  if ($token == $_SESSION["token"]) {
    //die('tokens match');
    $user_score = clean($_SESSION["score"], $mysqli);
    $user_time = clean($_SESSION["timeTaken"], $mysqli);

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

        $beat_highscore = true;
        $stmt = $mysqli->prepare("UPDATE table_user SET user_score=?, user_time=? where user_fb = ?");
        $stmt->bind_param('ids',$user_score, $user_time, $user_fb);
        $stmt->execute();
        error_log('insertUser: updated user row, user_fb = ' . $user_fb);
        error_log(sprintf("%d Row inserted.\n", $stmt->affected_rows));
      } else {
        error_log('insertUser: not updating user row');
      }

    } else {
      // Insert
      $stmt = $mysqli -> prepare("INSERT INTO table_user VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt -> bind_param('isssssd', $id, $user_name, $user_email, $user_phone, $user_fb, $user_score, $user_time);

      $stmt -> execute();

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

    if (!isset($user_obj)) {
      if ( isset($require_from_root) && $require_from_root ) {
        header("Location: scoreBoard.php?played=true");
      } else {
        header("Location: ../scoreBoard.php?played=true");
      }
    }

  } else {
    die('tokens dont match');
  }
}
?>
