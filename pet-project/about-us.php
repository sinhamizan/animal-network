<?php 
  session_start();
  if( isset( $_SESSION['email'] ) ) { ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>About Us</title>

      
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/all.css">
      <link rel="stylesheet" href="assets/css/default.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="assets/css/responsive.css">

    </head>
    <body>

      <header class="main_header contact">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6 col-xl-6 col-lg-6">
                <div class="logo">
                  <a href="home.php"><img src="assets/imgs/logo.png" alt=""></a>
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
                            <li><a href="dorctors.php">helpline</a></li>
                            <li><a href="update-bio.php">Update Profile</a></li>
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
            <div class="col-12 col-md-12 col-xl-12 col-lg-12">
              <div class="about_title">
                <h2>About Us</h2>
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
                          <li><a href="update-bio.php">Update Profile</a></li>
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

  <?php } else {
    include_once 'partials/header-secondary.php';
  }
  

?>

  <section class="about_us_page <?php if( !isset( $_SESSION['email'] ) ) { echo "about_secondary"; } ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12 col-xl-4 col-md-4">
          <div class="group_member">
            <img src="assets/imgs/s.png" alt="">
            <h3>Shariful Haque</h3>
            <p>BSc In CSE <br> Daffodil International University</p>
          </div>
        </div>
        <div class="col-lg-4 col-12 col-xl-4 col-md-4">
          <div class="group_member afroza">
            <img src="assets/imgs/afroza.png" alt="">
            <h3>Afroza Akter</h3>
            <p>BSc In CSE <br> Daffodil International University</p>
          </div>
        </div>
        <div class="col-lg-4 col-12 col-xl-4 col-md-4">
          <div class="group_member">
            <img src="assets/imgs/rakib.jpg" alt="">
            <h3>Md Rabiul Islam</h3>
            <p>BSc In CSE <br> Daffodil International University</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  

<?php include_once 'partials/footer.php'; ?>