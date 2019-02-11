@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bhuwan's Blog</title>

    <!-- Bootstrap -->
    <link href="{{ url('public/bhuwan/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/font-awesome.min.css')}}">
    <link href="{{url('public/bhuwan/style.css')}}" rel="stylesheet">
    <title>@yield('title',$title)</title>
</head>
<body>
@endsection

