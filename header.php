<?php
session_start();
if (!(isset($_SESSION["log_in"])))
  $_SESSION["log_in"] = 0;
if (isset($_SESSION["type"]))
  $type = $_SESSION["type"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./images/logo/logo.png">
  <title>Welcome to Psgim Alumni</title>
  <link rel="stylesheet" href="./css/style.css" class="stylesheet">
  <link rel="stylesheet" href="./css/gal_style.css" class="stylesheet">
  <link rel="stylesheet" href="./css/bootstrap.css" class="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/b930155f8d.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="./js/validate_form.js"></script>
</head>

<body>
  <section>
    <div class="nav-btn">
      <?php
      if ($_SESSION["log_in"] == 0) :
      ?>
        <a href="#loginModal" class="trigger-btn" data-toggle="modal"><button class="btn loginbtn" type="button">Login</button>
        </a>
        <!-- <a href="#regModal" class="trigger-btn" data-toggle="modal"><button class="btn regbtn" type="button">Register</button></a> -->
      <?php
      else :
      ?>
        <!-- ./admin/admin_home.php -->
        <a href="<?php if ($type == 2) echo './admin/alumni_profile.php';
                  else echo './admin/admin_home.php'; ?>" class="trigger-btn"><button class="btn regbtn" type="button">Profile</button></a>
      <?php
      endif;
      ?>
    </div>
  </section>
  <section>
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="./images/logo/logo3.png" alt="..." height="56">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link home" aria-current="page" href="./index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link news" type="text/" href="./news.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link events" href="./events.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link alumniNeeds" href="./alumniNeed.php">Alumni needs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link gallery" href="./gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link aboutUs" href="./aboutus.php">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link contactUs" href="./contactus.php">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <!-- Login Modal -->
  <div id="loginModal" class="modal fade">
    <div class="modal-dialog modal-login">
      <div class="modal-content">
        <form action="./sign_in.php" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Login</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="reg_num">Register number </label>
              <input type="text" class="form-control" required="required" name="reg_num" id="reg_num" maxlength="8">
            </div>
            <div class="form-group">
              <div class="clearfix">
                <label for="pass">Password</label>
              </div>
              <div class="input-group mb-2 mr-sm-2">
                <input type="password" name="pass" class="form-control" required="required" id="pass">
                <div class="input-group-text " id="lceye"><i class="fas fa-eye-slash" id="leye"></i></div>
              </div>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <input type="submit" name="submit" class="btn btn-primary" value="Login">
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Registration Modal
  <div id="regModal" class="modal fade">
    <div class="modal-dialog modal-registration">
      <div class="modal-content">
        <form action="./register.php" method="post">
          <div class="modal-header">
            <h4 class="modal-title">Register</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="rreg_num">Register Number:</label>
              <input type="text" class="form-control" name="rreg_num" required="required" id="rreg_num" maxlength="8">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" required="required" id="email" maxlength="30">
            </div>
            <div class="form-group">
              <label for="number">Mobile Number</label>
              <input type="number" class="form-control" name="number" required="required" id="number" maxlength="10">
            </div>
            <div class="form-group">
              <label for="rpass">Password</label>
              <div class="input-group mb-2 mr-sm-2">
                <input type="password" class="form-control" name="rpass" required="required" id="rpass">
                <div class="input-group-text" id="beye"><i class="fas fa-eye-slash" id="eye"></i>
                </div>
              </div>
              <label for="cpass">Confirm password</label>
              <div class="input-group mb-2 mr-sm-2">
                <input type="password" class="form-control" name="cpass" required="required" id="cpass">
                <div class="input-group-text " id="bceye"><i class="fas fa-eye-slash" id="ceye"></i></div>
              </div>
              <small class="invisible text-danger ml-1 mt-1 text-small" id="pinfo">*Password and confirm password are not same* </small>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" name="submit" value="Register" id="rsubmit">
          </div>
        </form>
      </div>
    </div>
  </div> -->