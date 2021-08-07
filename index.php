<?php 

  session_start();

  if( isset( $_SESSION['email'] ) ) {
    header( 'location: home.php' );
  }

  include_once 'partials/header-secondary.php';


?>

  <section class="home-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-xl-7 col-md-7">
          <div class="banner-text">
            <h1>save <br>animal <br>save <br>planate</h1>
          </div>
        </div>
        <div class="col-lg-5 col-xl-5 col-md-5">
          <div class="signup-btn">
            <a href="signup.php">sign up</a>
          </div>
        </div>
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="banner-btm-text">
            <p>Human dosen't exist without animal.......</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  

<?php include_once 'partials/footer.php' ?>