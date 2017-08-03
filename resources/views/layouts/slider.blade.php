<!-- Slider  -->
<div class="row">

    <div class="text-center" style="margin:1% 0 1% 0">

        <!-- Trigger the modal with a button -->
        <div class="form-group">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Email My Tweets</button>
        </div>
    </div>
    <!-- Slider Box -->
    <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-offset-1 col-xs-10 col-xs-offset-1  mydivs" id="slider">

        <div class=" " id="insideSlider">

            @if(!empty($tweets))
            @foreach($tweets as $key => $value)
            <!-- individual tweet -->
            <div class=" mySlides">

                <div class="">
                    <!-- slide header -->
                    <div>
                        <div>
                            <p class="pull-left">{{ sprintf("%02d", ++$key) }} </p>
                        </div>

                        <!-- prev-next button div-->
                        <div class="margin-left" style="float: left;">
                            <button class="btn btn-default left pull-" onclick="plusDivs(-1)">&#10094;</button>
                            <button class="btn btn-default right" onclick="plusDivs(1)">&#10095;</button>
                        </div>
                        <!-- timestamp -->
                        <div >
                            <p class="pull-right">{{ Twitter::ago($value['created_at']) }}</p>
                        </div>
                        <div style="clear: both"></div>
                    </div><!-- End slider header -->

                    <!-- slide body -->
                    <div style="padding:2% 5% 5% 5%">
                        <hr>
                        <!-- tweet  -->
                        <h3>{{ $value['text'] }}</h3>
                        @if(!empty($value['extended_entities']['media']))
                        @foreach($value['extended_entities']['media'] as $v)
                        <!-- meadia files  -->
                        <img src="{{ $v['media_url_https'] }}" style="width:300px;">
                        @endforeach
                        @endif
                    </div><!-- End slide body -->
                </div>
            </div><!-- End individual tweet -->
            @endforeach
            <!-- display No Tweets msg if not  -->
            @else
            <!-- no tweet slider -->
            <div class=" mySlides text-center">
                <div class="insideSlider ">
                    <h3>No Tweets</h3><!--Gify image for loading -->
                </div>
            </div>
            @endif

        </div>
        <div id="gify" style="display:none;" align="center">
            <img src="images/loading.gif" />
        </div>
    </div><!-- End Slider Box -->
</div><!-- End Slider  -->

<script type="text/javascript">
// slider javascript with jquery

// Display First Tweet
var slideIndex = 1;
showDivs(slideIndex);


//Call function to change slide
function plusDivs(n) {
    showDivs(slideIndex += n);
}

//function to change slide
function showDivs(n) {

    var i;
    //get All slides
    var x = document.getElementsByClassName("mySlides");

    if (n > x.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = x.length;
    }
    //hide all slides
    for (i = 0; i < x.length; i++) {
        $(x[i]).hide();
    }
    // show next slide
    $(x[slideIndex-1]).show();
}
//time interval for changing slide
setInterval(function(){ plusDivs(1); },5000);

</script>
