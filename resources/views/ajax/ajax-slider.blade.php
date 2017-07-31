<!-- Ajax data for Follower list -->
<div class=" ">
    @if(!empty($tweets))
        @foreach($tweets as $key => $value)
        <div class=" mySlides">

            <div class="">
                <div>
                    <div >
                        <p class="pull-left">{{ ++$key }} </p>
                    </div>
                    <!-- prev-next button -->
                    <div style="margin-left:43%">
                        <button class="btn btn-default left pull-" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="btn btn-default right" onclick="plusDivs(1)">&#10095;</button>
                    </div>

                    
                </div>
                <!-- tweet -->
                <div style="padding:2% 5% 5% 5%">
                    <hr>
                    <h3>{{ $value['text'] }}</h3>
                    @if(!empty($value['extended_entities']['media']))
                        @foreach($value['extended_entities']['media'] as $v)
                        <!-- media files -->
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
<script>
var slideIndex = 1;
showDivs(slideIndex);
</script>
