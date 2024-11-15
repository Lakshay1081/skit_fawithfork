<!DOCTYPE html>
<html lang="zxx">

<head>
  <title><?php echo 'Signin Admin Account';?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="Signin Sabjiwala Admin Manager Accounts" name="description" />
  <meta content="Sabjiwala" name="author"/>
  <meta name="MobileOptimized" content="320">

  <link rel="shortcut icon" href="assets/img/logo.png">
  <link href="assets/css/vendor/materialdesignicons.min.css" rel="stylesheet">
  <link href="assets/css/vendor/remixicon.css" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href='assets/css/vendor/datatables.bootstrap5.min.css' rel='stylesheet'>
  <link href='assets/css/vendor/responsive.datatables.min.css' rel='stylesheet'>
  <link href='assets/css/vendor/daterangepicker.css' rel='stylesheet'>
  <link href="assets/css/vendor/simplebar.css" rel="stylesheet">
  <link href="assets/css/vendor/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/vendor/apexcharts.css" rel="stylesheet">
  <link href="assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet">

  <!-- Main CSS -->
  <link id="main-css" href="assets/css/style.css" rel="stylesheet">  
</head>

<body>

  <main class="wrapper sb-default">
    <section class="auth-section anim">
      <div class="cr-login-page">
        <div class="container-fluid no-gutters">
          <div class="row">
            <div class="offset-lg-6 col-lg-6">
              <div class="content-detail">
                <div class="main-info">
                  <div class="hero-container">
                    <!-- Login form -->
                    <form class="login-form" action="<?php echo BASEURL?>/signin/adminsignin" method="post" enctype="multipart/form-data" novalidate>
                      <div class="imgcontainer">
                        <a href="<?php echo BASEURL?>">
                          <?php linkIMG('assets/img/logo.png', 'logo', 'logo', '', '')?>  
                        </a>
                      </div>
                      <div class="input-control">
                        <input type="text" placeholder="Enter Username" name="username">
                        <span class="password-field-show">
                          <input type="password" placeholder="Enter Password" name="password" class="password-field">
                          <span data-toggle=".password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </span>
                        <label class="label-container">Remember me
                          <input type="checkbox">
                          <span class="checkmark"></span>
                        </label>
                        <span class="psw"><a href="forgot.html" class="forgot-btn">Forgot
                            password?</a></span>
                        <div class="login-btns">
                          <button type="submit">Login</button>
                        </div>
                        <div class="mt-2">
                          <?php $this->getFlash("error", "alert alert-warning alertclass");?>
                          <?php $this->getFlash("success", "alert alert-success");?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="assets/js/vendor/jquery-3.6.4.min.js"></script>
  <script src="assets/js/vendor/simplebar.min.js"></script>
  <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
  <script src="assets/js/vendor/apexcharts.min.js"></script>
  <script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Data Tables -->
  <script src='assets/js/vendor/jquery.datatables.min.js'></script>
  <script src='assets/js/vendor/datatables.bootstrap5.min.js'></script>
  <script src='assets/js/vendor/datatables.responsive.min.js'></script>
  <!-- Caleddar -->
  <script src="assets/js/vendor/jquery.simple-calendar.js"></script>
  <!-- Date Range Picker -->
  <script src="assets/js/vendor/moment.min.js"></script>
  <script src="assets/js/vendor/daterangepicker.js"></script>
  <script src="assets/js/vendor/date-range.js"></script>

  <!-- Main Custom -->
  <script src="assets/js/main.js"></script>
</body>

</html>