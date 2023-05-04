<?php
session_start();
require "./config/db.php";
$name = ucfirst($_POST["name"]);
$phone = $_POST["phone"];
$email = $_POST["email"];
$city = ucfirst($_POST["city"]);
$desc = ucfirst($_POST["desc"]);
$sql = "INSERT INTO `user_query`( `name`, `phone`, `mail`, `city`, `descrption`) VALUES ('$name','$phone','$email','$city','$desc')";
if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Query Sucessfully posted");window.location.href = "./contactus.php";</script>';
}
