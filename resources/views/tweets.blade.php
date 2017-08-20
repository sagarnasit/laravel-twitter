
        @if(!empty($tweets))
        @foreach($tweets as $key => $value)
        {{ $value }} <br><br>
        @endforeach
        @else

            <h3>No Tweets</h3>

        @endif
