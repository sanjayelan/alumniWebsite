<?php
session_start();
require "../config/db.php";
$reg_num = $_SESSION["reg_num"];
$title = ucfirst($_POST["req_title"]);
$req_type = $_POST["req_type"];
$req_desc = ucfirst($_POST["req_disc"]);
$req_file_name = $_FILES['req_file']['name'];
$req_file_temp = $_FILES['req_file']['tmp_name'];
$maxsize = 2 * 1024 * 1024;
$req_file_type = strtolower(pathinfo($req_file_name, PATHINFO_EXTENSION));
if ($req_file_type != "jpg" && $req_file_type != "png" && $req_file_type != "jpeg" && $req_file_type != "pdf") {
    echo '<script>alert("Please uploadeonly .png, .jpg, .jpeg, .pdf type files");window.location.href = "./help_students.php";</script>';
} else {
    if ($_FILES["req_file"]["size"] > $maxsize) {
        echo '<script>alert("Sorry, your file is too large.");window.location.href = "./help_students.php";</script>';
    } else {
        $sql = "SELECT `req_id` FROM `alumni_requirement` ORDER BY `req_id` DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $last_id = mysqli_fetch_assoc($result);
        if ($last_id == null) {
            $filename = "reqdocu1" . "." . $req_file_type;
            $folder = "./Documents/req_docu/" . $filename;
        } else {
            $filename = "reqdocu" . ((int)$last_id + 1) . "." . $req_file_type;
            $folder = "./Documents/req_docu/" . $filename;
        }
        move_uploaded_file($req_file_temp, $folder);
        $sql2 = "INSERT INTO `alumni_requirement`(`registration_number`,`req_des`, `req_type`, `req_file_path`,`req_file_name`, `req_title`) VALUES ('$reg_num','$req_desc','$req_type','$folder',' $filename','$title')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            header("location:help_students.php");
        } else {
            echo '<script>alert("Failed to post ! Try again later");</script>';
        }
    }
}
