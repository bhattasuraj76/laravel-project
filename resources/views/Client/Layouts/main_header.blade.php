@section('main_header')
    <section id="bannar">
        <nav class="navbar navbar-default  ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand " href="#" style="font-family:Helvetica Neue">Hey Amigo,</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                    <ul class="nav navbar-nav navbar-right">
                        @foreach($menuData as $value)
                            <li><a href="{{route(strtolower($value->menu))}}">{{ucfirst($value->menu)}}</a></li>
                            {{--<li class="active"><a href="#">Home</a></li>--}}
                            {{--<li><a href="#">About</a></li>--}}
                            {{--<li><a href="#">Data Science</a></li>--}}
                            {{--<li><a href="#">Reading List</a></li>--}}
                            {{--<li><a href="#">Login</a></li>--}}
                        @endforeach
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

@endsection

