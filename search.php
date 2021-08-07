<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';

  // ads adoption
  $adopt_sql = "SELECT * FROM adopt_pets ORDER BY id DESC LIMIT 5";
  $get_ads = mysqli_query( $con, $adopt_sql );

  // ads sells
  $sell_sql = "SELECT * FROM sell_pets ORDER BY id DESC LIMIT 5";
  $get_sell = mysqli_query( $con, $sell_sql );

  $total_posts = 0;
  // search
  if( isset( $_POST[ 'search' ] ) ) {
    $search_text = $_POST[ 'search_text' ];
    if( $search_text != "" ){
      $search_sql = "SELECT * FROM posts WHERE post_text LIKE '%$search_text%'";
      $search_query = mysqli_query( $con, $search_sql );
      $total_posts = mysqli_num_rows( $search_query );
    }
  }
?>

<section class="search_page">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-xl-8 col-md-7">
          <div class="search_area">
            <form action="" method="POST">
              <input type="text" name="search_text" id="search_text" placeholder="Search by post description.....">
              <input type="submit" value="Search" name="search">
            </form>
          </div>
          <div class="alert alert-dark total_posts" role="alert">
            <p>Total Post Found: <?php echo $total_posts; ?></p>
            <p><a href="home.php">Reset Search</a></p>
          </div>
          <div class="all_posts">
            <?php if( $total_posts > 0 ):
              while( $posts = mysqli_fetch_assoc( $search_query ) ):?>
                <div class="single_post">
                  <div class="post_content">
                    <h3><a href="single-post.php?id=<?php echo $posts[ 'id' ]; ?>"><?php echo substr( $posts[ 'post_text' ], 0, 70 ); ?>....</a></h3>
                  </div>
                </div>
                <hr>
              <?php endwhile; ?>
              <?php else: ?>
              <p class="warning">Not Found Any Data! Please Search using another Keyword.</p>
            <?php endif; ?>
          </div>
        </div>




        <div class="col-lg-4 col-xl-4 col-md-5">
          <div class="posts_sidebar">
            <div class="recent_posts">
                <h3>Latest Buy Sells Ads</h3>
                <?php while( $ads = mysqli_fetch_assoc( $get_sell ) ): ?>
                    <div class="recent_item">
                        <div class="post_img">
                            <a href="single-buy-sell.php?id=<?php echo $ads['id']; ?>"><img src="uploads/sells/<?php echo $ads['pet_img']; ?>" alt=""></a>
                        </div>
                        <div class="post_text">
                            <a href="single-buy-sell.php?id=<?php echo $ads['id']; ?>"><?php echo $ads['pet_name']; ?></a>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, perspiciatis?</p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!--/recent post -->
            </div>

            <div class="recent_posts">
                <h3>Latest Adoption Ads</h3>
                <?php while( $ads = mysqli_fetch_assoc( $get_ads ) ): ?>
                    <div class="recent_item">
                        <div class="post_img">
                            <a href="single-adoption.php?id=<?php echo $ads['id']; ?>"><img src="uploads/adopts/<?php echo $ads['pet_img']; ?>" alt=""></a>
                        </div>
                        <div class="post_text">
                            <a href="single-adoption.php?id=<?php echo $ads['id']; ?>"><?php echo $ads['pet_name']; ?></a>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, perspiciatis?</p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!--/recent post -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
<?php include_once 'partials/footer.php'; ?>