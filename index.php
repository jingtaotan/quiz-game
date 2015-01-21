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
		<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId : '<?php echo $config->fb_appid; ?>',
				xfbml : true,
				version : 'v2.2'
			});
		}; ( function(d, s, id) {
			var js,
			fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<div id="fb-root"></div>
		<?php getNavBar("index"); ?>
		<div class="container">
			<section class="row">
				<div class="col-sm-6">
					<h1 class="xl">Play now<br/>and win!</h1>
					<h2>arvato's World Fact Quiz</h2>
					<p class="lead">
						Put your knowledge of the world to the test in, and stand a chance to win
						<span class="placeholder"><b>Parkson shopping vouchers</b> worth up to <b>RM300!</b></span>
					</p>
					<a class="btn btn-lg btn-block btn-primary" id="play-now-btn" href="quiz.php">Play Now</a>
				</div>
				<div class="col-sm-6">
					<img src="img/vouchers.png" alt="Vouchers" style="width: 100%;" />
					<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>
				</div>
			</section>
			<section class="row">
				<div class="col-sm-8">
					<h2>How it works</h2>
					<ol>
						<li>Click the <a href="quiz.php">Play Now</a> button.</li>
						<li>Answer as many questions as you can correctly in 60 seconds.</li>
						<li>Click Login to enter the competition with your Facebook account.</li>
						<li>Play again as many times as you like to improve your score and finish in the top 3 to win prizes!</li>
					</ol>
				</div>
				<div class="col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Tip!</h3>
						</div>
						<div class="panel-body">
							Improve your chances of winning, <a href="about.php">click here</a> to find out more about arvato IT Solutions.
						</div>
					</div>
				</div>
			</section>
			<section class="row">
				<div class="col-sm-6">
					<h2>Prizes</h2>
					<p>There are 3 prizes up for grabs for the top 3 contestants:</p>
					<ul>
						<li><b>First prize:</b> <span class="placeholder">1 x RM300 Parkson shopping voucher</span></li>
						<li><b>1st runner-up:</b> <span class="placeholder">1 x RM200 Parkson shopping voucher</span></li>
						<li><b>2nd runner-up:</b> <span class="placeholder">	1 x RM100 Parkson shopping voucher</span></li>
					</ul>
				</div>
				<div class="col-sm-6">
					<h2>Come visit arvato at the JobsCentral Career Fair 2015!</h2>
					<p>
						Find out more about what arvato IT Solutions does, and job opportunities available for
						jobseekers of all experience levels, from fresh graduates to experienced professionals.
					</p>
					<p>
						<b>Date:</b> 7 - 8 February 2015
						<br>
						<b>Time:</b> 11:00AM - 6:00PM
						<br>
						<b>Venue:</b> Kuala Lumpur Convention Centre, Halls 4-6 (free admission)
					</p>
					<a href="http://careersandstudy.com/">Find out more about JobsCentral Career Fair</a>
				</div>
			</section>
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
