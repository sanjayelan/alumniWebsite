<?php
require "../config/db.php";
?>
<?php
$result = mysqli_query($conn, $sql2);
if ($result)
    $row = $result->fetch_assoc();
else {
    $_SESSION['message'] = "Something went worng:Try again later";
    header("location:../error.php");
}
?>
<div class="modal" id="profileedit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="personalDetail.php" method="post" enctype="multipart/form-data">
                    <div class="col-12 ">
                        <label for="user_mobile" class="form-lable">Mobile</label>
                        <input class="form-control" type="number" min="0" name="user_mobile" value="<?php echo $row["mobile_number"]; ?>" id="user_mobile" maxlength="10" required />
                    </div>
                    <h5 class="mt-1">Current Address Details</h5>
                    <div class="col-12 ">
                        <label for="user_street" class="form-lable">Street</label>
                        <input class="form-control" type="text" value="<?php echo $row["user_street"]; ?>" name="user_street" id="user_street" maxlength="35" required />
                    </div>
                    <div class="col-12 ">
                        <label for="user_district" class="form-lable">District</label>
                        <input class="form-control" value="<?php echo $row["user_district"]; ?>" type="text" name="user_district" id="user_district" maxlength="20" required />
                    </div>
                    <div class="col-12 ">
                        <label for="user_state" class="form-lable">State</label>
                        <input class="form-control" type="text" value="<?php echo $row["user_state"]; ?>" name="user_state" id="user_state" maxlength="20" required />
                    </div>
                    <div class="col-12 ">
                        <label for="user_country" class="form-lable">Country</label>
                        <input class="form-control" type="text" value="<?php echo $row["user_country"]; ?>" name="user_country" id="user_country" maxlength="20" required />
                    </div>
                    <div class="col-12 ">
                        <label for="user_pincode" class="form-lable">Pincode</label>
                        <input class="form-control" type="number" value="<?php if($row["user_pincode"]!=0)echo $row["user_pincode"]; ?>" name="user_pincode" id="user_pincode" maxlength="6" required />
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn w-100 btn-outline-success" id="fpost">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>