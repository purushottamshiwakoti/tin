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
                            <a href="https://www.tan.com/tan/public">
                                <img src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5b51a5ac277b7/1532247218.jpg"></a></td>
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
                            <strong style="font-size: 18px;">Dear Sir/Madam,</strong>
                            <br><br>
                            <p>Thank you for Choosing Travel Adventure Nepal for your Upcoming Trip. We will review your Booking request and will get back to you within 24 Hrs. Please take time to read all the details below carefully and proceed as Instructed.</p>
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
                        <td class="padded" align="center"><h3 style="margin: 30px 0;">Flight Details</h3></td>
                    </tr>
                    </tbody>
                </table>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Destination:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->place }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Check In Date:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->check_in_date }}</td>
                    </tr>
                    @if(!empty($booking->check_out_date))
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Check Out Date:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->check_out_date }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Number of Pax:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->number_of_pax }}</td>
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
                        <td class="padded" align="center"><h3 style="margin: 30px 0;">Passenger Detail</h3></td>
                    </tr>
                    </tbody>
                </table>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Name:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->first_name.' '.$booking->last_name }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Email</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->email }}</td>
                    </tr>
                  
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Extra Message</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->message }}</td>
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