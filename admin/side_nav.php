<?php

require "../config/db.php";
$reg_num = $_SESSION["reg_num"];
$name = $_SESSION["fname"];
$sql2 = "SELECT `profile_img_path` FROM `alumni_users` WHERE registration_number='$reg_num'";
$result2 = mysqli_query($conn, $sql2);
if ($result2) {
  $row = $result2->fetch_assoc();
  $userpic = $row["profile_img_path"];
} else {
  $_SESSION["message"] = "Something went worng:Please Try again later";
  header("location:../error.php");
}
?>

<div class="vertical-nav bg-white" id="sidebar" style="z-index: 99">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center position-relative">
      <img src="<?php echo $userpic ?>" alt="user profile picture" class="mr-3 rounded-circle img-thumbnail  shadow-sm" style="position:relative;width:65px;height:65px;" />
      <div class="media-bod">
        <p class="font-weight-light text-muted mx-2 mb-1">Hello,
        </p>
        <h4 class="mx-2 my-0"><?php echo $name; ?></h4>
        <button class="btn position-absolute" data-bs-toggle="modal" data-bs-target="#profilepicedit" style="top: 35px;left:37px;color:rgba(0,0,0,0.5);"><i class="fa-solid fa-camera"></i></button>
      </div>
    </div>
  </div>
  <ul class="nav flex-column mb-0">
    <li class="nav-item home">
      <a href="./dashhome.php" class="nav-link text-white font-italic">
        <i class="fa-solid fa-house-user"></i>
        Home
      </a>
    </li>
    <li class="nav-item profile">
      <a href="./alumni_profile.php" class="nav-link text-white font-italic">
        <i class="fa fa-solid fa-user" aria-hidden="true"></i>
        Profile
      </a>
    </li>
    <li class="nav-item help">
      <a href="./help_students.php" class="nav-link text-white font-italic">
        <i class="fa-solid fa-handshake-angle text-white"></i>
        Help students
      </a>
    </li>
    <li class="nav-item">
      <a href="../index.php" class="nav-link text-white font-italic">
        <i class="fa-sharp fa-solid fa-share" style="rotate:180deg;"></i>
        Back to alumni page
      </a>
    </li>
    <li class="nav-item">
      <a href="./logout.php" class="nav-link text-white font-italic" onclick="return  confirm('Do you want to Log Out ?')">
        <i class="fa-solid fa-right-from-bracket"></i>
        Log Out
      </a>
    </li>
  </ul>
</div>
<!-- Modal for profile edit -->
<div class="modal" id="profilepicedit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="change_profilepic.php" method="post" enctype="multipart/form-data">
          <div class="col-12 pt-2">
            <label for="profile_pic" class="form-lable">Choose a profile pic </label>
            <small class="d-block text-small mt-1 mb-1">(only .png, .jpg, .jpeg type files ans maximum file size 2mb)</small>

            <input class="form-control" type="file" name="profile_pic" id="profile_pic" accept="image/png,image/jpeg" required />
          </div>
          <div class="col-12 mt-3">
            <button type="submit" class="btn w-100 btn-outline-success" id="fpost">Change</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End of nav bar -->
<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 position-fixed" style="z-index: 99;">
    <i class="fa fa-bars mr-2"></i>
    <!-- <small class="text-uppercase font-weight-bold"></small></button> -->
  </button>
</div>