<?php 
  include_once 'partials/header.php';
  include_once 'db.php';

  // find doctor id
  $doctor_email = $_SESSION['doc_email'];
  $sql2 = "SELECT * FROM doctors WHERE email='$doctor_email'";
  $data2 = mysqli_query($con, $sql2);
  $doc_info = mysqli_fetch_assoc( $data2 );
  $doctor_id = $doc_info['id'];

  $sql = "SELECT * FROM doctors WHERE id='$doctor_id'";
  $check_query = mysqli_query( $con, $sql );
  $check_info = mysqli_fetch_assoc( $check_query );
  $check_pass = $check_info['password'];

  if( isset( $_POST['update_pass'] ) ) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $conf_pass = $_POST['conf_pass'];

    if( $old_pass == $check_pass ) {
        if( $new_pass == $conf_pass ) {
            $update_sql = "UPDATE doctors SET password='$new_pass' WHERE id='$doctor_id'";
            $update_query = mysqli_query( $con, $update_sql );

            if( $update_query ) {
                echo "Password Updated.";
                header( 'location: profile.php' );
            } else {
                echo "Password Update Failed.";
            }
        } else {
            echo "Password Not Matched!";
        }
    } else {
        echo "Current Password not Currect!";
    }
  }
?>

<section class="update_profile">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profile_title">
                   
                </div>
            </div>
            <div class="col-12 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-xl-6 offset-xl-3">
                <div class="update_password">
                    <form action="" method="POST">
                        <div class="update_pass_input">
                            <label for="">Old password</label>
                            <input type="password" name="old_pass" placeholder="Old Password">

                            <label for="">New Password</label>
                            <input type="password" name="new_pass" placeholder="New Password">

                            <label for="">Confirm New Password</label>
                            <input type="password" name="conf_pass" placeholder="Confirm New Password">
                        </div>
                        <div class="update_pass_btn">
                            <button>Cancel</button>
                            <input type="submit" value="Update" name="update_pass">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'partials/footer.php'; ?>