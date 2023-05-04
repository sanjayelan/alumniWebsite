<?php
require "../config/db.php";
require "./header.php";
require "./admin_sidebar.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `alumni_news` WHERE `news_id`='$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = $result->fetch_assoc();
} else {
    $_SESSION['message'] = "Sorry Something Went wrong : Try again later ";
    header("../error.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <form action="update_news.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                <div class="col-12">
                    <label for="news-title" class="form-lable">News Title</label>
                    <input class="form-control" type="text" name="news_title" id="news-title" value="<?php echo $row['news_article_title'] ?>" required />
                </div>
                <div class="col-12 mt-3">
                    <label for="news-desc">News Description</label>
                    <textarea name="news_desc" id="news-desc" cols="30" rows="4" class="form-control" maxlength="150" required> <?php echo $row['news_description'] ?></textarea>
                </div>
                <div class="col-12">
                    <label for="news-Article" class="form-lable">News Link</label>
                    <input class="form-control" type="text" name="news_link" id="news-link" value="<?php echo $row['news_article_link'] ?>" placeholder="Paste the article link" required />
                </div>
                <div class="col-12">
                    <label for="news-pic" class="form-lable">Add a news picture</label>
                    <input class="form-control" type="file" name="news_pic" id="news-pic" accept="image/png,image/jpeg" value="" required />
                </div>
                <div class="col-12 mt-3">
                    <button type="submit" class="btn w-100 btn-outline-success">Upadte</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require "./footer.php"
?>