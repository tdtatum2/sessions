<?php include('header.php'); ?>

<?php if(!$firstname) { ?>
    <div class="row">
        <form action="index.php" method="get" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Enter your first name" id="firstname" type="text" name="firstname" class="validate">
                    <label for="firstname">First Name</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" name="action" value="register" type="submit">
                Register!
            </button>  
        </form>
    </div>
<?php }  else { ?>
    <div class="row">
        <h4>Thank you for registering, <?php echo $_SESSION['userid']; ?>!</h4>
        <form action="index.php" method="post" class="col s12">
            <button class="col btn waves-effect waves-light" type="submit" name="action" value="list_items">
                View Vehicles
            </button>
        </form>
    </div>
<?php } ?>





<?php include('footer.php'); ?>