<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home | Twitter App</title>
<link rel="icon" href="/images/logo.png">
<!-- csrf for ajax -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- bootsratp css file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- bootstrap font-awesome css -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
    .pointer:hover{
        cursor: pointer;
    }
</style>
<!-- jQuery js -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <!-- bootstrap js -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style >

.mydivs{
    padding: 10px;
    border: 1px solid #0084b4;
    border-radius: 5px;
    box-shadow: 10px 10px 20px #c0deed;
    height: 400px;
    overflow: auto;
}
hr{
    border-style: inset;
    border-width: 1px;
}
.mySlides{
    color: #00aced;
}
.margin-top{
    margin-top:10rem;
}
.flex{
    display: flex;
    justify-content: center;
}
.font-size-18{
    font-size: 2rem;
}
</style>
</head>
<body>
    @include('nav')
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
        @include('slider')

        {{--followerlist--}}
        @include('followers')

        {{--PopUps--}}
        @include('popups')

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

</html>
