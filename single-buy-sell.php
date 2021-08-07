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
          <div class="buy_icon">
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
            <h3>Details About <span><?php echo $ads['pet_name']; ?></span></h3>
          </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-6">
          <div class="adoption_single_img">
            <img src="uploads/sells/<?php echo $ads['pet_img']; ?>" alt="Pet Image">
          </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-6">
          <div class="adoption_single_info">
            <h3><strong>Pet Name:</strong> <?php echo $ads['pet_name']; ?></h3>
            <h4><strong>Pet category:</strong> <?php echo $ads['pet_name']; ?></h4>
            <h4><strong>price:</strong> TK<?php echo $ads['pet_price']; ?></h4>
            <h4><strong>location:</strong> <?php echo $ads['location']; ?></h4>
            <p><strong>Full Address: </strong><?php echo $ads['address']; ?></p>
            <p>for adopt this pet please call <strong>0178251436</strong></p>
          </div>
        </div>

        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="adoption_single_content">
            <h3>Description: </h3>
            <p><?php echo $ads['pet_details']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php endwhile; ?>

<?php include_once 'partials/footer.php'; ?>