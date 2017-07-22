
    <table class="table table-responsive table-striped table-hover">
        @if($followerResult)
        @foreach($followerResult as $follower)
        <tr>
            <td><a href='{{ url("home/$follower->screen_name") }}'  >{{$follower->name}}</a></td>
        </tr>
        @endforeach
        @else
        @endif
    </table>
