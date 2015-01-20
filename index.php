<?php
require_once 'php/config.php';
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
		<?php var_dump($fb_session);?>
		<div class="container">
	    <?php getNavBar("index"); ?>
			<div class="container-fluid">
				<div id="content" class="row">
				</div>
				<div id="bottom-content" class="row">
                    <div class="col-md-4 thumbnail">
                        <ul>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 thumbnail">
                        <ul>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 thumbnail">
                        <ul>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                            <li>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </li>
                        </ul>
                    </div>
                </div>
				<hr />
				<div id="footer" class="row">
					<div class="col-md-4">
						<ul>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
						</ul>
					</div>
					<div class="col-md-4">
						<ul>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
						</ul>
					</div>
					<div class="col-md-4">
						<ul>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
							<li>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							</li>
						</ul>
					</div>
				</div>
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
