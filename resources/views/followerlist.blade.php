
    <table class="table table-responsive table-striped table-hover">
        @if(isset($followerResult))
            @foreach($followerResult as $follower)
                <tr>
                    <td class="text-uppercase text-center" onclick='getFollowerTweets("{{$follower->screen_name}}")'  ><p href='{{ url("home/$follower->screen_name") }}'  >{{$follower->screen_name}}</p></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>Not Found</td>
            </tr>
        @endif
    </table>
    <script type="text/javascript">
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
