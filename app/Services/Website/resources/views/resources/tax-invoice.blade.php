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
                    <img src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5b51a5ac277b7/1532247007.jpg">
                </td>
                <td align="left" style="width: 40%;">

                    <ul>
                        <li>
                            {{ setting('extras.company_name') }}
                        </li>
                        <li>
                            {{-- ABN Number: - {{ setting('extras.abn_number') }} --}}
                        </li>
                        <li>
                            {!! setting('contact') !!}
                        </li>
                        <li>
                            {{ setting('contact_email') }}
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
                        {{ setting('website_address') }}
                    </p>

                </td>

            </tr>

        </table>
    </div>

    <div class="invoice-top">

        <table width="100%">

            <tr>
                <td align="center" style="width: 50%">

                    <h3>Receipt Details</h3>

                </td>

                <td align="center" style="width: 50%">

                    {{--                <h3>Invoice No: </h3> --}}
                    <h3>Invoice Date: {{ now()->format('d/m/Y') }}</h3>

                </td>

            </tr>


        </table>


    </div>


    <div class="invoice">


        <table width="95%">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>No of Travellers</th>
                    <th>Amount</th>
                    <th>T. Amount</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="services">
                        <h6>{{ $booking->trip_name }}</h6>
                        <h6>Service Includes</h6>
                        <ul>
                            <li>All Accommodations included on Itinerary</li>
                            <li>Meals( Kathmandu), Farewell Dinner</li>
                            <li>KTM-LUKLA-KTM Flight Farewell</li>
                            <li>All Ground Transportation</li>
                            <li>Guide and Porter Fee</li>
                        </ul>

                    </td>
                    <td align="center">{{ $booking->passengers->count() }} Pax</td>
                    <td align="center">$ {{ $booking->total_price }}</td>
                    <td align="center">$ {{ $booking->total_price }}</td>
                </tr>

                <tr>
                    <td>
                        Flight Fare SYD-KTM-SYD
                    </td>
                    <td align="center">{{ $booking->passengers->count() }} Pax</td>
                    <td align="center">Yet to be confirmed</td>
                    <td align="center">Yet to be confirmed</td>
                </tr>

                <tr>
                    <td>
                        Insurance- BUPA AUSTRALIA
                    </td>
                    <td align="center">{{ $booking->passengers->count() }} Pax</td>
                    <td align="center">Yet to be confirmed</td>
                    <td align="center">Yet to be confirmed</td>
                </tr>

                {{--        <tr> --}}
                {{--            <td class="added-services"> --}}
                {{--                <h6>Added Services</h6> --}}
                {{--                <ul> --}}
                {{--                    <li>Extra Accommodation Supplement (1* $145)</li> --}}
                {{--                    <li>2 Night Extension in Kathmandu ( B/B Plan) 1* $ 80</li> --}}
                {{--                    <li>Short Breaks- Rafting</li> --}}
                {{--                </ul> --}}
                {{--            </td> --}}
                {{--            <td align="center">1 Pax</td> --}}
                {{--            <td align="center">$ 145</td> --}}
                {{--            <td align="center">$ 145</td> --}}
                {{--        </tr> --}}

                <tr>
                    <td>
                        <strong>TOTAL AMOUNT DUE</strong>
                    </td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"><strong>$ {{ $booking->total_price }}</strong></td>
                </tr>


            </tbody>
        </table>
    </div>


</body>

</html>
