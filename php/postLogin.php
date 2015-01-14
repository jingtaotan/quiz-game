<?php
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookJavaScriptLoginHelper;

require_once 'config.php';

$mysqli = getConnection();

$helper = new FacebookJavaScriptLoginHelper();
try {
  $session = $helper->getSession();
} catch(Exception $ex) {
  // When validation fails or other local issues
  echo $ex;
}

$succeed = false;
$user_score = '';
$user_id = '';

if ($session) {
  // Logged in

  try {

    $user_profile = (new FacebookRequest(
    $session, 'GET', '/me'
    ))->execute()->getGraphObject(GraphUser::className());

    $user_id = $user_profile->getId();

    // check if this user is a first-time user of our app
    if($stmt = $mysqli -> prepare("SELECT user_score FROM table_user WHERE user_fb=?")) {

      $stmt -> bind_param("s", $user_id);
      $stmt -> execute();
      $stmt -> bind_result($user_score);
      if ( $stmt -> fetch() ) {
        $succeed = true;
      }

      $stmt -> close();
    }

  } catch(FacebookRequestException $e) {
    echo $e;
  }

} else {
  echo 'no session';
}

$result = array();
if ( $succeed ) {
  $result['user_exists'] = true;
  $result['user_score'] = $user_score;
} else {
  $result['user_exists'] = false;
}
$result['user_id'] = $user_id;

header('Content-Type: application/json');

echo json_encode($result);

?>
