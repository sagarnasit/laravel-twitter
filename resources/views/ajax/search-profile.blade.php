<div class="text-center" style="padding-top:5%">
    <div class="">
        <img src="{{ $profile }}" alt="" width="70px">
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
