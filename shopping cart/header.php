<header class="headerz">

   <div class="flex">

      <a href="#" class="logo">foodies</a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>



























   <!-- header section starts     -->

   <header class="header fixed-top" >

      <div class="container">

         <div class="row align-items-center">

            <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

            <nav class="nav">
               <a href="#home">home</a>
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

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

