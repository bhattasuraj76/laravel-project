@section('main_header')
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{route('home')}}" class="site_title"><i class="fa fa-code"></i> &ensp;<span style="font-family:Helvetica Neue;">Blogger</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{url('public/images/'.Auth::user()->image)}}" alt="..."
                             class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2>{{ucfirst(Auth::user()->name)}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>

                                <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                                    @if(Auth::user()->user_type === 'admin')
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('users')}}">View Users &emsp;<i
                                                        class="fa fa-users"></i></a></li>
                                        <li><a href="{{route('addUser')}}">Add User &emsp;<i class="fa fa-user"></i></a>
                                        </li>

                                    </ul>
                                    @endif
                                </li>

                            <li><a><i class="fa fa-file"></i> Category <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('category')}}">View Category &emsp;<i
                                                        class="fa fa-bolt"></i></a></li>
                                        <li><a href="{{route('addCategory')}}">Add Category &emsp;<i class="fa fa-plus"></i></a>
                                        </li>

                                    </ul>

                            </li>
                            <li><a><i class="fa fa-list"></i> Menu<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('menus')}}">View Menu &emsp;<i
                                                        class="fa fa-users"></i></a></li>
                                        <li><a href="{{route('addMenu')}}">Add Menu &emsp;<i class="fa fa-plus"></i></a>
                                        </li>

                                    </ul>

                            </li>
                            <li><a><i class="fa fa-folder"></i> Post<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('posts')}}">View Posts &emsp;<i
                                                        class="fa fa-users"></i></a></li>
                                        <li><a href="{{route('addPost')}}">Add Post &emsp;<i class="fa fa-plus"></i></a>
                                        </li>

                                    </ul>

                            </li>
                            <li><a><i class="fa fa-child"></i> Subscriber<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('subscribers')}}">View Subscribers &emsp;<i
                                                        class="fa fa-users"></i></a></li>
                                    </ul>

                            </li>


                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

@stop