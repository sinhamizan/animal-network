<?php 
  session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  if( isset( $_SESSION['email'] ) ) {
    header( 'location: home.php' );
  }

  include_once 'partials/header-secondary.php';
  include_once 'db.php';

  function sendMail( $email, $vcode ) {
    require 'PHPMailer\PHPMailer.php';
    require 'PHPMailer\SMTP.php';
    require 'PHPMailer\Exception.php';

    $mail = new PHPMailer(true);

    try {
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = '';                     
      $mail->Password   = '';                               
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;

      $mail->setFrom('', 'Pet Animal');
      $mail->addAddress( $email );
      
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Here is the subject';
      $mail->Body    = "This is the HTML message body <a href='http://localhost/pet-project/verify-email.php?email=$email&vcode=$vcode'>Verify Now</a>";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  if( isset ( $_POST['signup'] ) ) {
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];
    $accept_conditoins = $_POST['accept_conditoins'];
    $vcode = bin2hex( random_bytes( 16 ) );

    if( $full_name != '' && $email != '' && $phone != '' && $password != '' && $confirm_pass != '' && $accept_conditoins != '' ) {
      $check_email = "SELECT * FROM signup WHERE email = '$email'";
      $get_email = mysqli_query( $con, $check_email );

      if( mysqli_num_rows( $get_email ) > 0 ) {
        echo "This Email already used! Please try to another Email.";
      } else {
        if ( $password == $confirm_pass ) {
          $sql = "INSERT INTO signup( fulll_name, email, phone, password, accept_conditoins, 	verification_code, is_verified ) VALUES( '$full_name', '$email', '$phone', '$password', '$accept_conditoins', '$vcode' , 0 )";

          $get_info = mysqli_query( $con, $sql );
          if ( $get_info && sendMail( $email, $vcode) ) {
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
            <form action="" method="POST">
              <input type="text" name="fullname" placeholder="Full Name">
              <input type="email" name="email" placeholder="Email">
              <input type="tel" name="phone" placeholder="Phone">
              <input type="password" name="password" placeholder="Password">
              <input type="password" name="confirm_pass" placeholder="Retype Password">
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="accept_conditoins" value="Accept the terms & policies">
                <label class="form-check-label" for="exampleCheck1">Accept the terms & policies</label>
              </div>
              <input type="submit" value="Sign Up" name="signup">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php include_once 'partials/footer.php'; ?>