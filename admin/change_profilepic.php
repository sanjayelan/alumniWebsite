<?php
session_start();
require "../config/db.php";
$reg_num = $_SESSION["reg_num"];
$maxsize = 2 * 1024 * 1024;
$pic_file_name = $_FILES['profile_pic']['name'];
$pic_file_temp = $_FILES['profile_pic']['tmp_name'];
$pic_file_type = strtolower(pathinfo($pic_file_name, PATHINFO_EXTENSION));
if ($pic_file_type != "jpg" && $pic_file_type != "png" && $pic_file_type != "jpeg") {
    echo '<script>alert("Please uploade only .png, .jpg, .jpeg type files");window.location.href = "./admin_home.php";</script>';
} else {
    if ($_FILES["profile_pic"]["size"] > $maxsize) {
        echo '<script>alert("Sorry, your file is too large.");window.location.href = "./admin_home.php";</script>';
    } else {
        $folder = "./images/profile_pic_images/" . "user" . $reg_num  . "." . $pic_file_type;
        $sql2 = "UPDATE `alumni_users` SET `profile_img_path`='$folder' WHERE `registration_number`='$reg_num'";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            move_uploaded_file($pic_file_temp, $folder);
            header("location:$_SERVER[HTTP_REFERER]");
        } else {
            echo '<script>alert("Failed to Update the profile picture:Try again later");</script>';
        }
    }
}
