<!doctype html>
<html>

<title>Twitter App</title>
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
</style>
</head>
<body>
    <div class="container">

         <!-- Display User Profile pic, name and handle  -->
        <div class="userInfo content">
            <div class="title " align='center' style="margin-top:5%" >
                <img src="{{ Auth::user()->avatar }}" alt="" class="img img-responsive" width="10%">
                <h3>Welcome: {{ Auth::user()->name }}</h3>
                <h3>Handle: <strong>@</strong>{{Auth::user()->handle }}</h3>
            </div>

        </div>
         <!-- end userInfo  -->
        
         <!-- Slider  -->
        <div class="row">

            <div class="text-center" style="margin:1% 0 1% 0">

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Email</button>
            </div>
            <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2  mydivs" id="slider">

                <div class=" ">
                     <!-- display if any tweets  -->
                    @if(!empty($tweets))
                        @foreach($tweets as $key => $value)
                            <div class=" mySlides">

                                <div class="">
                                    <div>
                                        <div >
                                            <p class="pull-left">{{ ++$key }} </p>
                                        </div>
                                        <div style="margin-left:43%">
                                            <button class="btn btn-default left pull-" onclick="plusDivs(-1)">&#10094;</button>
                                            <button class="btn btn-default right" onclick="plusDivs(1)">&#10095;</button>
                                        </div>
                                    </div>
                                    <div style="padding:2% 5% 5% 5%">
                                        <hr>
                                        <h3>{{ $value['text'] }}</h3><!-- diplay tweet  -->
                                        @if(!empty($value['extended_entities']['media']))
                                            @foreach($value['extended_entities']['media'] as $v)
                                            <!--  display meadia if any  -->
                                                <img src="{{ $v['media_url_https'] }}" style="width:300px;">
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                     <!-- display No Tweets msg if not  -->
                    @else
                        <div class=" mySlides">

                            <h3>No Tweets</h3>

                        </div>
                    @endif

                </div>
            </div>
        </div>
         <!-- End Slider  -->

         <!-- Search and display follower list  -->
        <div class="row">
            <div class="col-md-offset-3 col-md-6 margin-top" >

                <div class="">
                    <div class="flex ">

                        <!-- Follower search box -->
                        <div class="form-group">
                            <form class="" action="#" id="myForm" method="POST" name="followersForm">
                                {{ csrf_field() }}
                    
                                <input type="text" name="search" placeholder="Search Followers..." id="followername" class="form-control input-lg" oninput="searchFollowers()">
                            </form>

                        </div>
                    </div>

                    <!-- display follower list -->
                    <div class="followers flex " id="output" style="overflow:auto;height:400px">
                        <table class="table table-responsive table-striped table-hover table-border table-bordered">
                            @if(isset($followers))
                                @foreach($followers as $follower)
                                    <tr>
                                        <td class="text-uppercase text-center pointer" onclick='getFollowerTweets("{{$follower->screen_name}}")' >
                                            <p href='{{ url("home/$follower->screen_name") }}'  >{{$follower->name}}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>Not Found</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <!-- end follower list -->
                </div>
            </div>
        </div>
        <!--  end follower list  -->
        <!-- Bootstrap popup for Email  -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <form class="" action="/sendPDF" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Email</h4>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Enter Email Address" required>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="send" class="btn btn-primary">Go</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Done Model -->

        <!-- Bootstrap Popup to show sucessfull msg -->
        <div id="myDoneModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="padding:0%">

                    <div class="modal-content" style="padding:%">

                        <div style="margin-top:%">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div align="center" style="margin-top:5%">
                            <i class="fa fa-check-circle" style="color:#33cc33;font-size:50px;"></i>
                        </div>

                        <div align="center" style="margin:3% 0 5% 0">
                            <strong>Sent Successfully</strong>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- end model -->

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
<script type="text/javascript">
// slider javasript using jquery

// Display First Tweet
var slideIndex = 1;
showDivs(slideIndex);


//Call function to change slide
function plusDivs(n) {
    showDivs(slideIndex += n);
}

//funcion to change slide
function showDivs(n) {

    var i;
    //get All slides
    var x = document.getElementsByClassName("mySlides");


    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    //hide all slides
    for (i = 0; i < x.length; i++) {
        // x[i].style.display = "none";
        $(x[i]).hide();
    }
    // show next sslide
     $(x[slideIndex-1]).show();
}
//interval for changing slide
setInterval(function(){plusDivs(1);},5000);

</script>
<script type="text/javascript">
//function Call for follower search on every key stroke
function searchFollowers(){
    //get follower name
    var val=$('#followername');
    // alert(val);

    //Ajax call
    $.ajax({
        type:"POST",
        url:"/searchFollowers",
        data:val,
        success:function(data){
            
            // load data in HTML
            $('#output').html(data);
        }
    });

}
//Function call to get Tweets of clicked follower
function getFollowerTweets(handle){
    //get clicked follower
    var val=handle;
    
    //Ajax call to retrive tweets
    $.ajax({
        type:"GET",
        url:"/changeSlider?handle="+val,
        data:val,
        success:function(data){
            // load data in HTML slider
            $('#slider').html(data);
        }
    });

}

</script>
</html>
