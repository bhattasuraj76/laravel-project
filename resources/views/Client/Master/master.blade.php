@include('Client.Layouts.header')
@include('Client.Layouts.main_header')
@include('Client.Layouts.main_footer')
@include('Client.Layouts.footer')
@yield('header')
@yield('main_header')

@yield('content')

@yield('main_footer')
@yield('footer')