<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>


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
   <title>complete responsive coffee shop website design tutorial</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../css/style.css">

</head>

<body>

   <!-- header section starts     -->
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

   <header class="header fixed-top">

      <div class="container">

         <div class="row align-items-center">

            <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

            <nav class="nav">
               <a href="../indexz_user2.php">home</a>
               <a href="products_user.php">menu</a>
               <!-- <a href="today_matches">today's matches</a> -->
               <!-- <a href="#about">about</a> -->
               <!-- <a href="#menu">menu</a> -->
               <!-- <a href="#gallery">gallery</a> -->
               <!-- <a href="#reviews">reviews</a> -->
               <!-- <a href="#contact">contact</a> -->
               <!-- <a href="#blogs">blogs</a> -->
            </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>


            <div class="icons">
               <div id="search-btn" class="fas fa-search"></div>
               <a href="cart_user.php"><div id="cart-btn" class="fas fa-shopping-cart"><span><?php echo $row_count; ?></span></div></a>
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




































<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="../js/script.js"></script>
<script src="js/script.js"></script>

</body>
</html>
