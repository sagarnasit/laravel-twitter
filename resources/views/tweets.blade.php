<!-- Html page which will be send as a PDF File -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    p{
        color: #00aced;
        font-size:10px;
    }
    </style>
</head>
<body>
    <div align='center'>
        <h3>Tweets Form <strong>@</strong>{{ $user }}</h3>
    </div>
    <!-- twitter logo -->
    <div align='center'>
        <!-- <img src="images/logo.png" alt="" width="150px"> -->
    </div>

    <!-- display each tweets -->
    <div class="">
        @if(!empty($tweets))
        @foreach($tweets as $key => $value)
        <div class=" mySlides">

            <div class="">
                <div>
                    <div >
                        <i class="pull-left" style="font-size:10px;color:#black">{{ ++$key }} </i> <!-- tweet number -->
                    </div>

                </div>
                <!-- Tweet -->
                <div >
                    <!-- <hr style="border:0.2px 0 0 0 solid black"> -->
                    <p>{{ $value['text'] }}</p>

                </div>
            </div>
        </div>
        @endforeach
        @else
        <!-- No tweet slider -->
        <div class=" mySlides">
            <h3>No Tweets</h3>
        </div>
        @endif

    </div>
</body>
</html>
