@php
    $category = App\Models\Category::where('is_deleted', '<>', 1)->get();
    $subcategory = App\Models\Subcategory::where('is_deleted', '<>', 1)->get();
    $sub_subcategory = App\Models\Subsubcategory::where('is_deleted', '<>', 1)->get();
@endphp


<style>
    .list:hover {
        background-color: red !important;
    }
</style>



<header id="gen-header" class="gen-header-style-1 gen-has-sticky">
    <div class="gen-bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('frontend.home') }}">
                            <img class="img-fluid logo d-none d-sm-block" src="images/sell-logo.png"
                                style="width: 150px;
                    height: 68px;" alt="streamlab-image">

                            <img class="img-fluid logo d-block d-sm-none" src="images/sell-logo.png"
                                alt="streamlab-image">
                        </a>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent"
                            style="padding-left: 100px !important;">
                            <center style="float:center !important;">
                                <div id="gen-menu-contain" class="gen-menu-contain ">
                                    <ul id="gen-main-menu" class="navbar-nav ml-auto">
                                        <li>
                                            <a href="{{ route('frontend.home') }}" aria-current="page">Home</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('frontend.allcategorys') }}"
                                                aria-current="page">Categories</a>
                                        </li>

                                        {{-- <li class="menu-item">
                                        <a href="#">Categories</a>
                                        <i class="fa fa-chevron-down gen-submenu-icon"></i>

                                        <ul class="sub-menu">

                                            @foreach ($category as $item)
                                                <li class="menu-item menu-item-has-children">

                                                    <a href="{{ route('frontend.allsubcategorys', ['id' => $item['id']]) }}"
                                                        pr-3> {{ $item->category_name }}</a>

                                                    <i class="fa fa-chevron-down gen-submenu-icon"></i>

                                                </li>
                                            @endforeach
                                        </ul>
                                    </li> --}}

                                        <li class="">
                                            <a href="{{ route('frontend.about') }}" aria-current="page">About us</a>
                                        </li>

                                        <li class="">
                                            <a href="{{ route('frontend.contact') }}" aria-current="page">Contact us</a>
                                        </li>
                                        @auth
                                            @php
                                                $user = Auth::user();
                                                $user_type = $user->user_type;
                                            @endphp


                                            @if ($user_type == 1)
                                                <li class="display:inline-block d-none d-sm-block">
                                                    <a class="display:inline-block;"
                                                        href="{{ route('frontend.product.productdivision') }}"
                                                        aria-current="page">+ SELL</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="display:inline-block d-none d-sm-block">
                                                <a class="display:inline-block;" href="{{ route('register') }}"
                                                    aria-current="page">+ SELL</a>
                                            </li>

                                        @endauth

                                    </ul>
                                </div>
                            </center>
                        </div>
    @auth
        @php
            $subscription = App\Models\UserSubscription::where('user_id', Auth::user()->id)->exists();
        @endphp
    @endauth

                        <div class="gen-header-info-box">
                            @auth

                                <div class="dropdown"
                                    style=" background-color:none !important; border-color: none !important;">
                                    <a class=" dropdown-toggle pr-3" style="color:white;" type="button"
                                        data-toggle="dropdown" style="padding-left:17px;">{{ Auth::user()->name }}
                                        <span></span></a>

                                    <ul class="dropdown-menu" style="background-color:black;">

                                        <li class="list">
                                            <a href="{{ route('frontend.profile.profile') }}">
                                                <span style="color:white;padding-left:5px;"> <i
                                                        class="fa fa-user pl-2 pr-2"></i>My Profile</span>
                                            </a>
                                        </li>

                                        @if (Auth::user()->user_type == 1)
                                            <li class="list">
                                                <a href="{{ route('frontend.myadds') }}">
                                                    <span style="color:white;padding-left:5px;"> <i
                                                            class="fa fa-image pl-2 pr-2"></i>My Ads</span>
                                                </a>
                                            </li>
                                        @endif


                                        @if (Auth::user()->user_type == 1 && $subscription == 1)
                                            <li class="list">
                                                <a href="{{ route('frontend.user_subscriptions') }}">
                                                    <span style="color:white;padding-left:5px;"> <i
                                                            class="fa fa-bell pl-2 pr-2"></i>Subscriptions</span>
                                                </a>
                                            </li>
                                        @endif

                                        <li class="list">
                                            <a href="{{ route('logout') }}">
                                                <span style="color:white;padding-left:5px;"><i
                                                        class="fas fa-sign-in-alt pl-2 pr-2"></i>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                    style="color:white;padding-left:17px; font-family: var(--tp-ff-body);">LOGIN</a>

                            @endauth


                            <!-- <div class="gen-account-holder pl-4">
                        <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                        <div class="gen-account-menu">
                            <ul class="gen-account-menu">

                                <li>
                                    <a href="log-in.html"><i class="fas fa-sign-in-alt"></i>
                                        login </a>
                                </li>
                                <li>
                                    <a href="register.html"><i class="fa fa-user"></i>
                                        Register </a>
                                </li>
                                <li>
                                    <a href="library.html">
                                        <i class="fa fa-indent"></i>
                                        Library </a>
                                </li>
                                <li>
                                    <a href="library.html"><i class="fa fa-list"></i>
                                        Movie Playlist </a>
                                </li>
                                <li>
                                    <a href="library.html"><i class="fa fa-list"></i>
                                        Tv Show Playlist </a>
                                </li>
                                <li>
                                    <a href="library.html"><i class="fa fa-list"></i>
                                        Video Playlist </a>
                                </li>
                                <li>
                                    <a href="upload-video.html"> <i class="fa fa-upload"></i>
                                        Upload Video </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->

                            <!-- {{-- <div class="gen-account-holder">

                            @if (Route::has('login'))
                                <div>
                                    @auth
                                        <a href="{{ route('logout') }}"><span style="color:white;">Logout ({{ Auth::user()->name }})</span></a>

                                    @else

                                        <a href="{{ route('login') }}"><span style="color:white;"> LOGIN </span></a>

                                    @endauth
                                </div>
                            @endif

                        </div> --}} -->


                            {{-- @auth
                        @php

                            $user = Auth::user();

                            $user_type = $user->user_type;

                            if ($user_type == 1) {
                                @endphp


                                <div class="gen-btn-container">
                            <a href="{{ route('frontend.subscriptonplan') }}" class="gen-button">
                                <div class="gen-button-block">
                                    <span class="gen-button-line-left"></span>
                                    <span class="gen-button-text">Subscribe</span>
                                </div>
                            </a>
                        </div>

                        @php
                            } elseif ($user_type == 2) {
                            } else {
                            }

                        @endphp
                    @endauth --}}



                            <!-- {{-- <div class="gen-account-holder">
                            <a href="javascript:void(0)" id="gen-user-btn">

                                Login
                            </a>
                            <div class="gen-account-menu">
                                <ul class="gen-account-menu">

                                    @if (Route::has('login'))
                                        <div>
                                            @auth

                                            <li>
                                                <a href="{{ route('logout') }}"><i
                                                    class="fas fa-sign-in-alt"></i>Buyer logout</a>
                                            </li> --}}

                        {{-- <li>
                                                <a href="{{ route('frontend.sellerlogout') }}"><i
                                                    class="fas fa-sign-in-alt"></i>Seller logout</a>
                                            </li> --}}

                        {{-- @else

                                            <li>
                                                <a href="{{ route('login') }}"><i
                                                    class="fas fa-sign-in-alt"></i>
                                                  Buyer </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('frontend.loginview') }}"><i
                                                    class="fas fa-sign-in-alt"></i>
                                                  Seller Login </a>
                                            </li>

                                            @endauth
                                        </div>
                                    @endif
                                </ul>
                            </div>
                        </div> --}} -->



                            <!-- {{-- <div class="gen-account-holder">
                            <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                            <div class="gen-account-menu">
                                <ul class="gen-account-menu">

                                    @if (Route::has('frontend.loginview'))
                                        <div>
                                            @auth

                                            <li>
                                                <a href="{{ route('frontend.sellerlogout') }}"><i
                                                    class="fas fa-sign-in-alt"></i>Logout</a>
                                            </li>
                                            @else

                                            <li>
                                                <a href="{{ route('frontend.loginview') }}"><i
                                                    class="fas fa-sign-in-alt"></i>
                                                    Login </a>
                                            </li>

                                            @endauth
                                        </div>
                                    @endif
                                </ul>
                            </div>
                        </div> --}} -->



                            <!-- {{-- @auth

                            <div class="dropdown"
                                style=" background-color:none !important;border-color: none !important;">
                                <button class=" dropdown-toggle" type="button" data-toggle="dropdown"
                                    style="color:black;padding-left:17px;">{{ Auth::user()->name }}
                                    <span></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">My Profile</a></li>
                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                style="color:white;padding-left:17px; font-family: var(--tp-ff-body);">Guest</a>

                        @endauth --}} -->

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>
