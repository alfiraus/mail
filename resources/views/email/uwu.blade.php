<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
		<link rel="stylesheet" href="{{ url('/css/email.css') }}">
		
		<title>Reset Password | iTalk</title>
	</head>
	 
	<body>

		<!-- HEADER -->
		<table class="head-wrap">
			<tr>				
				<td>
					<table>
						<tr>
							<div class="top-banner">
								<center>
									<img src="{{ asset('img/email/iTalk_logo.png') }}" class="banner-logo" />
								</center>
							</div>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<!-- /HEADER -->

		<!-- BODY -->
		<table class="body-wrap">
			<tr>
				<br/>
				<td class="container">
					<div class="content">
					<table>
						<tr>
							<td>								
								<h1>Reset Password</h1>
								</br>
								<h2>Hi, NAME.</h2>

								<p>iTalk has received a request to reset the password of your iTalk account.</p>

								<p>If you confirm to reset your account password, please click the button to proceed with this operation.</p>

								<p>If you don't want to do so, please ignore this email.</p>

								<br/>

								<center>
									<a href="" class="button-confirm">Reset Password</a>
								</center>	

								<br/>

								<p>Thanks, <br/> iTalk</p>	
								<br/>
								<br/>
							</td>
						</tr>
					</table>
					</div>											
				</td>
			</tr>
		</table>
		<!-- /BODY -->

		<!-- FOOTER -->
		<table>
			<tr>
				<td>					
					<div class="bottom-banner">
						<table>
							<tr>
								<center>© 2018 iTalk. All rights reserved.</center>				
							</tr>
						</table>
					</div>					
				</td>
			</tr>
		</table>
		<!-- /FOOTER -->

	</body>
</html>