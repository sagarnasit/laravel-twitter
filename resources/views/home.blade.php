<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    @include('layouts.assets')
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

                <img src="{{ Auth::user()->avatar }}" alt="" class="img img-responsive img-circle" width="150px">

                <a target="_blank" class="font-size-18"
                href="http://twitter.com/{{Auth::user()->handle }}"><strong>@</strong>{{Auth::user()->handle}}</a>
            </div>

        </div>
        <!-- end userInfo  -->

        <div class="text-center" style="margin:1% 0 1% 0">

            <!-- Trigger the modal with a button -->
            <div class="">
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Email Me</button>
                <a href={{ route('download', [ 'user' => Auth::user()->handle ]) }} class="btn btn-primary">Download</a>
            </div>
        </div>
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
