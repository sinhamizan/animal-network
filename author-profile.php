<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';
  
  $author_id = $_SESSION['id'];

  if( isset ( $_POST[ 'post' ] ) ) {
    $post_text = $_POST[ 'post_text' ];
    $post_file = $_FILES['post_file'];

    date_default_timezone_set("Asia/Dhaka");
    $post_date = date("d-m-Y, h:ia");

    $file_name = $post_file[ 'name' ];
    $file_tmp_name = $post_file[ 'tmp_name' ];
    $file_loc = 'uploads/posts/' . $file_name;

    move_uploaded_file( $file_tmp_name, $file_loc );

    if( $post_text != '' && $post_file != '' ) {
      $sql = "INSERT INTO posts( author_id, post_text, post_file, post_date ) VALUES( '$author_id', '$post_text', '$file_name', '$post_date' )";
      $get_post = mysqli_query( $con, $sql );

      if( $get_post ) {
        header( 'location:home.php' );
      } else {
        header( 'location:author-profile.php' );
      }
    } else {
      echo "All Fields are Required!";
    }
  }

  $author_sql = "SELECT * FROM signup WHERE id='$author_id'";
  $author_data = mysqli_query( $con, $author_sql );

  $author_post_sql = "SELECT * FROM posts WHERE author_id='$author_id'";
  $author_post_data = mysqli_query( $con, $author_post_sql );
  $author_post_data2 = mysqli_query( $con, $author_post_sql );

?>

  <section class="author_page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
          <?php while( $info = mysqli_fetch_assoc( $author_data ) ): ?>
            <div class="author_profile">
              <div class="author_img">
                <?php 
                  if( $info['image'] ){?>
                    <img src="uploads/profiles/<?php echo $info['image']; ?>" alt="">
                  <?php } else {
                    echo '<img src="assets/imgs/profile.png" alt="">';
                  }
                ?>
              </div>
              <div class="author_content">
                <h2><?php echo $info['fulll_name']; ?> <span><a href="update-bio.php"><i class="fas fa-cog"></i></a></span></h2>
                <h4><span>Email:</span> <?php echo $info['email']; ?></h4>
                <h4><span>Phone:</span> 0<?php echo $info['phone']; ?></h4>
                <p><?php echo $info['bio']; ?></p>
              </div>
            </div>
          <?php endwhile; ?>
          <div class="create_post">
            <h3>Create a New Post</h3>
            <form action="" method="POST" enctype="multipart/form-data">
              <textarea class="form-control" name="post_text" placeholder="Enter your text here...."></textarea>
              <input class="post_file" type="file" name="post_file">
              <input class="post_submit" type="submit" value="Post" name="post">
            </form>
          </div>
          <div class="see_activites">
            <a href="user.php?id=<?php echo $author_id; ?>">My All Activities</a>
          </div>
        </div>
        <!--/author profile -->

        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
          <div class="author_gallery">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="my-gallery-tab" data-bs-toggle="tab" data-bs-target="#my-gallery" type="button" role="tab" aria-controls="my-gallery" aria-selected="true">my gallery</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="my-post-tab" data-bs-toggle="tab" data-bs-target="#my-post" type="button" role="tab" aria-controls="my-post" aria-selected="false">my post</button>
              </li>
            </ul>
            <!--/tabs button -->

            <div class="tab-content mt-5" id="myTabContent">
              <div class="tab-pane fade show active" id="my-gallery" role="tabpanel" aria-labelledby="my-gallery-tab">
                <?php if( mysqli_num_rows( $author_post_data ) > 0 ): ?>
                  <?php while( $posts = mysqli_fetch_assoc( $author_post_data ) ): ?>
                    <div class="single_gallery">
                      <a href=""><img src="uploads/posts/<?php echo $posts['post_file']; ?>" alt=""></a>
                    </div>
                  <?php endwhile; else: ?>
                  <p>No Post Posted yet!</p>
                <?php endif; ?>
              </div>
              <!--/my post tab -->

              <div class="tab-pane fade mt-5" id="my-post" role="tabpanel" aria-labelledby="my-post-tab">
                <div class="list-group mt-5">
                  <?php if( mysqli_num_rows( $author_post_data2 ) > 0 ): ?>
                    <?php while( $my_posts = mysqli_fetch_assoc( $author_post_data2 ) ): ?>
                      <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1"><?php echo substr( $my_posts['post_text'], 0, 30 ); ?>......</h5>
                          <small class="text-muted"><?php echo $my_posts['post_date']; ?></small>
                        </div>
                      </a>
                    <?php endwhile; else: ?>
                    <p>No post posted yet!</p>
                  <?php endif; ?>
                </div>
              </div>
              <!--/my gallery tab -->
            </div>
            <!--/Tabs Content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php include_once 'partials/footer.php'; ?>