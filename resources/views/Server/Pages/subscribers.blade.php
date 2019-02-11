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
                            <a href="{{route('subscribers')}}" class="btn btn-info">Go Back</a>

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
                                    <form action="{{route('subscriberSearch')}}" method="post">
                                        @csrf
                                    <input type="text" class="form-control" name='sub_data'  placeholder="Search subscriber here">
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
                            <th>Email</th>
                            <th>Latest Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($subData as $key=>$value)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->message}}</td>
                                <td>
                                    <a href="{{route('emailSubscriber').'/'.$value->id}}" class="btn btn-primary btn-xs"><i class="fa fa-envelope"></i>Send Message</a>
                                    <a href="{{route('deleteSubscriber').'/'.$value->id}}" class="btn btn-warning btn-xs" onclick="return(confirm('Are you sure you want to delete subscriber?'))"><i class="fa fa-trash"></i>Delete Subscriber</a>
                                </td>
                            </tr>
                            @empty
                            <tr><a href="#" class="btn btn-info ">There are no subscriber</a>
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