<?php
require_once 'php/init.php';
checkSession(true, "submitted");

$beat_highscore = false;
$user_score = $_SESSION['score'];
$user_time = $_SESSION['timeTaken'];
$fb_id = "";

$logged_in = false;
$returning_user = false;
if ($fb_session && $fb_user) {
	$logged_in = true;
	$mysqli = getConnection();
    $fb_id = clean($fb_user->getId(), $mysqli);
	$res = $mysqli->query('SELECT * from table_user where user_fb = ' . $fb_id);
	$row = $res->fetch_object();
	if ($row) {
		$returning_user = true;
		$best_score = $row->user_score;
		$best_time = $row->user_time;

		// straightaway update the user row
		$user_obj = $row;
		require_once('php/insertUser.php');
	}
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
					Your score is: <?php echo $user_score; ?>
					<br>
					Your time taken was: <?php echo $user_time; ?> seconds
					<br>
					<?php if ($beat_highscore) { ?>
						You've set a new best score!
					<?php } ?>
				</div>
				<div class="col-sm-6">
					<?php if ($returning_user) { ?>
						<?php if ($beat_highscore) { ?>
							Your previous best attempt:
						<?php } else { ?>
							Your best attempt:
						<?php } ?>
						<br>
						Score: <?php echo $best_score; ?>
						<br>
						Time: <?php echo $best_time; ?> seconds
						<br>
						<a href="scoreBoard.php?played=true&fbId=<?php echo $fb_id; ?>">Continue</a>
					<?php } else { ?>
						<div id="loading">
							Loading...
						</div>
						<div id="not-logged-in">
							<p>Log in with your Facebook account now to enter the competition, and stand a chance to WIN!</p>
							<fb:login-button scope="public_profile,email" show-faces="true" onlogin="checkLoginState();"></fb:login-button>
						</div>
						<div id="logged-in">
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
								<input type="hidden" name="inputFbuserid" value=""/>
							</form>
						</div>
					<?php } ?>
				</div>
			</div>
			<hr />
			<div>
				<?php getScoreBoard($fb_id); ?>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script>
			var returningUser = <?php echo $returning_user ? 'true' : 'false'; ?>;
			// This is called with the results from from FB.getLoginStatus().
			function statusChangeCallback(response) {
				console.log('statusChangeCallback');
				console.log(response);
				// The response object is returned with a status field that lets the
				// app know the current login status of the person.
				// Full docs on the response object can be found in the documentation
				// for FB.getLoginStatus().
				if (response.status === 'connected') {
					if ( !returningUser ) {
						// Logged into your app and Facebook.
						$('#loading').hide();
						$('#not-logged-in').hide();
						$('#logged-in').show();
						FB.api('/me', function(user) {
							document.forms[0].inputName.value = user.name;
							document.forms[0].inputEmail.value = user.email;
							document.forms[0].inputFbuserid.value = user.id;
						});
					}
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
					appId : '<?php echo $config->fb_appid; ?>',
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
				FB.getLoginStatus(statusChangeCallback);

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
