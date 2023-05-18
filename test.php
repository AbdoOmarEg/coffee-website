<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>complete responsive coffee shop website design tutorial</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="test.css">
   <link rel="stylesheet" href="styles.scss">

</head>

<body>
   <!-- header section starts     -->

   <header class="header fixed-top" >

      <div class="container">

         <div class="row align-items-center">

            <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

            <nav class="nav">
               <a href="#home">homez</a>
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
      <!-- <?php 

      //$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      //$row_count = mysqli_num_rows($select_rows);

      //?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>
               <a href="today_matches">today's matches</a>
               <!-- <a href="shopping cart/products.php">menu</a> -->
               <!-- <a href="shopping cart/admin.php">Add menu</a> -->
            </nav>

            <div class="icons">
               <div id="search-btn" class="fas fa-search"></div>
               <div id="cart-btn" class="fas fa-shopping-cart"></div>
               <a href="login_form.php" <div id="login-btn" class="fas fa-user"></div>></a>
               <div id="menu-btn" class="fas fa-bars"></div>
            </div>

            <div class="search-form">
               <input type="search" id="search-box" placeholder="...شاي بحث ">
               <!-- <label for="searchbox" class="fas fa-search"></label> -->
               <!-- 4klha w74 -->
            </div>

            <div class="cart-items-container">
               <div class="cart-item">
                  <span class="fas fa-times"></span>
                  <img src="images/tea_red (1).png" alt="">
                  <div class="content">
                     <h3>cart item 01</h3>
                     <div class="price">$15.99</div>
                  </div>
               </div>

               <div class="cart-item">
                  <span class="fas fa-times"></span>
                  <img src="images/tea_red (2).png" alt="">
                  <div class="content">
                     <h3>cart item 02</h3>
                     <div class="price">$15.99</div>
                  </div>
               </div>

               <div class="cart-item">
                  <span class="fas fa-times"></span>
                  <img src="images/tea_red (3).png" alt="">
                  <div class="content">
                     <h3>cart item 03</h3>
                     <div class="price">$15.99</div>
                  </div>
               </div>

               <a href="#" class="btn">خلصلي الحساب عشان بقفل</a>
            </div>



         </div>

      </div>

   </header>

<!-- <div class="message"> -->
<!--       <h2>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h2> -->
<!--    <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> -->
<!-- </div> -->


   <!-- login form starts -->

   <div class="login-form">

      <form action="" method="POST">
         <div id="close-login-form" class="fas fa-times"></div>
         <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
         <h3>let's start a new great day</h3>
         <input type="email" name="email" placeholder="enter your email" id="" class="box">
         <input type="password" name="password" placeholder="enter your password" id="" class="box">
         <!-- <div class="flex"> -->
         <!--    <input type="checkbox" name="" id="remember-me"> -->
         <!--    <label for="remember-me">remember me</label> -->
         <!--    <a href="#">forgot password?</a> -->
         <!-- </div> -->
         <input type="submit" name="submit" value="login now" class="link-btn">
         <p class="account">don't have an account? <a href="#">create one!</a></p>
      </form>

   </div>

   <!-- login form ends -->

   <!-- header section ends    -->

   <!-- home section starts  -->

   <section class="home" id="home">

      <div class="container">

         <div class="row align-items-center text-center text-md-left min-vh-100">
            <div class="col-md-6">
               <span>coffee house</span>
               <h3>start your day with our coffee</h3>
               <a href="#" class="link-btn">get started</a>
            </div>
         </div>

      </div>

   </section>

   <!-- home section ends -->

   <!-- about section starts  -->

   <section class="about" id="about">

      <div class="container">

         <div class="row align-items-center">
            <div class="col-md-6">
               <img src="images/about-img-1.png" class="w-100" alt="">
            </div>
            <div class="col-md-6">
               <span>why choose us?</span>
               <h3 class="title">the best coffee maker in the town</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis dolorem laborum itaque. Perspiciatis in
                  veniam illum deserunt, quos animi maiores nisi officiis amet accusantium soluta a, excepturi vero
                  obcaecati nobis.</p>
               <a href="#" class="link-btn">read more</a>
               <div class="icons-container">
                  <div class="icons">
                     <i class="fas fa-coffee"></i>
                     <h3>best coffee</h3>
                  </div>
                  <div class="icons">
                     <i class="fas fa-shipping-fast"></i>
                     <h3>free delivery</h3>
                  </div>
                  <div class="icons">
                     <i class="fas fa-headset"></i>
                     <h3>24/7 service</h3>
                  </div>
               </div>
            </div>
         </div>

      </div>

   </section>

   <!-- about section ends -->

   <script src="js/script.js"></script>
</body>

</html>

