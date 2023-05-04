<?php
require "./header.php";
?>
<div class="vh-100 p-4">
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="fa-solid fa-circle-exclamation me-1"></i>
        <div>
            <?php echo $_SESSION['message']; ?>
        </div>
    </div>
</div>
<?php
require "./footer.php";
?>