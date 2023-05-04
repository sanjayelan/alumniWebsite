<?php
session_start();
require '../config/db.php';
if (isset($_POST['submit'])) {

    $reg_num = $_POST['rreg_num'];
    $pass = strtoupper($_POST['rpass']);
    $email = $_POST['email'];
    $phone_number = $_POST['number'];

    $msql = "SELECT `registration_number` FROM `alumni_list` WHERE `registration_number`='$reg_num'";
    $resultm = mysqli_query($conn, $msql);

    if ($resultm->num_rows > 0) {

        $sql_email =  "SELECT * FROM `alumni_users` WHERE `email`='$email'";
        $result_mail = mysqli_query($conn, $sql_email);
        if (!($result_mail->num_rows > 0)) {
            $sql_reg = "SELECT `registration_number` FROM `alumni_users` WHERE `registration_number`='$reg_num'";
            $result_reg = mysqli_query($conn, $sql_reg);
            if (!($result_reg->num_rows > 0)) {
                $sql = "INSERT INTO `alumni_users`( `registration_number`,`email`,`mobile_number`) VALUES ('$reg_num','$email','$phone_number')";
                $query = mysqli_query($conn, $sql);
                $sql2 = "INSERT INTO `alumni_login`(`registration_number`, `password`) VALUES ('$reg_num','$pass')";
                $query2 = mysqli_query($conn, $sql2);
                if ($query2 && $query) {

                    // creating company id and job id

                    $sql3 = "INSERT INTO `comp_details`(`registration_number`) VALUES ('$reg_num')";
                    $query3 = mysqli_query($conn, $sql3);
                    if ($query3) {
                        $sql = "SELECT `comp_id` FROM `comp_details` WHERE registration_number ='$reg_num'";
                        $result = mysqli_query($conn, $sql);
                        $row = $result->fetch_assoc();
                        $comp_id = $row["comp_id"];
                        $sql4 = "INSERT INTO `job_details`(`comp_id`, `registration_number`) VALUES ('$comp_id','$reg_num')";
                        $query4 = mysqli_query($conn, $sql4);
                        $sql5 = "INSERT INTO `user_address_details`(`registration_number`) VALUES ('$reg_num')";
                        $query5 = mysqli_query($conn, $sql5);
                        echo "<script>
                        alert('Successfully resistered .');
                        window.location.href='./admin_home.php';
                        </script>";
                    } else {
                        // $_SESSION['message']="Somenting went wrong register Failed try again . ";
                        // $_SESSION['message'] = "Test";  
                        // header("location:./error.php");
                        echo "<script>
                    alert('Somenting went wrong register Failed try again.');
                    window.location.href='./admin_home.php';
                    </script>";
                    }
                } else {
                    // $_SESSION['message']="Somenting went wrong register Failed try again .";
                    //  header("location:./error.php");
                    echo "<script>
                alert('Somenting went wrong register Failed try again.');
                window.location.href='./admin_home.php';
                </script>";
                }
            } else {
                // $_SESSION['message']="Somenting went wrong register Failed try again .";
                //  header("location:./error.php");
                echo "<script>
            alert('This register number is already a user.');
            window.location.href='./admin_home.php';
            </script>";
            }
        } else {
            // $_SESSION['message']="This email id is taken : Try usinfg a diffrent Email Id.";
            // header("location:./");
            echo "<script>
            alert('This email id is taken : Try usinfg a diffrent Email Id.');
            window.location.href='./admin_home.php';
            </script>";
        }
    } else {
        // $_SESSION['message']="Register Number is not regitered : Your not a valid user.";
        // header("location:./error.php");
        echo "<script>
            alert('Register Number is not regitered : Your not a valid user.');
            window.location.href='./admin_home.php';
            </script>";
    }
}
