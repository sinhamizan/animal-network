<?php
   session_start(); 
   $get_url = $_SERVER['PHP_SELF'];
   $get_page_array = explode( '/', $get_url );
   $url_count = count( $get_page_array );
   $get_page = explode( '.', $get_page_array[$url_count-1] );
   $page_name = $get_page[0];
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/cropper.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
				      <li class="menu-item-has-children dropdown <?php if($page_name=="messages"){ echo "active"; } ?>">
                     <a href="messages.php" >Messages</a>
                  </li>
                  <li class="menu-item-has-children dropdown <?php if($page_name=="profile"){ echo "active"; } ?>">
                     <a href="profile.php">My Profile</a>
                  </li>
                  <li class="menu-item-has-children dropdown <?php if($page_name=="update-profile"){ echo "active"; } ?>">
                     <a href="update-profile.php">Update profile</a>
                  </li>
                  <li class="menu-item-has-children dropdown <?php if($page_name=="update-password"){ echo "active"; } ?>">
                     <a href="update-password.php">Update Password</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="logout.php">Logout</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside> 
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.html">Pet Network</a>
                  <a class="navbar-brand hidden" href="index.html">Pet Network</a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if( isset( $_SESSION['admin_name'] ) ) { echo $_SESSION['admin_name']; } ?></a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>