<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
    <title>Auto Account Creation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style type="text/css">
        .body{width: 100%;margin:0;background: #ffffff; padding:5px 0;}
        .footer p{
				margin: 1rem 0;
				font-size: 16px !important;
		}
        p,h1,h2,h3,h4{margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;}
        html{width: 100%;display: inline-table;}
        table{border:0;border-collapse:collapse;}
        .main-table-wrapper .footer-section{margin-bottom: 5px;}
        a,a:hover{text-decoration:none; color:#0098d0;}
        @media only screen and (max-width:640px){
            .body{width:auto!important;}
            .full .font-replica{font-size:18px !important}
            .main{width:440px !important;}
            .full{margin:0px auto;}

        }
        @media only screen and (max-width:479px){
            .body{width:auto!important;}
            .main{width:400px!important;}
            .full{margin:0px auto;}
        }
    </style>
</head>
<body class="body" yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0" bgcolor="#e2e2e2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff;"
       style="background:#d7d7d7;" class="main-table-wrapper">
    <tbody>
    <tr>
        <td align="center" valign="top">
            <!-- Top Section  -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"class="top-section">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table width="600" border="0" align="center" cellpadding="0" cellpspacing="0" class="top-section-inner main" style="margin-top:5px;">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" bgcolor="#ffffff">

                                    @include('website::mails.partials.mail-header')


                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>

            <!-- Content Section -->

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="content-section">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table width="600" border="0" cellspacing="0" cellpadding="0"
                               class="content-section-inner main">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" bgcolor="#ffffff">

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="30" align="center" valign="top" style="font-size:50px; line-height:50px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:24px;font-weight:400;font-family:Montserrat;color:#4d5764">
                                                <multiline>Hi {{ $customer->full_name }},</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="35" align="center" valign="top" style="font-size:35px; line-height:35px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:22px;font-weight:504;font-family: 'Plus Jakarta Sans', sans-serif;color:#605E2B">
                                                <multiline>Namaste and welcome to {{ setting('site_title') }}</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="35" align="center" valign="top" style="font-size:35px; line-height:35px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;" class="font-replica">
                                                <multiline>
                                                    We recently created your account with us.
                                                </multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="35" align="center" valign="top" style="font-size:35px; line-height:35px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:700;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333" class="font-replica">
                                                <multiline>Your TAN ID is {{ $customer->email }}. </multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="35" align="center" valign="top" style="font-size:35px; line-height:35px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    {{-- <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333" class="font-replica">
                                                <multiline>To confirm your email address, <a href="{{ url('/') }}"><u>Please click this link:</u></a></multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> --}}

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="35" align="center" valign="top" style="font-size:35px; line-height:35px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;line-height:25px;" class="font-replica">
                                                <multiline>You are required to enter the temporary password. Your Temporary password is {{ $password }} Please go through the above link and change your password.</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="55" align="center" valign="top" style="font-size:55px; line-height:55px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;line-height:30px;" class="font-replica">
                                                <multiline>Kind Regards,</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;
													  	 line-height:30px;" class="font-replica">
                                                <multiline>Support Team</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="504" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;line-height:30px;"  class="font-replica">
                                                <multiline>{{ setting('site_title') }}</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="55" align="center" valign="top" style="font-size:40px; line-height:40px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </td>
                </tr>

                </tbody>
            </table>

            <!-- Footer -->

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="footer-section">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table width="600" border="0" cellspacing="0" cellpadding="0"
                               class="footer-section-inner main">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" bgcolor="#ffffff">

                                    <!-- <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="70" align="center" valign="top" style="font-size:70px; line-height:70px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> -->

                                    @include('website::mails.partials.mail-footer',['email'=>$customer->email])
                                </td>
                            </tr>
                            </tbody>
                        </table>
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