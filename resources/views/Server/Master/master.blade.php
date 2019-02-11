@include('Server.Layouts.header')
@include('Server.Layouts.footer')
@include('Server.Layouts.top_header')
@include('Server.Layouts.main_header')
@include('Server.Layouts.main_footer')

@yield('header')
@yield('main_header')
@yield('top_header')

@yield('content')
@yield('main_footer')

@yield('footer')
