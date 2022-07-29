<!DOCTYPE html>
<html lang="zxx">
<!-- Head Page -->
@include('website.partials.head')

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
@include('website.partials.humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
@include('website.partials.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
@include('website.partials.section')
    <!-- Hero Section End -->
    @if ( Route::currentRouteName() != 'website.index')
    <!-- Breadcrumb Section Begin -->
@include('website.partials.breadcrumb')
    <!-- Breadcrumb Section End -->
    @endif

@yield('content')

    <!-- Footer Section Begin -->
@include('website.partials.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
@include('website.partials.jsfooter')

</body>

</html>