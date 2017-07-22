<!doctype html>
<html>

<title>twitter App</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
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
    <div class="flex-center position-ref full-height ">


        <div class="content">
            <div class="title m-b-md" align='center' style="margin-top:50px" >
                <h3>Welcome {{ Auth::user()->name }}</h3>
                <h3>Twitter Handle: {{ Auth::user()->handle }}</h3>
            </div>


        </div>



        <div class="container mydivs">

            <div class=" container">
                @if(!empty($tweets))
                @foreach($tweets as $key => $value)
                <div class=" mySlides">

                    <div class="">
                        <h4>{{ ++$key }}</h4>
                        <hr>
                        <h3>{{ $value['text'] }}</h3>
                        @if(!empty($value['extended_entities']['media']))
                        @foreach($value['extended_entities']['media'] as $v)
                        <img src="{{ $v['media_url_https'] }}" style="width:300px;">
                        @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
                @else
                <div class=" mySlides">

                    <h3>No Tweets</h3>

                </div>
                @endif
                <div  class="margin-top flex" >
                    <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="row">

            <div class=" container ">
                <div class="flex margin-top">


                    <div class="form-group">
                        <form class="" action="#" id="myForm" method="POST" name="followersForm">
                            {{ csrf_field() }}

                            <input type="text" name="search" placeholder="Search Followers..." id="followername" class="form-control input-lg" oninput="searchFollowers()">
                        </form>

                    </div>
                </div>
                <div class="followers flex container" id="output">

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
    }
    x[slideIndex-1].style.display = "block";
}

function searchFollowers(){

        var val=$('#followername');
        // alert(val);

        $.ajax({
            type:"POST",
            url:"/searchFollowers",
            data:val,
            success:function(data){
                // alert(data);
                $('#output').html(data);
            }
        });



}

</script>

</html>
