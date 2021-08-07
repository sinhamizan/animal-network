<?php 

  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';

  $sql = "SELECT * FROM sell_pets";
  $get_ads = mysqli_query( $con, $sql );

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

<div class="buy_sell_page">
  <section class="tips_middle">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="buy_title">
            <h3>buy & sell pets</h3>
          </div>
        </div>
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="new_ads">
            <a href="buy-sell-form.php"><i class="fas fa-plus"></i> Sell pets</a>
          </div>
        </div>
        
        <?php while( $ads = mysqli_fetch_assoc( $get_ads ) ): ?>
          <div class="col-lg-3 col-xl-3 col-md-3">
            <div class="buy_pets">
              <div class="single-item">
                <a href="single-buy-sell.php?id=<?php echo $ads['id']; ?>"><img src="uploads/sells/<?php echo $ads['pet_img'] ?>" alt="pet image"></a>
                <a href=""><?php echo $ads['pet_name']; ?></a>
                <p><i class="fas fa-map-marker-alt"></i><?php echo $ads['location']; ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

        <div class="post_pasination">
            <nav aria-label="...">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
          </div>

      </div>
    </div>
  </section>
</div>

<?php include_once 'partials/footer.php'; ?>