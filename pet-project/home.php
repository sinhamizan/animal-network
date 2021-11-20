<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';

  $limit = 5;
  
  if( isset( $_GET['page'] ) ) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $offset = ( $page - 1 ) * $limit;

  
  // Total Posts and Pages
  $total_sql = "SELECT * FROM posts";
  $total_posts_qs = mysqli_query( $con, $total_sql );
  $total_posts = mysqli_num_rows( $total_posts_qs );
  $total_pages = ceil( $total_posts / $limit );

  // 
  $sql = "SELECT * FROM posts ORDER BY posts.id DESC LIMIT $offset, $limit";
  $get_posts = mysqli_query( $con, $sql );


  // Recents Posts
  $recent_sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
  $recent_posts = mysqli_query( $con, $recent_sql );

?>

<section class="posts_page">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-xl-8 col-md-7">
          <div class="all_posts">
            <?php while( $posts = mysqli_fetch_assoc( $get_posts ) ) { ?>
                <div class="single_post">
                    <div class="post_content">
                      <?php 
                        $post_author = $posts['author_id'];
                        $sql2 = "SELECT * FROM signup WHERE id = '{$post_author}'";
                        $get_ads2 = mysqli_query( $con, $sql2 ); 
                        $ads2 = mysqli_fetch_assoc( $get_ads2 );
                      ?>
                        <?php if($ads2[ 'id' ]): ?>
                          <h3><a href="user.php?id=<?php echo $post_author; ?>"><?php echo $ads2[ 'fulll_name' ]; ?></a></h3>
                        <?php else: ?>
                          <p>Deleted User</p>
                        <?php endif; ?>
                        <div class="img-info">
                          <div class="post-img">
                            <img src="uploads/posts/<?php echo $posts[ 'post_file' ]; ?>" alt="Post Image">
                          </div>
                          <div class="post_other">
                            <ul>
                              <?php 
                                $liker = $_SESSION['id'];
                                $post_love = $posts['id'];

                                $sql_count = "SELECT * FROM likes WHERE post='$post_love'";
                                $qs_count = mysqli_query( $con, $sql_count );
                                $total_love = mysqli_num_rows( $qs_count );

                                $sql_love = "SELECT * FROM likes WHERE liker='$liker' && post='$post_love'";
                                $qs_love = mysqli_query( $con, $sql_love );
                                $love_rs = mysqli_num_rows( $qs_love );
                                if( $love_rs > 0 ): ?>
                                  <li><p data="<?php echo $posts['id']; ?>" class="love_back"><i id="heart_back" class="fas fa-heart"></i></p> <span id="show_love"><?php echo $total_love; ?></span></li>
                                <?php else: ?>
                                  <li><p data="<?php echo $posts['id']; ?>" class="love_react"><i id="heart_react" class="fas fa-heart"></i></p> <span id="show_love"><?php echo $total_love; ?></span></li>
                                <?php endif; ?>

                                <?php 
                                  $sqlc = "SELECT * FROM comments WHERE post_id=$post_love";
                                  $resc = mysqli_query( $con, $sqlc );
                                  $total_coms = mysqli_num_rows($resc);
                                ?>
                                <li><a href="single-post.php?id=<?php echo $posts['id']; ?>" class="comments"><i class="fas fa-comments"></i></a> <span><?php echo $total_coms; ?></span></li>
                            </ul>
                          </div>
                        </div>
                        <h4><?php  echo substr( $posts[ 'post_text' ], 0, 100 ); ?>... <a href="single-post.php?id=<?php echo $posts['id']; ?>">see more</a></h4>
                    </div>
                    
                </div>
                <hr>
                <!--/single post -->
            <?php } ?>
          </div>

          <?php if( $total_posts > $limit ): ?>
            <div class="post_pasination">
              <nav aria-label="...">
                <ul class="pagination">
                  <?php if( $page > 1 ): ?>
                    <li class="page-item">
                      <a class="page-link" href="<?php echo "?page=".$page-1; ?>" tabindex="-1" aria-disabled="true">Prev</a>
                    </li>
                    <?php endif; ?>
                  <?php for( $i=1; $i<=$total_pages; $i++ ): ?>
                    <li class="page-item <?php if($page == $i){ echo "active"; } ?>" aria-current="page"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php endfor; 
                  if( $page < $total_pages ):
                  ?>
                  <li class="page-item">
                    <a class="page-link" href="<?php echo "?page=".$page+1; ?>">Next</a>
                  </li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>
          <?php endif; ?>
        </div>

        
        <div class="col-lg-4 col-xl-4 col-md-5">
          <?php include_once 'partials/main-sidebar.php'; ?>
        </div>
      </div>
    </div>
  </section>
  
  
<?php include_once 'partials/footer.php'; ?>