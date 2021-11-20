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
              <p>We are <br> here to <br> help every  <br>animal <br> lover in <br> need</p>
              <h5>Call us for more information <br>+008 01734557866</h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  
<?php include_once 'partials/footer.php'; ?>