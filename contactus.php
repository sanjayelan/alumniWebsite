<?php
require "./header.php";
?>
<script>
  $(document).ready(
    () => {
      $(".contactUs").addClass("active");
    }
  )
</script>
<section id="Contactus">
  <div class="container-fuid contactus">
    <div class="row">
      <div class="col-md-6">
        <h2 class="contact">Contact us</h2>

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15664.835018319596!2d77.0030513!3d11.0229585!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdde299af50bc10ed!2sPSG%20Institute%20of%20Management!5e0!3m2!1sen!2sin!4v1663010898385!5m2!1sen!2sin" width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="col-md-6 col2">
        <form class="form" action="./post_queries.php" method="POST">

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" required="required" name="name" id="name" maxlength="45">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" required="required" name="phone" id="phone" maxlength="10">
            <label for="cemail">Email</label>
            <input type="email" class="form-control" id="cemail" required="required" name="email" maxlength="30">


            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" required="required">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" required="required" name="desc"></textarea>
          </div>

          <div class="form-footer justify-content-between w-100 d-grid d-md-flex justify-content-md-end pt-5">

            <input type="submit" class="btn btn-dark" value="Submit">
          </div>

        </form>
</section>

<?php
require "./footer.php";
?>