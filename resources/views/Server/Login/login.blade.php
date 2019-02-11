<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Nigga</title>
    <link rel="stylesheet" href="{{url('public/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/nprogress.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/prettify.min.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/custom.min.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/custom.css')}}">
</head>
<body class="login">
<div>


    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <h1 class="text text-primary">You &ensp;Asshole,</h1>

                    <h1 class="text text-warning ">Login To Dashboard</h1>

                    @if(session('success'))
                        <div class="alert alert-danger" id="messages"> {{session('success')}}</div>
                    @endif

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="pull-left">
                        <input type="checkbox" name="remember">Remember Me
                    </div>
                    <div>
                        <button class="btn btn-primary pull-right">Log In</button>
                    </div>
                </form>

                <div class="clearfix"></div>

                <div class="clearfix"></div>
                <br/>

                <div>
                    <h1><i class="fa fa-paw"></i> Powered By David Warner</h1>

                    <p>&copy;<?= date('Y')?></p>
                </div>
            </section>
        </div>


    </div>

</div>
<script src="{{url('public/bootstrap/js/jquery.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/fastclick.js')}}"></script>
<script src="{{url('public/bootstrap/js/nprogress.js')}}"></script>
<script src="{{url('public/bootstrap/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/jquery.hotkeys.js')}}"></script>
<script src="{{url('public/bootstrap/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/prettify.js')}}"></script>
<script src="{{url('public/bootstrap/js/custom.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/custom.js')}}"></script>

</body>

</html>