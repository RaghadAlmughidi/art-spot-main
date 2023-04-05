@extends('header')
<!-- header -->
<header class="primary_header flex">
    <nav class="navbar flex">
        <div class="logo">
            <img src="./artSpot-img/logo.png" alt="art spot">
        </div>
        <div class="title">
            <h1 class="header_heading">Gallery</h1>
        </div>
        <a href="/" class="btn">
            <span class="circle">
                <span class="arrow"></span>
                <span class="text">Back</span>
            </span>
        </a>
    </nav>

</header>

<body>
    <section class="gallery" style="z-index: 1;">
        <div class=" gallery_content flex">
            <div class="gallery_img">
                <img src="./artSpot-img/gallery-banner.png" alt="">
            </div>
            <div class="gallery_content-text">
                <h1>your master pace is here</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum dolor, doloremque impedit commodi,
                    saepe tempora labore iure natus rerum facere nam. Enim fugit, assumenda quo odit reiciendis minima
                    quod minus?</p>
            </div>
        </div>

    </section>
    <div class="view flex extra-f2" style="z-index: 2;">
        <p>view</p>
        <button class="view-btn "><i class="ri-layout-grid-fill fill-two"></i></button>
        <button class="view-btn extra-f"><i class="ri-grid-fill full-lay"></i></button>
    </div>

    <section class="container gallery-cards">
        @foreach ($products as $product)
            <div class="card" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                <a href="art/{{ $product->id }}">
                    <div class="card-img">
                        <img src="{{ asset('product_img/') . '/' . $product->product_image }}" alt="">
                    </div>
                    <div class="card-content flex">
                        <div class="card-text">
                            <p>{{ $product->product_name }}</p>
                            <p>by : {{ $product->artist_name }}</p>
                        </div>
                        <div class="card-price flex">
                           
                            <form action="{{ url('add-to-cart',$product->id) }}" method="post">
                                @csrf
                            {{-- <input class="price-text" type="submit" > --}}
                            <button type="submit"class="price-btn ">{{ $product->product_price }}$</button>
                            <i class="ri-shopping-cart-2-fill"></i>
                        </form>
            
                        </div>
                    </div>
                </a>
            </div>
        @endforeach







    </section>



    <div class="container circle1">
        <div class="circle2">
            <a href="{{url ('cart')}}">
                <div class="cart_circle">
                    <i class="ri-shopping-basket-2-line cart_size"></i>
                    <div class="num">
                        <div class="num_circle">
                            <p>{{$count}}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

{{-- @guest
    <div class="container circle1">
        <div class="circle2">
            <a href="gallery">
            <div class="cart_circle">
                <i class="ri-shopping-basket-2-line cart_size"></i>
                <div class="num">
                    <div class="num_circle">
                        <p>0</p>
                    </div>
                </div>
            </div>
        </a>
        </div>
    </div>
    @else
    @if (Route::has('login'))
        @auth
        
        <div class="container circle1">
        <div class="circle2">
        <a href="{{ url('cart')}}">
        <div class="cart_circle">
            <i class="ri-shopping-basket-2-line cart_size"></i>
            <div class="num">
                <div class="num_circle">
                    <p>{{$count}}</p>
                </div>
            </div>
        </div>
        </a>
        </div>
        </div>
        @endauth
    
    @endif
@endguest --}}


    <img src="./artSpot-img/eclips1.png" alt="" class="ec-1" style="z-index: -1;">
    <img src="./artSpot-img/eclips2.png" alt="" class="ec-2" style="z-index: -1; top:20rem ;">


    <!-- initialize AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="main.js"></script>
</body>
@extends('footer')
