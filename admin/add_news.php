<?php
require('../config/db.php');
if ($_POST) {
    $news_title = ucfirst($_POST['news_title']);
    $news_desc = ucfirst($_POST['news_desc']);
    $news_link = $_POST['news_link'];

    // image uploding \
    $news_pic_name = $_FILES['news_pic']['name'];
    $news_pic_temp = $_FILES['news_pic']['tmp_name'];
    $maxsize = 2 * 1024 * 1024;
    $imageFileType = strtolower(pathinfo($news_pic_name, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo '<script>alert("Please uploadeonly .png, .jpg, .jpeg type files");window.location.href = "./admin_news.php";</script>';
    } else {
        if ($_FILES["news_pic"]["size"] > $maxsize) {
            echo '<script>alert("Sorry, your file is too large.");window.location.href = "./admin_news.php";</script>';
        } else {
            $sql = "SELECT `news_id` FROM `alumni_news` ORDER BY `news_id` DESC LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $last_id = mysqli_fetch_assoc($result);
            $last_ids = $last_id["news_id"];
            if ($last_id == null) {
                $folder = "./images/news_images/" . "newspic" . "1" . "." . $imageFileType;
            } else {
                $folder = "./images/news_images/" . "newspic" . ((int)$last_ids + 1) . "." . $imageFileType;
            }
            move_uploaded_file($news_pic_temp, $folder);
            // adding news data to database

            $sql = "INSERT INTO `alumni_news`( `news_article_link`,`news_description`, `news_article_title`, `news_picture_path`) VALUES ('$news_link','$news_desc','$news_title','$folder')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // echo '<script>alert("News Sucessfully posted");window.location.href = "./admin_news.php";</script>';
            }
        }
    }
}
