@extends('partials.main')
@section('content')
    <div style="text-align: center">
        <p>شماره تماس : 09137378601 (اسماعیلی)</p>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            @include('components.contact_us')
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            @include('components.social_links')
        </div>
    </div>
@endsection
