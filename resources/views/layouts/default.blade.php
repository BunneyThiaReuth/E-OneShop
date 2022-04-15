<!DOCTYPE html>
<html lang="zxx">
<!-- head -->
@include('includes.head')
<body>
    <!--Page Lorder --> 
    @include('includes.pageLorder')

    <!-- Header Section Begin -->
    @include('includes.header')
    <!-- Header Section End -->

    
    @yield('content')

    <!-- Footer Section Begin -->
    @include('includes.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>