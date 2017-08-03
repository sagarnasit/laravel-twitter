<!-- Ajax data for Follower list -->
<div class="animated flash rubberBand">

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
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);
</script>
