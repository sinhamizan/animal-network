<?php 
  session_start();

  include_once 'db.php';

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  // slider
  $sql = "SELECT * FROM doctors";
  $res = mysqli_query( $con, $sql );

  // modal
  $sql2 = "SELECT * FROM doctors";
  $res2 = mysqli_query( $con, $sql2 );

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctors</title>

  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/default.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>

  <header class="main_header doctor">
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

  <section class="dorctor_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="doctor_icon">
            <img src="assets/imgs/doctor-icon.jpg" alt="">
            <h3>Live Chat And Talk To Ours Doctor's</h3>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="dorctor_btm">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="doctor_slider owl-carousel">
            <?php if( mysqli_num_rows( $res ) > 0 ): 
              while( $row = mysqli_fetch_assoc( $res ) ):  
            ?>
              <div class="single_doctor">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id']; ?>">
                  <div class="doc_img">
                    <?php if( $row['picture'] ): ?>
                      <img src="doctors/upload/profiles/<?php echo $row['picture']; ?>" alt="">
                    <?php else: ?>
                      <img src="assets/imgs/profile.png" alt="">
                    <?php endif; ?>
                  </div>
                  <div class="doc_content">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['designation']; ?></p>
                  </div>
                </button>
              </div>
            <?php endwhile; endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php if( mysqli_num_rows( $res2 ) > 0 ): 
    while( $row2 = mysqli_fetch_assoc( $res2 ) ):  
  ?>
    <div class="modal fade" id="exampleModal<?php echo $row2['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row2['id']; ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?><span><a class="btn btn-info" href="chat.php?id=<?php echo $row2['id']; ?>">Send a Message</a></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="doc-left">
              <p><strong>Designation: </strong><?php echo $row2['designation']; ?></p>
              <p><strong>Doctor's Detail: </strong><?php echo $row2['details']; ?></p>
            </div>
            <div class="doc-right">
              <?php if( $row2['picture'] ): ?>
                <img src="doctors/upload/profiles/<?php echo $row2['picture']; ?>" alt="">
              <?php else: ?>
                <img src="assets/imgs/profile.png" alt="">
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; endif; ?>


<?php include_once 'partials/footer.php'; ?>