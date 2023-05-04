<?php
require "../config/db.php";
require "./header.php";
require "./admin_sidebar.php";
$sql = "SELECT * FROM `user_query` WHERE 1 ORDER BY `qid` DESC";
$result = mysqli_query($conn, $sql);

?>
<script>
    $(document).ready(
      () => {
        $(".queries").addClass("active");
      }
    )
  </script>
  <section id="user-dashboard">
<div class="container p-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email Id</th>
                <th scope="col">City</th>
                <th scope="col">Query</th>
                <th scope="col">Query Posted On</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n=1;
            if ($result->num_rows > 0) :
                while ($row = $result->fetch_assoc()) :
            ?>
                    <tr>
                        <td><?php echo $n; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['mail']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['descrption']; ?></td>
                        <td><?php echo $row['query_posted_on']; ?></td>
                    </tr>
            <?php
                    $n++;
                endwhile;
            endif;
            ?>
        </tbody>
    </table>
</div>
</section>
<?php
require "./footer.php"
?>