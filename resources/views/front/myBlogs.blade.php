@extends('front.layout')

@section('title')
    My Blogs
@endsection

@section('myBlogs-active')
    active
@endsection

@section('content')
    <x-hero-section-component pageTitle="Blog" bannerTitle="My Blogs"></x-hero-section-component>

    <x-blog-component :blogs="$blogs" ></x-blog-component>


@endsection