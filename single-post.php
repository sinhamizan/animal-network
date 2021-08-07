<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';

  // 
  $post_id = $_GET['id'];
  $post_sql = "SELECT * FROM posts, signup WHERE posts.id='$post_id' and posts.author_id=signup.id";
  $post_qs = mysqli_query( $con, $post_sql );
  $post_info = mysqli_fetch_assoc( $post_qs );


  // Show Adoption Ads
  $adopt_sql = "SELECT * FROM adopt_pets ORDER BY id DESC LIMIT 5";
  $get_ads = mysqli_query( $con, $adopt_sql );

  // Show Buy Sells Ads
  $sell_sql = "SELECT * FROM sell_pets ORDER BY id DESC LIMIT 5";
  $get_sell = mysqli_query( $con, $sell_sql );
?>

<section class="posts_page">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-xl-8 col-md-7">
          <div class="search_area">
            <form action="search.php" method="POST">
              <input type="text" name="search_text" id="search_text" placeholder="Search by post description.......">
              <input type="submit" value="Search" name="search">
            </form>
          </div>
          <!-- Search Option -->
          
          <div class="all_posts">

                <div class="single_post">
                    <div class="post_content">
                        <h3><?php echo $post_info['fulll_name']; ?><p><?php echo $post_info['post_date']; ?></p></h3>
                        <img src="uploads/posts/<?php echo $post_info['post_file']; ?>" alt="Post Image">
                        <p class="pt-3"><?php echo $post_info['post_text']; ?></p>
                    </div>
                    <div class="post_other">
                        <ul>
                            <li><a href="" class="love_react"><i class="fas fa-heart"></i></a> <span>20</span></li>
                            <li><a href="" class="comments"><i class="fas fa-comments"></i></a> <span>5</span></li>
                        </ul>
                    </div>
                </div>
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