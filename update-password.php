<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }
  
  include_once 'partials/header-primary.php';
  include_once 'db.php';

  $user_id = $_SESSION['id'];

  $sql = "SELECT * FROM signup WHERE id='$user_id'";
  $check_query = mysqli_query( $con, $sql );
  $check_info = mysqli_fetch_assoc( $check_query );
  $check_pass = $check_info['password'];

  if( isset( $_POST['update_pass'] ) ) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $conf_pass = $_POST['conf_pass'];

    if( $old_pass == $check_pass ) {
        if( $new_pass == $conf_pass ) {
            $update_sql = "UPDATE signup SET password='$new_pass' WHERE id='$user_id'";
            $update_query = mysqli_query( $con, $update_sql );

            if( $update_query ) {
                echo "Password Updated.";
                header( 'location: author-profile.php' );
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
            <div class="col-12 col-lg-4 col-md-4 col-xl-4">
                <div class="profile_sidebar">
                    <ul>
                        <li><a href="update-bio.php">Update Bio</a></li>
                        <li><a href="update-profile-picture.php">Update Profile Picture</a></li>
                        <li><a href="update-name.php">Update Name</a></li>
                        <li><a href="update-phone.php">Update Phone</a></li>
                        <li><a class="active" href="update-password.php">Update Password</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8 col-xl-8">
                <div class="update_topic">
                    <h2>Update password</h2>

                    <form action="" method="POST">
                        <input class="form-control mb-3" type="password" name="old_pass" placeholder="Old Password">
                        <input class="form-control mb-3" type="password" name="new_pass" placeholder="New Password">
                        <input class="form-control mb-3" type="password" name="conf_pass" placeholder="Confirm New Password">
                        <input type="submit" value="Update" name="update_pass">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'partials/footer.php'; ?>