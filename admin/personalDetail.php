  <?php
  session_start();
  require "../config/db.php";
  // updating address
  $street = ucfirst($_POST["user_street"]);
  $district = ucfirst($_POST["user_district"]);
  $state = ucfirst($_POST["user_state"]);
  $mobile = $_POST["user_mobile"];
  $country = ucfirst($_POST["user_country"]);
  $pincode = $_POST["user_pincode"];
  $registration_number = $_SESSION["reg_num"];
  $sql2 = "UPDATE `alumni_users` SET `mobile_number`= '$mobile' WHERE  registration_number ='$registration_number'";
  $result2 = mysqli_query($conn, $sql2);
  $sql = "UPDATE `user_address_details` SET `user_street`='$street',`user_district`='$district',`user_state`='$state',`user_country`='$country',`user_pincode`='$pincode' WHERE registration_number ='$registration_number' ";
  $result1 = mysqli_query($conn, $sql);
  if ($result1 && $result2) {
    header("location:./alumni_profile.php");
  } else {
    echo '<script>alert("Failed to Update the profile:Try again later");</script>';
  }






  ?>


