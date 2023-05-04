<?php
require './config/db.php';
$num = 3;
if ($_POST) {
  if ($_POST["readMore"]) {
    $num = $_POST["readMore"] + 3;
  }
}
$sql = "SELECT * FROM alumni_news WHERE `news_status`='1' ORDER BY news_id DESC LIMIT $num  ";
$result = mysqli_query($conn, $sql);
?>


<?php
require "./header.php";
?>
<script>
  $(document).ready(
    () => {
      $(".news").addClass("active");
    }
  )
</script>
<section class="news px-5 py-5">
  <div class="h1 text-center pb-3 news-title">News</div>
  <div class="row py-2 justify-content-center pt-3 align-items-center">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeS6MroA07HdEq3LkgT_u-aAOdBTrzsPrqO2POa0P55Z__k2EaiZDG8--dI3HjPamZkXk&usqp=CAU" style="max-width: 100%;height: 275px;">
    <?php
    $ad = "./admin";
    if ($result->num_rows > 0) :
      while ($row = $result->fetch_assoc()) : ?>
        <div class="col-md-4 pt-3">
          <div class="card">

            <img class="card-img-top p-3" src="<?php echo $ad . $row["news_picture_path"]; ?>" style="height:400px" alt="Card image cap" />
            <div class="card-body">
              <h5 class="card-title text-dark">
                <?php echo $row["news_article_title"];  ?>
              </h5>
              <p class="card-text text-secondary" style="height:70px; overflow:hidden;">
                <?php echo $row["news_description"]; ?>
              </p>
              <div class="d-grid col-6 mx-auto">
                <a href="<?php echo $row['news_article_link']; ?>" class="btn btn-dark">Read More</a>
              </div>
            </div>
          </div>
        </div>
    <?php endwhile;
    endif; ?>
  </div>


  <div class="align-items-center justify-content-center d-flex pt-2">
    <form action="" method="POST">
      <button type="submit" class="btn btn-dark btn-lg" name="readMore" value="<?php echo $num; ?>">Read more news</button>
    </form>
  </div>
</section>

<?php
require "./footer.php";
?>