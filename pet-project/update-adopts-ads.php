<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';


  // Post info
  $post_id = $_GET['id'];
  $post_sql = "SELECT * FROM adopt_pets WHERE id=$post_id";
  $post_qs = mysqli_query( $con, $post_sql );
  $post_result = mysqli_fetch_assoc( $post_qs );

  // Update Ads
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

    if( $img_name == '' ) {
      $sql = "UPDATE adopt_pets SET
        author_id = $author_id,
        pet_name  = '$pet_name',
        category_id = $category_id,
        location = '$location',
        address = '$address',
        pet_details = '$pet_details'
        WHERE id=$post_id";
        $get_ads = mysqli_query( $con, $sql );
        if( $get_ads ) {
            header( 'location: adoption.php' );
        } else {
            header( 'location: update-adopts-ads.php' );
        }
    } else {
      $sql = "UPDATE adopt_pets SET
        author_id = $author_id,
        pet_name  = '$pet_name',
        category_id = $category_id,
        pet_img = '$img_name',
        location = '$location',
        address = '$address',
        pet_details = '$pet_details'
        WHERE id=$post_id";

        $get_ads = mysqli_query( $con, $sql );
        if( $get_ads ) {
            header( 'location: adoption.php' );
        } else {
            header( 'location: update-adopts-ads.php' );
        }
      
    }
  }


?>

<section class="edit_post_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-8">
        <div class="edit_post">
          <h2>Update Adoption Ads</h2>
          <form class="row" action="" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                  <label for="petName" class="form-label">Pet Name</label>
                  <input type="text" name="pet_name" class="form-control mb-3" id="petName" value="<?php echo $post_result['pet_name']; ?>">
              </div>
              <div class="col-12">
                  <label for="petCategory" class="form-label">Pet Category</label>
                  <select name="pet_category" id="petCategory" class="form-control mb-3">
                      <?php 
                          $cat_sql = "SELECT * FROM category";
                          $get_cat = mysqli_query( $con, $cat_sql );

                          while( $cate = mysqli_fetch_assoc( $get_cat ) ):
                      ?>
                          <option value="<?php echo $cate['id']; ?>" <?php if( $post_result['category_id'] == $cate['id'] ) { echo "selected"; } ?>><?php echo $cate['name']; ?></option>
                      <?php endwhile; ?>
                  </select>
              </div>
              <div class="col-12">
                  <label for="petImage" class="form-label">Pet Image</label>
                  <input type="file" name="pet_img" class="form-control mb-3" id="petImage">
                  <strong>Current Image: <img width="90" src="uploads/adopts/<?php echo $post_result['pet_img']; ?>" alt="Pet Image"></strong>
              </div>
              <div class="col-12">
                  <label for="location" class="form-label">Location</label>
                  <input type="text" name="location" class="form-control mb-3" id="location" value="<?php echo $post_result['location']; ?>">
              </div>
              <div class="col-12">
                  <label for="address" class="form-label">Full Address</label>
                  <input type="text" name="address" class="form-control mb-3" id="address" value="<?php echo $post_result['address']; ?>">
              </div>
              <div class="col-12">
                  <label for="petDetails" class="form-label">Pet Details</label>
                  <textarea name="pet_details" class="form-control mb-3" id="petDetails"><?php echo $post_result['pet_details']; ?></textarea>
              </div>
              <div class="col-12">
                  <input type="submit" name="adopt" value="Update Adopt Ads" class="adopt_btn">
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


  
<?php include_once 'partials/footer.php'; ?>