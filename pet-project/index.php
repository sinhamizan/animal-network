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
        <div class="col-lg-9 col-xl-9 col-md-9">
          <div class="banner-text">
            <h1>save <br>animal <br>save <br>planate</h1>
            <p>If animals could talk, they’d talk about us!</p>
          </div>
        </div>
        <div class="col-lg-3 col-xl-3 col-md-3">
          <div class="signup-btn">
            <a href="signup.php">sign up</a>
          </div>
        </div>
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="service_title">
            <h2>Our Services</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service_item one">
            <img src="assets/imgs/service-img1.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service_item two">
            <h3>Share Your Favorite Moments <br> With Your Pets</h3>
            <p>They were the most gentle beings, sweet, loving, and <br> reminded me of my dogs growing up. A few my cats, but <br> cats are a little less friendly sometimes.</p>
          </div>
        </div>
        <div class="col-lg-12 pt-1 pb-1">
          <hr>
        </div>
        <div class="col-lg-6">
          <div class="service_item three">
            <h3>Get Emergency Help</h3>
            <p>We are always here to help you. Whenever your pets<br> get sick or have any other problem just talk with our<br> experienced doctors and get important advice </p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service_item four">
            <img src="assets/imgs/service-img2.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-12 pt-1 pb-1">
          <hr>
        </div>
        <div class="col-lg-6">
          <div class="service_item five">
            <img src="assets/imgs/service-img3.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service_item six">
            <h3>Easily Buy Sell And Adopt  Pets <br> At One Place</h3>
            <p>They were the most gentle beings, sweet, loving, and <br> reminded me of my dogs growing up. A few my cats, but <br> cats are a little less friendly sometimes.</p>
          </div>
        </div>
        <div class="col-lg-12 pt-1 pb-1">
          <hr>
        </div>
        <div class="col-lg-6">
          <div class="service_item seven">
            <h3>Support Us & Become Our <br> Partner</h3>
            <p>We are working together to make this world a better <br> and safer place for the animals . Suppport us to <br> become a part of this projects.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service_item eight">
            <img src="assets/imgs/service-img4.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="pet_care">
            <h2>I'm Your Pet. I Need Your Love And Care</h2>
            <img src="assets/imgs/pet-care.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  

<?php include_once 'partials/footer.php' ?>

