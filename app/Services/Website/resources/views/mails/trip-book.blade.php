
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
<title>Booking Confirmation</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
</style>
</head>

<body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0" bgcolor="#e2e2e2" style="width: 100%;margin: 0;padding: 0;background: #F9FDFF;font-family: 'Plus Jakarta Sans', sans-serif;border: 1px solid #E9F0F4;box-shadow: 5px 5px 0px rgba(5, 19, 58, 0.05);border-radius: 4px;">
<div class="content" style="background-color: #fff;max-width: 600px;margin: 2rem auto;">
    <div class="wrapper" style="padding: 3rem;">
        <div class="header" style="justify-content: space-between;display: flex;">
            <img src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/5b51a5ac277b7/1532247007.jpg" style="height: 100%;" alt="">
            <ul style="list-style: none;display: flex">
                <li style="margin-left: 1rem;">
                    <a style="color: #0084D4;" href="#">
                        <img src="https://i.ibb.co/sbzjLyj/Icon.png" alt="" style="height: 15px;width: 15px;object-fit: scale-down;padding: 7px;border: 1px solid #bcbcbc;border-radius: 50px;">
                    </a>
                </li>
                <li style="margin-left: 1rem;">
                    <a style="color: #0084D4;" href="#">
                        <img src="https://i.ibb.co/RyJ8Tpw/Icon1.png" alt="" style="height: 15px;width: 15px;object-fit: scale-down;padding: 7px;border: 1px solid #bcbcbc;border-radius: 50px;">
                    </a>
                </li>
                <li style="margin-left: 1rem;">
                    <a style="color: #0084D4;" href="#">
                        <img src="https://i.ibb.co/JBwkwwq/Icon2.png" alt="" style="height: 15px;width: 15px;object-fit: scale-down;padding: 7px;border: 1px solid #bcbcbc;border-radius: 50px;">
                    </a>
                </li>
                <li style="margin-left: 1rem;">
                    <a style="color: #0084D4;" href="#">
                        <img src="https://i.ibb.co/KFPjC7y/Icon3.png" alt="" style="height: 15px;width: 15px;object-fit: scale-down;padding: 7px;border: 1px solid #bcbcbc;border-radius: 50px;">
                    </a>
                </li>
                <li style="margin-left: 1rem;">
                    <a style="color: #0084D4;" href="#">
                        <img src="https://i.ibb.co/QFcJHff/Icon4.png" alt="" style="height: 15px;width: 15px;object-fit: scale-down;padding: 7px;border: 1px solid #bcbcbc;border-radius: 50px;">
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Thank you for booking with us.</h2>
            <p>Hi {{ $booking->customer->full_name }}</p>
            <p>
                Thank you for booking with {{settings()->get('site_name') }} for your upcomming trip to {{ $booking->trip_name }}. Your booking reference is {{ $booking->id }}. A copy of your booking confirmation has been emailed to you with all terms and conditions. If you have not recieved your confirmation email please check your junk/spam folder.
            </p>
            <p>
                You can also login to our website {{ setting('website_address') }} and view your booking details and payment options. Just click on “My Booking" link on the menu.
            </p>
            <p>
                You will get an email from one of our assigned consultant within 24 hours. If you have requested to arrange your flight and insurance through us, please wait for your assigned consultant call. You are required to submit your Insurance documents within 2-4 business days from the day of booking to your assigned consultant. Failing to do so will result in cancellation of your booking. Please read our terms and conditions for more details.
            </p>
            <p><b>{{ $booking->trip_name }}</b></p>
            <p> {{ $booking->customer->name }}</p>
            <p> {{ $booking->passenger_count }} people</p>
            <p> {{ $booking->start_date->format('Y m D') }}</p>
            {{-- <p>Please note, you should hear back within 2 hours. If you still haven’t received a confirmation
                please contact our customer support team on “<b>{{ setting('contact_email') }}</b>”.</p>
            <p> --}}
                Thanks,<br>
                {{settings()->get('site_name') }}
            </p>
        </div>
    </div>
    <div class="footer" style="padding: 3rem; background: rgba(255, 248, 237, 0.8);">
        <p> This email was sent to <a style="color: #0084D4;" href="#">{{ $booking->customer->email }}</a></p>
        <p> If you'd rather not receive this kind of email</p>
        {{-- <p> Don’t want any more emails from {{settings()->get('site_name') }}? <a style="color: #0084D4;" href="#">Unsubscribe</a>.</p> --}}
        <p> {{ setting('contact') }}</p>
        <p>© 2022 {{settings()->get('site_name') }}</p>
    </div>
</div>
</body>

</html>