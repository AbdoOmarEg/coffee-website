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
         header('location:indexz_admin.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:indexz_user.php');

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
<script>
   window.onload = function() {
      <?php if ($incorrectCredentials): ?>
         var loginForm = document.querySelector('.login-form');
         loginForm.classList.add('active');
      <?php endif; ?>
   }
</script>

