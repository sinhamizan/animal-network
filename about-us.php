<?php 
  session_start();
  if( isset( $_SESSION['email'] ) ) {
    include_once 'partials/header-primary.php';
  } else {
    include_once 'partials/header-secondary.php';
  }
  

?>

  <section class="about_us_page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
         <div class="about_us">
           <h2>About Us</h2>
           <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse numquam quis, laudantium autem qui omnis sequi, tenetur odit provident nobis officiis fugit vel, odio porro consectetur at? Accusantium, nulla voluptas.</p>
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, laborum et placeat tempore tempora, eius repellendus illum suscipit vitae id iste incidunt quas rem soluta neque debitis libero, mollitia eaque! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore dolorem odit quia ipsa quibusdam ipsum, quis reprehenderit molestiae. Voluptate iste odio cumque reprehenderit mollitia autem, ea numquam quod! Reiciendis, a!</p>
         </div>
        </div>
        <div class="col-lg-4 col-12 col-xl-4 col-md-4">
          <div class="group_member">
            <img src="assets/imgs/man.jpg" alt="">
            <h3>group member Name</h3>
            <p>designation</p>
          </div>
        </div>
        <div class="col-lg-4 col-12 col-xl-4 col-md-4">
          <div class="group_member">
            <img src="assets/imgs/man.jpg" alt="">
            <h3>group member Name</h3>
            <p>designation</p>
          </div>
        </div>
        <div class="col-lg-4 col-12 col-xl-4 col-md-4">
          <div class="group_member">
            <img src="assets/imgs/man.jpg" alt="">
            <h3>group member Name</h3>
            <p>designation</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  

<?php include_once 'partials/footer.php'; ?>