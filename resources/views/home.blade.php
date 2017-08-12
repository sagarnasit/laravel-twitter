<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="icon" href="/images/logo.png">
    <!-- csrf for ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- bootsratp css file -->
    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <!-- bootstrap font-awesome css -->
    <link rel="stylesheet" href="css/app.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- jQuery js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .flashmsg{
            padding:10px;
            z-index: 1;
            position: fixed;
            background-color: rgba(180,241,196,.9);
            display: flex;
            right: 2px;
            border:1px black solid;
            border-radius: 3px;
            top:8%;
            font-size:15px;
        }
    </style>
</head>
<body>
    @include('layouts.nav')
    <div class="container">


        <!-- Display User Profile pic, name and handle  -->
        <div class="userInfo content">
            <div class="title " align='center' style="margin-top:5%" >

                <img src="{{ Auth::user()->avatar }}" alt="" class="img img-responsive img-circle" width="170px">

                <a target="_blank" class="font-size-18"
                href="http://twitter.com/{{Auth::user()->handle }}"><strong>@</strong>{{Auth::user()->handle}}</a>
            </div>

        </div>
        <!-- end userInfo  -->

        {{--slider--}}
        @include('layouts.slider')

        {{--followerlist--}}
        @include('layouts.followers')

        {{--PopUps--}}
        @include('layouts.popups')

        <!-- show successfull popup msg -->
        @if(request()->session()->has('status'))
        <script>
        $(window).on('load',function(){
            $('#myDoneModal').modal('show');
        });

        </script>
        @endif
</body>
<script>

    // ajax setup for laravel
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/ajax.js"></script>
</html>
