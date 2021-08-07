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

  if( isset( $_POST['update_phone'] ) ) {
    $phone = $_POST['phone'];

    if( $phone != '' ) {
        $update_sql = "UPDATE signup SET phone='$phone' WHERE id='$user_id'";
        $update_query = mysqli_query( $con, $update_sql );

        if( $update_query ) {
            header( 'location:author-profile.php' );
        } else {
            echo "Update Failed.";
        }
    } else {
        echo "This Field is Required.";
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
                        <li><a class="active" href="update-phone.php">Update Phone</a></li>
                        <li><a href="update-password.php">Update Password</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8 col-xl-8">
                <div class="update_topic">
                    <h2>Update Phone</h2>

                    <form action="" method="POST">
                        <input type="tel" name="phone" class="form-control" value="<?php echo $check_info['phone']; ?>">
                        <input type="submit" value="Update" name="update_phone">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'partials/footer.php'; ?>