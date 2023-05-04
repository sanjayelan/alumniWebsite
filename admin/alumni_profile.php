  <?php
  require "./header.php";
  require "./side_nav.php";
  $reg_num = $_SESSION["reg_num"];
  $sql2 = "SELECT * FROM `alumni_list` 
  JOIN `alumni_users` ON alumni_list.registration_number=alumni_users.registration_number
  JOIN `user_address_details` ON alumni_list.registration_number=user_address_details.registration_number
  JOIN `dept_details` ON alumni_list.dept_id = dept_details.dept_id
  JOIN `guide_details`ON alumni_list.guide_id = guide_details.guide_id
  WHERE alumni_list.registration_number = '$reg_num'";
  $result2 = mysqli_query($conn, $sql2);
  if ($result2) {
    $row = $result2->fetch_assoc();
  } else {
    $_SESSION['message'] = "Sorry Something Went wrong : Try again later ";
    header("../error.php");
  }
  ?>
  <script>
    $(document).ready(
      () => {
        $(".profile").addClass("active");
      }
    )
  </script>
  <!-- content -->

  <section id="user-dashboard">
    <div class="container p-4">
      <div class="row row-cols-1 row-cols-md-2">
        <div class="col col-12 col-md-6">
          <!-- user details -->
          <div class="row">
            <div class="card mb-3">
              <div class="card-body">
                <h4>Personal details</h4>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $row["alumni_first_name"] . " ";
                    echo $row["alumni_middle_name"] . " ";
                    echo $row["alumni_last_name"];
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $row["email"];
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="mb-0">Mobile</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $row["mobile_number"];
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    if ($row["user_street"] == "") {
                      echo "";
                    } else {
                      echo $row["user_street"] . ",<br>";
                      echo $row["user_district"] . ",<br>";
                      echo $row["user_state"] . ",<br>";
                      echo $row["user_country"] . "-";
                      echo $row["user_pincode"];
                    }
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="mb-0">Gender</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $row["gender"];
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="mb-0">Batch</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $row["batch"];
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="mb-0">Department</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $row["dept_name"];
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <button class="btn btn-info " data-bs-toggle="modal" data-bs-target="#profileedit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- guide details -->
            <div class="card mb-3">
              <div class="card-body">
                <h4>Guide details</h4>
                <hr>
                <div class="row">
                  <div class="col-sm-9 text-secondary">
                    <div class="media d-flex align-items-center">
                      <img src="https://bootstrapious.com/i/snippets/sn-v-nav/avatar.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm" />
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="mb-0">Guide Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $row["giude_fname"] . " ";
                    echo $row["giude_mname"] . " ";
                    echo $row["guide_initial"] . " ";
                    echo $row["giude_lname"] . " ";
                    ?>
                  </div>
                </div>
                <hr>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-12 col-md-6">
          <!-- company details -->
          <?php
          $sql4 = "SELECT * FROM job_details LEFT JOIN comp_details ON `job_details`.`comp_id`=comp_details.comp_id WHERE `job_details`.registration_number = '$reg_num'";
          $result4 = mysqli_query($conn, $sql4);
          $row = $result4->fetch_assoc();
          ?>
          <div class="card mb-3">
            <div class="card-body">
              <h4>Job Details</h4>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <h6 class="mb-0">Role</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $row["role"]; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <h6 class="mb-0">Salary</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $row["salary"] . " "; ?>lpa
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <h6 class="mb-0">Expreince</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $row["exprecience"]; ?>yrs
                </div>
              </div>
              <hr>

              <h4>Company details</h4>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <h6 class="mb-0">Company Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $row["comp_name"]; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php if ($row["comp_street"] == "") {
                    echo "";
                  } else {
                    echo $row["comp_street"] . ",<br>" . $row["comp_district"] . ",<br>" . $row["comp_state"] . ",<br>" . $row["comp_country"] . "-" . $row["comp_pincode"];
                  } ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <button class="btn btn-info " data-bs-toggle="modal" data-bs-target="#companyedit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  require "./profile_edit_form.php";
  require "./company_edit_form.php";
  require "./footer.php";
  ?>