@include('partials.header')
<body>
    @include('partials.desktopMenu')
    @yield('slider')
    <!-- ALL CONTENT  -->
    @yield('content')
    @include('partials.footer')
    @include('partials.js')
    @yield('js_custom')
    @include('errors.errors')
    <!--! FOOTER -->
</body>
</html>