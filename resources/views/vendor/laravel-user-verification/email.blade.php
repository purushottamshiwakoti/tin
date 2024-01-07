<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html;" charset=UTF-8" />
	<title>Account Creation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
		rel="stylesheet">
	<style type="text/css">
		p,
		h1,
		h2,
		h3,
		h4 {
			margin-top: 0;
			margin-bottom: 0;
			padding-top: 0;
			padding-bottom: 0;
		}

		html {
			width: 100%;
			display: inline-table;
		}

		table {
			border: 0;
			border-collapse: collapse;
		}

		.main-table-wrapper .top-section {
			margin-top: 80px;
		}

		.main-table-wrapper .footer-section {
			margin-bottom: 40px;
		}

		.footer p{
				margin: 1rem 0;
                font-size: 16px !important;
		}

		a,
		a:hover {
			text-decoration: none;
			color: #0098d0;
		}

		@media only screen and (max-width:640px) {
			body {
				width: auto !important;
			}

			.full .font-replica {
				font-size: 18px !important
			}

			.main {
				width: 440px !important;
			}

			.full {
				margin: 0px auto;
			}

		}

		@media only screen and (max-width:479px) {
			body {
				font-family: 'Plus Jakarta Sans', sans-serif;
				width: auto !important;
			}

			.main {
				width: 400px !important;
			}

			.full {
				margin: 0px auto;
			}
		}

		.header{
			padding-top: 3rem !important;
		}
	</style>
</head>

<body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0" bgcolor="#e2e2e2" style="width: 100%;
			margin: 0;
			padding: 0;
			padding: 5px 0; width: 100%;background: #d7d7d7;font-family: 'Plus Jakarta Sans', sans-serif;border: 1px solid #E9F0F4;box-shadow: 5px 5px 0px rgba(5, 19, 58, 0.05);border-radius: 4px;">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff;" style="width: 100%;margin: 2rem auto;padding: 0;background: #d7d7d7;"
		class="main-table-wrapper">
		<tbody>
			<tr>
				<td align="center" valign="top">
				

					<!-- Content Section -->

					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="content-section">
						<tbody>
							<tr>
								<td align="center" valign="top">
									<table width="600" border="0" cellspacing="0" cellpadding="0"
										class="content-section-inner main">
										<tbody style="background: white;">
											<tr>
												<td align="center" valign="top" bgcolor="#ffffff">

													
                                                    @include('website::mails.partials.mail-header')

															<tr>
																<td align="left" valign="top"
																	style="font-size:24px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#4d5764; padding: 0 3rem;">
																	<multiline>Hi {{ $user->first_name }} {{ $user->last_name }},</multiline>
																</td>
															</tr>
															<tr>
																<td height="35" align="center" valign="top"
																	style="font-size:35px; line-height:35px; padding: 0 3rem;"
																	class="replica">&nbsp;
																</td>
															</tr>
															<tr>
																<td align="left" valign="top"
																	style="font-size:22px;font-weight:540;font-family: 'Plus Jakarta Sans', sans-serif;color:#0093cd; padding: 0 3rem;">
																	<multiline>Namaste and welcome to {{ setting('site_name') }}</multiline>
																</td>
															</tr>
															<tr>
																<td height="35" align="center" valign="top"
																	style="font-size:35px; line-height:35px;"
																	class="replica">&nbsp;
																</td>
															</tr>
															<tr>
																<td align="left" valign="top"
																	style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333; padding: 0 3rem;"
																	class="font-replica">
																	<multiline>
																		We recently created your account with us.
																	</multiline>
																</td>
															</tr>
															<tr>
																<td height="35" align="center" valign="top"
																	style="font-size:35px; line-height:35px;"
																	class="replica">&nbsp;
																</td>
															</tr>
															<tr>
																<td align="left" valign="top"
																	style="font-size:16px;font-weight:700;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333; padding: 0 3rem;"
																	class="font-replica">
																	<multiline>Your TAN ID is
																		{{ $user->email }}. </multiline>
																</td>
															</tr>
															<tr>
																<td height="35" align="center" valign="top"
																	style="font-size:35px; line-height:35px; padding: 0 3rem;"
																	class="replica">&nbsp;
																</td>
															</tr>
															<tr>
																<td align="left" valign="top"
																	style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333; padding: 0 3rem;"
																	class="font-replica">
																	<multiline>To confirm your email address, <a
																			href="{{ $link = route('website.email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}"><u>Please click this link:</u></a>
																	</multiline>
																</td>
															</tr>
															<tr>
																<td align="left" valign="top"
																	style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;line-height:25px; padding: 0 3rem;"
																	class="font-replica">
																	{{-- <multiline>Your Temporary password is ..........
																		Please go through the above link and change your
																		password. You are required to enter the
																		temporary password.</multiline> --}}

																		<p style="margin: 30px 0;">
																			Thanks,<br>
																			{{ setting('site') }}
																		</p>
																		
																</td>
															</tr>
															<tr>
																<td>
                                                                    @include('website::mails.partials.mail-footer',['email'=>$user->email])
																</td>
															</tr>
														</tbody>
													</table>
				</td>

			</tr>
		</tbody>
	</table>
</body>

</html>