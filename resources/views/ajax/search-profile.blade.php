<!-- Display Profile of User -->
<div class="text-center" style="padding-top:5%">
    <div class="" align="center">
        <img src="{{ $profile }}" alt="" width="70px" class="img img-responsive img-circle" >
    </div>
    <div class="" style="padding-top:2%">
        Name: <span>{{ $name}}</span>

    </div>
    <div class="">
        Handle: <a href="http://twitter.com/{{ $handle }}" target="_blank"><strong>@</strong>{{ $handle }}</a>
    </div>
    <div class="" style="padding-top:2%">
        <a href="/download/{{ $handle}}" class="btn btn-primary">Download Tweets</a>
    </div>
</div>
