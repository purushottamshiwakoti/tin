<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title>Custom Trip Request</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<style type="text/css">

    *{margin: 0 auto;}

    .footer p{
        padding-left:0 !important;
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
        font-size: 16px;
    }

    .column {
        text-align: left;
        background-color: #ffffff;
        font-size: 16px;
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
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
    }
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
<center class="wrapper" style="background: #d7d7d7; margin: 0; padding: 20px 0 !important;">
    <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0" style="background: #fff;">
        <tbody>
        <tr>
            <td class="column">
                @include('website::mails.partials.mail-header')
                <div class="column-top">&nbsp;</div>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded" style="padding: 0 3rem;">
                            <p>Dear {{ $tripRequest->full_name }},</p>
                            <p><strong>Thank you for your Enquiry with {{ setting('site_title') }}.</strong></p>
                            <p>We’ve received your Request for your Upcoming Trip to Nepal and we’ll be in touch shortly.</p>
                            <p>One of our Tailor Made/ Private Departure Consultants will be in touch within 1 Business Day; we look forward to assist you with your Requirements to make a Perfect Holiday Trip.</p>
                            <p>In the meantime, if you’re looking for Travel Inspiration, you’ll find Extraordinary Journeys and Trips to help you to explore all Corners of Nepal on Our Website. Simply visit <a href="{{ setting('website_address') }}">{{ setting('website_address') }}</a> or Visit us on Social Channels</p>
                            <p>Kind Regards,</p>
                            <p>Support Team</p>
                        
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--main-->
  
    <table class="footer-bottom center" width="602" border="0" cellspacing="0" cellpadding="0" style="
    background: white;
">
        <tbody>
        <tr>
            <td class="column">
                <div class="column-top">&nbsp;</div>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded padded-content">
                            <h2 style="padding: 0 3rem;">Submitted on {{ $tripRequest->created_at->format('D, M d, Y -  H:i') }} Submitted by {{ $tripRequest->name }} @if($tripRequest->ip) using <a href="https://www.ip2location.com/demo/{{ $tripRequest->ip}}">{{ $tripRequest->ip}}</a> @endif Submitted values are:</h2>
                            <p style="padding: 0 3rem;"><strong>Name:</strong> {{ $tripRequest->first_name.' '.$tripRequest->last_name }}</p>
                            <p style="padding: 0 3rem;"><strong>E-mail:</strong> {{ $tripRequest->email }}</p>
                            <p style="padding: 0 3rem;"><strong>Phone Number:</strong> {{ $tripRequest->phone_number }}</p>
                            <p style="padding: 0 3rem;"><strong>Children:</strong> {{ $tripRequest->children_present }}</p>
                            {{-- <p><strong>Adult:</strong> {{ $tripRequest->adult_present }}</p>
                            <p><strong>Infant:</strong> {{ $tripRequest->infant_present  }}</p> --}}
                            <p style="padding: 0 3rem;"><strong>Destination:</strong> {{ $tripRequest->destination }}</p>
                            <p style="padding: 0 3rem;"><strong>Trip Start Date:</strong> {{ $tripRequest->start_date }}</p>
                            {{-- @if($tripRequest->request_type == 'tailor_made')
                            <p><strong>Desired Cost Per Person:</strong> ={{ $tripRequest->desired_cost_per_person }}$ (AUD)</p>
                            <p><strong>Do you require international flights? If so, where from:</strong> {{ $tripRequest->flight_country_from?:' -' }}</p>
                            <p><strong>Desired accommodation style:</strong> {{ $tripRequest->accommodation_styles?:' -' }}</p>
                            <p><strong>Preferred accommodation standard:</strong> {{ $tripRequest->accommodation_standards?:' -' }}</p>
                            <p><strong>Meal Basis:</strong> {{ $tripRequest->meal_preference?:' -' }}</p>
                            <p><strong>Activities:</strong> {{ $tripRequest->activities }}</p>
                            @endif --}}
                            <p style="margin-bottom:20px; padding: 0 3rem;"><strong>Other Requests:</strong> {{ $tripRequest->description }}</p>
                            @include('website::mails.partials.mail-footer',['email'=>$tripRequest->email])
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</center>



</body>

</html>