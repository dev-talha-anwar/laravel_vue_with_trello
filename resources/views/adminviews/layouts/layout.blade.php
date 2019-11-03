<!DOCTYPE html>
<html lang="en">
    <head>
        @include("adminviews.includes.header")
        <title>
            Admin Panel
        </title>
        @include("adminviews.includes.headcss")
        @yield('pagecss')
    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <div id="adminapp">
            @include('adminviews.includes.headercontent')
             <!-- BEGIN CONTAINER -->
            <div class="page-container">
                @include('adminviews.includes.navbar')
                @yield('content')
            </div>
                {{-- @include("adminviews.includes.quicknavbar") --}}
            {{-- @include('adminviews.includes.afterquicknavbar') --}}
        </div>
        @include('adminviews.includes.footer')
        @include('adminviews.includes.footerjs')
        @include('adminviews.includes.sweetalerts')
    </body>
</html>


