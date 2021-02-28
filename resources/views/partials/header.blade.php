<!--
    Additional Classes:
        .nk-header-opaque
-->
<header class="nk-header nk-header-opaque">

    @include('partials.background')
    <div style="position: absolute; top: 0">


        <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
            <div class="container">
                <div class="nk-nav-table">

                    <a href="index.html" class="nk-nav-logo">
                        <img src={{ asset('system/logo_header_site.png') }} alt="Emeral"
                            style="width: 150px; height: 40px;">
                    </a>

                    <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">


                        <li>
                            <a href={{ route('about_us') }}>
                                درباره ما
                            </a>
                        </li>
                        <li>
                            <a href={{ route('contact_us') }}>
                                ارتباط با ما
                            </a>
                        </li>
                        <li>
                            <a>
                                فروشگاه
                            </a>
                        </li>
                        <li class=" nk-drop-item">
                            <a href="store.html">
                                آموزش
                            </a>
                            <ul class="dropdown">
                                <li>
                                    <a href={{ route('categoryPageView', ['category_id' => 1, 'page_number' => 1]) }}>
                                        Dota 2
                                    </a>
                                </li>
                                <li>
                                    <a href={{ route('categoryPageView', ['category_id' => 2, 'page_number' => 1]) }}>
                                        World of Warcraft
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href={{ route('indexPageView') }}>
                                خانه
                            </a>
                        </li>
                    </ul>
                    <ul class="nk-nav nk-nav-right nk-nav-icons">

                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- END: Navbar -->
    </div>
</header>



<!--
        START: Navbar Mobile

        Additional Classes:
            .nk-navbar-left-side
            .nk-navbar-right-side
            .nk-navbar-lg
            .nk-navbar-overlay-content
    -->
<div style="position: absolute; top: 0">
    <div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
        <div class="nano">
            <div class="nano-content">
                <a href="index.html" class="nk-nav-logo">
                    <img src={{ asset('system/logo_header_site.png') }} alt="Emeral" width="120">
                </a>
                <div class="nk-navbar-mobile-content">
                    <ul class="nk-nav">
                        <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Navbar Mobile -->
