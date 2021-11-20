<?php 

  session_start();

  if( isset( $_SESSION['email'] ) ) {
    header( 'location: home.php' );
  }

  include_once 'partials/header-secondary.php';
  include_once 'db.php';

  if ( isset( $_POST[ 'login' ] ) ) {
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];

    $sql = "SELECT * FROM signup WHERE email = '$email' && password = '$password' ";
    $get_info = mysqli_query( $con, $sql );
    $get_data = mysqli_fetch_assoc( $get_info );

    if ( mysqli_num_rows( $get_info ) > 0 && $get_data['is_verified'] == 1 ) {
      header( 'location:home.php' );
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $get_data['id'];
      $_SESSION['name'] = $get_data['fulll_name'];
    } else {
      $_SESSION['login_error'] = "Your Account is not Verified";
      header( 'location: login.php' );
    }
  }


?>

  <section class="login-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-xl-6 col-md-6">
          <div class="login-img">
            <h2>Login please</h2>
          </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-6">
          <div class="login-form">
            <p><?php if( isset( $_SESSION['login_error'] ) ) {
              echo $_SESSION['login_error'];
              unset( $_SESSION['login_error'] );
            } ?></p>
            <form action="" method="POST">
              <input type="email" name="email" placeholder="EMAIL">
              <input type="password" name="password" placeholder="PASSWORD">
              <input type="submit" value="Sign In" name="login">
            </form>
            <div class="forget_passw">
              <a class="iam-new forget-pass" href="signup.php">I'm New</a>
              <a class="forget-pass" href="forgot-password.php">FORGET PASSWORD</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include_once 'partials/footer.php' ?>