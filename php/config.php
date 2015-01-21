<?php
/*Number of question Per difficulty*/
define("LIMIT", 1);

// always have a PHP session
// it is needed for Facebook API for PHP to work correctly
if(!isset($_SESSION)){
    session_start();
}

/* obtain connection
 ============================================= */
function getConnection() {

    /* connect to database
     * Params: ip, username, password, dbName*/
    //return $mysqli = new mysqli('localhost', 'root', 'klaus', 'db_quiz');
    return $mysqli = new mysqli('localhost', 'root', 'arvatoadmin', 'db_quiz');
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
        echo '<h2>Scoreboard: Top 10</h2>
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

/* Get nav bar
 ============================================= */
function getNavBar($page) {
    echo '<nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Logo</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li ' . ($page == 'index' ? 'class="active"' : '') . '>
                                <a href="index.php"> <span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="sr-only">(current)</span> </a>
                            </li>
                            <li ' . ($page == 'quiz' ? 'class="active"' : '') . '>
                                <a href="quiz.php">Play Now</a>
                            </li>
                            <li ' . ($page == 'about' ? 'class="active"' : '') . '>
                                <a href="about.php">About Arvato</a>
                            </li>
                            <li ' . ($page == 'scoreBoard' ? 'class="active"' : '') . '>
                                <a href="scoreBoard.php">ScoreBoard</a>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">
                                Search
                            </button>
                        </form>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>';
}

/* Include Facebook SDK for PHP
 ============================================= */
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Facebook' . DIRECTORY_SEPARATOR);
require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Facebook' . DIRECTORY_SEPARATOR . 'autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\GraphUser;

FacebookSession::setDefaultApplication('1575617865987702', '5c05ca25c9942706958b507656f3e2fd');

$helper = new FacebookJavaScriptLoginHelper();
$fb_session = false; // throughout the site we detect if $fb_session == false to determine if the user is logged in
$fb_user = false; // the Facebook user object
try {
  $fb_session = $helper->getSession();
} catch(Exception $ex) {
  // When validation fails or other local issues
  error_log($ex);
}

if ($fb_session) {
  // store access token in PHP session for later use
  $_SESSION['fb_access_token'] = $fb_session->getToken();
} else {
  // try recreating the session based on the last used access token
  if (isset($_SESSION['fb_access_token'])) {
    $fb_session = new FacebookSession($_SESSION['fb_access_token']);
    try {
      $fb_session->validate();
    } catch (\Exception $ex) {
      // Session not valid, Graph API returned an exception with the reason. OR
      // Graph API returned info, but it may mismatch the current app or have expired.
      unset($_SESSION['fb_access_token']); // get rid of the invalid key
      error_log($ex);
      $fb_session = false;
    }
  }
}

// also try to get the current FB user object
if ($fb_session) {
  try {
    $fb_user = (new FacebookRequest(
        $fb_session, 'GET', '/me'
        ))->execute()->getGraphObject(GraphUser::className());
  } catch(FacebookRequestException $e) {
    error_log($e);
  }
}

?>
