<?php
require_once 'php/init.php';

game_log('User entered about page');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php getOgTags(); ?>
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<title>arvato IT Solutions Malaysia</title>

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
		<div class="container text-justify">
			<h1>About arvato</h1>
			<div class="panel panel-default" id="contact-panel">
				<div class="panel-heading">
					<h3 class="panel-title">Contact Us</h3>
				</div>
				<div class="panel-body">
					<address>
						<strong>arvato Systems Malaysia Sdn Bhd</strong><br/>
						Level 25, Menara IMC,<br/>
						No. 8, Jalan Sultan Ismail,<br/>
						50250 Kuala Lumpur
					</address>
					<strong>Email:</strong> <a href="hr.my@bertelsmann.de">hr.my@bertelsmann.de</a><br/>
					<strong>Phone:</strong> +60 3 2330 1988<br/>
				</dl>
			</div>
		</div>
			<p>
				arvato is a market-leading solution provider for consumer-oriented industries.
				As a global services provider arvato supports business
				customers all over the world and has successfully shaped their
				customer relationships. More than 66,000 employees in
				almost 40 countries design and implement customized
				solutions for integrated services. The group is a wholly owned
				subsidiary of Bertelsmann.
			</p>
			<p>
				arvato is comprised of seven solution groups:
			</p>
			<ul>
				<li>
					CRM (Customer Relationship Management) Solutions
				</li>
				<li>
					Digital Marketing
				</li>
				<li>
					Financial Solutions
				</li>
				<li>
					IT Solutions
				</li>
				<li>
					Print Solutions
				</li>
				<li>
					Replication
				</li>
				<li>
					SCM (Supply Chain Management) Solutions
				</li>
			</ul>
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
			</p>
			<h2>About arvato IT Solutions</h2>
			<p>
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
			</p>
			<h2>arvato in Malaysia</h2>
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
					<h3 class="list-group-item-heading">Java Technologies</h3>
					<ul>
						<li>Enterprise Order Management</li>
						<li>SAP hybris eCommerce</li>
						<li>Mobile Applications</li>
						<li>Enterprise BPM</li>
					</ul>
				</li>
				<li class="list-group-item">
					<h3 class="list-group-item-heading">Microsoft Technologies</h3>
					<ul>
						<li>.NET Applications</li>
						<li>Dynamics CRM</li>
						<li>SharePoint</li>
						<li>SQL Server</li>
					</ul>
				</li>
				<li class="list-group-item">
					<h3 class="list-group-item-heading">SAP Business Solutions</h3>
					<ul>
						<li>SAP ERP</li>
						<li>SAP Netweaver</li>
						<li>SAP Process Integration & Orchestration (PI/PO)</li>
					</ul>
				</li>
			</ul>
			<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>

		</div>
		</div>

		<?php getFooter() ?>

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
