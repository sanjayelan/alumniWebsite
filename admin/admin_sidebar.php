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
            <a href="./admin_home.php" class="nav-link text-white font-italic">
                <i class="fa-solid fa-house-user"></i>
                Home
            </a>
        </li>
        <li class="nav-item news">
            <a href="./admin_news.php" class="nav-link text-white font-italic">
                <i class="fa-solid fa-newspaper"></i>
                News
            </a>
        </li>
        <li class="nav-item events">
            <a href="./admin_events.php" class="nav-link text-white font-italic">
                <i class="fa-solid fa-calendar"></i>
                Events
            </a>
        </li>
        <li class="nav-item queries">
            <a href="./admin_userquries.php" class="nav-link text-white font-italic">
                <i class="fa-solid fa-comments"></i>
                Queries
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-white font-italic" data-bs-toggle="modal" data-bs-target="#regModal">
                <i class="fa-solid fa-address-card"></i>
                Register
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
<!-- End of nav bar -->

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

<!-- Registration Modal -->
<div id="regModal" class="modal fade">
    <div class="modal-dialog modal-registration">
        <div class="modal-content">
            <form action="./register.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Register</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rreg_num">Register Number:</label>
                        <input type="text" class="form-control" name="rreg_num" required="required" id="rreg_num" maxlength="8" autocomplete="off">

                        <!-- <input type="text" class="form-control" name="rreg_num" required="required" id="rreg_num" maxlength="8" list="register" autocomplete="off">
                        <datalist id="register">
                            <?php
                            // $sql = "SELECT `registration_number` FROM `alumni_list`";
                            // $result = mysqli_query($conn, $sql);
                            // if ($result->num_rows > 0) :
                            //     while ($row = $result->fetch_assoc()) :
                            // 
                            ?>
                            //         <option value="<?php echo $row['registration_number']; ?>">
                            //     <?php
                                    //     endwhile;
                                    // endif;
                                    ?> 
                        </datalist> -->
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
</div>
<!-- Page content holder -->
<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 position-fixed" style="z-index: 99;">
        <i class="fa fa-bars mr-2"></i>
        <!-- <small class="text-uppercase font-weight-bold"></small></button> -->
    </button>
</div>