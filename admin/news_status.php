<?php
require '../config/db.php';
$status = $_GET['status'];
$id = $_GET['id'];
if ($status) {
    $sql = "UPDATE `alumni_news` SET `news_status`='1' WHERE `news_id`='$id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Sucessfully posted");window.location.href = "./admin_news.php";</script>';
    }
} else {
    $sql = "UPDATE `alumni_news` SET `news_status`='0' WHERE `news_id`='$id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Post Removed Sucessfully ");window.location.href = "./admin_news.php";</script>';
    }
}
