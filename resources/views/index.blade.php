    @extends('layouts.default')
    @section('content')
        <!-- Categories Section Begin -->
        @include('includes.CategorySection')
        <!-- Categories Section End -->

        <!-- Featured Section Begin -->
        @include('includes.FeaturdSection')
    
        <!-- Featured Section End -->

        <!-- Banner Begin -->
        @include('includes.banner')
        <!-- Banner End -->

        <!-- Latest Product Section Begin -->
        @include('includes.lastPro')
        <!-- Latest Product Section End -->

        <!-- Blog Section Begin -->
        @include('includes.bloge')
        <!-- Blog Section End -->
    @endsection