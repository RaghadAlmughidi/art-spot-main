@extends('header')
<!-- header -->
<header class="primary_header flex">
  <nav class=" navbar flex">
    <div class="logo">
      <img src="./artSpot-img/logo.png" alt="art spot" />
    </div>
    <div class="title">
      <h1 class="header_heading">Cart</h1>
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
  <section>
    <div class=" cart container flex">
      <div class="shopping__cart">
  <h3>May bag</h3>

        <div class="shopping__cart-cards">
        
          <hr>
          @foreach ($cart as $carts)
              
          <div class="shopping__cart-card flex">
            <div class="cart--img">
              <img src="{{ asset('product_img/') . '/' . $carts->product_image }}" alt="">
            </div>
            <div class="cart--content">
              <p class="art__name">{{ $carts->product_name }}</p>
              <p class="artist__name">By | {{ $carts->artist_name }}</p>
              <div class="inc__dec--btn">
                <span class="minus">-</span>
                <span class="num">{{ $carts->quantity }}</span>
                <span class="plus">+</span>
              </div>
              <button class="close-card"> <i class="ri-close-line "></i></button>
            </div>
          </div>

          @endforeach


          {{-- <div class="shopping__cart-card flex">
            <div class="cart--img">
              <img src="./artSpot-img/Rectangle 44.png" alt="">
            </div>
            <div class="cart--content">
              <p class="art__name">solid women</p>
              <p class="artist__name">By | erik</p>
              <div class="inc__dec--btn">
                <span class="minus">-</span>
                <span class="num">1</span>
                <span class="plus">+</span>
              </div>
              <button class="close-card"> <i class="ri-close-line "></i></button>

            </div>
          </div> --}}


        </div>



      </div>

      <div class="payment">
        <div class="payment__form">
          <form action="">
            <div class="shopping__info m-b">
              <p>shopping info :</p>
              <div class="name flex ">
                <label for="fname"></label>
                <input type="text" id="fname" name="fname" placeholder="First name" class="m-r">
                <label for="fname"></label>
                <input type="text" id="fname" name="lname" placeholder="Last name">
              </div>
              <label for="email"></label>
              <input type="email" id="email" name="email" placeholder="E-mail" class="full-width">
              <label for="phoneNumber"></label>
              <input type="number" id="phoneNumber" name="phoneNumber" placeholder="Phone number" class="full-width">

            </div>
            <div class="shopping__address m-b">
              <p>address info :</p>
              <div class="address flex full-width">
             
                <select class="m-r">
                  <option value="Saudi Arabia">Saudi Arabia</option>


                  <option value="Bahrain">Bahrain</option>

                  <option value="Egypt">Egypt</option>

                  <option value="Iraq">Iraq</option>

                  <option value="Jordan">Jordan</option>


                  <option value="Morocco">Morocco</option>

                  <option value="Oman">Oman</option>

                  <option value="Qatar">Qatar</option>


                  <option value="Sudan">Sudan</option>



                  <option value="Syria">Syrian Arab Republic</option>

                  <option value="Tunisia">Tunisia</option>

                  <option value="United Arab Emirates">United Arab Emirates</option>

                  <option value="Yemen">Yemen</option>
                  >
                </select>
                <label for="city"></label>
                <input type="text" id="city" name="city" placeholder="City">
              </div>
              <label for="streetDes"></label>
              <input type="text" id="streetDes" name="streetDes" placeholder="street/street1" class="">
              <label for="postCode"></label>
              <input type="text" id="postCode" name="postCode" placeholder="Post code" >
            </div>
            <div class="shopping__payment  m-b">
              <p>Payment type :</p>
              <div class="pay-radio flex">
                <div class="flex"  style="align-items: center;">
              <input type="radio" id="payMethode" name="payMethode">
              <label for="payMethode"><i class="ri-visa-line pay-icon"></i></label>
            </div>
            <div class="flex" style="align-items: center;" >
              <input type="radio" id="payMethode" name="payMethode">
              <label for="payMethode"><i class="ri-mastercard-line pay-icon" ></i ></label>
            </div>
            </div>

            </div>
<button class="send__form-pey">CHECKOUT TO PAYMENT</button>
          </form>

        </div>
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