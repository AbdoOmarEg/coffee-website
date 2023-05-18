<?php

@include 'config.php';

session_start();
// $error = ""; // Initialize the error message variable
$incorrectCredentials = false; // Flag for incorrect email or password

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:indexz_admin2.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:indexz_user2.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
      $incorrectCredentials = true;
   //    <scriptt>
   // loginForm.classList.add('active');
   //    </script>
      // $error = 'Incorrect email or password!'; // Set the error message
   }

};
?>
<?php

@include 'config.php';
$incorrectpass = false; // Flag for incorrect email or password
$incorrectuser = false; // Flag for incorrect email or password

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $incorrectuser = true; // Flag for incorrect email or password
      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
         $incorrectpass = true; // Flag for incorrect email or password
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:indexz.php');
      }
   }

};


?>

<script>
   window.onload = function() {
      <?php if ($incorrectpass == true || $incorrectuser == true): ?>
         var signupForm = document.querySelector('.signup-form');
         signupForm.classList.add('active');
      <?php endif; ?>
      <?php if ($incorrectCredentials): ?>
         var loginForm = document.querySelector('.login-form');
         loginForm.classList.add('active');
      <?php endif; ?>
   }



</script>



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
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <!-- header section starts     -->

   <header class="header fixed-top">

      <div class="container">

         <div class="row align-items-center">

            <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

            <nav class="nav">
               <a href="#home">home</a>
               <!-- <a href="today_matches">today's matches</a> -->
               <!-- <a href="#about">about</a> -->
               <!-- <a href="#menu">menu</a> -->
               <!-- <a href="#gallery">gallery</a> -->
               <!-- <a href="#reviews">reviews</a> -->
               <!-- <a href="#contact">contact</a> -->
               <!-- <a href="#blogs">blogs</a> -->
            </nav>

            <div class="icons">
               <div id="search-btn" class="fas fa-search"></div>
               <div id="cart-btn" class="fas fa-shopping-cart"></div>
               <!-- <a href="login_form.php" <div id="login-btn" class="fas fa-user"></div>></a> -->
               <div id="login-btn" class="fas fa-user">
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

   <!-- login form starts -->

   <div class="login-form">

      <form action="" method="post">
         <div id="close-login-form" class="fas fa-times"></div>
         <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
         <h3>let's start a new great day</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
         <input type="email" name="email" required placeholder="enter your email" id="" class="box">
         <input type="password" name="password" required placeholder="enter your password" id="" class="box">
         <!-- <input type="email" name="email" required placeholder="enter your email"> -->
         <!-- <input type="password" name="password" required placeholder="enter your password"> -->
         <!-- <input type="submit" name="submit" value="login now" class="form-btn"> -->
         <!-- <div class="flex"> -->
         <!--    <input type="checkbox" name="" id="remember-me"> -->
         <!--    <label for="remember-me">remember me</label> -->
         <!--    <a href="#">forgot password?</a> -->
         <!-- </div> -->
         <input type="submit" name="submit" value="login now" class="link-btn">
            <div id="signup-btn" class="link-btn"></div>
               <!-- <div id="login-btn" class="fas fa-user"> -->
            <!-- see icons -->
      </form>

   </div>

   <div class="signup-form">

      <form action="" method="post">
         <div id="close-signup-form" class="fas fa-times"></div>
         <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
         <!-- <h3>let's start a new great day</h3> -->
         <!-- <h3>let's start a new great day</h3> -->
         <!-- <h3>let's start a new great day</h3> -->
         <!-- <input type="email" name="email" required placeholder="enter your email" id="" class="box"> -->
         <!-- <input type="password" name="password" required placeholder="enter your password" id="" class="box"> -->
         <!-- <!-- <input type="email" name="email" required placeholder="enter your email"> --> -->
         <!-- <!-- <input type="password" name="password" required placeholder="enter your password"> --> -->
         <!-- <!-- <input type="submit" name="submit" value="login now" class="form-btn"> --> -->
         <!-- <!-- <div class="flex"> --> -->
         <!-- <!--    <input type="checkbox" name="" id="remember-me"> --> -->
         <!-- <!--    <label for="remember-me">remember me</label> --> -->
         <!-- <!--    <a href="#">forgot password?</a> --> -->
         <!-- <!-- </div> --> -->
         <!-- <input type="submit" name="submit" value="login now" class="link-btn"> -->
         <!-- <p class="account">don't have an account? <a href="#">create one!</a></p> -->
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="password" name="password" required placeholder="enter your password" class="box">
      <input type="password" name="cpassword" required placeholder="confirm your password" class="box">
      <select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="link-btn">
         <!-- <input type="submit" name="submit" value="login now" class="link-btn"> -->
      <p>already have an account? <a href="login_form.php">login now</a></p>
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

   <!-- menu section starts  -->

   <section class="menu" id="menu">

      <h1 class="heading"> our menu </h1>

      <div class="container box-container">

         <div class="box">
            <img src="images/menu-1.png" alt="">
            <h3>coffee bean</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, eos.</p>
            <a href="#" class="link-btn">read more</a>
         </div>

         <div class="box">
            <img src="images/menu-2.png" alt="">
            <h3>coffee bean</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, eos.</p>
            <a href="#" class="link-btn">read more</a>
         </div>

         <div class="box">
            <img src="images/menu-3.png" alt="">
            <h3>coffee bean</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, eos.</p>
            <a href="#" class="link-btn">read more</a>
         </div>

         <div class="box">
            <img src="images/menu-4.png" alt="">
            <h3>coffee bean</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, eos.</p>
            <a href="#" class="link-btn">read more</a>
         </div>

         <div class="box">
            <img src="images/menu-5.png" alt="">
            <h3>coffee bean</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, eos.</p>
            <a href="#" class="link-btn">read more</a>
         </div>

         <div class="box">
            <img src="images/menu-6.png" alt="">
            <h3>coffee bean</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, eos.</p>
            <a href="#" class="link-btn">read more</a>
         </div>

      </div>

   </section>

   <!-- menu section ends -->

   <!-- gallery section starts  -->

   <section class="gallery" id="gallery">

      <h1 class="heading"> our gallery </h1>

      <div class="box-container container">

         <div class="box">
            <img src="images/tea_red.png" alt="">
            <div class="content">
               <div class="teaz">
                  <a href="#"><img src="images/tea_red (1).png" alt="" onclick="event.preventDefault()"></a>
                  <a href="#"><img src="images/tea_red (2).png" alt="" onclick="event.preventDefault()"></a>
                  <a href="#"><img src="images/tea_red (3).png" alt="" onclick="event.preventDefault()"></a>
               </div>
            </div>
         </div>

         <div class="box">
            <img src="images/coffee.png" alt="">
            <div class="content">
               <div class="teaz">
                  <a href="#"><img src="images/coffee (1) (copy 1).png" alt="" onclick="event.preventDefault()"></a>
                  <a href="#"><img src="images/coffee (2).png" alt="" onclick="event.preventDefault()"></a>
                  <a href="#"><img src="images/coffee (3).png" alt="" onclick="event.preventDefault()"></a>
               </div>
            </div>
         </div>


         <div class="box">
            <img src="images/hookah (1).png" alt="">
            <div class="content">
               <div class="teaz">
                  <a href="#"><img src="images/hookah (1) (copy 1).png" alt="" onclick="event.preventDefault()"></a>
                  <a href="#"><img src="images/hookah (2).png" alt="" onclick="event.preventDefault()"></a>
                  <a href="#"><img src="images/hookah (3).png" alt="" onclick="event.preventDefault()"></a>
               </div>
            </div>
         </div>

         <div class="box">
            <img src="images/orange-juice (copy 1).png" alt="">
            <div class="content">
               <div class="teaz">
                  <a href="#"><img src="images/orange-juice (copy 2).png" alt="" onclick="event.preventDefault()"></a>
                  <a href="#"><img src="images/orange-juice (1).png" alt="" onclick="event.preventDefault()"></a>
                  <a href="#"><img src="images/can (copy 1).png" alt="" onclick="event.preventDefault()"></a>
               </div>
            </div>
         </div>

      </div>

   </section>

   <!-- gallery section ends -->

   <!-- reviews section starts  -->

   <section class="reviews" id="reviews">

      <h1 class="heading">customers reviews</h1>

      <div class="box-container container">

         <div class="box">
            <img src="images/pic-1.png" alt="">
            <h3>john deo</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsum eos? Perspiciatis expedita
               laudantium blanditiis cupiditate at natus, quam alias?</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>

         <div class="box">
            <img src="images/pic-2.png" alt="">
            <h3>john deo</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsum eos? Perspiciatis expedita
               laudantium blanditiis cupiditate at natus, quam alias?</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>

         <div class="box">
            <img src="images/pic-3.png" alt="">
            <h3>john deo</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsum eos? Perspiciatis expedita
               laudantium blanditiis cupiditate at natus, quam alias?</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>

      </div>

   </section>

   <!-- reviews section ends -->

   <!-- contact section starts  -->

   <section class="contact" id="contact">

      <h1 class="heading"> contact us </h1>

      <div class="container">

         <div class="contact-info-container">

            <div class="box">
               <i class="fas fa-phone"></i>
               <h3>phone</h3>
               <p>+123-456-7890</p>
               <p>+111-222-3333</p>
            </div>

            <div class="box">
               <i class="fas fa-envelope"></i>
               <h3>email</h3>
               <p>shaikhanas@gmail.com</p>
               <p>anasbhai@gmail.com</p>
            </div>

            <div class="box">
               <i class="fas fa-map"></i>
               <h3>address</h3>
               <p>mumbai, india - 400104</p>
            </div>

         </div>

         <div class="row align-items-center">

            <div class="col-md-6 mb-5 mb-md-0 ">
               <iframe class="map w-100"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15076.89592087332!2d72.83196972773445!3d19.14167056419224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1640577832473!5m2!1sen!2sin"
                  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <form action="" class="col-md-6">
               <h3>get in touch</h3>
               <input type="text" placeholder="your name" class="box">
               <input type="email" placeholder="email" class="box">
               <input type="number" placeholder="phone" class="box">
               <textarea name="" placeholder="message" class="box" id="" cols="30" rows="10"></textarea>
               <input type="submit" value="send message" class="link-btn">
            </form>

         </div>

      </div>

   </section>

   <!-- contact section ends -->

   <!-- blogs section starts  -->

   <section class="blogs" id="blogs">

      <h1 class="heading"> our daily posts </h1>

      <div class="box-container container">

         <div class="box">
            <div class="image">
               <img src="images/g-img-1.jpg" alt="">
            </div>
            <div class="content">
               <h3>blog title goes here.</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
               <a href="#" class="link-btn">read more</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

         <div class="box">
            <div class="image">
               <img src="images/g-img-2.jpg" alt="">
            </div>
            <div class="content">
               <h3>blog title goes here.</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
               <a href="#" class="link-btn">read more</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

         <div class="box">
            <div class="image">
               <img src="images/g-img-3.jpg" alt="">
            </div>
            <div class="content">
               <h3>blog title goes here.</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
               <a href="#" class="link-btn">read more</a>
            </div>
            <div class="icons">
               <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
               <span> <i class="fas fa-user"></i> by admin </span>
            </div>
         </div>

      </div>

   </section>

   <!-- blogs section ends -->

   <!-- newsletter section starts  -->

   <section class="newsletter">
      <div class="container">
         <h3>newsletter</h3>
         <p>subscribe for latest upadates</p>
         <form action="">
            <input type="email" name="" placeholder="enter your email" id="" class="email">
            <input type="submit" value="subscribe" class="link-btn">
         </form>
      </div>
   </section>

   <!-- newsletter section ends -->

   <!-- footer section starts  -->

   <section class="footer container">

      <a href="#" class="logo"> <i class="fas fa-mug-hot"></i> coffee </a>

      <p class="credit"> created by <span>mr. web designer</span> | all rights reserved! </p>

      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-linkedin"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="#" class="fab fa-github"></a>
      </div>

   </section>

   <!-- footer section ends -->









   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>
