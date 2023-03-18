@extends('header')
<!-- header -->
<header class=" primary_header flex">
  <nav class=" navbar flex">
    <div class="logo">
      <img src="./artSpot-img/logo.png" alt="art spot">
    </div>
    <div class="title">
      <h1 class="header_heading">Admin</h1>
    </div>
    <a href="home.html" class="btn">
      <span class="circle">
        <span class="arrow"></span>
        <span class="text">Back</span>
      </span>
    </a>
  </nav>

</header>

<body class="admin_bg">
  <h1 class="woning-admin">Please open thes page on large devices</h1>
  <section>

    <div class="container admin_forms">


      <div class="wrapper_left">
        <ul>
          <li data-li="product" class="active">
            Create product
          </li>
          <li data-li="orders">
            Orders
          </li>
          <li data-li="account">
            Account
          </li>

        </ul>
      </div>
      <div class="wrapper_right">

        <div class="container">
          <div class="item product">
            <div class="item_info">

              <h3>Product info</h3>
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="product_form">
                @csrf
                <div class="flex product">
                  <label for="product_name"></label>
                  <input type="text" id="product_name" name="product_name" placeholder="product name">
                  {{-- add a required message --}}
                  @error('product_name')
                      <p class="required_message">{{ $message }}</p>
                  @enderror
                  <textarea name="product_desc" id="product_desc" cols="30" rows="10"
                    placeholder="product description"></textarea>
                </div>
                <div class="flex product_size">
                  <p>Product size :</p>
                  <input type="number" min="0" id="product_width" name="product_width" placeholder="width">X
                 
                  <input type="number" min="0" id="product_hight" name="product_hight" placeholder="hight">
                  
                </div>
                <div class="flex product_price">
                  <p>Product price :</p>
                  <input type="number" min="0" id="product_price" name="product_price" placeholder="price">$
                  
                </div>
                <div class="flex">
                  <p>Product image: <small>!size shoulde be 200px x 200px</small></p> <input type="file" name="product_image">
                </div>
                <div class="artist_info">
                  <h3>Artist info</h3>
  
                  <div class="flex artist">
                    <label for="artist_name"></label>
                    <input type="text" id="artist_name" name="artist_name" placeholder="artist name">
                    <p>Artist image: <small>!size shoulde be 200px x 200px</small></p> <input type="file" name="artist_image">
                  </div>
                </div>
                <div class="create_btn-div">
                  <button class="create_btn" type="submit">create product</button>
                </div>
              </form>
          </div>
          <div class="item orders" style="display: none;">
            <div class="item_info">

              <h3>Orders info</h3>
            </div>
            <div class="status">
              <div class="cards_status flex">
                <div class="card_status Completed">
                  <p>Complated</p>
                  <p class="count">200</p>
                </div>
                <div class="card_status not_completed">
                  <p>Not Complated</p>
                  <p class="count">200</p>
                </div>
                <div class="card_status in_progress">
                  <p>In Progress</p>
                  <p class="count">200</p>
                </div>
              </div>

              <form action="" method="post">
                <table class="status_table">
                  <h3>Orders info</h3>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Order NO</th>

                    <th>Status</th>
                  </tr>

                  <tr>
                    <td>22</td>
                    <td>solid women</td>
                    <td>33233</td>
                    <td>
                      <label for="complated">
                        <input type="radio" name="statusValue" id="notCompleted" class="complete">
                      </label>
                      <label for="notComplated">
                        <input type="radio" name="statusValue" id="notComplated" class="not-complated">
                      </label>
                      <label for="progress">
                        <input type="radio" name="statusValue" id="progress" class="progress">
                      </label>
                    </td>

                  </tr>
                  <tr>
                    <td>22</td>
                    <td>solid women</td>
                    <td>33233</td>
                    <td>
                      <label for="complated">
                        <input type="radio" name="statusValue" id="notCompleted" class="complete">
                      </label>
                      <label for="notComplated">
                        <input type="radio" name="statusValue" id="notComplated" class="not-complated">
                      </label>
                      <label for="progress">
                        <input type="radio" name="statusValue" id="progress" class="progress">
                      </label>
                    </td>

                  </tr>


                </table>
                <div class="create_btn-div">
                  <button class="create_btn" type="submit">update status</button>
                </div>
              </form>

            </div>


          </div>
          <div class="item account" style="display: none;">
            <div class="item_info">

              <h3>Account info</h3>
            </div>
            <form action="" method="post">
              <label for="password"></label>
              <input type="password" id="password" name="password" placeholder="New password">
              <label for="rePassword"></label>
              <input type="password" id="rePassword" name="rePassword" placeholder="confirm new password">
              <div class="create_btn-div">
                <button class="create_btn" type="submit">update password</button>
              </div>
              <div class="logout_btn-div">
                <button class="logout create_btn" type="submit">Log out</button>
              </div>
            </form>
          </div>

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
  <script src="admin.js"></script>
</body>

</html>