@extends('website::mails.layout')
@section('content')
    <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
<div style="margin:0px auto;max-width:600px;background:#EFF9FF;">
    <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;background:#EFF9FF;" align="center" border="0">
        <tbody>
        <tr>
            <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                <!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
                <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="background: #EFF9FF;">
                        <tbody>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:0px 22px 0px 22px;" align="left">
                                <div style="cursor:auto;color:#000000;font-family:Roboto, Tahoma, sans-serif;font-size:11px;line-height:22px;text-align:left;">
                                    <h1 style="font-family: &apos;Cabin&apos;, sans-serif; line-height: 100%;"><span style="color:#4d5764;"><span style="font-size:26px;">Hi there,</span></span></h1></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:0px 22px 0px 22px;" align="left">
                                <div style="cursor:auto;color:#000000;font-family:Roboto, Tahoma, sans-serif;font-size:11px;line-height:22px;text-align:left;">
                                    <p><span style="font-size:14px;"><span style="color:#7d8086;">{{ $booking->customer->name }} recently requested a cancellation of the trip {{ $booking->trip_name }} with id {{ $booking->id }}.&#xA0;<br></span></span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:10px 0px 10px 0px;padding-top:10px;padding-left:25px;" align="left">
                                <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;" align="left" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="border:none;border-radius:none;color:#fff;cursor:auto;padding:10px 25px;" align="center" valign="middle" bgcolor="#2489E1"><a href="{{ route('admin.bookings.show', ['booking'=>$booking->id]) }}" style="text-decoration:none;background:#2489E1;color:#fff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:18px;font-weight:normal;line-height:120%;text-transform:none;margin:0px;" target="_blank">Manage in dashboard.</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="word-wrap:break-word;font-size:0px;padding:0px 22px 0px 22px;" align="left">
                                <div style="cursor:auto;color:#000000;font-family:Roboto, Tahoma, sans-serif;font-size:11px;line-height:22px;text-align:left;">
                                    <p><span style="font-size:14px;"><span style="color:#7d8086;">Departure Date: {{ $booking->start_date->format('Y-m-d') }}.<br>Reason: {{ $booking->customer_remarks }}.</span></span>
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
                            <td style="word-wrap:break-word;font-size:0px;padding:0px 22px 0px 22px;" align="left">
                                <div style="cursor:auto;color:#7D8086;font-family:Roboto, Tahoma, sans-serif;font-size:11px;line-height:22px;text-align:left;">
                                    <p>Thanks,
                                        <br>Travel Adventure Nepal Support</p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
            </td>
        </tr>
        </tbody>
    </table>
</div>
<!--[if mso | IE]>      </td></tr></table>      <![endif]-->
<div style="margin-top: 30px"></div>
@stop