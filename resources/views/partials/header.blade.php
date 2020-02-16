<!-- Header -->
<header id="header">
    <!-- Top Header -->
    <div id="top-header">
        <div class="container">
            <div class="header-links">
                <ul>
                    <li><a href="{{route('about')}}">About us</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                    <li><a href="#">Advertisement</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
                </ul>
            </div>
            <div class="header-social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Top Header -->

    <!-- Center Header -->
    <div id="center-header">
        <div class="container">
            <div class="header-logo">
                <a href="#" class="logo"><img src="./img/logo DJ.png" alt="logo" style="height:90px;width:135px"></a>
                {{--
                <H2>DJ Sajha News</H2> --}}
            </div>
            <div class="header-ads">
                <img class="center-block" src="./img/ad-2.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- /Center Header -->

    <!-- Nav Header -->
    <div id="nav-header">
        <div class="container">
            <nav id="main-nav">
                <div class="nav-logo">
                    <a href="#" class="logo"><img src="./img/logo DJ.png" alt=""></a>
                </div>
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="{{route('home')}}"><i class="fa fa-home" style="font-size:24px"></i></a></li>
                    <li><a href="{{route('politics')}}">Politics</a></li>
                    <li><a href="{{route('sports')}}">Sport</a></li>
                    <li><a href="{{route('lifestyle')}}">Lifestyle</a></li>
                    <li><a href="{{route('interview')}}">Interview</a></li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                    <li><a href="{{route('business')}}">Business</a></li>
                    <li><a href="{{route('international')}}">International</a></li>
                    <li><a href="{{route('health')}}">Health</a></li>
                    <li><a href="{{route('entertainment')}}">Entertainment</a></li>
                </ul>
            </nav>
            <div class="button-nav">
                <button class="search-collapse-btn"><i class="fa fa-search"></i></button>
                <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
                <div class="search-form">
                    <form>
                        <input class="input" type="text" name="search" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Nav Header -->
</header>
<!-- /Header -->