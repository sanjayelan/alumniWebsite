<?php
require "../config/db.php";
require "./header.php";
require "./admin_sidebar.php";
$sql = "SELECT * FROM alumni_events ORDER BY event_id DESC";
$result = mysqli_query($conn, $sql);
?>
<script>
    $(document).ready(
        () => {
            $(".events").addClass("active");
        }
    )
</script>
<section id="user-dashboard">
    <div class="container p-3">
        <h2>Events</h2>
        <div class="col-4 col-md-2">
            <a class="btn btn-primary btn-sm p-2" href="#" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-plus me-2" aria-hidden="true"></i>Add Events</a>
        </div>
        <main>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-4 g-3 mt-2">
                    <?php
                    if ($result->num_rows > 0) :
                        while ($row = $result->fetch_assoc()) :
                    ?>
                            <div class="col col-md-4">
                                <div class="card">
                                    <img src="<?php echo  $row['event_picture_path']; ?>" class="card-img-top" style="height:250px;" alt="news pic">
                                    <div class="card-body">
                                        <h6 class="card-title m-0" style="height:19px;"><?php echo $row['event_title']; ?></h6>
                                        <!-- <div class="card-body"> -->
                                        <p class="date" style="position:relative; margin-bottom:-6px;"><?php echo $row["event_posted_on"]; ?></p>
                                        <!-- </div> -->
                                        <p class="card-text" style="height:90px; overflow:hidden;"><?php echo $row["event_description"]; ?></p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a class="btn btn-info" style="margin:6px;" href="./events_edit_form.php?id=<?php echo $row["event_id"] ?>" role="button"><i class="fa-regular fa-pen-to-square"></i>Edit</a>
                                        <?php if ($row['event_status'] == 0) : ?>
                                            <a class="btn btn-success" href="./events_status.php?status=1&id=<?php echo $row["event_id"] ?>" role="button"><i class="fa-solid fa-plus"></i>Post</a>
                                        <?php else : ?>
                                            <a class="btn btn-warning" href="./events_status.php?status=0&id=<?php echo $row["event_id"] ?>" role="button"><i class="fa-solid fa-x"></i> Unpost</a>
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
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Events</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./add_events.php" method="post" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="event-title" class="form-lable">Event Title</label>
                            <input class="form-control" type="text" name="event_title" id="event-title" required />
                        </div>
                        <div class="col-12 mt-3">
                            <label for="event-desc">Event Description</label>
                            <textarea name="event_desc" id="event-desc" cols="30" rows="4" class="form-control" placeholder="(Maxmimum 150 characters)" maxlength="150" required></textarea>
                        </div>
                        <div class="col-12">
                            <label for="event-pic" class="form-lable">Add a event picture</label>
                            <small class="d-block text-small mt-1 mb-1">(only .png, .jpg, .jpeg type files ans maximum file size 2mb)</small>
                            <input class="form-control" type="file" name="event_pic" id="event-pic" accept="image/png,image/jpeg" required />
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
require './footer.php';
?>