<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
    <title>Booking Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style type="text/css">
        body{width: 100%;margin:0; padding:0;background: #ffffff;}
        p,h1,h2,h3,h4{margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;}
        html{width: 100%;display: inline-table;}
        table{border:0;border-collapse:collapse;}
        .main-table-wrapper .top-section{margin-top:80px;}
        .main-table-wrapper .footer-section{margin-bottom: 40px;}
        a,a:hover{text-decoration:none; color:#0098d0;}
        @media only screen and (max-width:640px){
            body{width:auto!important;}
            .full .font-replica{font-size:18px !important}
            .main{width:440px !important;}
            .full{margin:0px auto;}

        }
        @media only screen and (max-width:479px){
            body{width:auto!important;}
            .main{width:400px!important;}
            .full{margin:0px auto;}
        }
    </style>
</head>
<body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0"
      bgcolor="#e2e2e2">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff;"
       style="background:#ffffff;" class="main-table-wrapper">
    <tbody>
    <tr>
        <td align="center" valign="top">
            <!-- Top Section  -->
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"class="top-section">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table width="600" border="0" align="center" cellpadding="0" cellpspacing="0" class="top-section-inner main">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" bgcolor="#ffffff">

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="30" align="center" valign="top" style="font-size:30px; line-height:30px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="center" valign="middle">

                                                <table width="270" border="0" align="left" cellpadding="0" cellspacing="0" class="full">
                                                    <tbody>
                                                    <tr>

                                                        <td align="left" valign="top" class="logo">
                                                            <img src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5b51a5ac277b7/1532247007.jpg"
                                                                 />
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <table width="270" border="0" align="left" cellpadding="0" cellspacing="0" class="full">
                                                    <tbody>

                                                    <tr>
                                                        <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family:Roboto;color:#4d5764">
                                                            <multiline>{{settings()->get('site_name') }}</multiline>
                                                        </td>
                                                    </tr>

          


                                                    </tbody>
                                                </table>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="30" align="center" valign="top" style="font-size:30px; line-height:30px;border-bottom:3px solid #0b1c4b;" class="replica">&nbsp;
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

            <!-- Content Section -->

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="content-section">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table width="600" border="0" cellspacing="0" cellpadding="0"
                               class="content-section-inner main">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" bgcolor="ffffff">

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="center" height="40" valign="middle" bgcolor="#605E2B"style="font-size:22px;font-weight:540;font-family:Roboto;color:#ffffff;">
                                                <multiline>{{ $booking->trip_name }} Confirmation</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="20" align="center" valign="top" style="font-size:20px; line-height:20px;" class="replica">&nbsp;
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:24px;font-weight:400;font-family:Montserrat;color:#4d5764">
                                                <multiline>Hi {{ $booking->customer->full_name }},</multiline>
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

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family:Roboto;color:#333333;line-height:24px;"class="font-replica">
                                                <multiline>Thank you for booking with Travel Adventure Nepal for your upcomming trip to {{ $booking->trip_name }}. Your booking reference is <strong>{{$booking->id}}.</strong> A copy of your booking confirmation has been emailed to you with all terms and conditions. If you have not recieved your confirmation email please check your junk/spam folder.</multiline>
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

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family:Roboto;color:#333333;line-height:24px;" class="font-replica">
                                                <multiline>You can also login to our website <a href="http://tan.com">http://tan.com</a> and
                                                    view your booking details and payment options
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

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family:Roboto;color:#333333;line-height:24px;" class="font-replica">
                                                <multiline>You will get an email from one of our assigned consultant within 24 hours. If you
                                                    have requested to arrange your flight and insurance through us, please wait for your
                                                    assigned consultant call.
                                                    You are required to submit your Insurance documents within 2-4 business days from
                                                    the day of booking to your assigned consultant. Failing to do so will result in
                                                    cancellation of your booking. Please read our terms and conditions for more details.</multiline>
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

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family:Roboto;color:#333333;line-height:30px;" class="font-replica">
                                                <multiline>Kind Regards,</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family:Roboto;color:#333333;
													  	 line-height:30px;" class="font-replica">
                                                <multiline>Support Team</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="540" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family:Roboto;color:#333333;line-height:30px;" class="font-replica">
                                                <multiline>Travel Adventure Nepal Pty Ltd</multiline>
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

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="70" align="center" valign="top" style="font-size:70px; line-height:70px;" class="replica">&nbsp;
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
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>