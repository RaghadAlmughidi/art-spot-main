@extends("header")

<body>
    <header class=" primary_header flex">

       
        <nav class="navbar">
             <div class="logo">
            <img src="./artSpot-img/logo.png" alt="art spot">
        </div>
            <!-- nav list -->
       
            <ul class="nav-menu">
                <li class="item">
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="login-btn font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                </li>
                <li class="item">
                    <a class="item-link" href="/">Home</a>
                </li>
                <li class="item">
                    <a class="item-link" href="popular.html">Popular</a>
                </li>
                <li class="item">
                    <a class="item-link" href="gallery">Gallery</a>
                </li>
             
                <li class="item">
                    <a class="item-link" href="cart">cart</a>
                </li>
                <li class="item">
                    <a class="item-link" href="admin">Account</a>
                </li>

             

            </ul>

        <div class="humbergur">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>


        </nav>
         

    </header>

    <section>
        <div class="container home flex">

            <div class="home__content " data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                <div class="home__content-text">
                    <h1>Era of digital art</h1>
                    <p>" Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis eius unde deserunt itaque cum doloribus eveniet dignissimos rerum suscipit sunt. Fuga temporibus placeat odio esse velit, corporis ut magni natus? Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
                </div>


                <a href="gallery.html" class="home-btn">Explore more</a>

            </div>
            <div class="home__img"  data-aos="zoom-in" data-aos-duration="2000">
                <img src="./artSpot-img/home-img.png" alt="">
            </div>

        </div>
        <img src="./artSpot-img/var-line.png" alt="" class="line-vartical">

    </section>
    <img src="./artSpot-img/eclips1.png" alt="" class="ec-1">
    <img src="./artSpot-img/eclips2.png" alt="" class="ec-2">


    <!-- <hr> -->
   <!-- initialize AOS -->
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
       AOS.init();
   </script>
<script type="text/javascript" src="{{ URL::asset('js/header.js') }}"></script>
</body>
@extends('footer')