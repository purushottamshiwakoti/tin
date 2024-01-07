@extends('website::mails.layout')

@section('content')
    <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <!-- <div class="column-top">&nbsp;</div> -->
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody align="center">
                    <tr style="display: inline-grid;">
                        <td class="padded" align="center" width="100%">
                            <a href="https://www.tan.com/tan/public"><img src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5b51a5ac277b7/1532247218.jpg"></a></td>
                        <td class="padded" align="center" width="100%"><h1>Booking Request Acknowledged<h1></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--main-->
    <table class="main center customer" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr class="customer">
            <td class="column">
                <!-- <div class="column-top">&nbsp;</div> -->
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td>
                            <strong style="font-size: 18px;">Dear Customer,</strong>
                            <br><br>
                            <p>Thank you for Choosing Travel Adventure Nepal for your Upcoming Trip . We will review your Booking request and will get back to you within 24 Hrs. Please take time to read all the details below carefully and proceed as Instructed.</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--customer-->
    <table class="mid center tripdetail" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <!-- <div class="column-top">&nbsp;</div> -->
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded" align="center"><h3 style="margin: 30px 0;">Lead Traveller Information Details</h3></td>
                    </tr>
                    </tbody>
                </table>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Trip Name:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->trip_name }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Trip Code:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->trip_code }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Booking Date:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->created_at->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Reservation Number:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->id }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Lead Traveller Name:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->leadTraveller()->name }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Email Address:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->leadTraveller()->email }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Contact:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->leadTraveller()->mobile_number }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Trip Start Date:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->start_date->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Trip End Date:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->finish_date->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Number of Travellers:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->passengers->count() }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Trip Price:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">$ {{ $booking->total_price }} AUD</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--mid-->
    <table class="mid center tripdetail" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <!-- <div class="column-top">&nbsp;</div> -->
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded" align="center"><h3 style="margin: 30px 0;">Additional Service Request</h3></td>
                    </tr>
                    </tbody>
                </table>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Airport Pickup:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">Complimentary Service Provided.</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Extra Night Before:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ addon_value($booking->addOns,'extra_night_before') }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Extra Night After:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ addon_value($booking->addOns,'extra_night_after') }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Room Type:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ addon_value($booking->addOns,'accommodation') }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Insurance:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ addon_value($booking->addOns,'insurance') }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Flight Tickets:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ addon_value($booking->addOns,'flight') }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Special Request:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;"><p>{{ $booking->special_request }}</p></td>
                    </tr>
                    </tbody>
                </table>
                {{-- <table class="content" border="0" cellspacing="0" cellpadding="0" style="padding:30px 0;">
                    <tbody>
                    <tr>
                        <td>
                            <p style="margin: 30px 0;">This Departure requires full payment to request your place on the Trip. Our Reservation team needs to Confirm Availability of the seat with our Local Operators and Ground Handling Team and will be in Touch with you within 24 hours. Please wait for the Confirmation before making any further transactions such as your Air Tickets or any other Non-Refundable Travel arrangements.</p>
                        </td>
                    </tr>
                    </tbody>
                </table> --}}
            </td>
        </tr>
        </tbody>
    </table><!--mid-->
@stop