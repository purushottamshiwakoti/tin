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
                        <td class="padded" align="center" width="100%"><h1>Flight Booking Request <h1></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table><!--main-->


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
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Destination ({{ ucwords(str_replace('_',' ',$booking->flight_type)) }}):</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->departure }} - {{ $booking->arrival }}</td>
                    </tr>
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Departure Date:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->departure_date }}</td>
                    </tr>
                    @if(!empty($booking->return_date))
                    <tr>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 40%;"><strong>Return Date:</strong></td>
                        <td class="padded" style="padding:12px 0;border-bottom: 1px solid #D6E6F0;width: 60%;">{{ $booking->return_date }}</td>
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
              
            </td>
        </tr>
        </tbody>
    </table><!--mid-->
   

   @stop