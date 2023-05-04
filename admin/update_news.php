
<?php
require('../config/db.php');
$id = $_GET['id'];
if ($_POST) {
    $news_title = strtoupper($_POST['news_title']);
    $news_desc = ucfirst($_POST['news_desc']);
    $news_link = $_POST['news_link'];

    // image uploding \
    $news_pic_name = $_FILES['news_pic']['name'];
    $news_pic_temp = $_FILES['news_pic']['tmp_name'];
    $imageFileType = strtolower(pathinfo($news_pic_name, PATHINFO_EXTENSION));
    $folder = "./images/news_images/" . "newspic" . $id . "." . $imageFileType;

    // adding news data to database

    $sql = "UPDATE `alumni_news` SET `news_article_title`='$news_title',`news_description`='$news_desc',`news_article_link`='$news_link',`news_picture_path`='$folder' WHERE `news_id`='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        move_uploaded_file($news_pic_temp, $folder);
        echo '<script>alert("Sucessfully updated");window.location.href = "./admin_news.php";</script>';
    }
}
