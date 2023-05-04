<?php
echo '<script>alert("You have logged out redirecting to home page");</script>';
header("refresh:1; url=../index.php");
