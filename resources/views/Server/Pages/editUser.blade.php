@extends('Server.Master.master')
@section('content')


                <!-- page content -->
        <div class="right_col" role="main">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><a href="" class="btn btn-primary "> @yield('title',$title)</a>
                                    <a href="{{route('users')}}" class="btn btn-success"><i class="fa fa-users"></i>&ensp;Go Back</a>
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
                            <div class="col-md-8">
                                <form  action="{{route('editUserAction')}}" method="post"
                                      enctype="multipart/form-data" data-parsley-validate
                                      class="form-horizontal form-label-left">
                                    <input type="hidden" name="uid" value="{{$userData->id}}">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Name <span
                                                    class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="name" id="first-name"
                                                   class="form-control col-md-7 col-xs-12" value="{{$userData->name}}">
                                            <small class="text text-danger">{{$errors->first('name')}}</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User
                                            Name <span
                                                    class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="username" name="username"
                                                   class="form-control col-md-7 col-xs-12" value="{{$userData->username}}">
                                            <small class="text text-danger">{{$errors->first('username')}}</small>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email
                                            *</label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="email" class="form-control col-md-7 col-xs-12" type="text"
                                                   name="email" value="{{$userData->email}}">
                                            <small class="text text-danger">{{$errors->first('email')}}</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Type</label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="btn btn-default" data-toggle-class="btn-primary"
                                                   data-toggle-passive-class="btn-default">
                                                <input type="radio" name="user_type" value="admin" @if($userData->user_type==='admin'){{'checked'}} @endif> &nbsp;Admin &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary"
                                                   data-toggle-passive-class="btn-default">
                                                <input type="radio" name="user_type" value="user"  @if($userData->user_type==='user'){{'checked'}} @endif> User
                                            </label><br>
                                            <small class="text text-danger">{{$errors->first('user_type')}}</small>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Picture<span
                                                    class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class=" form-control col-md-7 col-xs-12" type="file" id="profile-img"
                                                   name="upload" >
                                            <small class="text text-danger">{{$errors->first('upload')}}</small>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url('public/images/'.$userData->image)}}?>" id="profile-img-tag" alt=""
                                     height="400" width="300" class="img img-thumbnail img-responsive">
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        <!-- /page content -->


@stop