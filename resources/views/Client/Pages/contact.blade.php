@extends('Client.Master.master')

@section('content')
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
                        @endforeach
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="form-container z-depth-5">
                <h3>Contact Form</h3>
                <div class="row">
                    <form class="col s12" id="reused_form">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" name="name" required class="validate">
                                <label for="name">Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" required class="validate">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="message" name="message" class="materialize-textarea" class="validate" ></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div>
                            <button class="waves-effect waves-light btn submitbtn" type="submit">Submit</button>
                        </div>
                    </form>
                    <div id="error_message" style="width:100%; height:100%; display:none; ">
                        <h4>
                            Error
                        </h4>
                        Sorry there was an error sending your form.
                    </div>
                    <div id="success_message" style="width:100%; height:100%; display:none; ">
                        <h4>
                            Success! Your Message was Sent Successfully.
                        </h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
            <div class="row bg1">
                <div class="col-md-12 text-center ">
                    @if(session('success'))
                        <div class="alert alert-success" id="messages">
                            {{session('success')}}
                        </div>
                    @endif
                    @if($errors->any())
                        @foreach($errors->all() as $value)
                            <div class="alert alert-danger" id="messages">
                                {{$value}}
                            </div>
                        @endforeach
                    @endif
                    <h1>VuOwn's Blog</h1>
                    <p>Thoughts, ideas, and new things I've learned.</p>

                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Subscribe</button>
                    <div id="demo" class="collapse">
                        <form action="{{route('subscribe')}}" method="post">@csrf
                            <input type="email" name="email" placeholder="Enter your email here">
                            <button class="btn btn-xs btn-danger">Go</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container">


        </div>
    </section>
    <section id="footer" style="margin-top: 0px;">
        <div class="container">
            <div class="row bg2">
                <div class="col-md-6 text-left">
                    Vuown's Blog © 2018
                </div>
                <div class="col-md-6 text-right">
                    <div class="square">
                        <a href="#"> <i class="fa fa-twitter-square"></i></a>
                        <a href="#"><i class="fa fa-github-square"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                    Latest Posts
                    Twitter

                </div>
            </div>
        </div>
    </section>


@endsection