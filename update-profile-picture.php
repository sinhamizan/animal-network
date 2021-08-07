<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }
  
  include_once 'partials/header-primary.php';
  include_once 'db.php';

  $user_id = $_SESSION['id'];

  $sql2 = "SELECT image FROM signup WHERE id=$user_id";
  $qs = mysqli_query( $con, $sql2 );
  $res = mysqli_fetch_assoc( $qs );
  
  //   Update image
  if( isset( $_POST['update_pic'] ) ) {
    $profile_pic = $_FILES['profile_pic'];

    $profile_pic_name = $profile_pic['name'];
    $profile_pic_tmp_name = $profile_pic['tmp_name'];
    $profile_pic_loc = 'uploads/profiles/' . $profile_pic_name;

    move_uploaded_file( $profile_pic_tmp_name, $profile_pic_loc );

    if( $profile_pic_name == "" ) {
        header( 'location: author-profile.php' );
    } else {
        $sql = "UPDATE signup SET image='$profile_pic_name' WHERE id='$user_id'";
        $update_query = mysqli_query( $con, $sql );
        if( $update_query ) {
            header( 'location: author-profile.php' );
        }
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
                        <li><a class="active" href="update-profile-picture.php">Update Profile Picture</a></li>
                        <li><a href="update-name.php">Update Name</a></li>
                        <li><a href="update-phone.php">Update Phone</a></li>
                        <li><a href="update-password.php">Update Password</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-8 col-xl-8">
                <div class="update_topic">
                    <h2>Update Profile picture</h2>
                    <?php 
                        if( $res['image'] ): ?>
                            <strong>Current Image: <img width="200" src="uploads/profiles/<?php echo $res['image']; ?>" alt="Pet Image"></strong><br><br>
                        <?php else: ?>
                            <strong>Current Image: <img width="200" src="assets/imgs/profile.png" alt="Pet Image"></strong><br><br>
                        <?php endif; ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" name="profile_pic" class="form-control">
                        <input type="submit" value="Update" name="update_pic">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'partials/footer.php'; ?>