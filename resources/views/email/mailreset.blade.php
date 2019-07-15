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
							<h1 style="font-weight:bold; font-size: 19px;">Reset Password</h1>
							</br>
							<h2>Hi, {{ $name }}.</h2>

							<p>iTalk has received a request to reset the password of your iTalk account.</p>

							<p>If you confirm to reset your account password, please click OK to proceed with this operation.</p>

							<p>If you don't want to do so, please ignore this email.</p>

							<br/>

							<center>
								<a href="{{ URL::route('setPassword', ['email'=>$email, 'remember_token'=>$remember_token]) }}" style="box-sizing: border-box; border-radius: 3px; color: #fff; display: inline-block; text-decoration: none; background-color: #8CC63E; border-top: 10px solid #8CC63E; border-right: 18px solid #8CC63E; border-bottom: 10px solid #8CC63E; border-left: 18px solid #8CC63E;">Reset Password</a>
							</center>	

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