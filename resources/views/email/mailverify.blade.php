@extends('layouts.email-layout')

@section('content')
<!-- BODY -->
<center>
	<table>
		<tr>
			<br/>
			<td style="padding: 15px; max-width: 600px; margin: 0 auto; display: block;">
				<table >
					<tr>
						<td>								
							<h1 style="font-weight:bold; font-size: 19px;">Verify Email</h1>
							</br>
							<h2>Hi, {{ $user->name }}.</h2>

							<p>iTalk has received a request to set your email address to {{ $user->email }}. If this is correct, please verify your e-mail by clicking the button below.</p>

							<br/>

							<center>
								<a href="{{URL::route('verifyEmail', ['email' => $user->email, 'verifyToken' => $user->verifyToken])}}" style="box-sizing: border-box; border-radius: 3px; color: #fff; display: inline-block; text-decoration: none; background-color: #8CC63E; border-top: 10px solid #8CC63E; border-right: 18px solid #8CC63E; border-bottom: 10px solid #8CC63E; border-left: 18px solid #8CC63E;">Verify Email</a>
							</center>	

							<br>

							<p>Please inform us if you did not perform this action.</p>	

							<br>

							<p>Best regards, <br>
							iTalk Team</p>	
							<br>
							<br>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</center>
<!-- /BODY -->
@endsection