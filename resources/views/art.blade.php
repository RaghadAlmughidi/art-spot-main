@extends('header')
<!-- header -->
<header class="primary_header flex">
  <nav class=" navbar flex">
    <div class="logo">
      <img src="./artSpot-img/logo.png" alt="art spot" />
    </div>
    <div class="title">
      <h1 class="header_heading">Art</h1>
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
  <section class="art" style="z-index: 1">
    <div class="art_content  flex" >
      <div class="art_img" data-aos="zoom-in-right" data-aos-duration="2000">
        <img src="{{ asset('product_img/')."/".$products->product_image }}" alt="" />
      </div>
      <div class="art_content-text"  data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <h6>{{ $products->product_width }}cm X {{ $products->product_hight }}cm</h6>
        <h1>{{ $products->product_name }}</h1>
        <p>
          {{ $products->product_desc }}
        </p>
        <div class="artist_details flex">
          <div class="artist_img flex">
            <img src="{{ asset('artist_img/')."/".$products->artist_image }}" alt="" /> 
             <h3>{{ $products->artist_name }}</h3>
          </div>
          
          <div class="card-price card-price2 price_art">
            <a href="#" class="price-text price-text2">{{ $products->product_price }}$</a>
            <i class="ri-shopping-cart-2-fill"></i>
          </div>
        </div>
        <img src="./artSpot-img/eclips2.png" alt="" class="ec-2" style="z-index: -1; top:5rem ;">
      </div>
    </div>

  </section>

  <!-- initialize AOS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="main.js"></script>
</body>

</html>