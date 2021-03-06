<?php
require_once 'php/init.php';
checkSession(true, "submitted");

game_log('User entered result page');

$beat_highscore = false;
$user_score = $_SESSION['score'];
$user_time = $_SESSION['timeTaken'];
$user_rank = getPosition($user_score, $user_time);
$fb_id = "";

$logged_in = false;
$returning_user = false;
if ($fb_session && $fb_user) {
	game_log('User is logged in');
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

		game_log('User played before, try to update score...');
		require_once('php/insertUser.php');

		// get position AFTER insertUser, may have beaten previous best score
		if ( $beat_highscore ) {
			$user_rank = getPosition($user_score, $user_time);
		} else {
			$user_rank = getPosition($best_score, $best_time);
		}
		game_log('Rank: ' . $user_rank);
	} else {
		game_log('User played for the first time');
	}
} else {
	game_log('User is not logged in');
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
							<h2>Loading...</h2>
						</div>
						<div id="not-logged-in">
							<p>Log in with your Facebook account now to enter the competition, and stand a chance to WIN!</p>
							<button class="btn btn-share btn-lg" id="login-btn"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Log in with Facebook</button>
						</div>
						<div id="logged-in">
							<p class="lead">Enter your details here to stand a chance to WIN!</p>
							<p>Please enter your details correctly - if you win a prize and we cannot contact you, you may be disqualified.</p>
							<form id="register-form" action="php/insertUser.php" method="post">
								<div class="form-group">
                    <label for="inputName">Name <span class="red" >*</span></label>
                    <input type="text" class="form-control required" name="inputName" id="inputName" placeholder="Enter your name">
                    <span class="childHidden">* This is a required field</span>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email address <span class="red" >*</span></label>
                    <input type="email" class="form-control required" name="inputEmail" id="inputEmail" placeholder="Enter email">
                    <span class="childHidden">* This is a required field</span>
                </div>
                <div class="form-group">
                    <label for="inputPhone">Phone Number <span class="red" >*</span></label>
                    <input type="text" class="form-control required" name="inputPhone" id="inputPhone" placeholder="e.g. 0123456789">
                    <span class="childHidden">* This is a required field<br /></span>
                    <span class="childHidden phone">* Enter 10 or 11 digit phone number with area code, no spaces and hyphens</span>
                </div>
								<div class="form-group checkbox">
									<label id="labelAgree">
										<input type="checkbox" name="inputAgree" id="inputAgree"><span class="red" >*</span> By entering the contest, I agree to the <a href="terms.pdf" target="_blank">Terms and Conditions</a>
									</label>
									<br/>
									<span class="childHidden" id="messageAgree">* You must agree to the Terms and Conditions to enter the contest<br /></span>
								</div>
								<div class="form-group checkbox">
									<label>
										<input type="hidden" name="inputContact" value="0" />
										<input type="checkbox" name="inputContact" id="inputContact" value="1"> Yes! Please contact me about job opportunities at arvato IT Solutions Malaysia
									</label>
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

 			var inputPhone = $('#inputPhone');
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

					var trimmedLength = $.trim(inputPhone.val()).length;
          if(trimmedLength != 10 && trimmedLength != 11) { // there are 10 and 11 digit phone numbers
              inputPhone.addClass("highlight");
              inputPhone.next('.childHidden').next('.childHidden').show();
              isFormValid = false;
          }else{
              inputPhone.removeClass("highlight");
              inputPhone.next('.childHidden').next('.childHidden').hide();
          }

					if ( !$('#inputAgree').is(':checked') ) {
						$('#messageAgree').show();
						$('#labelAgree').addClass('red');
						isFormValid = false;
					} else {
						$('#messageAgree').hide();
						$('#labelAgree').removeClass('red');
					}

          return isFormValid;
      });

			var returningUser = <?php echo $returning_user ? 'true' : 'false'; ?>;

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
					FB.ui({
						method: 'share',
						href: 'http://quiz.arvato-systems.asia',
					}, function(response){
						// do nothing
					});
				};

				$(document).ready(function() {
					$('#login-btn').on('click', function() {
						FB.login(function(response) {
							if (response && !response.error) {
								// refresh the page
								location.reload();
							}
						}, {scope: 'public_profile,email'});
					});

					$('#share-btn').on('click', publishStory);
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
