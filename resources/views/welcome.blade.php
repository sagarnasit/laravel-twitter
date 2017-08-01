<!-- Login view for user -->
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Twitter App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" href="/images/logo.png">
    <style>
        .image:hover{
            -webkit-transform: rotateZ(360deg);
            -ms-transform: rotateZ(-30deg);
            transform: rotateZ(-30deg);/*box-shadow: 2px 0px 20px black;*/
            transition:all 0.3s ease;
        }
        .flexcss{
            display:flex;
            justify-content:center;
            align-items:center;
        }
    </style>

</head>
<body>
    <div class="container">


    <div class="row">
            <div align="center" class="col-md-offset-2 col-md-8 col-md-offset-2 col-xs-offset-1 col-xs-10 col-xs-offset-1">
                <img src="/images/logo.png" alt="" class="img img-responsive image" width="340px" style="margin-top:15%">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                    <a href="/auth" class="btn btn-primary btn-lg btn-block" >Login With Twitter</a>
                </div>
            </div>

            <!-- button -->
            <div class="col-md-offset-4 col-md-4" align='center'style="margin-top:5" >

            </div>

        </div>
    </div>
</body>
</html>
