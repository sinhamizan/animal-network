<?php
    include_once 'partials/header.php'; 
    include_once 'db.php';

   // find doctor id
   $doctor_email = $_SESSION['doc_email'];
   $sql2 = "SELECT * FROM doctors WHERE email='$doctor_email'";
   $data2 = mysqli_query($con, $sql2);
   $doc_info = mysqli_fetch_assoc( $data2 );
   $doctor_id = $doc_info['id'];

   $sql = "SELECT * FROM doctors WHERE id=$doctor_id";
   $qs = mysqli_query( $con, $sql );
   $info = mysqli_fetch_assoc( $qs );

   // Update Profile
   if(isset($_POST['update_profile'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $designation = $_POST['designation'];
        $bio = $_POST['bio'];
        $profile_pic = $_FILES['profile_pic'];

        $file_name = $profile_pic[ 'name' ];
        $file_tmp_name = $profile_pic[ 'tmp_name' ];
        $file_loc = 'upload/profiles/' . $file_name;
        move_uploaded_file( $file_tmp_name, $file_loc );

        if( $file_name == '' ) {
            $sql2 = "UPDATE doctors SET name='$name', email='$email', designation='$designation', details='$bio' WHERE id=$doctor_id";
            $update_info = mysqli_query( $con, $sql2 );
            
            if( $update_info ) {
                header( 'location: profile.php' );
            }
        }
        else {
            $sql2 = "UPDATE doctors SET name='$name', email='$email', designation='$designation', picture='$file_name', details='$bio' WHERE id=$doctor_id";
            $update_info = mysqli_query( $con, $sql2 );
            
            if( $update_info ) {
                header( 'location: profile.php' );
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
                                <input type="text" name="name" value="<?php echo $info['name']; ?>">

                                <label for="">email</label>
                                <input type="email" name="email" value="<?php echo $info['email']; ?>">

                                <label for="">Designation</label>
                                <input type="text" name="designation" value="designation">

                                <label for="">bio</label>
                                <textarea name="bio"><?php echo $info['details']; ?></textarea>
                            </div>
                            <div class="update_pic">
                                <h3>profile Picture</h3>
                                <?php 
                                    if( $info['picture'] ): ?>
                                        <strong>Current Image: <img width="200" src="upload/profiles/<?php echo $info['picture']; ?>" alt="Pet Image"></strong><br><br>
                                <?php else: ?>
                                        <strong>Current Image: <img width="200" src="images/1.jpg" alt="Pet Image"></strong><br><br>
                                <?php endif; ?>
                                <input type="file" name="profile_pic" class="form-control">
                            </div>
                        </div>
                        <div class="update_profile_btn">
                            <button>Cancel</button>
                            <input type="submit" value="Update" name="update_profile">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'partials/footer.php'; ?>

