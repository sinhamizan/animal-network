<?php 

  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'partials/header-primary.php';

?>

  <section class="dorctor_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12">
          <div class="doctor_icon">
            <img src="assets/imgs/doctor-icon.jpg" alt="">
            <h3>our doctor's</h3>
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
            <div class="single_doctor">
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <div class="doc_img">
                  <img src="assets/imgs/profile.png" alt="">
                </div>
                <div class="doc_content">
                  <h3>Dr. Arifur Rabbi</h3>
                  <p>Veterinary Doctor</p>
                </div>
              </button>
            </div>
            <!--/single doctor -->

            <div class="single_doctor">
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                <div class="doc_img">
                  <img src="assets/imgs/profile.png" alt="">
                </div>
                <div class="doc_content">
                  <h3>Dr. Sagir Uddin Ahmed</h3>
                  <p>Veterinary Surgeon</p>
                </div>
              </button>
            </div>
            <!--/single doctor -->

            <div class="single_doctor">
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                <div class="doc_img">
                  <img src="assets/imgs/profile.png" alt="">
                </div>
                <div class="doc_content">
                  <h3>Dr. Md. Mahbubul Alam Bhuiyan</h3>
                  <p>Additional Veterinary officer</p>
                </div>
              </button>
            </div>
            <!--/single doctor -->

            <div class="single_doctor">
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                <div class="doc_img">
                  <img src="assets/imgs/profile.png" alt="">
                </div>
                <div class="doc_content">
                  <h3>Dr. Md. Luthfor Rahman</h3>
                  <p>Veterinary Surgeon</p>
                </div>
              </button>
            </div>
            <!--/single doctor -->

            <div class="single_doctor">
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                <div class="doc_img">
                  <img src="assets/imgs/profile.png" alt="">
                </div>
                <div class="doc_content">
                  <h3>Dr. Mohammad Mamunur Rashid</h3>
                  <p>Veterinary Surgeon</p>
                </div>
              </button>
            </div>
            <!--/single doctor -->

            <div class="single_doctor">
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal6">
                <div class="doc_img">
                  <img src="assets/imgs/profile.png" alt="">
                </div>
                <div class="doc_content">
                  <h3>Dr. Azmat Ali</h3>
                  <p>Pet Doctor</p>
                </div>
              </button>
            </div>
            <!--/single doctor -->
            
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dr. Arifur Rabbi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Designation: </strong>Veterinary Doctor</p>
        <p><strong>Qualification: </strong>DVM, MS (Bangladesh Agricultural University, Mymensingh)</p>
        <p><strong>Organization: </strong>The Pet Vet BD</p>
        <p><strong>Chamber Address: </strong>Ta 173/2 Lake view road, Godara ghat to Hatirjheel Road, Dhaka 1212</p>
        <p><strong>Visiting Hours: </strong>7.30PM to 10.00PM</p>
        <p><strong>Phone for serial: </strong>01785-636036</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Dr. Sagir Uddin Ahmed</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Designation: </strong>Veterinary Surgeon</p>
        <p><strong>Qualification: </strong>DVM, MS Vet Science, PhD</p>
        <p><strong>Organization: </strong>Dr. Sagir's Pet Clinic & Research Center</p>
        <p><strong>Chamber Address: </strong>House 3/2, Block D, Lalmatia Dhaka 1207, Bangladesh</p>
        <p><strong>Visiting Hours: </strong>8 am to 9 pm</p>
        <p><strong>Phone for serial: </strong>01752987436, 01706214759</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Dr. Md. Mahbubul Alam Bhuiyan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Designation: </strong>Additional Veterinary officer</p>
        <p><strong>Organization: </strong>Central Veterinary Hospital</p>
        <p><strong>Chamber Address: </strong>48 Kazi Allauddin Road,Dhaka 1000.</p>
        <p><strong>Visiting Hours: </strong>8 am to 9 pm </p>
        <p><strong>Phone for serial: </strong>01711-146012</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel4">Dr. Md. Luthfor Rahman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Designation: </strong>Veterinary Surgeon</p>
        <p><strong>Organization: </strong>Gulshan Pet-Animal Clinic</p>
        <p><strong>Chamber Address: </strong>4-5 DCC Super Market, Gulshan-2, Dhaka-1212</p>
        <p><strong>Visiting Hours: </strong>10am to 8pm</p>
        <p><strong>Phone for serial: </strong>01715-078434</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel5">Modal title 5</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Designation: </strong></p>
        <p><strong>Qualification: </strong></p>
        <p><strong>Organization: </strong></p>
        <p><strong>Chamber Address: </strong></p>
        <p><strong>Visiting Hours: </strong></p>
        <p><strong>Phone for serial: </strong></p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel6" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel6">Doctor 6</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Designation: </strong></p>
        <p><strong>Qualification: </strong></p>
        <p><strong>Organization: </strong></p>
        <p><strong>Chamber Address: </strong></p>
        <p><strong>Visiting Hours: </strong></p>
        <p><strong>Phone for serial: </strong></p>
      </div>
    </div>
  </div>
</div>

<?php include_once 'partials/footer.php'; ?>