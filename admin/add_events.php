<?php
require '../config/db.php';
if ($_POST) {
    $event_title = ucfirst($_POST['event_title']);
    $event_desc = ucfirst($_POST['event_desc']);
    $maxsize = 2 * 1024 * 1024;
    $event_pic_name = $_FILES['event_pic']['name'];
    $event_pic_temp = $_FILES['event_pic']['tmp_name'];
    $imageFileType = strtolower(pathinfo($event_pic_name, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo '<script>alert("Please uploadeonly .png, .jpg, .jpeg type files");window.location.href = "./admin_events.php";</script>';
    } else {
        if ($_FILES["event_pic"]["size"] > $maxsize) {
            echo '<script>alert("Sorry, your file is too large.");window.location.href = "./admin_events.php";</script>';
        } else {
            $sql = "SELECT `event_id` FROM `alumni_events` ORDER BY `event_id` DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $last_id = mysqli_fetch_assoc($result);
            $last_ids = $last_id["event_id"];
            if ($last_id == null) {
                $folder = "./images/events_images/" . "eventpic" . "1" . "." . $imageFileType;
            } else {
                $folder = "./images/events_images/" . "eventpic" . ((int)$last_ids + 1) . "." . $imageFileType;
            }
            move_uploaded_file($event_pic_temp, $folder);
            // adding event data to database

            $sql = "INSERT INTO `alumni_events`( `event_description`, `event_title`, `event_picture_path`) VALUES ('$event_desc','$event_title','$folder')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Events Sucessfully posted");window.location.href = "./admin_events.php";</script>';
            }
        }
    }
}
