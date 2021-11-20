<?php 
    session_start();

    if( !isset( $_SESSION['email'] ) ) {
        header( 'location: index.php' );
    }
    
    include_once 'partials/header-primary.php';
    include_once 'db.php';

    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM signup WHERE id=$user_id";
    $qs = mysqli_query( $con, $sql );
    $res = mysqli_fetch_assoc( $qs );
  

    // Update Profile
    if(isset($_POST['update_profile'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $bio = $_POST['bio'];
        $profile_pic = $_FILES['profile_pic'];

        $file_name = $profile_pic[ 'name' ];
        $file_tmp_name = $profile_pic[ 'tmp_name' ];
        $file_loc = 'uploads/profiles/' . $file_name;
        move_uploaded_file( $file_tmp_name, $file_loc );

        if( $file_name == '' ) {
            $sql2 = "UPDATE signup SET fulll_name='$name', email='$email', phone='$phone', bio='$bio' WHERE id=$user_id";
            $update_info = mysqli_query( $con, $sql2 );
            
            if( $update_info ) {
                header( 'location: author-profile.php' );
            }
        }
        else {
            $sql3 = "UPDATE signup SET fulll_name='$name', email='$email', phone='$phone', bio='$bio', image='$file_name' WHERE id=$user_id";
            $update_info2 = mysqli_query( $con, $sql3 );
            
            if( $update_info2 ) {
                header( 'location: author-profile.php' );
            } else {
                
                echo "Image not Update!";
                echo $file_name;
            }
        }
    }

?>

<section class="update_profile">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xl-10 offset-xl-1">
                <div class="update_topic">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="update-inner">
                            <div class="update_profile_info">
                                <label for="">username</label>
                                <input type="text" name="name" value="<?php echo $res['fulll_name']; ?>">

                                <label for="">email</label>
                                <input type="email" name="email" value="<?php echo $res['email']; ?>">

                                <label for="">phone</label>
                                <input type="tel" name="phone" value="<?php echo $res['phone']; ?>">

                                <label for="">bio</label>
                                <textarea name="bio"><?php echo $res['bio']; ?></textarea>
                            </div>
                            <div class="update_pic">
                                <h3>profile Picture</h3>
                                <?php 
                                    if( $res['image'] ): ?>
                                        <strong>Current Image: <img width="200" src="uploads/profiles/<?php echo $res['image']; ?>" alt="Pet Image"></strong><br><br>
                                <?php else: ?>
                                        <strong>Current Image: <img width="200" src="assets/imgs/profile.png" alt="Pet Image"></strong><br><br>
                                <?php endif; ?>
                                <input type="file" name="profile_pic" class="form-control">
                            </div>
                        </div>
                        <div class="update_profile_btn">
                            <a href="author-profile.php">Cancel</a>
                            <input type="submit" value="Update" name="update_profile">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'partials/footer.php'; ?>