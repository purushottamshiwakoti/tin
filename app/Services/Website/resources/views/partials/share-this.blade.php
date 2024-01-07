@section('css')
    <style>
        .share-action{width:32px;height:32px}.share-wrapper{font-size:14px;font-family:FontAwesome;position:relative;text-align:center}.share-container{margin-left:0;margin-top:0;overflow:hidden;transition:all .3s cubic-bezier(.05,.93,.61,1.6);box-shadow:0 0 20px -5px rgba(0,0,0,.5);width:0;height:0;background:#fff}.share-action:hover~.share-container,.share-container:hover{width:100px;height:100px;overflow:visible}.share-container:after,.share-container:before{position:absolute;background:linear-gradient(rgba(136,221,255,.5) 0,rgba(34,153,221,.5) 50%,rgba(136,221,255,.5) 100%);z-index:4;margin:0;transition:all .5s ease-in-out;content:''}.share-container:before{background:linear-gradient(left,rgba(136,221,255,.5) 0,rgba(34,153,221,.5) 50%,rgba(136,221,255,.5) 100%);height:1px;margin:50% 50%;width:0%}.share-action:hover~.share-container:before,.share-container:hover:before{width:85%;left:0;margin:50% 7%}.share-container:after{left:-1px;height:0%;width:1px;margin:50% 50%}.share-action:hover~.share-container:after,.share-container:hover:after{height:85%;margin:7% 50%}.share-action{display:inline-block;vertical-align:middle;z-index:1;position:relative;background-color:#0fb9b1;line-height:30px;color:#fff}.share-btn.facebook,.share-btn.google-plus,.share-btn.pinterest,.share-btn.twitter{display:inline-block;width:49%;height:49%;position:absolute;z-index:1;border-color:#92888f;border-style:solid;border-width:0;font-size:0;color:#777;overflow:hidden;background:#fff}.share-action:hover~.share-container .share-btn,.share-container:hover .share-btn{overflow:visible;font-size:25px}.share-btn:hover{background:#0fb9b1;color:#fff;text-shadow:0 -1px #4298e0}.share-btn.tl{right:50%;bottom:50%}.share-btn.tr{left:50%;bottom:50%}.share-btn.br{left:50%;top:50%}.share-btn.bl{right:50%;top:50%}.share-btn{line-height:50px}.rc50{border-radius:50%}.rc50 .share-btn.tl{border-top-left-radius:100%}.rc50 .share-btn.tr{border-top-right-radius:100%}.rc50 .share-btn.br{border-bottom-right-radius:100%}.rc50 .share-btn.bl{border-bottom-left-radius:100%}.rc50.share-container .share-btn.tl{text-indent:5px;line-height:55px}.rc50.share-container .share-btn.tr{line-height:50px}.rc50.share-container .share-btn.br{line-height:46px;text-indent:-2px}.rc50.share-container .share-btn.bl{text-indent:2px;line-height:47px}.below .share-btn.tl{line-height:50px}.below .share-btn.tr{line-height:45px;text-indent:3px}.below .share-btn.br{line-height:50px}.below .share-btn.bl{text-indent:-2px;line-height:55px}.below .share-container{position:absolute;top:50%;left:50%;z-index:2;cursor:pointer},.below .share-container{top:0;left:50%}.below .share-action:hover~.share-container,.below .share-container:hover{top:-66%;left:-73%}@font-face{font-family:FontAwesome;src:url(https://netdna.bootstrapcdn.com/font-awesome/2.0/font//fontawesome-webfont.eot?#iefix) format('eot'),url(https://netdna.bootstrapcdn.com/font-awesome/2.0/font//fontawesome-webfont.woff) format('woff'),url(https://netdna.bootstrapcdn.com/font-awesome/2.0/font//fontawesome-webfont.ttf) format('truetype'),url(https://netdna.bootstrapcdn.com/font-awesome/2.0/font//fontawesome-webfont.svg#FontAwesome) format('svg');font-weight:400;font-style:normal}[class*=" icon-"]:before,[class^=icon-]:before{font-family:FontAwesome;font-weight:400;font-style:normal;display:inline-block;text-decoration:inherit}a [class*=" icon-"],a [class^=icon-]{display:inline-block;text-decoration:inherit}.icon-large:before{vertical-align:top;font-size:1.3333333333333333em}.btn [class*=" icon-"],.btn [class^=icon-]{line-height:.9em}.icon-facebook:before{content:"\f09a"}.icon-twitter:before{content:"\f099"}.icon-pinterest:before{content:"\f0d2"}.icon-google-plus:before{content:"\f0d5"}.icon-share:before{content:"\f1e0";font-size:16px}.cell{position:relative;height:40px;width:40px;line-height:42px;background-color:#0fb9b1;text-align:center;border-radius:50%;display:inline-block;margin:0 3px}.debug .share-container{width:100px;height:100px}
    </style>
    <link rel="stylesheet" type="text/css" media="print" href="{{ public_asset('website/css/print.css').'?'.now() }}">

    {{--<script type='' src='//platform-api.sharethis.com/js/sharethis.js#property=5b8e41e159ed1f001188b243&product=sop' async='async'></script>--}}
@stop

<div class="share-wrapper below">
    <div class="rc50 share-action icon-share"></div>

    {{--<div class="sharethis-inline-share-buttons"></div>--}}
    <div class="share-container rc50">
        <button class="share-btn share tl icon-google-plus google-plus" href='{{ url()->current() }}'></button>
        <button class="share-btn share tr icon-twitter twitter" href='{{ url()->current() }}'></button>
        <button class="share-btn share br icon-facebook facebook" href='{{ url()->current() }}'></button>
        <button class="share-btn share bl icon-pinterest pinterest" href='{{ url()->current() }}'></button>
    </div>
</div>

@section('js')
    @parent
    <script src="{{ public_asset('website/js/shares.js') }}" ></script>
    <script >
        addLoadEvent(function () {
            $('button.share').shares();
        })
    </script>
@stop

