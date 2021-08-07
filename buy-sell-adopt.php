<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';

  $adopt_sql = "SELECT * FROM adopt_pets ORDER BY id DESC LIMIT 2";
  $get_ads = mysqli_query( $con, $adopt_sql );

  $sell_sql = "SELECT * FROM sell_pets ORDER BY id DESC LIMIT 2";
  $get_sell = mysqli_query( $con, $sell_sql );
?>


  <section class="buy_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="buy_icon">
            <img src="assets/imgs/cart.svg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="tips_middle">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="buy_title">
            <h3>buy sell & adopt pets</h3>
          </div>
        </div>
        <div class="col-lg-2 col-xl-2 col-md-4 mobile">
          <div class="new_ads">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href=""><i class="fas fa-plus"></i> new ads</a>
          </div>
        </div>
        <div class="col-lg-5 col-xl-5 col-md-4">
          <div class="adopt_pets">
            <h3>Discover adoption ads</h3>
            <?php while( $ads = mysqli_fetch_assoc( $get_ads ) ): ?>
              <div class="single_ads">
                <img src="uploads/adopts/<?php echo $ads['pet_img']; ?>" alt="">
                <a href="single-adoption.php?id=<?php echo $ads['id']; ?>"><?php echo $ads['pet_name']; ?></a>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $ads['location']; ?></p>
              </div>
            <?php endwhile; ?>
            <!--/single ads -->

            <div class="see_more">
              <a href="adoption.php">see more <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <!--/adopt -->

        <div class="col-lg-2 col-xl-2 col-md-4">
          <div class="new_ads desktop">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href=""><i class="fas fa-plus"></i> new ads</a>
          </div>
        </div>

        <div class="col-lg-5 col-xl-5 col-md-4">
          <div class="adopt_pets">
            <h3>Discover selling ads</h3>
            <?php while( $ads = mysqli_fetch_assoc( $get_sell ) ): ?>
              <div class="single_ads">
                <img src="uploads/sells/<?php echo $ads['pet_img']; ?>" alt="">
                <a href="single-buy-sell.php?id=<?php echo $ads['id']; ?>"><?php echo $ads['pet_name']; ?></a>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $ads['location']; ?></p>
              </div>
            <?php endwhile; ?>
            <!--/single ads -->

            <div class="see_more">
              <a href="buy-sell.php">see more <i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Form Button -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Adopt or Sell Pets</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center pb-5">
          <a href="adoption-form.php">New ads for Adoption</a>
          <a href="buy-sell-form.php">New ads for Sell</a>
        </div>
      </div>
    </div>
  </div>


<?php include_once 'partials/footer.php'; ?>