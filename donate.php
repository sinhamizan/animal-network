<?php 

  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';

?>


  <section class="donate_page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="contact_img"></div>
          <div class="contact_content">
              <h2>Donate Now</h2>
              <h4>Bkash Number</h4>
              <p>01455-698547</p>
              <h4>Rocket Number</h4>
              <p>01452-695847</p>
              <h4>Nagad number</h4>
              <p>01547-148965</p>
              <h4>Sonali Bank Account number</h4>
              <p>01547-148965</p>
              <h4>Brac Bank Account number</h4>
              <p>01547-148965</p>
              <h4>Bank Asia Account number</h4>
              <p>01547-148965</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  
<?php include_once 'partials/footer.php'; ?>