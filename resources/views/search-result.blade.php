<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Search</title>
        @include('layouts.assets')
    </head>
    <body>
        @include('layouts.nav')
        <div class="container text-center" style="padding:2% 0 2% 0;">
            <h5 style="color:#00aced">Search Result for "{{ $txt }}"</h5>
        </div>
        <div class="container">
            <!-- list of search -->
            <div class="col-md-4" id="">
                <table class="table table-responsive" style="border-right:1px solid black">
                    <tbody>
                        @if(!empty($searchResult))
                        @foreach($searchResult as $row)
                            <tr class="pointer" onclick='getUserInfo("{{ $row['screen_name'] }}","{{ $row['name'] }}", "{{ $row['profile_image_url'] }}")'>
                                <td><img src="{{ $row['profile_image_url'] }}" /></td>
                                <td><strong>@</strong>{{ $row['screen_name'] }}</td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td>No Match Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- end list search -->

            <!-- user info -->
            <div class="col-md-8 text-center" id="userinfo">
                <h5 style="padding-top:10%;">Click on handle to get information</h5>
            </div>
            <!-- end user info -->
        </div>
        <script type="text/javascript" src="/js/ajax.js"></script>
    </body>
</html>
