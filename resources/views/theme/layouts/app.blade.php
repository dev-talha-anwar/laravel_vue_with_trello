<!DOCTYPE html>
<html>
    <head>
        @include("theme.includes.header")
        <title>
            @yield('title')
        </title>
        @include("theme.includes.headcss")
    </head>
    <body>
        <div id="app">
            @include("theme.includes.headercontent")
            @include("theme.includes.navbar")
            @yield('content')
        </div>
        @include('theme.includes.footer')
        @include('theme.includes.footerjs')
    </body>
</html>


