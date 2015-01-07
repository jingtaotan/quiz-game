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
		<div class="container">
		    <?php getNavBar("index"); ?>
			<div class="container-fluid">
				<div id="content" class="row">
					<a href="#" class="thumbnail"> Some image? A slider perhaps? </a>
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
				<script>
					window.fbAsyncInit = function() {
						FB.init({
							appId : '1575617865987702',
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
				<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>
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
	</body>
</html>
