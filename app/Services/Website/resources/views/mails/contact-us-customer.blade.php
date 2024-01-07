<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
    <title>Trip Cancellation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style type="text/css">
        .header{
            padding: 0 !important;
        }
        p,h1,h2,h3,h4{margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;}
        html{width: 100%;display: inline-table;}
        table{border:0;border-collapse:collapse;}
        .main-table-wrapper .top-section{margin-top:80px;}
        .main-table-wrapper .footer-section{margin-bottom: 40px;}
        .footer p{margin: 1rem 0;}
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
<body style="width: 100%;margin:0; padding:0;background: #d7d7d7;" yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0"
      bgcolor="#ffffff">
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

                                    <table width="506" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                                        <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#4d5764">
                                                            @include('website::mails.partials.mail-header')

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td height="30" align="center" valign="top" style="font-size:30px; line-height:30px;" class="replica">&nbsp;
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

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="content-section">
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table width="600" border="0" cellspacing="0" cellpadding="0"
                               class="content-section-inner main">
                            <tbody>
                            <tr>
                                <td align="center" valign="top" bgcolor="ffffff" style="padding-bottom: 30px;">

                                    <table width="506" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:24px;font-weight:400;font-family:Montserrat;color:#4d5764">
                                                <multiline>Hi {{ $enquiry->name }},</multiline>
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

                                    <table width="506" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;line-height:24px;"class="font-replica">
                                                <multiline>Thank you for your message. One of our representatives will get back to you within 24 hours. We look forward to working with you on your Adventure.</multiline>
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

                                    <table width="506" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;line-height:30px;" class="font-replica">
                                                <multiline>Kind Regards,</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="506" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;
													  	 line-height:30px;" class="font-replica">
                                                <multiline>Support Team</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table width="506" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:16px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;line-height:30px;" class="font-replica">
                                                <multiline>{{settings()->get('site_name') }}</multiline>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table width="506" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                        <tbody>
                                        <tr>
                                            <td align="left" valign="top" style="font-size:14px;font-weight:400;font-family: 'Plus Jakarta Sans', sans-serif;color:#333333;line-height:20px;" class="font-replica">
                                                <multiline>{{settings()->get('site_name') }}, {{settings()->get('address') }} </multiline>
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
                                            <!-- <td height="70" align="center" valign="top" style="font-size:70px; line-height:70px;" class="replica">&nbsp;
                                            </td> -->
                                            <td>
                                            @include('website::mails.partials.mail-footer',['email'=>$enquiry->email])
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