<?php
require '../config/db.php';
$status = $_GET['status'];
$id = $_GET['id'];
if ($status) {
    $sql = "UPDATE `alumni_events` SET `event_status`='1' WHERE `event_id`='$id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Sucessfully posted");window.location.href = "./admin_events.php";</script>';
    }
} else {
    $sql = "UPDATE `alumni_events` SET `event_status`='0' WHERE `event_id`='$id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Post Removed Sucessfully ");window.location.href = "./admin_events.php";</script>';
    }
}
