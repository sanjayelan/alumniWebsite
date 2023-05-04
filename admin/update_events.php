<?php
require '../config/db.php';
$id = $_GET['id'];
if ($_POST) {
    $event_title = ucfirst($_POST['event_title']);
    $event_desc = ucfirst($_POST['event_desc']);
    $event_pic_name = $_FILES['event_pic']['name'];
    $event_pic_temp = $_FILES['event_pic']['tmp_name'];
    $imageFileType = strtolower(pathinfo($event_pic_name, PATHINFO_EXTENSION));
    $folder = "./images/events_images/" . "eventpic" . $id . "." . $imageFileType;
    // adding event data to database

    $sql = "UPDATE `alumni_events` SET `event_title`='$event_title',`event_description`='$event_desc',`event_picture_path`='$folder' WHERE `event_id`='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        move_uploaded_file($event_pic_temp, $folder);
        echo '<script>alert("Sucessfully updated");window.location.href = "./admin_events.php";</script>';
    }
}
