<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html;" charset=UTF-8" />
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        .header{
            padding: 0 !important;
        }
    </style>
</head>

<body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0" bgcolor="#e2e2e2" style="width: 100%;margin: 0;padding: 5px 0 !important;background: #d7d7d7;font-family: 'Plus Jakarta Sans', sans-serif;border: 1px solid #E9F0F4;box-shadow: 5px 5px 0px rgba(5, 19, 58, 0.05);border-radius: 4px;">
    <div class="content" style="background-color: #fff;max-width: 600px;margin: 2rem auto;">
        <div class="wrapper" style="padding: 3rem;">
            @include('website::mails.partials.mail-header')

            <div class="main-content">
                <h2>Reset your password.</h2>
                <p>Hi</p>
                <p>We’re glad to have you onboard! You’re already on your way to creating beautiful visual products.</p>
                <p>Whether you’re here for your brand, for a cause, or just for fun — welcome! If there’s anything you
                    need,
                    we’ll be here every step of the way.</p>
                <p>
                    Thanks,<br>
                    {{ setting('site_title') }}
                </p>
            </div>
            <a href="{{ $actionUrl }}" class="confirm-btn" style="padding: 1.25rem 3rem;
            background-color: #0084D4;
            border-radius: 40px;
            margin-top: 2rem;
            display: inline-block;
            color: #fff;
            text-decoration: none;
            font-weight: 600;">Confirm Email Address</a>
        </div>
        @include('website::mails.partials.mail-footer',['email'=>false])

    </div>
</body>

</html>