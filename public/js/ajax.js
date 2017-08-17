//Ajax
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
            // console.log(data);
            // load data in HTML
            $('#output').html(data);
        }
    });

}


//Function call to get Tweets of clicked follower
function getFollowerTweets(handle){
    //get clicked follower
    var val=handle;
    $('#insideSlider').hide();
    $('html, body').animate({ scrollTop:0 }, 500);
    $('#gify').css('display', 'block');

    //Ajax call to retrive tweets
    $.ajax({
        type:"GET",
        url:"/changeSlider?handle="+val,
        data:val,
        success:function(data){
            // load data in HTML slider
            $('#slider').html(data);
            $('.flashmsg').css('display', 'block');
        }
    });

}
//Function call to get profile info of searched user
function getUserInfo(handle, name, profile){

    $.ajax({
        type:"GET",
        url:"/loadinfo?handle="+handle+"&name="+name+"&profile="+profile,
        data:"seach",
        success:function(data){
            $('#userinfo').html(data);
        }
    });
}
//End Ajax
