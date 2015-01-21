<?php
require_once 'php/init.php';
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Quiz Homepage</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/quiz.css" rel="stylesheet">

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
			<?php getNavBar("index"); ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 thumbnail">
						<h2 class="parrentHidden"><span class="glyphicon glyphicon-minus-sign childHidden" aria-hidden="true"></span>
						    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> What is this quiz?</h2>
						<div class="childHidden">
							<p>
								This quiz is a competition organized by our company in-conjunction with our participation for the career fair 2015.
							</p>
							<p>
								This quiz contains questions which are mostly general knowledge. So make sure to brush up your general knowledge before playing this quiz.
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 thumbnail">
						<h2 class="parrentHidden"><span class="glyphicon glyphicon-minus-sign childHidden" aria-hidden="true"></span>
						    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> How do I play this quiz?</h2>
						<div class="childHidden">
							<p>
								Very simple, just click the "Play Now" link at the top of our navigation bar.
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 thumbnail">
						<h2 class="parrentHidden"><span class="glyphicon glyphicon-minus-sign childHidden" aria-hidden="true"></span>
						    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> What prizes do we have?</h2>
						<div class="childHidden">
							<p>
								First Prize
							</p>
							<p>
								Second Prize
							</p>
							<p>
								Third Prize
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 thumbnail">
						<h2 class="parrentHidden"><span class="glyphicon glyphicon-minus-sign childHidden" aria-hidden="true"></span>
						    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> How do I stand a chance to win a prize?</h2>
						<div class="childHidden">
							<p>
								1) Make sure to login using your facebook and click "play game" after completing the quiz.
							</p>
							<p>
								2) You must also make it to the top 3 of our scoreboard.
							</p>
							<p>
								3) Good news is that you can keep playing the quiz to try to get a higher score(We only keep your highest score).
							</p>
							<p>
								4) The top 3 will be selected and announce on the last day of the career fair (8th of February 2015).
							</p>
						</div>
					</div>
				</div>
				<hr />
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(".parrentHidden").click(function() {
			    $(this).children('.glyphicon').toggle();
				$(this).next('.childHidden').slideToggle();
			});

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
