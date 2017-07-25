<!doctype html>
<html>

<title>Twitter App</title>
<link rel="icon" href="/images/logo.png">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
    .pointer:hover{
        cursor: pointer;
    }
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
setInterval(function(){plusDivs(1);},3000);
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

function getFollowerTweets(handle){

    var val=handle;
    // alert(val);

    $.ajax({
        type:"GET",
        url:"/changeSlider?handle="+val,
        data:val,
        success:function(data){
            // alert(data);
            $('#slider').html(data);
        }
    });

}


</script>

</html>
