<?php
require './config/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if (isset($_POST['reg_num']) && isset($_POST['pass'])) {
        $reg_num = strtoupper($_POST['reg_num']);
        $pass = $_POST['pass'];

        // Searching matched password

        $sql = "SELECT password FROM alumni_login WHERE registration_number='$reg_num'";
        $result = mysqli_query($conn, $sql);

        // print_r($result);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['password'] == $pass) {
                    $sqla = "SELECT  `user_type_id` FROM `alumni_users` WHERE registration_number='$reg_num'";
                    $resulta = mysqli_query($conn, $sqla);
                    $rowa = $resulta->fetch_assoc();
                    if ($rowa['user_type_id'] == 1) {
                        $_SESSION["fname"] = "admin";
                        $_SESSION["reg_num"] = $reg_num;
                        $_SESSION["log_in"] = 1;
                        $_SESSION["type"] = 1;
                        header("location:./admin/admin_home.php");
                    } else {
                        $sql2 = "SELECT * FROM `alumni_list` WHERE registration_number='$reg_num'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row = $result2->fetch_assoc();
                        $_SESSION["fname"] = $row["alumni_first_name"];
                        $_SESSION["reg_num"] = $reg_num;
                        $_SESSION["log_in"] = 1;
                        $_SESSION["type"] = 2;
                        header("location:./admin/dashhome.php");
                    }
                } else {
                    $_SESSION['message'] = "Incorrect Password : Please check your password!";
                    header("location:./error.php");
                }
            }
        } else {
            $_SESSION['message'] = "Incorrect Register Number:This Register Number is not registerd!";
            header("location:./error.php");
        }
    }
}
