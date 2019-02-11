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

                            <a href="{{route('addPost')}}" class="btn btn-primary"><i class="glyphicon glyphicon-user"></i> &ensp;Add Post</a>
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
                        <div class="clearfix"></div>
                    </div>

                    <table class="table table-border table-hover">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Metatitle</th>
                            <th>Article</th>
                            <th>Posted By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($postData as $key=>$value)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->cats->title}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->metatitle}}</td>
                                <td>{{strip_tags(html_entity_decode($value->article))}}</td>
                                <td>{{$value->users->username}}</td>
                                <td>
                                    <a href="{{route('editPost').'/'.$value->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit Post</a>
                                    <a href="{{route('deletePost').'/'.$value->id}}" class="btn btn-warning btn-xs" onclick="return(confirm('Are you sure to delete?'))"><i class="fa fa-trash"></i>Delete Post</a>
                                </td>
                            </tr>
                            @empty
                            <tr><a href="#" class="btn btn-info ">There are no posts</a>
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