<?php
require_once 'php/init.php';
checkSession(true, "submitted");

$beat_highscore = false;
$user_score = $_SESSION['score'];
$user_time = $_SESSION['timeTaken'];
$user_rank = getPosition($user_score, $user_time);
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

        $user_rank = getPosition($best_score, $best_time);
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
		<?php getOgTags(); ?>
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<title>Results - arvato World Fact Quiz</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
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
		<?php getNavBar("result"); ?>
		<div class="container">
			<h1>Game results</h1>
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-primary score-panel">
						<div class="panel-heading">
							<h2 class="panel-title">Your score</h2>
						</div>
						<div class="panel-body">
							<span class="score"><?php echo $user_score; ?></span><br/>
							(<?php echo $user_time; ?> seconds)
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<?php if ($returning_user) { ?>
						<?php if ($beat_highscore) { ?>
							<div class="panel panel-success score-panel">
								<div class="panel-heading">
									<h2 class="panel-title">New best score!</h2>
								</div>
								<div class="panel-body">
									<span class="score"><s><?php echo $best_score; ?></s> <?php echo $user_score; ?></span><br/>
									(<s><?php echo $best_time; ?></s> <?php echo $user_time; ?> seconds)
								</div>
							</div>
						<?php } else { ?>
							<div class="panel panel-info score-panel">
								<div class="panel-heading">
									<h2 class="panel-title">Best score</h2>
								</div>
								<div class="panel-body">
									<span class="score"><?php echo $best_score; ?></span><br/>
									(<?php echo $best_time; ?> seconds)
								</div>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div id="loading">
							Loading...
						</div>
						<div id="not-logged-in">
							<p>Log in with your Facebook account now to enter the competition, and stand a chance to WIN!</p>
							<button class="btn btn-share btn-lg" id="login-btn"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Log in with Facebook</button>
						</div>
						<div id="logged-in">
							<p>Enter your details here to stand a chance to WIN!</p>
							<form id="register-form" action="php/insertUser.php" method="post">
								<div class="form-group">
                                    <label for="inputName">Name <span class="red" >*</span></label>
                                    <input type="text" class="form-control required" name="inputName" id="inputName" placeholder="Enter your name">
                                    <span class="childHidden">*Please do not leave this empty</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email address <span class="red" >*</span></label>
                                    <input type="email" class="form-control required" name="inputEmail" id="inputEmail" placeholder="Enter email">
                                    <span class="childHidden">*Please do not leave this empty</span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone">Phone Number <span class="red" >*</span></label>
                                    <input type="text" class="form-control required" name="inputPhone" id="inputPhone" placeholder="Enter phone number">
                                    <span class="childHidden">*Please do not leave this empty<br /></span>
                                    <span class="childHidden phone">*Please make sure it is a valid number (example: 01XXXXXXXX) </span>
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
			<div class="row text-center">
				<?php if ($returning_user) { ?>
						<h3>You are currently at <mark>rank #<?php echo $user_rank; ?>.</mark></h3>
						<?php if ($user_rank > 3) { ?>
							<p class="lead">Keep playing to improve your score and make it to the <mark>top 3</mark> to win a prize!</p>
						<?php } else { ?>
							<p class="lead">Good job, but don't stop now!<br/> Keep playing to maintain your position and win a prize!</p>
						<?php } ?>
						<p id="share-area">
							<button class="btn btn-share btn-lg" href="#" id="share-btn"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Share on Facebook</button>
							<a class="btn btn-primary btn-lg" href="scoreBoard.php?played=true">Continue <span class="glyphicon glyphicon-chevron-right"></span></a>
						</p>
				<?php } else { ?>
					<p id="share-area" style="display: none;">
						<button class="btn btn-share btn-lg" href="#" id="share-btn"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Share on Facebook</button>
					</p>
				<?php } ?>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script>

		   //Validation
            $("#register-form").submit(function(){
                var isFormValid = true;

                $( ".required" ).each(function( index ) {
                    if ($.trim($(this).val()).length == 0){

                        $(this).addClass("highlight");
                        isFormValid = false;
                        $(this).next('.childHidden').show();
                    }
                    else{
                        $(this).removeClass("highlight");
                        $(this).next('.childHidden').hide();
                    }
                });

                if($.trim($('#inputPhone').val()).length != 10){
                    $('#inputPhone').addClass("highlight");
                    $('#inputPhone').next('.childHidden').next('.childHidden').show();
                    isFormValid = false;
                }else{
                    $('#inputPhone').removeClass("highlight");
                    $('#inputPhone').next('.childHidden').next('.childHidden').hide();
                }

                return isFormValid;
            });

			var returningUser = <?php echo $returning_user ? 'true' : 'false'; ?>;

			var appCanPublish = false;

			// This is called with the results from from FB.getLoginStatus().
			function statusChangeCallback(response) {
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
						$('#share-area').show();
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
					$('#share-area').hide();
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

				var publishStory = function() {
					FB.api(
						"/me/feed",
						"POST",
						{
							message: "I got a score of <?php echo $user_score; ?> on the arvato World Fact Quiz! Can you beat my score?",
							link: "http://quiz.arvato-systems.asia/quiz/",
							actions: [{
								name: "Play Now",
								link: "http://quiz.arvato-systems.asia/quiz/"
							}]
						},
						function (response) {
							if (response && !response.error) {
								$('#share-btn').html('<span class="glyphicon glyphicon-ok"></span> Shared to Facebook!').attr('disabled', '');
							} else {
								if ( response.error.code == 200 ) {
									alert('You need to grant us permission to post to Facebook for you. Click Share to try again.')
								} else {
									alert('Oops! Something seems to have went wrong when sharing to Facebook. Try again later.');
								}
							}
						}
					);
				};

				var checkPermission = function(callback) {
					FB.api('/me/permissions', function(response) {
						var canPublish = false;
						var perms = response.data;
						var i = 0;
						for ( i = 0 ; i < perms.length ; i++) {
							var perm = perms[i];
							if ( perm.permission != 'publish_actions' ) {
								continue;
							}
							if ( perm.status == 'granted' ) {
								canPublish = true;
							}
						}
						callback.call(this, canPublish);
					});
				};
				checkPermission(function(result) {
					appCanPublish = result;
				});

				$(document).ready(function() {
					$('#login-btn').on('click', function() {
						FB.login(function(response) {
							if (response && !response.error) {
								// refresh the page
								location.reload();
							}
						}, {scope: 'public_profile,email'});
					});

					$('#share-btn').on('click', function() {
						if (appCanPublish) {
							publishStory();
						} else {
							FB.login(function(response) {
								checkPermission(function(appCanPublish) {
									if (appCanPublish) {
										publishStory();
									} else {
										alert('You need to grant us permission to post to Facebook for you. Click Share to try again.');
									}
								});
							}, {scope: 'publish_actions', auth_type: 'rerequest'});
						}
					});
				});

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
