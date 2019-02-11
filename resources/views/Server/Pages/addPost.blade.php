@extends('Server.Master.master')
@section('content')


                <!-- page content -->
        <div class="right_col" role="main">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success" id="messages">
                                {{session('success')}}
                            </div>
                        @endif
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><a href="" class="btn btn-primary "> @yield('title',$title)</a>
                                    <a href="{{route('posts')}}" class="btn btn-success"><i class="fa fa-users"></i>&ensp;View Posts</a>
                                </h2>

                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <!--gives notifications if user is added or not -->
                            <div class="col-md-10">
                                <form  action="{{route('addPost')}}" method="post"
                                      enctype="multipart/form-data" data-parsley-validate
                                      class="form-horizontal form-label-left">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Category<span
                                                    class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="cat_id" id="first-name" class="form-control">
                                                @foreach($catData as $value)
                                                <option value="{{$value->id}}" >{{$value->title}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Title <span
                                                    class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="title" id="first-name"
                                                   class="form-control col-md-7 col-xs-12" value="{{old('title')}}">
                                            <small class="text text-danger">{{$errors->first('title')}}</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Meta Title <span
                                                    class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="metatitle" id="first-name"
                                                   class="form-control col-md-7 col-xs-12" value="{{old('metatitle')}}">
                                            <small class="text text-danger">{{$errors->first('metatitle')}}</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Article
                                          <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea name="article" id="description" cols="60" rows="10" class="form-control">

                                            </textarea>
                                            <small class="text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Post</button>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        <!-- /page content -->


@stop