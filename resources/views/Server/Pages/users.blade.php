@extends('Server.Master.master')
@section('content')



        <!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        @if(session('success'))
                            <div class="alert alert-info" id="messages">{{session('success')}}</div>
                        @endif
                        <h2>
                            <a href="#" class="btn btn-info"> @yield('title',$title)</a>

                            <a href="{{route('addUser')}}" class="btn btn-primary"><i class="glyphicon glyphicon-user"></i> &ensp;Add Users</a>
                        </h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <form action="{{route('userSearch')}}" method="post">
                                        @csrf
                                    <input type="text" class="form-control" name='user_data'  placeholder="Search name here">
                            <span class="input-group-btn">
                      <button class="btn btn-danger">Go!</button>
                    </span>
                                    </form>   </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>

                    <table class="table table-border table-hover">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Profile</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($userData as $key=>$value)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->username}}</td>
                                <td>{{$value->email}}</td>
                                <td>
                                    <form action="{{route('userTypeChanger')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="uid" value="{{$value->id}}">
                                    @if($value->user_type==='admin')
                                        <button name="status" class="btn btn-primary btn-xs">{{$value->user_type}}</button>
                                        @else
                                        <button  name="status" class="btn btn-danger btn-xs">{{$value->user_type}}</button>
                                        @endif
                                    </form>
                                </td>
                                <td><img src="{{url('public/images/'.$value->image)}}" alt="Image not found" width="60"></td>
                                <td>
                                    <a href="{{route('editUser').'/'.$value->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit User</a>
                                    <a href="{{route('deleteUser').'/'.$value->id}}" class="btn btn-warning btn-xs" onclick="validation()"><i class="fa fa-trash"></i>Delete User</a>
                                </td>
                            </tr>
                            @empty
                            <tr><a href="#" class="btn btn-info ">There are no users</a>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
<!-- /page content -->







@stop