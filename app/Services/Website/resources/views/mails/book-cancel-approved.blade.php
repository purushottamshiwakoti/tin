<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <title>Book Cancel Approved</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:400,500,700" rel="stylesheet"
          type="text/css">

    <style>

        *{margin: 0 auto;}
        .footer p{margin: 1rem 0;font-size: 16px !important;}
        .wrapper {
            display: table;
            table-layout: fixed;
            width: 100%;
            min-width: 620px;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }


        /* Basic */
        table {
            border-collapse: inherit;
            border-spacing: 0;
            background: #ffffff;
        }
        table.center {margin: 0 auto; width: 600px; }
        td {padding: 0; vertical-align: top; }
        table tr td h1{font-size: 24px;font-weight: 400;font-family: 'Montserrat' , sans-serif;
            color: #4D5764; line-height: 24px; margin: 25px 0 0 0;}
        .columns {margin: 0 auto; width: 600px; background-color: #ffffff; font-size: 14px; }
        .column {text-align: left; background-color: #ffffff; font-size: 14px; }
        .column-top {font-size: 24px; line-height: 24px; }
        .content {width: 100%; } .column-bottom {font-size: 8px; line-height: 8px; }
        p{
            color: #7C7C7C;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
        }
        td,strong{color:#7C7C7C;}
        .tripdetail h3{color: #605E2B;font-weight: bold;}
        .footer a{text-decoration: none;margin: 0 3px;}
        .footer table tr td{width: 50%;}.footer table tr td:nth-child(2){text-align: right;}
        .tripdetail table tr td:nth-child(1){padding-right: 10px;}
        .tripdetail table tr td:nth-child(2){padding-left: 10px;}
        .content h2 {
            margin-top: 30px;
            margin-bottom: 15px;
            color: #333333;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            font-size: 20px;
            line-height: 25px;
        }
        .mid .content p,.footer .content p{margin-bottom: 5px;}
        .content .caption {color: #616161; font-size: 12px; line-height: 20px; }
        @media only screen and (min-width: 0) {
            .wrapper {
                text-rendering: optimizeLegibility;
            }
        }
        @media only screen and (max-width: 620px) {
            table {
                border-collapse: collapse;
                border-spacing: 0;
                background: #ffffff;
            }
            .wrapper {
                min-width: 302px !important;
                max-width: 302px !important;
                width: 100% !important;
            }
            .wrapper .block {
                display: block !important;
            }
            .wrapper .hide {
                display: none !important;
            }

            .wrapper .top-panel,
            .wrapper .header,
            .wrapper .main,
            .wrapper .mid,
            .wrapper .footer {
                width: 302px !important;
            }

            .wrapper .title,
            .wrapper .subject,
            .wrapper .signature,
            .wrapper .subscription {
                display: block;
                float: left;
                width: 300px !important;
                text-align: center !important;
            }
            .wrapper .signature {
                padding-bottom: 0 !important;
            }
            .wrapper .subscription {
                padding-top: 0 !important;
            }
            table.center.top{padding: 30px 15px!important;}
            table.center.customer,table.center.tripdetail{padding:30px 15px!important;}
            .footer table tr{display: inline-grid;}
            .footer table tr td{text-align: center;width: 100%;}
            .footer table tr td:nth-child(2){text-align: center;margin-top: 20px;}
        }


    </style>


</head>

<body style="background-color: #d7d7d7; margin: 0; padding: 5px 0 !important; min-width: 100%; font-family: 'Plus Jakarta Sans', sans-serif;">

<center class="wrapper">
    <table class="main center top" width="602" border="0" cellspacing="0" cellpadding="0" style="padding-bottom:30px;">
        <tbody>
        <tr>
            <td class="column">
                @include('website::mails.partials.mail-header')
            </td>
        </tr>
        </tbody>
    </table><!--top-->
   
    <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
<div style="margin:0px auto;max-width:600px;background:#EFF9FF;">
    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
        <tbody>
        <tr>
            <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
                <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                        <tbody>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:0 3rem;" align="left">
                                <div style="cursor:auto;color:#000000;font-family: 'Plus Jakarta Sans', sans-serif;font-size:11px;line-height:22px;text-align:left;">
                                    <h1 style="font-family: &apos;Cabin&apos;, sans-serif; line-height: 100%; margin-bottom: 20px;"><span style="color:#4d5764;"><span style="font-size:26px;">Dear {{ $booking->customer->name }},</span></span></h1></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:0 3rem;" align="left">
                                <div style="cursor:auto;color:#000000;font-family: 'Plus Jakarta Sans', sans-serif;font-size:11px;line-height:22px;text-align:left;">
                                    <p><span style="font-size:16px;"><span style="color:#7d8086;">Your request for the cancellation of {{ $booking->trip_name }} for date {{ $booking->start_date->format('Y-m-d') }} has been approved.<br> Please visit the link to view</span></span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:0 3rem 1rem;padding-top:10px;" align="left">
                                <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;" align="left" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="border:none;border-radius:none;color:#fff;cursor:auto;padding:10px 25px;" align="center" valign="middle" bgcolor="#2489E1"><a href="{{ route('website.login') }}" style="text-decoration:none;background:#2489E1;color:#fff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:18px;font-weight:normal;line-height:120%;text-transform:none;margin:0px;" target="_blank">View Your Profile.</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:0 3rem;" align="left">
                                <div style="cursor:auto;color:#000000;font-family: 'Plus Jakarta Sans', sans-serif;font-size:11px;line-height:22px;text-align:left;">
                                    <p><span style="font-size:16px;"><span style="color:#7d8086;">Trip Title: {{ $booking->trip_name }}.<br>Start Date: {{ $booking->start_date->format('Y-m-d') }}<br>Finish Date: {!! $booking->finish_date->format('Y-m-d') !!}.<br>Reason: {{ $booking->customer_remarks }}</span></span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;">
                                <div style="font-size:1px;line-height:30px;white-space:nowrap;">&#xA0;</div>
                            </td>
                        </tr>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:0 3rem;" align="left">
                                <div style="cursor:auto;color:#7D8086;font-family: 'Plus Jakarta Sans', sans-serif;font-size:11px;line-height:22px;text-align:left;">
                                    <p>Thanks,
                                        <br>{{ setting('site_name') }} Support</p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
    <table class="footer center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                @include('website::mails.partials.mail-footer',['email'=>$booking->customer->email])

            </td>
        </tr>
        </tbody>
    </table>
</center>

</body>
</html>

