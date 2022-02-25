<?php include('header.php'); ?>

<?php if(!$items) { ?>
    <li class="collection-item">
        <h4>No To-Do Items!</h4>
        <p> Add to Your To-Do List Below!</p>
    </li>
<?php } else { ?>
    <?php foreach ($items as $item) : ?>
        <li class="collection-item"><h4><?php echo $item['Title'] ?></h4>
            <p><?php echo $item['Description'] ?></p>
            <p><?php echo $item['categoryName'] ?></p>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="delete_item">
                <input type="hidden" name="itemnum" id="itemnum" value="<?php echo $item['ItemNum']; ?>">
                <button class="btn waves-effect waves-light" type="submit" name="action" value="delete_item">
                    <i class="large material-icons ">cancel</i>  
            </form>
        </li>
    <?php endforeach ; ?>
<?php } ?>

<?php include('footer.php'); ?>