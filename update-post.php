<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';


  // Post info
  $post_id = $_GET['id'];
  $post_sql = "SELECT * FROM posts WHERE id=$post_id";
  $post_qs = mysqli_query( $con, $post_sql );
  $post_result = mysqli_fetch_assoc( $post_qs );

  // Update Post
  $author_id = $_SESSION['id'];
  if( isset ( $_POST[ 'post_submit' ] ) ) {
    $post_text = $_POST[ 'post_text' ];
    $post_file = $_FILES['post_file'];

    date_default_timezone_set("Asia/Dhaka");
    $post_date = date("d-m-Y, h:ia");

    $file_name = $post_file[ 'name' ];
    $file_tmp_name = $post_file[ 'tmp_name' ];
    $file_loc = 'uploads/posts/' . $file_name;

    move_uploaded_file( $file_tmp_name, $file_loc );

    if( $file_name == '' ) {
      $sql = "UPDATE posts SET
      author_id = '$author_id',
      post_text = '$post_text',
      post_date = '$post_date' 
      WHERE id=$post_id";
      $get_post = mysqli_query( $con, $sql );

      if( $get_post ) {
        header( 'location: home.php' );
      }
    } else {
      $sql = "UPDATE posts SET
      author_id = '$author_id',
      post_text = '$post_text',
      post_file = '$file_name',
      post_date = '$post_date' 
      WHERE id=$post_id";
      $get_post = mysqli_query( $con, $sql );

      if( $get_post ) {
        header( 'location: home.php' );
      }
    }
  }

?>

<section class="edit_post_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-lg-8">
        <div class="edit_post">
          <h2>update your post</h2>
          <form action="" method="POST" enctype="multipart/form-data">
            <textarea class="form-control mb-3" name="post_text"><?php echo $post_result['post_text']; ?></textarea>
            <input class="form-control mb-3" type="file" name="post_file">
            <strong>Current Image: <img width="90" src="uploads/posts/<?php echo $post_result['post_file']; ?>" alt="Pet Image"></strong><br>
            <input class="mb-5 mt-3" type="submit" name="post_submit" value="Update Post">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


  
<?php include_once 'partials/footer.php'; ?>