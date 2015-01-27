<?php
require_once 'php/init.php';

//Check Date
$endDate = '2015-02-08 23:59:59';
date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date('Y-m-d H:i:s');

if($date > $endDate){
    header("Location: scoreBoard.php?ended=true");
}

$mysqli = getConnection();

$token =bin2hex(mcrypt_create_iv(128, MCRYPT_DEV_RANDOM));
$_SESSION["token"] = $token;
$_SESSION['submitted'] = null;
session_commit();

$questions = array();
for ($difficulty = 1; $difficulty <= 4; $difficulty++) {
	if ($stmt = $mysqli -> prepare("SELECT * FROM table_question WHERE question_difficulty=? ORDER BY RAND() LIMIT ".LIMIT)) {

		$stmt -> bind_param("s", $difficulty);

		/* execute query */
		$stmt -> execute();

		/* binds result */
		$stmt -> bind_result($question_id, $question_description, $question_difficulty, $question_answer[1], $question_answer[2], $question_answer[3], $question_answer[4]);

		/*Fetch results*/
		while ($stmt -> fetch()) {
			$question = array('question_id' => $question_id, 'question_description' => $question_description);

			//Random answers arrangment
			$numbers = range(1, 4);
			shuffle($numbers);

			$answers = array();
			foreach ($numbers as $n) {
				// number is the original number of the answer (answer1, answer2, etc)
				$answer = array('number' => $n, 'text' => $question_answer[$n]);
				array_push($answers, $answer);
			}
			$question["answers"] = $answers;
			array_push($questions, $question);
		}
	}
	/* close statement */
	$stmt -> close();
}
$mysqli -> close();
shuffle($questions);
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
		<title>Play now - arvato World Fact Challenge</title>

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
	<body class="quiz">
		<div id="fb-root"></div>
		<div class="container">

			<div class="header">
				<div class="timer">
					<span id="timer-txt">01:00.0</span>
					<a href="index.php" id="quit-btn" class="btn btn-danger pull-right">Quit Game</a>
				</div>
			</div>

			<div id="quiz-screen">
				<div class="panel panel-default">
					<div class="panel-body question" id="question-txt"></div>
				</div>

				<div class="list-group answers">
					<a href="#" class="list-group-item answer" id="answer1-txt"> &nbsp; </a>
					<a href="#" class="list-group-item answer" id="answer2-txt"> &nbsp; </a>
					<a href="#" class="list-group-item answer" id="answer3-txt"> &nbsp; </a>
					<a href="#" class="list-group-item answer" id="answer4-txt"> &nbsp; </a>
				</div>
			</div>

			<div id="finished-screen">
				<h1>Quiz finished!</h1>
			</div>

		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script>var questions =<?php echo json_encode($questions); ?>
			;

			$(document).ready(function() {
				var answers = [];
				var questionIds = [];
				var questionIndex = 0;
				var timerInterval;
				var timeTaken, timeLeft;

				//Get question id
				var i = 0;
				for(i=0; i< questions.length; i++){
					questionIds[i] = questions[i].question_id;
				}

				// DOM elements
				var questionEl = $('#question-txt');
				var answerEls = $('.answer');
				var quitBtn = $('#quit-btn');
				var timerEl = $('#timer-txt');

				var resetControls = function() {
					answerEls.removeClass('active disabled');
					answerEls.removeAttr('disabled');
					answerEls.blur();
				};

				var disableControls = function() {
					answerEls.attr('disabled', '');
					answerEls.addClass('disabled');
				};

				var putQuestion = function(questionIndex) {
					// put the question text in
					var question = questions[questionIndex];
					questionEl.text(question.question_description);
					// put the answer texts in
					// use native for loop for speed, IIFE used to hide the var i
					(function() {
						var i;
						for ( i = 0; i < 4; i++) {
							var answer = question.answers[i];
							var answerEl = $(answerEls[i]);
							answerEl.data('number', answer.number);
							answerEl.text(answer.text);
						}
					})();
				};

				var startQuiz = function() {

					questionEl.text('Ready... set...');
					disableControls();
					setTimeout(function() {
						// set the date we're counting down to
						var target_date = new Date(new Date().getTime() + 60000);
						// 1 extra second to show 01:00

						// update the timer display every 1 millisecond
						timerInterval = setInterval(function() {
							// find the amount of "seconds" between now and target
							var current_date = new Date().getTime();
							var milliseconds_left = (target_date - current_date);

							if (milliseconds_left <= 0) {
								milliseconds_left = 0;
								finishQuiz();
							}

							timeLeft = new Date(milliseconds_left);
							timeTaken = new Date(60000 - milliseconds_left);

							var minutes = parseInt(milliseconds_left / 60000);
							if (minutes < 10) {
								minutes = "0" + minutes.toString();
							}
							var seconds = parseInt((milliseconds_left % 60000) / 1000);
							if (seconds < 10) {
								seconds = "0" + seconds.toString();
							}
							var tenths_second = parseInt((milliseconds_left % 1000) / 100);
							// only display 1 decimal place after seconds
							timerEl.text(minutes + ":" + seconds + "." + tenths_second);
						}, 1);

						putQuestion(questionIndex++);
						resetControls();
					}, 1000);

				};

				var finishQuiz = function() {
					clearInterval(timerInterval);

					$('#quiz-screen').hide();
					$('#finished-screen').show();

					//Post to backend
					$.post("php/check.php", {
						answers : answers,
						questionIds : questionIds,
						timeTaken: timeTaken.getTime() / 1000,
						token: "<?php echo $token; ?>"
					}, function(data, status) {
						if(data === "Success"){
							//redirect
							<?php
							 if (isset($_GET["isOffline"])) {
							     echo "window.location.href = 'result(Offline).php'";
                             }else{
                                echo "window.location.href = 'result.php'";
                             }
							?>
						} else {
							//window.location.href = 'scoreBoard.php?error=1';
							window.location.href = 'result.php';
						}
					});
				};

				answerEls.on('mousedown', function(event) {
					var el = $(this);
					if (!el.attr('disabled')) {
						answerEls.removeClass('active');
						$(this).addClass('active');
					}
				});
				answerEls.on('click', function(event) {
					event.preventDefault();
					var answerEl = $(this);
					if (!answerEl.attr('disabled')) {
						var answerNum = answerEl.data('number')
						answers.push(answerNum);
						if (questionIndex == questions.length) {
							finishQuiz();
						} else {
							putQuestion(questionIndex++);
							resetControls();
						}
					}
				});

				// start with the first question
				startQuiz();
			});

			window.fbAsyncInit = function() {
				FB.init({
					appId : '<?php echo $config->fb_appid; ?>',
					xfbml : true,
					version : 'v2.2',
					cookie: true
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
	</body>
</html>
