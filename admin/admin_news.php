<?php
require "../config/db.php";
require "./header.php";
require "./admin_sidebar.php";
$sql = "SELECT * FROM alumni_news ORDER BY news_id DESC";
$result = mysqli_query($conn, $sql);
?>
<script>
  $(document).ready(
    () => {
      $(".news").addClass("active");
    }
  )
</script>
<section id="user-dashboard">
  <div class="container p-3">
    <h2>NEWS</h2>
    <div class="col-4 col-md-2">
      <a class="btn btn-primary btn-sm p-2" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-plus me-2" aria-hidden="true"></i>Add News</a>
    </div>
    <main>
      <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-3 mt-2 m-3">
          <?php
          if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
          ?>
              <div class="col col-md-4">
                <div class="card">
                  <img src="<?php echo  $row['news_picture_path']; ?>" class="card-img-top" style="height:250px;" alt="news pic">
                  <div class="card-body">
                    <h5 class="card-title" style="height:19px;"><?php echo $row['news_article_title']; ?></h5>
                    <p class="date " style="position:relative; margin-bottom:-6px;"><?php echo $row["news_posted_on"]; ?></p>
                    <p class="card-text" style="height:90px; overflow:hidden;"><?php echo $row["news_description"]; ?></p>
                  </div>
                  <!-- <div class="card-body"> -->
                  <a href="<?php echo $row['news_article_link']; ?>" class="card-link text-center">View more</a>
                  <!-- </div> -->
                  <div class="card-footer text-center">
                    <a class="btn btn-info" style="margin:6px;" href="./news_edit_form.php?id=<?php echo $row["news_id"] ?>" role="button"><i class="fa-regular fa-pen-to-square"></i>Edit</a>
                    <?php if ($row['news_status'] == 0) : ?>
                      <a class="btn btn-success" href="./news_status.php?status=1&id=<?php echo $row["news_id"] ?>" role="button"><i class="fa-solid fa-plus"></i>Post</a>
                    <?php else : ?>
                      <a class="btn btn-warning" href="./news_status.php?status=0&id=<?php echo $row["news_id"] ?>" role="button"><i class="fa-solid fa-x"></i> Unpost</a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
          <?php
            endwhile;
          endif;
          ?>
        </div>
      </div>
    </main>
  </div>

  <!-- Modal form for adding news -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add News</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="./add_news.php" method="POST" enctype="multipart/form-data">
            <div class="col-12">
              <label for="news-title" class="form-lable">News Title</label>
              <input class="form-control" type="text" name="news_title" id="news-title" required />
            </div>
            <div class="col-12 mt-3">
              <label for="news-desc">News Description</label>
              <textarea name="news_desc" id="news-desc" cols="30" rows="4" class="form-control" placeholder="(Maximum 150 character)" maxlength="150" required></textarea>
            </div>
            <div class="col-12">
              <label for="news-Article" class="form-lable">News Link</label>
              <input class="form-control" type="text" name="news_link" id="news-link" placeholder="Paste the article link" required />
            </div>
            <div class="col-12">
              <label for="news-pic" class="form-lable">Add a news picture</label>
              <small class="d-block text-small mt-1 mb-1">(only .png, .jpg, .jpeg type files ans maximum file size 2mb)</small>
              <input class="form-control" type="file" name="news_pic" id="news-pic" accept="image/png,image/jpeg" value="" required />
            </div>
            <div class="col-12 mt-3">
              <button type="submit" class="btn w-100 btn-outline-success">Post</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
<?php
require "./footer.php"
?>