<?php

require('config.php');

/*Number of question Per difficulty*/
define("LIMIT", $config->questions_per_difficulty);

// always have a PHP session
// it is needed for Facebook API for PHP to work correctly
if(!isset($_SESSION)){
    session_start();
}

/* obtain connection
 ============================================= */
function getConnection() {
    global $config;

    /* connect to database
     * Params: ip, username, password, dbName*/
    return $mysqli = new mysqli(
      $config->db_host,
      $config->db_username,
      $config->db_password,
      $config->db_name
    );
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
function getScoreBoard($fbId) {
    $mysqli = getConnection();
    $count = 0;
    $isTop = false;

    if ($stmt = $mysqli -> prepare("SELECT user_name, user_score, user_time, user_fb FROM table_user ORDER BY user_score DESC, user_time asc LIMIT 10")) {

        $stmt -> execute();
        $stmt -> bind_result($user_name, $user_score, $user_time, $user_fb);

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
            if($user_fb == $fbId){
                echo '<tr class="success">';
                $isTop = true;
            }else{
                echo '<tr>';
            }
                 echo   '<td>' . $count . '</td>
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

    if(!$isTop){
        if ($stmt = $mysqli -> prepare("
                        Select * from (SELECT  @rownr:=@rownr+1 AS rowNumber, u.user_name, u.user_score,
                        u.user_time, u.user_fb FROM table_user as u, (SELECT @rownr := 0) r ORDER BY user_score DESC, user_time asc
                        ) AS alias_name
                        where alias_name.user_fb=?;
                        ")) {
                            $stmt -> bind_param('s', $fbId);
                            $stmt -> execute();
                            $stmt -> bind_result($rowNumber,$user_name, $user_score, $user_time, $user_fb);


                            /*Fetch results*/
                            while ($stmt -> fetch()) {
                                echo '<div><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span></div>
                                <table class="table table-condensed">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Score</th>
                                        <th>Time</th>
                                    </tr>
                                    <tr>
                                        <td>'.$rowNumber.'</td>
                                        <td>'.$user_name.'</td>
                                        <td>'.$user_score.'</td>
                                        <td>'.$user_time.'</td>
                                    </tr>
                                  </table>';
                            }
                        }
    }


    /* close connection*/
    $mysqli -> close();
}

/* Get position of the player based on time and score
 ============================================= */
function getPosition($score, $time) {
     $position = 0;
     $mysqli = getConnection();

      if ($stmt = $mysqli -> prepare("
      Select Max(rowNumber) as maxRowNumber from (SELECT  @rownr:=@rownr+1 AS rowNumber, u.user_name, u.user_score,
                            u.user_time, u.user_fb FROM table_user as u, (SELECT @rownr := 0) r ORDER BY user_score DESC, user_time asc
                            ) AS alias_name
                            where alias_name.user_score >=? and IF(alias_name.user_score = ?, IF(alias_name.user_time< ?, true, false), true);
      "))
      {
          $stmt -> bind_param('iii', $score, $score, $time);
          $stmt -> execute();
          $stmt -> bind_result($maxRowNumber);

           /*Fetch results*/
          while ($stmt -> fetch()) {
              $position = $maxRowNumber+1;
          }

          $stmt ->close();
      }

     /* close connection*/
     $mysqli -> close();

     //return rank postion
     return $position;
 }

/* Get nav bar
 ============================================= */
function getNavBar($page) {
    echo '<nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                          <img src="img/arvato-logo.png" alt="arvato Bertelsmann logo" />
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li ' . ($page == 'quiz' ? 'class="active"' : '') . '>
                                <a href="quiz.php">Play Now</a>
                            </li>
                            <li ' . ($page == 'about' ? 'class="active"' : '') . '>
                                <a href="about.php">About arvato</a>
                            </li>
                            <li ' . ($page == 'scoreBoard' ? 'class="active"' : '') . '>
                                <a href="scoreBoard.php">ScoreBoard</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>';
}

function getFooter() {
  echo '
  <footer>
  <div class="container">
  <hr/>
  <p class="text-muted"><a href="terms.pdf" target="_blank">Terms and Conditions</a> | <a href="privacy.pdf" target="_blank">Privacy Policy</a></p>
  </div>
  </footer>';
}

function getOgTags() {
  global $config;
  echo '
  <meta property="og:title" content="Play now and win shopping vouchers!" />
  <meta property="og:site_name" content="arvato World Fact Challenge"/>
  <meta property="og:url" content="http://quiz.arvato-systems.asia" />
  <meta property="og:image" content="http://quiz.arvato-systems.asia/img/og-image.jpg" />
  <meta property="og:description" content="Put your knowledge of the world to the test in,
  and stand a chance to win AEON shopping vouchers worth up to RM250!
  A total of RM500 worth of AEON shopping vouchers are up for grabs for 5 lucky winners." />
  <meta property="fb:app_id" content="' . $config->fb_appid . '" />
  <meta property="og:type" content="article" />
  ';
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

FacebookSession::setDefaultApplication(
  $config->fb_appid,
  $config->fb_appsecret
);

$helper = new FacebookJavaScriptLoginHelper();
$fb_session = false; // throughout the site we detect if $fb_session == false to determine if the user is logged in
$fb_user = false; // the Facebook user object
try {
  $fb_session = $helper->getSession();
} catch(\Exception $ex) {
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
