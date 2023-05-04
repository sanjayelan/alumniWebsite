<?php
require "../config/db.php";
require "./header.php";
require "./admin_sidebar.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `alumni_events` WHERE `event_id`='$id'";
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
            <form action="./update_events.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                <div class="col-12">
                    <label for="event-title" class="form-lable">Event Title</label>
                    <input class="form-control" type="text" name="event_title" id="event-title" value="<?php echo $row['event_title'] ?>" required />
                </div>
                <div class="col-12 mt-3">
                    <label for="event-desc">Event Description</label>
                    <textarea name="event_desc" id="event-desc" cols="30" rows="4" class="form-control" placeholder="(Maxmimum 150 characters)" maxlength="150" required><?php echo $row['event_description'] ?></textarea>
                </div>
                <div class="col-12">
                    <label for="event-pic" class="form-lable">Add a event picture</label>
                    <input class="form-control" type="file" name="event_pic" id="event-pic" accept="image/png,image/jpeg" required />
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