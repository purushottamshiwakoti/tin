<div class="footer" style="text-align: left; padding: 3rem; background: rgba(255, 248, 237, 0.8);">
    @if($email != false)
    <p> This email was sent to <a style="color: #0084D4;" href="#">{{ $email }}</a></p>
    <p> If you'd rather not receive this kind of email</p>
    <p> Don’t want any more emails from {{ setting('site_name') }}? <a style="color: #0084D4;" href="#">Unsubscribe</a>.
    </p>
    @endif
    <p> {{ setting('contact') }}</p>
    <p>© 2022 {{ setting('site_name') }}</p>
</div>
