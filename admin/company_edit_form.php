    <div class="modal" id="companyedit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Job Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="job_comp_details.php" method="post" enctype="multipart/form-data">
                        <?php
                        $result5 = mysqli_query($conn, $sql4);
                        if ($result5) {
                            $row = $result5->fetch_assoc();
                        } else {
                            $_SESSION['message'] = "Sorry Something Went wrong : Try again later ";
                            header("../error.php");
                        }
                        ?>
                        <div class="col-12 ">
                            <label for="user_comp_name" class="form-lable">
                                Company Name
                            </label>
                            <input class="form-control" type="text" name="user_comp_name" id="user_comp_name" value="<?php echo $row["comp_name"]; ?>" maxlength="50" required />
                        </div>
                        <div class="col-12 ">
                            <label for="user_job_role" class="form-lable">Role</label>
                            <input class="form-control" type="text" name="user_job_role" id="user_job_role" value="<?php echo $row["role"]; ?>" maxlength="25" required />
                        </div>
                        <div class="col-12 ">
                            <label for="user_salary" class="form-lable">Salary(LPA)</label>
                            <input class="form-control" type="number" name="user_salary" id="user_salary" value="<?php echo $row["salary"]; ?>" maxlength="6" required />
                        </div>
                        <div class="col-12 ">
                            <label for="user_job_exp" class="form-lable">Experience</label>
                            <input class="form-control" type="number" name="user_job_exp" id="user_job_exp" value="<?php echo $row["exprecience"]; ?>" maxlength="2" required />
                        </div>
                        <h5 class="mt-1">Company Address Details</h5>
                        <div class="col-12 ">
                            <label for="user_comp_street" class="form-lable">Street</label>
                            <input class="form-control" type="text" name="user_comp_street" id="user_comp_street" value="<?php echo $row["comp_street"]; ?>" maxlength="35" required />
                        </div>
                        <div class="col-12 ">
                            <label for="user_comp_district" class="form-lable">District</label>
                            <input class="form-control" type="text" name="user_comp_district" id="user_comp_district" value="<?php echo $row["comp_district"]; ?>" maxlength="20" required />
                        </div>
                        <div class="col-12 ">
                            <label for="user_comp_State" class="form-lable">State</label>
                            <input class="form-control" type="text" name="user_comp_state" id="user_comp_state" value="<?php echo $row["comp_state"]; ?>" maxlength="20" required />
                        </div>
                        <div class="col-12 ">
                            <label for="user_comp_country" class="form-lable">Country</label>
                            <input class="form-control" type="text" name="user_comp_country" id="user_comp_country" value="<?php echo $row["comp_country"]; ?>" maxlength="20" required />
                        </div>
                        <div class="col-12 ">
                            <label for="user_pincode" class="form-lable">Pincode</label>
                            <input class="form-control" type="number" name="user_comp_pincode" id="user_pincode" value="<?php if($row["comp_pincode"]!=0)echo $row["comp_pincode"]; ?>" maxlength="6" required />
                        </div>

                        <div class="col-12 mt-3">
                            <button type="submit" class="btn w-100 btn-outline-success" id="fpost">Update</button>
                        </div>

                    </form>
                </div>