<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Renthia</title>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Renthia</title>

	<!-- Latest compiled and minified CSS of bootstrap -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<style type="text/css">
		body{
			background-color: #f6f6f6;
			margin-top: 50px;
		}
		.container{
			width: 800px;
			background: white;
			padding-left: 0px;
		}
		.sideImg{
			width: 300px;
			height: 600px;
			background-image: url("http://www.renthia.com/wp-content/uploads/2016/07/email-pic.jpg");
			background-repeat: no-repeat;

		}
		.footer{
			padding-top: 30px;
			padding-bottom: 30px;
		}
	</style>
</head>

<body>
<div class="container">
	<div class="row content">
		<div class="col-xs-12">
			<div class="col-xs-5 sideImg"></div>
			<div class="col-xs-6 col-xs-offset-1">
				<table>
					<tr>
						<td></td>
						<td class="container">
							<!-- content -->
							<div class="content">
								<table>
									<tr>
										<td>
											<h3>Tack för att ni kontaktar oss!</h3>
											<p>Vi kollar på ert ärende och återkommer till er så snart som möjligt.</p>
											<br>
											<p>Ditt meddelande till oss:</p>
											<div class='main'>
												<p><strong>Problem: </strong><br><?php echo $problem; ?></p>
												<p><strong>Meddelande: </strong><br><?php echo $message; ?></p>
											</div>
										</td>
									</tr>
								</table>
							</div>
							<!-- /content -->
						</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-xs-12 footer">
			<div class="col-xs-4">
				<img width="150px" src="http://www.renthia.com/wp-content/uploads/2015/12/Renthia_logo.png">
			</div>
			<div class="col-xs-4 col-xs-offset-4">
				<p>Tack, ha en underbar dag!</p>
				<p><a href="http://www.renthia.com/sv">www.renthia.com</a></p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
