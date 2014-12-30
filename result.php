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
					appId : '1575617865987702',
					xfbml : true,
					version : 'v2.2'
				});
			}; ( function(d, s, id) {
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

		<div class="container">
			<h1>Form:</h1>
			<hr />
			<div>
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
				</form>
			</div>
			<hr />
			<div>
				Scoreboard
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>