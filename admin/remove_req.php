<?php
session_start();
require "../config/db.php";
$id = $_GET["req_id"];
$sql = "DELETE FROM `alumni_requirement` WHERE `req_id`=$id";
if (mysqli_query($conn, $sql)) {
    header("location:./help_students.php");
} else {
    echo '<script>alert("failed to remove");</script>';
}
