<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  // include_once 'partials/header-primary.php';
  include_once 'db.php';

  $adopt_sql = "SELECT * FROM adopt_pets ORDER BY id DESC LIMIT 2";
  $get_ads = mysqli_query( $con, $adopt_sql );

  $sell_sql = "SELECT * FROM sell_pets ORDER BY id DESC LIMIT 2";
  $get_sell = mysqli_query( $con, $sell_sql );
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy Sell and Adopt</title>

  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/default.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>

  <header class="main_header shop">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-1 col-xl-1 col-lg-1">
            <div class="logo">
              <a href="home.php"><img src="assets/imgs/logo.png" alt=""></a>
            </div>
        </div>
        <div class="col-12 col-md-5 col-xl-5 col-lg-5">
          <div class="header-text">
            <p>Buy Sell & Adopt  Pets</p>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-6 col-lg-6">
          <div class="primary-menu">
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="author-profile.php">Profile</a></li>
                <li><a href="buy-sell-adopt.php">shop</a></li>
                <li><a><img src="assets/imgs/menu.png" alt=""></a>
                    <ul class="more_menu">
                        <li><a href="doctors.php">helpline</a></li>
                        <li><a href="update-profile.php">Update Profile</a></li>
                        <li><a href="update-password.php">Update Password</a></li>
                        <li><a href="tips.php">tips</a></li>
                        <li><a href="donate.php">donate</a></li>
                        <li><a href="about-us.php">about us</a></li>
                        <li><a href="contact-us.php">contact us</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href=""></a></li>
                    </ul>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Menu -->

<header class="mobile_menu_area">
    <div class="container">
        <div class="row">
            <div class="col-4">
              <div class="logo">
                <a href="home.php"><img src="assets/imgs/logo.png" alt=""></a>
              </div>
            </div>
            <div class="col-8">
                <div class="mobile_icon">
                    <p onclick="openMenu();">menu</p>
                </div>
                <div id="mobile_menu" class="mobile_menu">
                    <ul>
                      <li><a href="dorctors.php">helpline</a></li>
                      <li><a href="update-profile.php">Update Profile</a></li>
                      <li><a href="update-password.php">Update Password</a></li>
                      <li><a href="tips.php">tips</a></li>
                      <li><a href="donate.php">donate</a></li>
                      <li><a href="about-us.php">about us</a></li>
                      <li><a href="contact-us.php">contact us</a></li>
                      <li><a href="logout.php">Logout</a></li>
                      <li><a href=""></a></li>
                    </ul>
                    <div class="menu_close">
                        <p onclick="closeMenu();">X</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
  <!--/Mobile Menu -->

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
        <div class="col-lg-2 col-xl-2 col-md-4 mobile">
          <div class="new_ads">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href=""><i class="fas fa-plus"></i> new ads</a>
          </div>
        </div>
        <div class="col-lg-4 col-xl-4 col-md-4">
          <div class="adopt_pets">
            <h3>Discover adoption ads</h3>
            <?php while( $ads = mysqli_fetch_assoc( $get_ads ) ): ?>
              <div class="single_ads">
                <div class="img-outer">
                  <img src="uploads/adopts/<?php echo $ads['pet_img']; ?>" alt="">
                </div>
                <a href="single-adoption.php?id=<?php echo $ads['id']; ?>"><?php echo $ads['pet_name']; ?></a>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $ads['location']; ?></p>
              </div>
            <?php endwhile; ?>
            <!--/single ads -->

            <div class="see_more">
              <a href="adoption.php">see more</a>
            </div>
          </div>
        </div>
        <!--/adopt -->

        <div class="col-lg-4 col-xl-4 col-md-4">
          <div class="new_ads desktop">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href=""><i class="fas fa-plus"></i> new ads</a>
          </div>
        </div>

        <div class="col-lg-4 col-xl-4 col-md-4">
          <div class="adopt_pets">
            <h3>Discover selling ads</h3>
            <?php while( $ads = mysqli_fetch_assoc( $get_sell ) ): ?>
              <div class="single_ads">
                <div class="img-outer">
                  <img src="uploads/sells/<?php echo $ads['pet_img']; ?>" alt="">
                </div>
                <div class="sells_pet">
                  <a href="single-buy-sell.php?id=<?php echo $ads['id']; ?>"><?php echo $ads['pet_name']; ?></a>
                  <h5>$<?php echo $ads['pet_price']; ?></h5>
                </div>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo $ads['location']; ?></p>
              </div>
            <?php endwhile; ?>
            <!--/single ads -->

            <div class="see_more">
              <a href="buy-sell.php">see more</a>
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