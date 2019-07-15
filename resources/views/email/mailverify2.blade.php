<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ url('/css/email.css') }}">
		
		<title>Email Verification | iTalk</title>
	</head>
	 
	<body bgcolor="#FFFFFF">

		<!-- HEADER -->
		<table class="head-wrap">
			<tr>
				<td></td>
				<td class="header container">
						<div class="content">
							<table>
							<tr>
								<td>
									<img src="{{ asset('img/email/iTalk_logo.png') }}" width="100px" />
								</td>
							</tr>
						</table>
						</div>
				</td>
				<td></td>
			</tr>
		</table><!-- /HEADER -->

		<!-- BODY -->
		<table class="body-wrap">
			<tr>
				<td></td>
				<td class="container" bgcolor="#FFFFFF">

					<div class="content">
					<table>
						<tr>
							<td>								
								<h3>Hi, {{ $name }}.</h3>
								<p>We received a request to set your email to EMAIL. If this is correct, please verify your e-mail by clicking the button below.</p>
								
								<!-- Callout Panel -->
								<p class="callout">
									Click below to verify your e-mail.
									<br/>
									<a href="{{URL::route('verifyEmail', $email, $verifyToken)}}">Verify E-Mail &raquo;</a>
								</p>						

								<p>Please inform us if you did not perform this action.</p>	
								<br/>
								<br/>	<!-- /Callout Panel -->		
							</td>
						</tr>
					</table>
					</div>											
				</td>
				<td></td>
			</tr>
		</table><!-- /BODY -->

		<!-- FOOTER -->
		<table class="footer-wrap">
			<tr>
				<td></td>
				<td class="container">					
						<!-- content -->
						<div class="content">
						<table>
						<tr>
							<td align="center">
								<p>
									<a href="#"></a>
									<a href="#"></a>
								</p>
							</td>
						</tr>
					</table>
						</div><!-- /content -->						
				</td>
				<td></td>
			</tr>
		</table><!-- /FOOTER -->
	</body>
</html>