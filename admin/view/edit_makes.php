<?php include('header.php'); ?>

<div class="row">
    <table class="responsive-table centered">
        <thead>
            <th>Makes</th>
        </thead>
        <tbody>
            <?php foreach($makes as $make) : ?>
                <tr>
                    <td><?php echo $make['make'] ?></td>
                    <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="delete_make">
                            <input type="hidden" name="make" id="make" value="<?php echo $make['makeID']; ?>">
                            <button class="btn waves-effect waves-light" type="submit" name="action" value="delete_make">
                                <i class="large material-icons ">cancel</i>  
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="add_make" class="col s12">
        <div class="row">
            <div class="input-field col s8">
                <input type="text" placeholder="Make" name="makeName" id="makeName">
            </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="add_make">
                Add Make
            </button>
        </div>
    </form>
</div>







<div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="admin">
        <button class="col s6 m3 l1 btn waves-effect waves-light" type="submit" name="action" value="list_items">
           Home
        </button>
    </form>
</div>
<?php include('footer.php'); ?>