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