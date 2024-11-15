<!DOCTYPE html>
<html xmlns="http: //www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="assets/img/logo.png">

  <!-- Icon CSS -->
  <?php linkCSS('assets/css/vendor/materialdesignicons.min.css')?>
  <?php linkCSS('assets/css/vendor/remixicon.css')?>
  <?php linkCSS('assets/css/vendor/owl.carousel.min.css')?>

  <!-- Vendor CSS -->
  <?php linkCSS('assets/css/vendor/datatables.bootstrap5.min.css')?>
  <?php linkCSS('assets/css/vendor/responsive.datatables.min.css')?>
  <?php linkCSS('assets/css/vendor/daterangepicker.css')?>
  <?php linkCSS('assets/css/vendor/simplebar.css')?>
  <?php linkCSS('assets/css/vendor/bootstrap.min.css')?>
  <?php linkCSS('assets/css/vendor/apexcharts.css')?>
  <?php linkCSS('assets/css/vendor/jquery-jvectormap-1.2.2.css')?>

  <!-- Main CSS -->
  <?php linkCSS('assets/css/style.css')?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title> <?php echo $data['title']; ?></title>
</head>
<main class="wrapper sb-default ecom">
  <!-- Header -->
  <header class="cr-header">
    <div class="message" style="position: absolute; display: block; margin-top: 100px; margin-left: 400px !important;  margin-right: 400px !important; ">
      <?php $this->getFlash("error", "alert alert-warning alertclass");?>
      <?php $this->getFlash("success", "alert alert-success");?>
    </div>
    <div class="container-fluid">
      <div class="cr-header-items">
        <div class="left-header">
          <a href="javascript:void(0)" class="cr-toggle-sidebar">
            <span class="outer-ring">
              <span class="inner-ring"></span>
            </span>
          </a>
          <div class="header-search-box">
            <div class="header-search-drop">
              <a href="javascript:void(0)" class="open-search"><i class="ri-search-line"></i></a>
              <form class="cr-search">
                <input class="search-input" type="text" placeholder="Search...">
                <a href="javascript:void(0)" class="search-btn"><i class="ri-search-line"></i>
                </a>
              </form>
            </div>
          </div>
        </div>
        <div class="right-header">
          <div class="cr-right-tool">
            <a class="cr-notify" href="javascript:void(0)">
              <i class="ri-notification-2-line"></i>
              <span class="label"></span>
            </a>
          </div>
          <div class="cr-right-tool cr-user-drop">
            <div class="cr-hover-drop">
              <div class="cr-hover-tool">
                <?php linkIMG('assets/img/user/1.jpg', 'user', 'user', '', '') ?>
              </div>
              <div class="cr-hover-drop-panel right">
                <div class="details">
                  <h6>Admin</h6>
                </div>
                <ul class="border-top">
                  <li><a href="team-update.html">Settings</a></li>
                </ul>
                <ul class="border-top">
                  <li><a href="<?php echo BASEURL?>/dashboard/authlogout"><i class="ri-logout-circle-r-line"></i>Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>