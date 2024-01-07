<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
    <title>Reset Password</title>
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
                            <img src="https://ci5.googleusercontent.com/proxy/MtQQsYqv-SriKUNdbt2NYvlzBKUyKJQY8hrWkyp2VJ50QC89Z2qTz8gTslQJXQu00QX9hUtOkcD8BRvsi4fDwPTiIQiyTMs2G5T5J4jTIDJMizeC7GG8DMdUTsqIO9GhwNDUgtrZ6qotLmOt=s0-d-e1-ft#https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/rounded/facebook.png" alt="" style="height: 15px;width: 15px;object-fit: scale-down;padding: 7px;border: 1px solid #bcbcbc;border-radius: 50px;">
                        </a>
                    </li>
                    <li style="margin-left: 1rem;">
                        <a style="color: #0084D4;" href="#">
                            <img src="https://ci5.googleusercontent.com/proxy/azOt2kJ5RwlW8y_Nzfv8r03xdXwwdPMaf88oXaQFwFIosqOayD5vWHQ5FDekCLq9GPLK9Y8gJMr6H9weAQH6wPcI_VJ1F-dSDsh8P0XCcU_UlBXpY6GecvZ-2tGlm3NQDH37q9-RDH-E8RU=s0-d-e1-ft#https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/rounded/twitter.png" alt="" style="height: 15px;width: 15px;object-fit: scale-down;padding: 7px;border: 1px solid #bcbcbc;border-radius: 50px;">
                        </a>
                    </li>
                    <li style="margin-left: 1rem;">
                        <a style="color: #0084D4;" href="#">
                            <img src="https://ci4.googleusercontent.com/proxy/rOFkNRR5y-ctmgA165uZ7e72jl3wd2v4KbuA1XwvLSVp2lbjpwNgZshLyTn5ToeOT7iA_bcGFLdDXu45ZWwsgSStqf1PZMGhiT3kvQHTyDd85w8PcHzSyXsME3-Jr_dCQVSbD_cU_B_vWWnPvw=s0-d-e1-ft#https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/rounded/instagram.png" alt="" style="height: 15px;width: 15px;object-fit: scale-down;padding: 7px;border: 1px solid #bcbcbc;border-radius: 50px;">
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
                <h2>Reset your password.</h2>
                <p>Hello</p>
                <p>You are receiving this email because we received a password reset request for your account.</p>
                <p>If you did not request a password reset, no further action is required.</p>
                <p>
                    Thank you for using our application!<br>
                    Travel Adventure Nepal
                </p>
            </div>
            <a href="{{ $actionUrl }}" class="confirm-btn" style="padding: 1.25rem 3rem;
            background-color: #0084D4;
            border-radius: 40px;
            margin-top: 2rem;
            display: inline-block;
            color: #fff;
            text-decoration: none;
            font-weight: 600;">Reset Password</a>
        </div>
        <div class="footer" style="padding: 3rem; background: rgba(255, 248, 237, 0.8);">
            <p> 
                If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: <a style="color: #0084D4;" href="{{ $actionUrl }}">{{ $actionUrl }}</a></p>
        </div>
    </div>
</body>

</html>