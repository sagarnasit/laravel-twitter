<style>
    .pointer:hover{
        cursor: pointer;
    }
</style>
<!-- follower list -->
<table class="table table-responsive table-striped table-hover table-border table-bordered">
    @if(isset($followers))
        <!-- loop trough each follower from array -->
        @foreach($followers as $follower)
            <tr>
                <td class="text-uppercase text-center pointer" onclick='getFollowerTweets("{{ $follower->screen_name }}")' >
                    <p>{{ $follower->name }}</p>
                </td>
            </tr>
        @endforeach
    @else
    <tr>
        <td>Not Found</td>
    </tr>
    @endif
</table>
