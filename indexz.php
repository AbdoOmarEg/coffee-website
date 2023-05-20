<!-- 398 -->
<?php

@include 'config.php';

session_start();
// $error = ""; // Initialize the error message variable

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
      $error[] = 'incorrect credentials';
   //    <scriptt>
   // loginForm.classList.add('active');
   //    </script>
      // $error = 'Incorrect email or password!'; // Set the error message
   }

};
?>
<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'incorrect credentials';

   }else{

      if($pass != $cpass){
         //$error[] = 'password not matched!';
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
      <?php if (!empty($error)): ?>
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
   <title>coffeez</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body style="background: #cccccc;">

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
            break;
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
