<?php 
    session_start();
    include_once 'partials/header-secondary.php';
    include_once 'db.php';

    if( isset( $_POST[ 'sent_email' ] ) ) {
        $email = $_POST[ 'forgot_pass' ];

        $sql = "SELECT * FROM signup WHERE email='$email'";
        $result = mysqli_query( $con, $sql );
        
        if( mysqli_num_rows($result) > 0 ) {
            while( $data = mysqli_fetch_assoc( $result ) ) {
                $rec_pass = $data[ 'password' ];
                $subj = "Password Recovery";
                $body = "Hello, " .$data['fulll_name']. ". Your Password is: " . $rec_pass;
                $headers = "From: mizan75kpi@gmail.com";

                if( mail( $email, $subj, $body, $headers ) ) {
                    $_SESSION['success'] = "Email successfully sent to your email. Please check your email.";
                } else {
                    $_SESSION['invalid'] = "This Email not valid, Please use the valid email, Thank you.";
                }
            }
        } else {
            $_SESSION['invalid'] = "This Email not valid, Please use the valid email, Thank you.";
        }
    }
?>

<section class="forgot_password">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3"> 
                <div class="show-message">
                    <?php if(isset( $_SESSION['success'] )): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['success']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['success']); ?>

                    <?php elseif(isset( $_SESSION['invalid'] )): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['invalid']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['invalid']); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-3">
                <div class="forgot_form">
                    <form action="" method="POSt">
                        <input type="email" name="forgot_pass" class="form-control" placeholder="Enter Your Valid Email.">
                        <input type="submit" value="Send" name="sent_email">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
 
<?php include_once 'partials/footer.php'; ?>


<!-- 
    https://www.thapatechnical.com/2020/03/how-to-send-mail-from-localhost-xampp.html
    follow this link insruction for setting gmail for password recovery.
 -->