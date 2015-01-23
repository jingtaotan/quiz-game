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
		<?php getNavBar("about"); ?>
		<div class="container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 thumbnail">
						<h2 class="parrentHidden"><span class="glyphicon glyphicon-minus-sign childHidden" aria-hidden="true"></span><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Who we are?</h2>
						<div class="childHidden text-center">
							<p>
								Arvato is a market-leading solution provider for consumer-
								-oriented industries.
								As a global services provider arvato supports business
								customers all over the world and has successfully shaped their
								customer relationships. More than 66,000 employees in
								almost 40 countries design and implement customized
								solutions for integrated services. The group is a wholly owned
								subsidiary of Bertelsmann.
							</p>
							<p>
								Arvato is comprised of seven solution groups:
							</p>
							<ul class="list-group">
								<li class="list-group-item">
									<span class="label label-info">CRM (Customer Relationship Management) Solutions</span>
								</li>
								<li class="list-group-item">
									<span class="label label-info">Digital Marketing</span>
								</li>
								<li class="list-group-item">
									<span class="label label-info">Financial Solutions</span>
								</li>
								<li class="list-group-item">
									<span class="label label-info">IT Solutions</span>
								</li>
								<li class="list-group-item">
									<span class="label label-info">Print Solutions</span>
								</li>
								<li class="list-group-item">
									<span class="label label-info">Replication</span>
								</li>
								<li class="list-group-item">
									<span class="label label-info">SCM (Supply Chain Management) Solutions</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 thumbnail">
						<h2 class="parrentHidden"><span class="glyphicon glyphicon-minus-sign childHidden" aria-hidden="true"></span>
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> What do we do?</h2>
						<div class="childHidden text-center">
							<p>
								Our solutions include data management, customer service,
								customer management services, supply chain management,
								digital distribution, financial services and customized IT
								services, as well as the full range of services related to the
								production and distribution of printed materials and digital
								storage media.
							</p>
							<p>
								Our business is centered on consumer-driven industries such
								as telecommunications, IT/Internet, energy, automotive and
								healthcare. Our strategic objective is to create sustainable
								growth through systematic innovations, internationalization,
								flexibility, customer focus and partnerships.
								arvato IT Solutions uses the technology, talent, and expertise
								of nearly 3,000 people at more than 25 sites throughout the
								world to create integrated, future-proof business infrastructures
								that help our clients become more agile and competitive,
								and enable them to deliver new standards of service to their
								customers. We create streamlined digital processes that
								support innovative business models while providing operation
								and support services. Being a part of the arvato network and
								belonging to Bertelsmann, we have the unique capability to
								create entire value chains.
							</p>
							<p>
								arvato IT Solutions offer an exceptional combination of
								international IT engineering excellence, the open mindset of a
								global player, and the dedication of employees. We also ensure
								that all our customer relationships are as personally rewarding
								and long-lasting as they are successful. The multitude of
								successful projects completed with leading companies around
								the world shows how true partnership leads to results, reliably
								and efficiently.
							<p>
								In Malaysia, we develop the software and systems which form
								the technology component of arvato’s solutions. As we are
								expanding in Malaysia and South East Asia, we are constantly
								looking for new blood to join us and build their IT career with
								us. Talk to us and create your own career with arvato
								Bertelsmann.
							</p>
							<p>
								We focus on implementing projects for leading businesses in
								the most diverse industries with extended expertise in retail,
								travel and transport, media, manufacturing, public sector and
								utilities. For services as BPM, Cloud Computing, CRM and
								eCommerce we provide profound competence.
								We are specialized in the following technologies:
							</p>
							<ul class="list-group">
								<li class="list-group-item">
									<span class="label label-info">Java Technologies</span>
								</li>
								<li class="list-group-item">
									<span class="label label-info">Microsoft Technologies</span>
								</li>
								<li class="list-group-item">
									<span class="label label-info">SAP Business Solutions</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="col-md-12 thumbnail">
                        <h2 class="parrentHidden"><span class="glyphicon glyphicon-minus-sign childHidden" aria-hidden="true"></span>
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> How do you contact us?</h2>
                        <div class="childHidden">
                            <p>
                                <h2>Address:</h2>
                                arvato Systems Malaysia Sdn Bhd
                                Level 25, Menara IMC,
                                No. 8, Jalan Sultan Ismail,
                                50250 Kuala
                            </p>
                            <p>
                                <h2>Email:</h2>
                                hr.my@bertelsmann.de

                            </p>
                            <p>
                               <h2>Phone Number:</h2>
                               +60 3 2330 1988
                            </p>
                        </div>
                    </div>
                </div>
			</div>
			<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>
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
			
			window.fbAsyncInit = function() {
				FB.init({
					appId : '<?php echo $config->fb_appid; ?>',
					xfbml : true,
					version : 'v2.2',
					cookie: true
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
	</body>
</html>
