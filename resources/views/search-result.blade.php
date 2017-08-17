<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Search</title>
        @include('layouts.assets')
    </head>
    <body>
        @include('layouts.nav');
        <div class="container text-center">
            <h3>Search Result</h3>
        </div>
        <div class="container">
            <div class="col-md-4" id="">
                <table class="table table-responsive" style="border-right:1px solid black">
                    <tbody>
                        @if(!empty($searchResult))
                        @foreach($searchResult as $row)
                            <tr onclick='getUserInfo("{{ $row['screen_name'] }}","{{ $row['name'] }}", "{{ $row['profile_image_url'] }}")'>
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

            <div class="col-md-8 text-center" id="userinfo">
                <h5 style="padding-top:10%;">Click on handle to get information</h5>
            </div>
        </div>
        <script type="text/javascript">
        function getUserInfo(handle, name, profile){

            // alert(handle + name + profile );

            $.ajax({
                type:"GET",
                url:"/loadinfo?handle="+handle+"&name="+name+"&profile="+profile,
                data:"seach",
                success:function(data){
                    // load data in HTML slider
                    $('#userinfo').html(data);
                    // $('.flashmsg').css('display', 'block');
                }
            });
        }
        </script>
    </body>
</html>
