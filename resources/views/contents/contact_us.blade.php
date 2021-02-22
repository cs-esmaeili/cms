@extends('layout.main')
@section('content')
    <div style="text-align: center">
        <p>شماره تماس : 09137378601 (اسماعیلی)</p>
    </div>
    <div>
        <div class="nk-widget nk-widget-highlighted">
            <h4 class="nk-widget-title" style="text-align: right"><span
                    style="padding-left: 23px; padding-right: 0px;"><span class="text-main-1"> ما </span>اجتماعی
                    هستیم</span></h4>
            <div class="nk-widget-content">

                <ul class="nk-social-links-3 nk-social-links-cols-4">
                    <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a>
                    </li>
                    <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a>
                    </li>
                    <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a>
                    </li>
                    <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                    <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a>
                    </li>
                    <li><a class="nk-social-twitter" href="https://twitter.com/nkdevv" target="_blank"><span
                                class="fab fa-twitter"></span></a></li>
                    <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a>
                    </li>
                    <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                </ul>
            </div>
        </div>
        @include('components.contact_us')
    </div>
@endsection
