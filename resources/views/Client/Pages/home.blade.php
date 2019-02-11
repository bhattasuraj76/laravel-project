@extends('Client.Master.master')

@section('content')
        <div class="container">

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

            <div class="row">
                @foreach($postData as $key=>$value)
                    @if($key<6)
                        @php
                    $key++;
                        @endphp
                        <div class="col-md-4">
                            <div class="box" style="height:300px;">
                                <h4><a href="#"> {{$value->title}}</a></h4>
                                <h3>{{$value->metatitle}}</h3>
                                <p>{{str_limit(strip_tags(html_entity_decode($value->article)),100)}}</p>
                                <h5><a href="#">{{$value->users->name}}</a></h5>
                                <a href="{{route('blog').'/'.$value->id}}" class="btn btn-danger btn-xs">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>

                        @else
                    @endif


                    @endforeach

            </div>
        </div>
    </section>



@endsection