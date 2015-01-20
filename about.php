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
		<?php var_dump($fb_session);?>
		<div class="container">
			<?php getNavBar("about"); ?>
			<div class="container-fluid">
				<div id="content" class="row">
					<div class="col-md-10 thumbnail">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis, ipsum in aliquet dignissim, enim purus eleifend nisi, ut ultricies ex leo sit amet ligula. Phasellus porttitor quam id sapien blandit, ut iaculis ex tristique. Nam convallis dignissim luctus. Suspendisse eu eros eget leo pharetra egestas ut vitae nibh. Fusce fermentum eros magna, eu dapibus mi dictum suscipit. Aenean pellentesque urna ex, id consectetur erat lacinia sed. Aliquam lobortis ipsum non mi lacinia aliquam non eu tortor. In nibh libero, dictum ut hendrerit quis, egestas hendrerit diam. Curabitur pretium sem sapien, id mattis risus egestas a.

						Nam sit amet maximus ex. Maecenas ut lorem nulla. In tempus elit dolor, in varius massa commodo a. Cras vestibulum suscipit ex ac lobortis. Aliquam erat volutpat. Curabitur nec mauris erat. Vivamus fringilla lectus diam, ac pharetra massa blandit vulputate. Mauris a purus nec libero commodo eleifend sed non tellus. Aenean malesuada leo eget eleifend elementum. Etiam volutpat et tortor sed condimentum. Etiam vestibulum molestie mattis. Nullam iaculis ante tellus, id maximus velit sagittis sed.

						Mauris at leo id est convallis feugiat. Quisque in consequat magna, sollicitudin ullamcorper augue. Maecenas dapibus massa rutrum metus pharetra efficitur. Ut quam nunc, porttitor id cursus et, porta vitae leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed luctus malesuada enim. In ut nunc sed lorem pellentesque suscipit at vel nulla. Etiam finibus semper nunc, nec rutrum mi euismod aliquet. Pellentesque facilisis consectetur neque, ac scelerisque metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla sodales imperdiet mi in iaculis.

						Maecenas sit amet eros sed nibh porta tincidunt. Nunc pretium suscipit finibus. Donec placerat ullamcorper dui non tincidunt. Pellentesque quis cursus ipsum, sit amet hendrerit mi. Nullam ullamcorper, elit at placerat maximus, lectus lacus elementum nisi, quis ultricies neque mi quis purus. Quisque ut dolor vitae nulla dapibus cursus in a lectus. Nunc finibus dolor arcu, sed pharetra lorem ornare a. Vestibulum tempus eros vitae velit lobortis, at congue metus euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus a nulla lobortis, consequat sapien tempor, eleifend leo. Aliquam erat volutpat. Quisque vitae est interdum, eleifend velit vitae, pulvinar lorem. Nunc et libero pellentesque, dapibus ante vitae, consectetur nunc. Morbi mattis quam justo, in pharetra dolor venenatis quis. Aenean pharetra est eget erat condimentum faucibus.
					</div>
					<div class="col-md-2 thumbnail">
						Pellentesque ut ullamcorper nibh. Curabitur consectetur urna ultricies pretium consequat. Donec quis fermentum diam, sit amet luctus nisi. Donec at sagittis justo. Vivamus porta elit elit, vel posuere felis convallis sit amet. Suspendisse aliquet lectus ut posuere vulputate. Etiam aisque mauris, eu sodales est velit non quam. Phasellus a ex orci. Duis porttitor, nibh sed vulputate posuere, justo ipsum varius dolor, sed pharetra nulla lectus at diam. Praesent non facilisis libero. Sed sit amet sem metus.
					</div>
				</div>
				<script>
					window.fbAsyncInit = function() {
						FB.init({
							appId : '1575617865987702',
							xfbml : true,
							version : 'v2.2'
						});
					};
					( function(d, s, id) {
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
