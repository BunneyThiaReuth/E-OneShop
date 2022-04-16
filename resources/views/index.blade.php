    <?php $page = '/';?>
    @extends('layouts.default')
    @section('content')
        @include('includes.heroSection')
        <!-- Categories Section Begin -->
        @include('includes.CategorySection')
        <!-- Categories Section End -->
        
        <!-- Blog Section Begin -->
        @include('includes.bloge')
        <!-- Blog Section End -->
    @endsection