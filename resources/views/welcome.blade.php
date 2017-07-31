<!-- Login view for user -->
<!doctype html>
<html>
<head>
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
            <div align="center" class="">
                <img src="/images/logo.png" alt="" class="img img-responsive image" width="20%" style="margin-top:22%">
            </div>
            
            <!-- button -->
            <div class="col-md-offset-4 col-md-4" align='center'style="margin-top:5" >
                <a href="/auth" class="btn btn-primary btn-lg btn-block" >Login With Twitter</a>
            </div>

        </div>
    </div>
</body>
</html>
