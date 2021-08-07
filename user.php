<?php 
  session_start();
  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';
  
  $author_id = $_GET['id'];
  $i = 1;
  $j = 1;
  $k = 1;

  // user info
  $author_sql = "SELECT * FROM signup WHERE id='$author_id'";
  $author_data = mysqli_query( $con, $author_sql );

  // user posts
  $post_qs = "SELECT * FROM posts WHERE posts.author_id='$author_id'";
  $post_rs = mysqli_query( $con, $post_qs );

  // user sell ads
  $sell_qs = "SELECT * FROM sell_pets WHERE author_id='$author_id'";
  $sell_rs = mysqli_query( $con, $sell_qs );

  // user adoption ads
  $adopt_qs = "SELECT * FROM adopt_pets WHERE author_id='$author_id'";
  $adopt_rs = mysqli_query( $con, $adopt_qs );

?>

  <section class="user_page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-12">
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
                <h2><?php echo $info['fulll_name']; ?>
                  <?php  if( $author_id == $_SESSION['id'] ): ?>
                    <span><a href="update-bio.php"><i class="fas fa-cog"></i></a></span>
                  <?php endif; ?>
                </h2>
                <h4><span>Email:</span> <?php echo $info['email']; ?></h4>
                <h4><span>Phone:</span> 0<?php echo $info['phone']; ?></h4>
                <p><?php echo $info['bio']; ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <!--/author profile -->

        <div class="col-lg-12 col-xl-12 col-md-12 col-12">
          <div class="title">
            <?php  if( $author_id == $_SESSION['id'] ): ?>
              <h2>My all activites</h2>
            <?php else: ?>
              <h2>all activites</h2>
            <?php endif; ?>
          </div>
          <div class="author_gallery">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="my-gallery-tab" data-bs-toggle="tab" data-bs-target="#my-gallery" type="button" role="tab" aria-controls="my-gallery" aria-selected="true">All Posts</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="my-post-tab" data-bs-toggle="tab" data-bs-target="#my-post" type="button" role="tab" aria-controls="my-post" aria-selected="false">Ads for Adoption</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="ads_for_sells_tab" data-bs-toggle="tab" data-bs-target="#ads_for_sells" type="button" role="tab" aria-controls="my-post" aria-selected="false">Ads for Sells</button>
              </li>
            </ul>
            <!--/tabs button -->

            <div class="tab-content mt-5" id="myTabContent">
              <div class="tab-pane fade show active" id="my-gallery" role="tabpanel" aria-labelledby="my-gallery-tab">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Serial No.</th>
                      <th scope="col">Post Desctiption</th>
                      <th scope="col">Posted Date</th>
                      <?php  if( $author_id == $_SESSION['id'] ): ?>
                        <th scope="col">Actions</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while( $post = mysqli_fetch_assoc( $post_rs ) ): ?>
                    <tr>
                      <th scope="row"><?php echo $i++; ?></th>
                      <td><a href="single-post.php?id=<?php echo $post['id']; ?>"><?php echo substr( $post['post_text'], 0, 50 ); ?>......</a></td>
                      <td><?php echo $post['post_date']; ?></td>
                      <?php  if( $author_id == $_SESSION['id'] ): ?>
                        <td><a class="btn btn-info" href="update-post.php?id=<?php echo $post['id']; ?>">Edit</a> <a class="btn btn-danger" href="delete-post.php?id=<?php echo $post['id']; ?>">Delete</a></td>
                      <?php endif; ?>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
              <!--/posts tab -->

              <div class="tab-pane fade mt-5" id="my-post" role="tabpanel" aria-labelledby="my-post-tab">
                <div class="list-group mt-5">
                  <table class="table">
                    <thead>
                    <tr>
                      <th scope="col">Serial No.</th>
                      <th scope="col">Pet Name</th>
                      <th scope="col">Location</th>
                      <?php  if( $author_id == $_SESSION['id'] ): ?>
                        <th scope="col">Actions</th>
                      <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while( $adopt = mysqli_fetch_assoc( $adopt_rs ) ): ?>
                    <tr>
                      <th scope="row"><?php echo $j++; ?></th>
                      <td><a href="single-adoption.php?id=<?php echo $adopt['id']; ?>"><?php echo $adopt['pet_name']; ?></a></td>
                      <td><?php echo $adopt['location']; ?></td>
                      <?php  if( $author_id == $_SESSION['id'] ): ?>
                        <td><a class="btn btn-info" href="update-adopts-ads.php?id=<?php echo $adopt['id']; ?>">Edit</a> <a class="btn btn-danger" href="delete-adopts-ads.php?id=<?php echo $adopt['id']; ?>">Delete</a></td>
                      <?php endif; ?>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ tab -->

              <div class="tab-pane fade mt-5" id="ads_for_sells" role="tabpanel" aria-labelledby="ads_for_sells_tab">
                <div class="list-group mt-5">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Serial No.</th>
                      <th scope="col">Pet Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Location</th>
                      <?php  if( $author_id == $_SESSION['id'] ): ?>
                        <th scope="col">Actions</th>
                      <?php endif; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while( $sell = mysqli_fetch_assoc( $sell_rs ) ): ?>
                    <tr>
                      <th scope="row"><?php echo $k++; ?></th>
                      <td><a href="single-buy-sell.php?id=<?php echo $sell['id']; ?>"><?php echo $sell['pet_name']; ?></a></td>
                      <td><?php echo $sell['pet_price']; ?></td>
                      <td><?php echo $sell['location']; ?></td>
                      <?php  if( $author_id == $_SESSION['id'] ): ?>
                        <td><a class="btn btn-info" href="update-sell-ads.php?id=<?php echo $sell['id']; ?>">Edit</a> <a class="btn btn-danger" href="delete-sell-ads.php?id=<?php echo $sell['id']; ?>">Delete</a></td>
                      <?php endif; ?>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
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