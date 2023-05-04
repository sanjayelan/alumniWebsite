<?php
session_start();
session_unset();
$_SESSION["log_in"] = 0;
header("location:../index.php");
