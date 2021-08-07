<?php 

    // session
    session_start();
    if( !isset( $_SESSION['email'] ) ) {
        header( 'location: index.php' );
    }

    // include files
    include_once 'partials/header-primary.php';
    include_once 'db.php';

    // new ads
    if( isset( $_POST[ 'adopt' ] ) ) {
        $pet_name = $_POST[ 'pet_name' ];
        $pet_img = $_FILES[ 'pet_img' ];
        $location = $_POST[ 'location' ];
        $address = $_POST[ 'address' ];
        $pet_details = $_POST[ 'pet_details' ];
        $author_id = $_SESSION['id'];
        $category_id = $_POST['pet_category'];

        $img_name = $pet_img[ 'name' ];
        $img_tmp_name = $pet_img[ 'tmp_name' ];
        $img_loc = 'uploads/adopts/' . $img_name;
        move_uploaded_file( $img_tmp_name, $img_loc );

        if( $pet_name != '' && $pet_img != '' && $location != '' && $address != '' && $pet_details != '' ) {
            $sql = "INSERT INTO adopt_pets( author_id, pet_name, category_id, pet_img, location, address, pet_details ) VALUES( $author_id, '$pet_name', $category_id, '$img_name', '$location', '$address', '$pet_details' )";
            $get_ads = mysqli_query( $con, $sql );
            if( $get_ads ) {
                header( 'location: adoption.php' );
            } else {
                header( 'location: adoption-form.php' );
            }
        } else {
            echo "All Fields are Required!";
        }
    }

?>

<section class="adoption_form">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-outer">
                    <h2>adopt a pet</h2>
                    <form class="row" action="" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <label for="petName" class="form-label">Pet Name</label>
                            <input type="text" name="pet_name" class="form-control mb-3" id="petName">
                        </div>
                        <div class="col-12">
                            <label for="petCategory" class="form-label">Pet Category</label>
                            <select name="pet_category" id="petCategory" class="form-control mb-3">
                                <option value="">--Select Category--</option>
                                <?php 
                                    $cat_sql = "SELECT * FROM category";
                                    $get_cat = mysqli_query( $con, $cat_sql );

                                    while( $cate = mysqli_fetch_assoc( $get_cat ) ):
                                ?>
                                    <option value="<?php echo $cate['id']; ?>"><?php echo $cate['name']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="petImage" class="form-label">Pet Image</label>
                            <input type="file" name="pet_img" class="form-control mb-3" id="petImage">
                        </div>
                        <div class="col-12">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control mb-3" id="location" placeholder="Dhaka">
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Full Address</label>
                            <input type="text" name="address" class="form-control mb-3" id="address" placeholder="Mirpur-2, Dhaka">
                        </div>
                        <div class="col-12">
                            <label for="petDetails" class="form-label">Pet Details</label>
                            <textarea name="pet_details" class="form-control mb-3" id="petDetails" placeholder="Pet Details"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="adopt" value="Adopt Pet" class="adopt_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include_once 'partials/footer.php'; ?>