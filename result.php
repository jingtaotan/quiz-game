<?php
require_once 'php/config.php';
session_start();
checkSession(true, "submitted");

use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookJavaScriptLoginHelper;

$helper = new FacebookJavaScriptLoginHelper();
try {
	$session = $helper->getSession();
} catch(Exception $ex) {
	// When validation fails or other local issues
	$session = false;
}

$first_time_user = true;
$user_score = '';
$user_id = '';

if ($session) {
	// Logged in
	try {
		$user_profile = (new FacebookRequest(
		$session, 'GET', '/me'
		))->execute()->getGraphObject(GraphUser::className());

		$user_id = $user_profile->getId();

		$mysqli = getConnection();

		// check if this user is a first-time user of our app
		if($stmt = $mysqli -> prepare("SELECT user_score FROM table_user WHERE user_fb=?")) {

			$stmt -> bind_param("s", $user_id);
			$stmt -> execute();
			$stmt -> bind_result($user_score);
			if ( $stmt -> fetch() ) {
				$succeed = true;
				$first_time_user = false;
			}

			$stmt -> close();
		}

	} catch(FacebookRequestException $e) {

	}
}

if ( !$first_time_user ) {
	// just enter their score into the database, no need to ask them to push the Enter button
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Quiz Engine View</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/quiz.css" rel="stylesheet">
		<style>
			#not-logged-in, #logged-in, #first-time {
				display: none;
			}
		</style>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="fb-root"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					Your score is: <?php echo $_SESSION["score"]; ?>
					<br>
					Your time taken was: <?php echo $_SESSION["timeTaken"]; ?> seconds
					<br>
					<?php if ( !$first_time_user ) { ?>
						Your best score is: <?php $user_score ?>
					<?php } ?>
				</div>
				<div class="col-sm-6">
						<?php if ( $first_time_user ) { ?>
							<div id="loading">
								Loading...
							</div>
							<div id="not-logged-in">
								<p>Log in with your Facebook account now to enter the competition, and stand a chance to WIN!</p>
								<fb:login-button scope="public_profile,email" show-faces="true" onlogin="checkLoginState();"></fb:login-button>
							</div>
							<div id="first-time">
								<p>Enter your details here to stand a chance to WIN!</p>
								<form action="php/insertUser.php" method="post">
									<div class="form-group">
										<label for="inputName">Name</label>
										<input type="text" class="form-control" name="inputName" id="inputName" placeholder="Enter your name">
									</div>
									<div class="form-group">
										<label for="inputEmail">Email address</label>
										<input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter email">
									</div>
									<div class="form-group">
										<label for="inputPhone">Phone Number</label>
										<input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="Enter phone number">
									</div>
									<button type="submit" class="btn btn-default">
										Submit
									</button>
									<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>"/>
									<input type="hidden" name="fbuserid" />
								</form>
							</div>
						<?php } ?>
				</div>
			</div>
			<hr />
			<div>
				<?php getScoreBoard(); ?>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script>
			// This is called with the results from from FB.getLoginStatus().
			function statusChangeCallback(response) {
				console.log('statusChangeCallback');
				console.log(response);
				// The response object is returned with a status field that lets the
				// app know the current login status of the person.
				// Full docs on the response object can be found in the documentation
				// for FB.getLoginStatus().
				if (response.status === 'connected') {
					// Logged into your app and Facebook.
					location.reload();
				} else {
					// The person is logged into Facebook, but not your app.
					$('#loading').hide();
					$('#not-logged-in').show();
					$('#logged-in').hide();
				}
			}

			// This function is called when someone finishes with the Login
			// Button.  See the onlogin handler attached to it in the sample
			// code below.
			function checkLoginState() {
				FB.getLoginStatus(function(response) {
					statusChangeCallback(response);
				});
			}

			window.fbAsyncInit = function() {
				FB.init({
					appId : '1575617865987702',
					xfbml : true,
					version : 'v2.2',
					cookie: true
				});

				// Now that we've initialized the JavaScript SDK, we call
				// FB.getLoginStatus().  This function gets the state of the
				// person visiting this page and can return one of three states to
				// the callback you provide.  They can be:
				//
				// 1. Logged into your app ('connected')
				// 2. Logged into Facebook, but not your app ('not_authorized')
				// 3. Not logged into Facebook and can't tell if they are logged into
				//    your app or not.
				//
				// These three cases are handled in the callback function.
				<?php if ( $first_time_user ) { ?>
				FB.getLoginStatus(statusChangeCallback);
				<?php } ?>

			};
			( function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {
					return;
				}
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	</body>
</html>
<?php session_commit(); ?>
