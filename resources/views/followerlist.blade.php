
    <table class="table table-responsive table-striped table-hover">
        @if(isset($followerResult))
            @foreach($followerResult as $follower)
                <tr>
                    <td class="text-uppercase text-center"><a href='{{ url("home/$follower->screen_name") }}'  >{{$follower->name}}</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>Not Found</td>
            </tr>
        @endif
    </table>
