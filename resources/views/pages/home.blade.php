@extends('partials.main')
@section('content')
    @include('components.slider')
    @include('components.most_views_posts')
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-8">
            @include('components.latest_posts')
            @include('components.latest_pictures')
        </div>
        <div class="col-lg-4 nk-sidebar-sticky-parent">
            @include('components.sidebar')
        </div>
    </div>
@endsection
