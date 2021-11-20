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


  // show comments
  $sql2 = "SELECT * FROM comments WHERE post_id=$post_id";
  $res = mysqli_query( $con, $sql2 );
  $total_coms = mysqli_num_rows($res);
?>

<section class="single_post_page">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 col-md-8 offset-md-2">
          <div class="all_posts single-page">

                <div class="single_post">
                    <div class="post_content">
                        <h3><?php echo $post_info['fulll_name']; ?><p><?php echo $post_info['post_date']; ?></p></h3>
                        <img src="uploads/posts/<?php echo $post_info['post_file']; ?>" alt="Post Image">
                        <p class="pt-3"><?php echo $post_info['post_text']; ?></p>
                    </div>
                </div>

                <div class="post_comments pt-5">
                  <hr>
                  <div class="total_love">
                  <ul>
                        <?php 
                          $liker = $_SESSION['id'];
                          $post_love = $post_id;

                          $sql_count = "SELECT * FROM likes WHERE post='$post_love'";
                          $qs_count = mysqli_query( $con, $sql_count );
                          $total_love = mysqli_num_rows( $qs_count );

                          $sql_love = "SELECT * FROM likes WHERE liker='$liker' && post='$post_love'";
                          $qs_love = mysqli_query( $con, $sql_love );
                          $love_rs = mysqli_num_rows( $qs_love );
                          if( $love_rs > 0 ): ?>
                            <li><p data="<?php echo $post_id; ?>" class="love_back"><i id="heart_back" class="fas fa-heart"></i><span id="show_love"><?php echo $total_love; ?></span></p></li>
                          <?php else: ?>
                            <li><p data="<?php echo $post_id; ?>" class="love_react"><i id="heart_react" class="fas fa-heart"></i><span id="show_love"><?php echo $total_love; ?></span></p></li>
                          <?php endif; ?>
                      </ul>
                  </div>
                  <hr>
                  <div class="new-comment pb-5">
                    <h4>Add New Comments</h4>
                    <form action="" method="post">
                      <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                      <input type="submit" value="Comment" name="submit_comment" id="submit_comment" class="btn btn-info mt-2" data="<?php echo $post_id; ?>">
                    </form>
                  </div>
                  <h3>Comments (<?php echo $total_coms; ?>)</h3>
                  <hr>
                  <div id="show_comments">
                  <?php if( $total_coms > 0 ):
                    while($row = mysqli_fetch_assoc($res)): ?>
                      <div class='single_comment'>
                          <h3><?php echo $row['user_name']; ?></h3>
                          <p><?php echo $row['comment']; ?></p>
                      </div>
                    <?php endwhile; else: ?>
                      <p>No Comment add yet!</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
  </section>
  

  <script>

  </script>
  
<?php include_once 'partials/footer.php'; ?>