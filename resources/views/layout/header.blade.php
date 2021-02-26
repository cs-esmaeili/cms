<header class="nk-header nk-header-opaque">
    @include('layout.background')
    <div style="position: absolute; top: 0">
        <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide nav_color">
            <div class="container">
                <div class="nk-nav-table">

                    <a style="width: auto" href="index.html" class="nk-nav-logo">
                        <img src={{ asset('system/logo_header_site.png') }} class="img-fluid" alt="Emeral">
                    </a>

                    <ul  style="width: auto"  class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">
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
                            <a>
                                آموزش
                            </a>
                            <ul class="dropdown">
                                <li>
                                <li class=" nk-drop-item">
                                    <a>
                                        Dota 2
                                    </a>
                                    <ul class="dropdown">
                                        <li>
                                            <a>
                                                هیرو ها
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                آیتم ها
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                ترفند ها
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                        </li>
                        <li>
                            <a>
                                World of warcraft
                            </a>
                        </li>
                        <li>
                            <a>
                                PUBG
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
        <div id="nk-nav-mobile"
            class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
            <div class="nano">
                <div class="nano-content">
                    <a href="index.html" class="nk-nav-logo">
                        <img src="assets/images/logo.png" alt="" width="120">
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
</header>
