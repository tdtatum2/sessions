<?php include('header.php'); ?>

<h4>Thank you for signing out, <?php echo $_SESSION['userid'] ?></h4>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="logout">
    <button class="btn waves-effect waves-light" type="submit" name="action" value="list_items">
        View Vehicles
    </button>
</form>

<?php
    session_unset();
    session_destroy();
?>




<?php include('footer.php'); ?>