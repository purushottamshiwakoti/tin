<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title></title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<style type="text/css">

    *{margin: 0 auto;}

    body {
        margin: 0;
        padding: 0;
        min-width: 100%;
    }

    .wrapper {
        display: table;
        table-layout: fixed;
        width: 100%;
        min-width: 620px;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    body, .wrapper {
        background-color: #ffffff;
    }

    /* Basic */
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    table.center {
        margin: 0 auto;
        width: 602px;
    }
    td {
        padding: 0;
        vertical-align: top;
    }
    .columns {
        margin: 0 auto;
        width: 600px;
        background-color: #ffffff;
        font-size: 14px;
    }

    .column {
        text-align: left;
        background-color: #ffffff;
        font-size: 14px;
    }

    .column-top {
        font-size: 24px;
        line-height: 24px;
    }

    .content {
        width: 100%;
    }

    .column-bottom {
        font-size: 8px;
        line-height: 8px;
    }

    .content p {
        margin-top: 0;
        margin-bottom: 20px;
        color: #333333;
        font-family: Roboto, sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
    }
    .content h2 {
        margin-top: 30px;
        margin-bottom: 15px;
        color: #333333;
        font-family: Roboto, sans-serif;
        font-weight: 600;
        font-size: 20px;
        line-height: 25px;
    }
    .mid .content p,.footer .content p{margin-bottom: 5px;}
    .content .caption {
        color: #616161;
        font-size: 12px;
        line-height: 20px;
    }
    table.footer{margin-bottom: 30px;}
    @media only screen and (min-width: 0) {
        .wrapper {
            text-rendering: optimizeLegibility;
        }
    }
    @media only screen and (max-width: 620px) {
        [class="wrapper"] {
            min-width: 302px !important;
            width: 100% !important;
        }
        [class="wrapper"] .block {
            display: block !important;
        }
        [class="wrapper"] .hide {
            display: none !important;
        }

        [class="wrapper"] .top-panel,
        [class="wrapper"] .header,
        [class="wrapper"] .main,
        [class="wrapper"] .mid,
        [class="wrapper"] .footer {
            width: 302px !important;
        }

        [class="wrapper"] .title,
        [class="wrapper"] .subject,
        [class="wrapper"] .signature,
        [class="wrapper"] .subscription {
            display: block;
            float: left;
            width: 300px !important;
            text-align: center !important;
        }
        [class="wrapper"] .signature {
            padding-bottom: 0 !important;
        }
        [class="wrapper"] .subscription {
            padding-top: 0 !important;
        }
    }

</style>

<body>
<center class="wrapper">
    <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <div class="column-top">&nbsp;</div>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded">
                            <p>Dear {{ $inquiry->first_name }},</p>
                            <p><strong>Thank you for your Enquiry with Travel Adventure Nepal.</strong></p>
                            <p>We’ve received your Request for "Everest Base Camp In May" package to Nepal and we’ll be in touch shortly.</p>
                            <p>One of our representatives will be in touch within 1 Business Day; we look forward to assist you with your Requirements to make a Perfect Holiday Trip.</p>
                            <p>In the meantime, if you’re looking for Travel Inspiration, you’ll find Extraordinary Journeys and Trips to help you to explore all Corners of Nepal on Our Website. Simply visit <a href="https://traveladventurenepal.com.au">traveladventurenepal.com.au</a> or Visit us on Social Channels</p>
                            <p>Kind Regards,</p>
                            <p>Anish Sapkota/ Nadin Shrestha</p>
                            <p>Travel Consultant-Travel Adventure Nepal</p>
{{--                            <a href="https://traveladventurenepal.com.au">--}}
{{--                                <img src="{{ public_asset('website/img/logo.png') }}">--}}
{{--                            </a>--}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--main-->
    @include('website::mails.partials.mail-signature')
    <table class="footer center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <div class="column-top">&nbsp;</div>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded">
                            <h2>Submitted on {{ $inquiry->created_at->format('D, M d, Y -  H:i') }} Submitted by {{ $inquiry->name }} @if($inquiry->ip) using <a href="https://www.ip2location.com/demo/{{ $inquiry->ip}}">{{ $inquiry->ip}}</a> @endif Submitted values are:</h2>
                            <p><strong>Title:</strong> {{ $inquiry->title }}</p>
                            <p><strong>First Name:</strong> {{ $inquiry->first_name }}</p>
                            <p><strong>Middle Name:</strong> {{ $inquiry->middle_name? :'-' }}</p>
                            <p><strong>Last Name:</strong> {{ $inquiry->last_name }}</p>
                            <p><strong>E-mail:</strong> {{ $inquiry->email }}</p>
                            <p><strong>Phone Number:</strong> {{ $inquiry->phone_number }}</p>
                            <p><strong>Number of Approximate Travellers:</strong> {{ $inquiry->number_of_person }}</p>
                            <p><strong>Nationality:</strong> {{ $inquiry->nationality }}</p>
                            <p><strong>Address:</strong> {{ $inquiry->address }}</p>
                            <p><strong>Destination:</strong> Nepal</p>
                            <p><strong>Coupon Code:</strong> {{ $inquiry->coupon_code? :'-' }}</p>
                            <p><strong>Other Requests:</strong> {{ $inquiry->message }}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--mid-->
</center>



</body>

</html>