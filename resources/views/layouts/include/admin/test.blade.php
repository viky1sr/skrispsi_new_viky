<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.include.admin.meta')
    @yield('style')
</head>
<body class="alt-menu sidebar-noneoverflow">
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    @include('layouts.include.admin.nav_bar')
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container sidebar-closed sbar-open" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
        @include('layouts.include.admin.side_bar')
    </div>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            @yield('content')
        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

@include('layouts.include.admin.plugins')
@yield('script')
</body>
</html>
