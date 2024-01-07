<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice </title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        ul li {
            list-style-type: none;
        }


        body {
            margin: 0px;
            width: 100%;
            background: #ffffff;
        }

        * {
            font-family: Roboto, sans-serif;
        }

        a {

            text-decoration: none;
        }

        table {
            font-size: 15px;
        }

        .top-section table ul li {
            font-size: 15px;
            font-weight: 400;
            color: #4d5764;
        }

        .top-section table td {
            padding: 0 30px;
        }

        .top-section table ul {
            padding: 0;
        }


        .invoice table td,
        .invoice table th {
            border: 1px solid #000;
        }

        .invoice table,
        .details table,
        .additional table {
            border-collapse: collapse;
        }

        .invoice table th {
            font-size: 15px;
            padding: 10px;
            text-transform: uppercase;
        }

        .invoice table ul li {
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            padding-left: 20px;
            position: relative;
        }

        .invoice table .services ul li:before {
            content: '';
            display: block;
            position: absolute;
            top: 2px;
            left: 2px;
            width: 5px;
            height: 10px;
            border: solid #000;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .invoice table .added-services ul li:before {
            content: "";
            position: absolute;
            left: 0;
            top: 6px;
            height: 5px;
            width: 5px;
            border: 1px solid #000;
            border-width: 2px 2px 0 0;
            transform: rotate(45deg);
        }

        .invoice table,
        .details table,
        .additional table {
            margin: 0 auto;
        }

        .information table h1 {
            font-size: 18px;
            color: #4d5764;
            font-family: 'Montserrat', sans-serif;
        }

        .information table td {
            padding: 0 30px;
        }

        .invoice table h6,
        .details table h6 {
            font-size: 18px;
            margin: 20px 0;
        }

        .invoice table tr td:first-child {
            padding: 18px 30px;
        }

        .details table td {
            border: 1px solid #000;
        }

        .details-top table td p {
            font-size: 15px;
            font-style: italic;
            color: #333;
            margin: 0 0 10px;
        }

        .details-top table td h3 {
            margin: 60px 0 5px;
        }

        .details-top table td {
            padding: 0 30px;
        }

        .details table p {
            font-size: 15px;
            margin: 10px 0;
        }

        .details table .first-detail span {
            background: #ffff00;
            padding: 12px;
        }

        .details table td {
            padding: 15px 20px;
        }

        .additional-top table p {
            font-weight: 700;
            font-size: 15px;
            margin: 0 0 10px;
        }

        .additional-top table td {
            padding: 0 30px;
        }

        .additional-top table h3 {
            margin: 60px 0 5px;
        }

        .additional table th,
        .additional table td {
            border: 1px solid #000;
        }

        .additional table td {
            padding: 10px 20px;
        }
    </style>

</head>

<body>

    <div class="top-section">

        <table width="100%">

            <tr>

                <td align="left" style="width:60%;">
                    <img src="https://www.traveladventurenepal.com.au/public/website/img/logo.png">
                </td>
                <td align="left" style="width: 40%;">

                    <ul>
                        <li>
                            {{ setting('extras.company_name') }}
                        </li>
                        <li>
                            ABN Number: - {{ setting('extras.abn_number') }}
                        </li>
                        <li>
                            {!! setting('extras.company_address') !!}
                        </li>
                        <li>
                            {{ setting('extras.sales_email') }}
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>

    <div class="information">

        <table width="100%">

            <tr>

                <td align="left" style="width: 100%">

                    <h1>Dear {{ $booking->customer->name }},</h1>

                </td>

            </tr>

            <tr>

                <td align="left" style="width:100%;">

                    <p>We are pleased to confirm your booking request for your upcoming trip to
                        {{ $booking->trip_name }} {{ $booking->start_date->format('d M Y') }}. Your Booking reference is
                        <strong>{{ $booking->id }}.</strong> View your booking details on
                        https://www.traveladventurenepal.com.au/
                    </p>

                </td>

            </tr>

        </table>
    </div>

    <div class="details-top">
        <table width="100%">

            <tr>
                <td align="left" style="width: 100%">

                    <h3>TRAVELLER DETAILS</h3>
                    <p></p>

                </td>

            </tr>

            <tr>
                <td align="center" style="width: 100%" class="details-note">

                    <p>LEAD TRAVELLER INFORMATION DETAILS</p>

                </td>

            </tr>


        </table>
    </div>

    <div class="details">


        <table width="95%">
            <tbody>
                <tr class="first-detail">
                    <td style="width:50%">
                        <strong>Trip Name:<strong>
                                <p><span>{{ $booking->trip_name }}</span></p>

                    </td>
                    <td style="width:50%">
                        <strong>Trip Code:</strong>
                        <p><span>{{ $booking->trip_code }}</span></p>

                    </td>
                </tr>

                <tr>
                    <td style="border-right:0">
                        <strong>Booking Date:-</strong> {{ $booking->created_at->format('d/m/Y') }}
                    </td>
                    <td style="border-left:0">
                        <strong>Reservation Number:-</strong>{{ $booking->id }}
                    </td>

                </tr>

                <tr>
                    <td style="border-right:0">
                        <strong>LEAD TRAVELLER NAME:-</strong>
                    </td>
                    <td style="border-left:0">{{ $booking->customer->name }}</td>
                </tr>

                <tr>
                    <td style="border-right:0">
                        <strong>Address:-</strong>
                    </td>
                    <td style="border-left:0">{{ $booking->customer->address }}</td>
                </tr>

                <tr>
                    <td style="border-right:0">
                        <strong>Email Address:-</strong>{{ $booking->customer->email }}
                    </td>
                    <td style="border-left:0">
                        <strong>Contact:- </strong>{{ $booking->customer->mobile_number }}
                    </td>
                </tr>

                <tr>
                    <td>
                        <strong>Trip Start Date:- </strong>{{ $booking->start_date->format('d/m/Y') }}
                    </td>
                    <td>
                        <strong>Trip End Date:- </strong>{{ $booking->finish_date->format('d/m/Y') }}
                    </td>
                </tr>

                <tr>
                    <td style="border-right:0">
                        <strong>Number of Travellers:-</strong>
                    </td>
                    <td style="border-left:0">{{ $booking->passengers->count() }}</td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="additional-top">

        <table width="100%">

            <tr>
                <td align="left" style="width: 100%">

                    <h3>ADDITIONAL TRAVELLER DETAILS</h3>
                    <p></p>

                </td>

            </tr>

            <tr>
                <td align="left" style="width: 100%">

                    <p>Please ensure first and last name of each passenger are matched to the passports. Fail to provide
                        correct details prior to departure might lead to cancel the trip without notice.</p>

                </td>

            </tr>


        </table>
    </div>

    <div class="additional">


        <table width="95%">
            <tbody>
                <tr>
                    <td>
                        <strong>Title</strong>
                    </td>
                    <td>
                        <strong>First Name</strong>
                    </td>
                    <td>
                        <strong>Last Name</strong>
                    </td>
                    <td>
                        <strong>Email Address</strong>
                    </td>
                </tr>

                @foreach ($booking->passengers as $passenger)
                    <tr>
                        <td>{{ $passenger->title }}</td>
                        <td>{{ $passenger->first_name }}</td>
                        <td>{{ $passenger->last_name }}</td>
                        <td>{{ $passenger->email }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


</body>

</html>
