<?php
require "./header.php";
?>
<script>
  $(document).ready(
    () => {
      $(".gallery").addClass("active");
    }
  )
</script>

<div class="container gal p-5">
  <div class="row ">
    <div class="col-4">
      <div class="gal_content">
        <a href="./onam.php">
          <div class="content-overlay"></div>
          <img class="content-image" src="./images/gallery_images/PSG_9888_resize.JPG">
          <div class="content-details fadeIn-bottom">
            <h3 class="content-title">ONAM</h3>
            <p class="content-text">Onam event photos</p>
          </div>
        </a>
      </div>
    </div>

    <div class="col-4">
      <div class="gal_content">
        <a href="./onam.php">
          <div class="content-overlay"></div>
          <img class="content-image" src="./images/gallery_images/PSG_9888_resize.JPG">
          <div class="content-details fadeIn-bottom">
            <h3 class="content-title">ONAM</h3>
            <p class="content-text">Onam event photos</p>
          </div>
        </a>
      </div>
    </div>

    <div class="col-4">
      <div class="gal_content">
        <a href="./onam.php">
          <div class="content-overlay"></div>
          <img class="content-image" src="./images/gallery_images/PSG_9888_resize.JPG">
          <div class="content-details fadeIn-bottom">
            <h3 class="content-title">ONAM</h3>
            <p class="content-text">Onam event photos</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>


<?php
require "./footer.php";
?>