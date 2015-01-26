<?php
require_once 'php/init.php';
checkSession(true, "submitted");

$beat_highscore = false;
$user_score = $_SESSION['score'];
$user_time = $_SESSION['timeTaken'];
$user_rank = getPosition($user_score, $user_time);

//Generate current time with unique id
$fb_id = time().uniqid();

$logged_in = false;
$returning_user = false;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
						<div id="Form">
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
								<input type="hidden" name="inputFbuserid" value="<?php echo $fb_id; ?>"/>
							</form>
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
<?php session_commit(); ?>
