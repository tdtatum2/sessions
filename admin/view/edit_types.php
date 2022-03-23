<?php include('header.php'); ?>

<div class="row">
    <table class="responsive-table centered">
        <thead>
            <th>Types</th>
        </thead>
        <tbody>
            <?php foreach($types as $type) : ?>
                <tr>
                    <td><?php echo $type['type'] ?></td>
                    <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="delete_type">
                            <input type="hidden" name="type" id="type" value="<?php echo $type['typeID']; ?>">
                            <button class="btn waves-effect waves-light" type="submit" name="action" value="delete_type">
                                <i class="large material-icons ">cancel</i>  
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="add_type" class="col s12">
        <div class="row">
            <div class="input-field col s8">
                <input type="text" placeholder="Type" name="typeName" id="typeName">
            </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action" value="add_type">
                Add Type
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