<?php
session_start();
require "../config/db.php";

// updating comp address
$comp_name = ucfirst($_POST["user_comp_name"]);
$street = ucfirst($_POST["user_comp_street"]);
$district = ucfirst($_POST["user_comp_district"]);
$state = ucfirst($_POST["user_comp_state"]);
$country = ucfirst($_POST["user_comp_country"]);
$pincode = $_POST["user_comp_pincode"];
$salary = $_POST["user_salary"];
$role = ucfirst($_POST["user_job_role"]);
$exp = $_POST["user_job_exp"];
$registration_number = $_SESSION["reg_num"];

//updating the company address details
$sql3 = "UPDATE `comp_details` SET `comp_street`='$street',`comp_district`='$district',`comp_state`='$state',`comp_country`='$country' WHERE registration_number ='$registration_number' ";
$result3 = mysqli_query($conn, $sql3);

//updating the user job details
$sql2 = "UPDATE `job_details` SET `comp_name`='$comp_name',`comp_pincode`='$pincode',`salary`='$salary',`role`='$role',`exprecience`='$exp' WHERE registration_number ='$registration_number' ";
$result2 = mysqli_query($conn, $sql2);
if ($result2) {
    header("location:./alumni_profile.php");
} else {
    echo '<script>alert("Failed to upadate user job details");</script>';
}
if (!($result3)) {
    echo '<script>alert("Failed to upadate company address details");</script>';
}
