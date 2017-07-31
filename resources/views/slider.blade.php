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