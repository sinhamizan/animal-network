<?php 
  
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }
  
  include_once 'partials/header-primary.php';
  include_once 'db.php';

  $user_id = $_SESSION['id'];
  $sql = "SELECT * FROM signup WHERE id='$user_id'";
  $user_info = mysqli_query( $con, $sql );
  $info = mysqli_fetch_assoc( $user_info );

  if( isset( $_POST['update_bio'] ) ) {
    $bio = $_POST['bio'];

    $update_sql = "UPDATE signup SET bio='$bio' WHERE id='$user_id'";
    $update_info = mysqli_query( $con, $update_sql );
    if( $update_info ) {
        header( 'location: author-profile.php' );
    } else {
        echo "Update Failed!";
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
                        <li><a class="active" href="update-bio.php">Update Bio</a></li>
                        <li><a href="update-profile-picture.php">Update Profile Picture</a></li>
                        <li><a href="update-name.php">Update Name</a></li>
                        <li><a href="update-phone.php">Update Phone</a></li>
                        <li><a href="update-password.php">Update Password</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8 col-xl-8">
                <div class="update_topic">
                    <h2>Update Bio</h2>

                    <form action="" method="POST">
                        <textarea class="form-control" name="bio"><?php echo $info['bio']; ?></textarea>
                        <input type="submit" value="Update" name="update_bio">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'partials/footer.php'; ?>