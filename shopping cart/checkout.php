<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>





















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
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="css/style.css">

</head>

<body>






<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<?php include 'header.php'; ?>







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






























































<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. mumbai" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. maharashtra" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. india" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="../js/script.js"></script>
<script src="js/script.js"></script>
   
</body>
</html>
