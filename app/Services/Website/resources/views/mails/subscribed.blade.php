<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title>Subscribed</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    .footer p{margin: 1rem 0;}

    /* body, .wrapper {
        background-color: #ffffff;
    } */

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

<body style="background: #d7d7d7; padding: 5px 0;">
<center class="wrapper">
    <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        @include('website::mails.partials.mail-header')

                        <td class="padded">
                            <p style="padding:0 3rem; margin-top:30px;">Dear Subscriber,</p>
                            <p style="padding:0 3rem;"><strong>Thank you for subscribing to our newsletter.</strong></p>
                            <p style="padding:0 3rem;">We will be updating latest stories with you via your email.</p>
                            <p style="padding:0 3rem;">For any enquiry please feel free to contact us. </p>
                            <p style="padding:0 3rem;">In the meantime, if you’re looking for Travel Inspiration, you’ll find Extraordinary Journeys and Trips to help you to explore all Corners of Nepal on Our Website. Simply visit <a href="{{ setting('website_address') }}">{{ setting('website_address') }}</a>  </p>
                            <p style="padding:0 3rem;">Kind Regards,</p>
                          
                            <p style="padding:0 3rem;">Travel Consultant-{{ setting('site_title') }}</p>

                        </td>
                    </tr>
                    </tbody>
                </table>
                @include('website::mails.partials.mail-footer',['email'=>false])

            </td>
        </tr>
        </tbody>
    </table><!--main-->
   

  
</center>



</body>

</html>