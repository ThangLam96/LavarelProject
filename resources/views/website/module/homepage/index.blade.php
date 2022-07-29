@extends('website.master')
@section('content')
    <!-- Categories Section Begin -->
@include('website.partials.categories')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
@include('website.partials.feature')
    <!-- Featured Section End -->

    <!-- Banner Begin -->
@include('website.partials.banner')
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
@include('website.partials.product')
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
@include('website.partials.blog')
    <!-- Blog Section End -->
@endsection