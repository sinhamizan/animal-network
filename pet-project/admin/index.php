<?php 
   session_start();
   include_once 'db.php';

   
   if( isset($_SESSION['admin_email']) ) {
      header( 'location: dashboard.php' );
   }

   if( isset( $_POST['admin_login'] ) ) {
      $email = $_POST['email'];
      $passw = $_POST['password'];

      $sql = "SELECT * FROM super_users WHERE email='$email' && password='$passw'";
      $qs = mysqli_query( $con, $sql );

      if( mysqli_num_rows( $qs ) > 0 ) {
         header( 'location: dashboard.php' );
         $_SESSION['admin_email'] = $email;
      }
      else {
         echo "error";
      }
   }

?>

<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <h2 class="mb-5 text-center">Administration Login</h2>
                  <form method="POST">
                     <div class="form-group mb-4">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                     </div>
                     <input type="submit" name="admin_login" value="Sign In"  class="btn btn-success btn-flat m-b-30 m-t-30">
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>