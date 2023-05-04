<?php
require './config/db.php';
require "./header.php";
?>
<script>
    $(document).ready(
        () => {
            $(".alumniNeeds").addClass("active");
        }
    )
</script>
<div class="container " style="min-height: calc(100vh - 320px);">

    <div class="row row-cols-md-3 mb-3 row-cols-1 g-3 mt-2">
        <?php
        $sql = "SELECT * FROM `alumni_requirement`";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
        ?>
                <div class="col">
                    <div class="card">
                        <h5 class="card-header"><?php echo $row["req_type"]; ?></h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["req_title"]; ?></h5>
                            <p class="card-text"><?php echo $row["req_des"]; ?>.</p>
                            <p class="date"><?php echo $row["req_posted_on"]; ?></p>
                            <p>For more details:</p><a download="<?php echo $row["req_file_name"]; ?>" href="<?php echo './admin' . $row["req_file_path"]; ?>" class="btn btn-primary "> <i class="fa fa-download" aria-hidden="true"></i> Download</a>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
<?php
require "footer.php";
?>