<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
            p{
                color: #00aced;
                font-size:14px;
            }
        </style>
    </head>
    <body>
        <div align='center'>
            <h3>Tweets Form Your Twitter Account</h3>
        </div>
        <div align='center'>
            <img src="images/logo.png" alt="" width="150px">
        </div>
        <div align='center'>
            <h5>Name: {{Auth::user()->name}}</h5>
            <h5 >Handle: <strong>@</strong>{{ Auth::user()->handle}}
            </h5>

        </div>
        <div class="">
            @if(!empty($tweets))
            @foreach($tweets as $key => $value)
            <div class=" mySlides">

                <div class="">
                    <div>
                        <div >
                            <i class="pull-left" style="font-size:10px;color:#black">{{ ++$key }} </i>
                        </div>

                    </div>
                    <div >
                        <hr style="border:0.2px 0 0 0 solid black">
                        <p>{{ $value['text'] }}</p>
                        @if(!empty($value['extended_entities']['media']))
                        @foreach($value['extended_entities']['media'] as $v)
                        <img src="{{ $v['media_url_https'] }}" style="width:300px;">
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class=" mySlides">

                <h3>No Tweets</h3>

            </div>
            @endif

        </div>
    </body>
</html>