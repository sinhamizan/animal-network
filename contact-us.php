<?php 
  session_start();
  if( isset( $_SESSION['email'] ) ) {
    include_once 'partials/header-primary.php';
  } else {
    include_once 'partials/header-secondary.php';
  }
  

?>

  <section class="contact_page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="contact_img"></div>
          <div class="contact_content">
              <h2>contact us</h2>
              <h4>compnay address</h4>
              <p>mirpur dhaka</p>
              <h4>mainling address</h4>
              <p>pet@gamil.com</p>
              <h4>phone number</h4>
              <p>015478965</p>
              <h2>follow us</h2>
              <ul>
                  <li><a href=""><img src="assets/imgs/facebook.svg" alt=""></a></li>
                  <li><a href=""><img src="assets/imgs/insta.svg" alt=""></a></li>
                  <li><a href=""><img src="assets/imgs/twiter.svg" alt=""></a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php include_once 'partials/footer.php'; ?>