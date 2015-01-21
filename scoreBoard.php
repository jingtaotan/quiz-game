<?php
require_once 'php/init.php';
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>ScoreBoard</title>

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
		<?php getNavBar("scoreBoard"); ?>
		<div class="container">
			<div class="container-fluid">
				<div id="content" class="row">
					<?php
                    if (isset($_GET["played"])) {
                        echo '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Message:</strong> Thank you for participating in our quiz!<br />
                                <a href="quiz.php">Click here to play again</a>
                            </div>';
                    }
                    $mysqli = getConnection();
                    $fbId = null;
                    if (isset($_GET["fbId"])) {
                            $fbId = clean($_GET["fbId"], $mysqli);
                    }
                    getScoreBoard($fbId);
                    $mysqli->close();
					?>
					<a href="quiz.php" class="btn btn-lg btn-primary">Play Now</a>
				</div>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
