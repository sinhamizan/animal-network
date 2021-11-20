<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/default.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>

  <header>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="secondary-menu">
            <ul>
              <li><a href="index.php">home</a></li>
              <li><a href="login.php">log in</a></li>
              <li><a href="about-us.php">about us</a></li>
              <li><a href="contact-us.php">contact us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>

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
                      <li><a href="index.php">home</a></li>
                      <li><a href="login.php">log in</a></li>
                      <li><a href="about-us.php">about us</a></li>
                      <li><a href="contact-us.php">contact us</a></li>
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