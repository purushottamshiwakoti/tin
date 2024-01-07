<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <title>Page title</title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:400,500,700" rel="stylesheet"
          type="text/css">

    <style>

        *{margin: 0 auto;}

        body {margin: 0; padding: 0; min-width: 100%; font-family: Roboto, sans-serif; }
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
        table.center {margin: 0 auto; width: 602px; }
        td {padding: 0; vertical-align: top; }
        table tr td h1{font-size: 24px;font-weight: 400;font-family: 'Montserrat' , sans-serif;
            color: #4D5764; line-height: 24px; margin: 25px 0 0 0;}
        .columns {margin: 0 auto; width: 600px; background-color: #ffffff; font-size: 14px; }
        .column {text-align: left; background-color: #ffffff; font-size: 14px; }
        .column-top {font-size: 24px; line-height: 24px; }
        .content {width: 100%; } .column-bottom {font-size: 8px; line-height: 8px; }
        p{
            color: #7C7C7C;
            font-family: Roboto, sans-serif;
            font-weight: 400;
            font-size: 14px;
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
            font-family: Roboto, sans-serif;
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

<body>

<center class="wrapper">
    <table class="main center top" width="602" border="0" cellspacing="0" cellpadding="0" style="padding:30px 0px;">
        <tbody>
        <tr>
            <td class="column">
                <!-- <div class="column-top">&nbsp;</div> -->
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded" align="left" width="50%"><img src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5b51a5ac277b7/1532247007.jpg"></td>
                        <td class="padded" width="50%" align="right" style="vertical-align: middle;">
                            <p style="margin-bottom: 0">{{ now()->format('M d Y') }}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--top-->
    @yield('content')
    {{-- @section('mail-signature') --}}
    <table class="footer center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <!-- <div class="column-top">&nbsp;</div> -->
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td>
                            <a href="{{ setting('facebook_link') }}" target="_blank" data-saferedirecturl="{{ setting('facebook_link') }}">
                                <img alt="facebook" height="35" src="https://ci5.googleusercontent.com/proxy/MtQQsYqv-SriKUNdbt2NYvlzBKUyKJQY8hrWkyp2VJ50QC89Z2qTz8gTslQJXQu00QX9hUtOkcD8BRvsi4fDwPTiIQiyTMs2G5T5J4jTIDJMizeC7GG8DMdUTsqIO9GhwNDUgtrZ6qotLmOt=s0-d-e1-ft#https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/rounded/facebook.png" class="CToWUd">
                            </a>
                            <a href="{{ setting('instagram_link') }}" target="_blank" data-saferedirecturl="{{ setting('instagram_link') }}">
                                <img alt="twitter" height="35" src="https://ci5.googleusercontent.com/proxy/azOt2kJ5RwlW8y_Nzfv8r03xdXwwdPMaf88oXaQFwFIosqOayD5vWHQ5FDekCLq9GPLK9Y8gJMr6H9weAQH6wPcI_VJ1F-dSDsh8P0XCcU_UlBXpY6GecvZ-2tGlm3NQDH37q9-RDH-E8RU=s0-d-e1-ft#https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/rounded/twitter.png" class="CToWUd">
                            </a>
                            <a href="{{ setting('instagram_link') }}" target="_blank" data-saferedirecturl="{{ setting('instagram_link') }}">
                                <img alt="instagram" height="35" src="https://ci4.googleusercontent.com/proxy/rOFkNRR5y-ctmgA165uZ7e72jl3wd2v4KbuA1XwvLSVp2lbjpwNgZshLyTn5ToeOT7iA_bcGFLdDXu45ZWwsgSStqf1PZMGhiT3kvQHTyDd85w8PcHzSyXsME3-Jr_dCQVSbD_cU_B_vWWnPvw=s0-d-e1-ft#https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/rounded/instagram.png" class="CToWUd">
                            </a>
                        </td>
                        <td>
                            <p>{{ setting('address') }}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--mid-->
        {{-- @stop --}}
</center>

</body>
</html>
