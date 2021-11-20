<?php 

  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';
  include_once 'db.php';

  $ads_id = $_GET[ 'id' ];
  $sql = "SELECT * FROM sell_pets WHERE id = '{$ads_id}'";
  $get_ads = mysqli_query( $con, $sql );
 
?>


  <section class="buy_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="buy_icon sells">
            <img src="assets/imgs/cart.svg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

<?php while( $ads = mysqli_fetch_assoc( $get_ads ) ): ?>
<div class="adoption_single_page">
  <section class="tips_middle">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="buy_title">
          <div class="alert alert-primary" role="alert">
            <h3>Details About <span><?php echo $ads['pet_name']; ?></span></h3>
          </div>
          </div>
        </div>
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="card mb-3" style="max-width: 100%;">
          <div class="row g-0">
            <div class="col-md-5">
              <div class="adoption_single_img">
                <img src="uploads/sells/<?php echo $ads['pet_img']; ?>" alt="Pet Image">
              </div>
              </div>
              <div class="col-md-7">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Pet Name:</strong> <?php echo $ads['pet_name']; ?></li>
                  <li class="list-group-item"><strong>Pet category:</strong> <?php echo $ads['pet_name']; ?></li>
                  <li class="list-group-item"><strong>Price:</strong> TK<?php echo $ads['pet_price']; ?></li>
                  <li class="list-group-item"><strong>Location:</strong> <?php echo $ads['location']; ?></li>
                  <li class="list-group-item"><strong>Full Address: </strong><?php echo $ads['address']; ?></li>
                  <li class="list-group-item">For buy this pet please call <strong>0178251436</strong></li>
                  <li class="list-group-item"><?php echo $ads['pet_details']; ?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php endwhile; ?>

<?php include_once 'partials/footer.php'; ?>