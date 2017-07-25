<!doctype html>
<html>

<title>twitter App</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style >
.mydivs{
    padding: 10px;
    border: 1px solid #0084b4;
    border-radius: 5px;
    box-shadow: 10px 10px 20px #c0deed;
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
    <div class=" row">


        <div class="content">
            <div class="title m-b-md" align='center' style="margin-top:50px" >
                <h3>Welcome {{ Auth::user()->name }}</h3>
                <h3>Twitter Handle: {{ Auth::user()->handle }}</h3>
            </div>


        </div>


        <div class="row">

            <div class="text-center" style="margin-bottom:1%">

                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Email</button>
            </div>
            <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-0 col-sm-12 col-sm-offset-0 mydivs" id="slider">

                <div class=" ">
                    @if(!empty($tweets))
                    @foreach($tweets as $key => $value)
                    <div class=" mySlides">

                        <div class="">
                            <div>
                                <div >
                                    <p class="pull-left">{{ ++$key }} </p>
                                </div>
                                <div style="margin-left:45%">
                                    <button class="btn btn-default left pull-" onclick="plusDivs(-1)">&#10094;</button>
                                    <button class="btn btn-default right" onclick="plusDivs(1)">&#10095;</button>
                                </div>
                            </div>
                            <div style="padding:2% 5% 5% 5%">
                                <hr>
                                <h3>{{ $value['text'] }}</h3>
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
            </div>
        </div>
        <div class="row">

            <div class=" col-md-offset-3 col-md-6 col-md-offset-3 ">
                <div class="flex margin-top">


                    <div class="form-group">
                        <form class="" action="#" id="myForm" method="POST" name="followersForm">
                            {{ csrf_field() }}

                            <input type="text" name="search" placeholder="Search Followers..." id="followername" class="form-control input-lg" oninput="searchFollowers()">
                        </form>

                    </div>
                </div>
                <div class="followers flex " id="output">

                </div>
            </div>
        </div>
        <!-- Modal -->
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
                            <input type="email" class="form-control" name="email" value="" placeholder="Enter Email Address" required>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="send" class="btn btn-primary">Go</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {

    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        // $(x[i]).hide();
    }
    x[slideIndex-1].style.display = "block";
    // $(x[slideIndex-1]).show(500);
}
setInterval(function(){plusDivs(1);},2000);
//Ajax Call for follower search
function searchFollowers(){

    var val=$('#followername');
    // alert(val);

    $.ajax({
        type:"POST",
        url:"/searchFollowers",
        data:val,
        success:function(data){
            console.log(data);
            $('#output').html(data);
        }
    });

}

</script>

</html>
