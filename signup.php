<?php 

  session_start();

  if( isset( $_SESSION['email'] ) ) {
    header( 'location: home.php' );
  }

  include_once 'partials/header-secondary.php';
  include_once 'db.php';

  if( isset ( $_POST['signup'] ) ) {
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];
    $accept_conditoins = $_POST['accept_conditoins'];

    if( $full_name != '' && $email != '' && $phone != '' && $password != '' && $confirm_pass != '' && $accept_conditoins != '' ) {
      $check_email = "SELECT * FROM signup WHERE email = '$email'";
      $get_email = mysqli_query( $con, $check_email );

      if( mysqli_num_rows( $get_email ) > 0 ) {
        echo "This Email already used! Please try to another Email.";
      } else {
        if ( $password == $confirm_pass ) {
          $sql = "INSERT INTO signup( fulll_name, email, phone, password, accept_conditoins ) VALUES( '$full_name', '$email', '$phone', '$password', '$accept_conditoins' )";

          $get_info = mysqli_query( $con, $sql );
          if ( $get_info ) {
            header( 'location: login.php' );
          } else {
            header( 'location: index.php' );
          }

        } else {
          echo "Password Dose not matched";
        }
      }
    } else {
      echo "All Fields are required!";
    }
  }
?>

  <section class="signup-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-xl-7 col-md-7">
          <div class="signup-img">
            
          </div>
        </div>
        <div class="col-lg-5 col-xl-5 col-md-5">
          <div class="signup-form">
              <h2>sign up</h2>
            <form action="" method="POST">
              <input type="text" name="fullname" placeholder="Full Name">
              <input type="email" name="email" placeholder="Email">
              <input type="tel" name="phone" placeholder="Phone">
              <input type="password" name="password" placeholder="Password">
              <input type="password" name="confirm_pass" placeholder="Retype Password">
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="accept_conditoins" value="Accepts turms and conditions">
                <label class="form-check-label" for="exampleCheck1">Accepts turms and conditions</label>
              </div>
              <input type="submit" value="Sign Up" name="signup">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php include_once 'partials/footer.php'; ?>