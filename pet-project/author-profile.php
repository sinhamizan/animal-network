<?php 
  session_start();

  if( !isset( $_SESSION['email'] ) ) {
    header( 'location: index.php' );
  }

  include_once 'db.php';
  
  $author_id = $_SESSION['id'];

  $author_sql = "SELECT * FROM signup WHERE id='$author_id'";
  $author_data = mysqli_query( $con, $author_sql );

  $author_post_sql = "SELECT * FROM posts WHERE author_id='$author_id'";
  $author_post_data = mysqli_query( $con, $author_post_sql );
  $author_post_data2 = mysqli_query( $con, $author_post_sql );

?>

<!DOCTYPE html>
<html>
<head>
<title>Author Profile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
<script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script> 
<script>
$(document).ready(function(){
    var $modal = $('#modal_crop');
    var crop_image = document.getElementById('sample_image');
    var cropper;
    $('#upload_image').change(function(event){
        var files = event.target.files;
        var done = function(url){
            crop_image.src = url;
            $modal.modal('show');
        };
        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });
    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(crop_image, {
            aspectRatio: 1,
            viewMode: 3,
            preview:'.preview'
        });
    }).on('hidden.bs.modal', function(){
        cropper.destroy();
        cropper = null;
    });
    $('#crop_and_upload').click(function(){
        canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
        });
        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result; 
                var post_text = $("#post_text").val();
                $.ajax({
                    url:'cropper.php',
                    method:'POST',
                    data:{crop_image:base64data,post_text:post_text},
                    success:function(data)
                    {
                      $modal.modal('hide');
                      top.location.href="home.php";
                    }
                });
            };
        });
    });
});
</script>

  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/default.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

  
<style>
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
</head>
    <body>

    <header class="main_header">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-1 col-xl-1 col-lg-1">
            <div class="logo" style="opacity: 0; visibility: hidden;">
              <a href="home.php"><img src="assets/imgs/logo.png" alt=""></a>
            </div>
        </div>
        <div class="col-12 col-md-5 col-xl-5 col-lg-5">
          <div class="header-text" style="opacity: 0; visibility: hidden;">
            <p>A great platform for animals lover</p>
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

  <section class="author_page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
          <?php while( $info = mysqli_fetch_assoc( $author_data ) ): ?>
            <div class="author_profile">
              <div class="author_img">
                <?php 
                  if( $info['image'] ){?>
                    <img src="uploads/profiles/<?php echo $info['image']; ?>" alt="">
                  <?php } else {
                    echo '<img src="assets/imgs/profile.png" alt="">';
                  }
                ?>
              </div>
              <div class="author_content">
                <h2><?php echo $info['fulll_name']; ?> <span><a href="update-profile.php"><img src="assets/imgs/plus.png" alt=""></a></span></h2>
                <p><?php echo $info['bio']; ?></p>
              </div>
            </div>
          <?php endwhile; ?>
          <div class="create_post">
            <h3>Create New Post..</h3>
            <form method="post">
              <textarea class="form-control" name="post_text" id="post_text" placeholder="Enter your text here...."></textarea>
              <label for="">Upload Image</label>
              <input type="file" name="crop_image" class="crop_image" id="upload_image" />
            </form>
          </div>
        </div>
        <!--/author profile -->

        <div class="col-lg-6 col-xl-6 col-md-6 col-12">
          <div class="settings">
            <a href="user.php?id=<?php echo $author_id; ?>"><i class="fas fa-cog"></i> My Activites</a>
          </div>
          <div class="author_gallery">
            <h2>my gallery</h2>  
            <?php if( mysqli_num_rows( $author_post_data ) > 0 ): ?>
              <?php while( $posts = mysqli_fetch_assoc( $author_post_data ) ): ?>
                <div class="single_gallery">
                  <a href=""><img src="uploads/posts/<?php echo $posts['post_file']; ?>" alt=""></a>
                </div>
              <?php endwhile; else: ?>
              <p>No Post Posted yet!</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row">
    <div class="modal fade" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="" id="sample_image" />
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop_and_upload" class="btn btn-primary">Crop & Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>            
</div>
</div>


<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="footer_contact">
            <ul>
              <li><img src="assets/imgs/cat.png" alt=""> Animal Network</li>
              <li><img src="assets/imgs/email.png" alt=""> Official: animalnet@gmail.com</li>
              <li><img src="assets/imgs/phone.png" alt=""> Helpline: 009238792</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer_sociaa">
            <h3>Follow us</h3>
            <ul>
              <li><a href=""><img src="assets/imgs/facebook.svg" alt=""></a></li>
              <li><a href=""><img src="assets/imgs/insta.svg" alt=""></a></li>
              <li><a href=""><img src="assets/imgs/twiter.svg" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</footer>

  <!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->
  <!-- <script src="assets/js/bootstrap.min.js"></script> -->
  <script src="assets/js/owl.carousel.min.js"></script>
  <!-- <script src="assets/js/cropper.min.js"></script> -->
  <script src="assets/js/main.js"></script>

  </body>
</html>