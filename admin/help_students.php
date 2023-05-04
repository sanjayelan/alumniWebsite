<?php
require "../config/db.php";
require "./header.php";
require "./side_nav.php";
$reg_num = $_SESSION["reg_num"];
?>
<script>
    $(document).ready(
        () => {
            $(".help").addClass("active");
        }
    )
</script>
<!-- content -->
<section id="user-help-students">
    <div class="container" style="height: 100%;">
        <div class="row ">
            <div class="d-flex justify-content-md-end"><button type="button" class="btn post fw-bold post-btn" data-bs-toggle="modal" data-bs-target="#postForm"><i class="fa fa-plus" aria-hidden="true"></i> Post</button></div>
        </div>
        <div class="row row-cols-md-3 row-cols-1 g-3 mt-2">
            <?php
            $sql = "SELECT * FROM `alumni_requirement` WHERE `registration_number`='$reg_num'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                if ($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) :
            ?>
                        <div class="col">
                            <div class="card">
                                <h5 class="card-header position-relative "><?php echo $row["req_type"]; ?><a href="./remove_req.php?req_id=<?php echo $row["req_id"]; ?>" onclick="return  confirm('Do you want to delete this Post')" class=" btn btn-danger position-absolute end-0 top-0"> <i class="fa-solid fa-xmark m-1" style="font-size:18px;"></i></button></a></h5>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["req_title"]; ?></h5>
                                    <p class="" style=" height:50px;"><?php echo $row["req_des"]; ?>.</p>
                                    <p class="date " style="position:relative;"><?php echo $row["req_posted_on"]; ?></p>
                                    <p>For more details:</p><a download="<?php echo $row["req_file_name"];?>" href="<?php echo $row["req_file_path"]; ?>" class="btn btn-primary "> <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                </div>
                            </div>
                        </div>
            <?php
                    endwhile;
                endif;
            } else {
                $_SESSION['message'] = "Sorry Something Went worng  : Try again later";
                header("../error.php");
            }
            ?>
        </div>
    </div>


    <!-- modal form for Requirement -->
    <div class="modal" id="postForm" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./postRequirement.php" method="post" enctype="multipart/form-data">
                        <div class="col-12 ">
                            <label for="req-title" class="form-lable">Title</label>
                            <input class="form-control" type="text" name="req_title" id="req-title" placeholder="Add a title to your post(maximum 20 characters)" maxlength="21" required />
                        </div>
                        <div class="col-12 pt-2">
                            <label for="req-type" class="form-lable">Select type of Requirement</label>
                            <select class="form-select" name="req_type" id="req-type" required>
                                <option value="Job" selected>Job</option>
                                <option value="Internship">Internship</option>
                                <option value="Seminars and Webinars">Seminars & Webinars</option>
                            </select>
                        </div>
                        <div class="col-12 pt-2">
                            <label for="req-disc" class="form-lable">Requirement Decription</label>
                            <textarea name="req_disc" class="form-control" id="req-disc" cols="30" rows="4" placeholder="Leave a breif note about the post" maxlength="84" required></textarea>
                        </div>
                        <div class="col-12 pt-2">
                            <label for="req-file" class="form-lable">Add a file for more details</label>
                            <small class="d-block text-small mt-1 mb-1">(only .png, .jpg, .jpeg, .pdf type files ans maximum file size 2mb)</small>
                            <input class="form-control" type="file" name="req_file" id="req-file" required />
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn w-100 btn-outline-success" id="fpost">Post</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
require "./footer.php";
?>