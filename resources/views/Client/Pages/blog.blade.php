@extends('Client.Master.master')

@section('content')
        <div class="container">

            <div class="row bg1">
                <div class="col-md-12 text-center ">

                    <h1>VuOwn's Blog</h1>
                    <p>Thoughts, ideas, and new things I've learned.</p>

                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container">
            <h1 class="text-primary text-center">Welcome To My Blog World</h1>
            <div class="row">
                @if(isset($blogData))
                    <div class="col-md-12" style="background: paleturquoise">
                        <div class="box" style="margin-top:100px;margin-bottom: 100px;padding: 20px;">

                            <h4><a href="#"> {{$blogData->title}}</a></h4>
                            <h3>{{$blogData->metatitle}}</h3>
                            <p>{{strip_tags(html_entity_decode($blogData->article))}}</p>
                            <h5><a href="#">{{$blogData->users->name}}</a></h5>
                            <a href="{{route('home')}}" class="btn btn-primary">Go Back</a>
                        </div>
                    </div>
                @else
                    <div class="container" style="margin: auto;">
                        <div class="row" >
                            @foreach($postData as $key=> $value)
                                @if($key==0)
                                    <div class="col-md-6" >
                                        <div class="box"style="margin:auto;border: 1px black dashed">
                                            <h4><a href="#"> {{$value->title}}</a></h4>
                                            <h3>{{$value->metatitle}}</h3>
                                            <p>{{strip_tags(html_entity_decode($value->article))}}</p>

                                            <h5><a href="#">{{$value->users->name}}</a></h5>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-6" style="margin:auto">
                                    <div class="box" style=" margin:auto;border: 1px black dashed">
                                        <h4><a href="#"> {{$value->title}}</a></h4>
                                        <h3>{{$value->metatitle}}</h3>
                                        <p>{{strip_tags(html_entity_decode($value->article))}}</p>

                                        <h5><a href="#">{{$value->users->name}}</a></h5>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        {{$postData->render()}}

                    </div>

                @endif

            </div>
        </div>
    </section>

@endsection